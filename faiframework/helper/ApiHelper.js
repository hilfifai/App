// apiHelper.js
(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD
    define([], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS/Node
    module.exports = factory();
  } else {
    // Browser global
    root.ApiDataHelper = factory();
  }
}(typeof self !== 'undefined' ? self : this, function() {
  'use strict';

  class ApiDataHelper {
    constructor(config = {}) {
      this.baseUrl = 'https://localhost/frameworkServer_v1/index.php/';
      this.getDeviceId = config.getDeviceId || (() => Promise.resolve('default-device-id'));
      this.debug = config.debug || true;
    }

    async getApiData(db, storeName, search = {}) {
      const apiUrl = this.baseUrl + "api/get_db_json";

      try {
        const deviceId = await this.getDeviceId();
        const dataFromAPI = await window.apiFetcher.fetchData(this.baseUrl+'api/get_db_json', {
        db: storeName,
        search: search,
        deviceId: deviceId
      }, 'POST');

       
        if (this.debug) {
          console.log("Data from API:", dataFromAPI);
          console.log("Search params:", search);
        }

        // Live data mode - return directly without caching
        if (parseInt(search.live) === 1) {
          return dataFromAPI;
        }

      
        
         console.log("Search params:", dataFromAPI);
        return dataFromAPI;
      } catch (err) {
        console.error(`Failed to fetch data for ${storeName}:`, err);
        throw err;
      }
    }

    async _cacheDataToIndexedDB(db, storeName, data) {
      return new Promise((resolve, reject) => {
        const tx = db.transaction(storeName, "readwrite");
        const store = tx.objectStore(storeName);

        const processItem = async (item) => {
          try {
            if (!item.id) {
              console.warn("Item missing ID, skipping:", item);
              return;
            }

            const key = item.id + item.nama_db + item.row_awal + item.row_akhir;
            const existingItem = await this._getItemFromIndexedDB(store, key);

            if (existingItem) {
              if (this.debug) console.log("Updating existing item:", key);
              existingItem.json_data = item.json_data;
              existingItem.kapan_update_terakhir = item.kapan_update_terakhir;
              store.put(existingItem);
            } else {
              if (this.debug) console.log("Adding new item:", key);
              store.put(item);
            }
          } catch (error) {
            console.error("Error processing item:", error);
          }
        };

        if (Array.isArray(data)) {
          Promise.all(data.map(processItem))
            .then(() => resolve())
            .catch(reject);
        } else if (typeof data === 'object' && data.id) {
          processItem(data)
            .then(() => resolve())
            .catch(reject);
        } else {
          reject(new Error("Invalid data format for caching"));
        }

        tx.oncomplete = () => {
          if (this.debug) console.log("Data successfully cached to IndexedDB");
          resolve();
        };

        tx.onerror = (event) => {
          console.error("IndexedDB transaction error:", event.target.error);
          reject(event.target.error);
        };
      });
    }

    _getItemFromIndexedDB(store, key) {
      return new Promise((resolve, reject) => {
        const request = store.get(key);
        
        request.onsuccess = () => resolve(request.result);
        request.onerror = () => {
          console.error("Error getting item from IndexedDB");
          reject(request.error);
        };
      });
    }
  }

  return ApiDataHelper;
}));