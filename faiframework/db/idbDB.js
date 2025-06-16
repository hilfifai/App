// lib/db/idbDB.js
(function (global, factory) {
  // UMD (Universal Module Definition) pattern
  if (typeof define === 'function' && define.amd) {
    // AMD (Asynchronous Module Definition)
    define([], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS (Node.js)
    module.exports = factory();
  } else {
    // Browser global
    const root = global || window || self || globalThis;
    if (!root) {
      throw new Error('Could not find global object');
    }
    root.idbDB = factory();
  }
})(typeof self !== 'undefined' ? self : this, function () {
  'use strict';

  // Validasi environment
  if (typeof indexedDB === 'undefined') {
    throw new Error('IndexedDB is not supported in this environment');
  }

  return {
    /**
     * Membuka atau membuat database IndexedDB
     * @param {string} dbName - Nama database
     * @param {number} version - Versi database
     * @param {string} storeName - Nama object store
     * @returns {Promise<IDBDatabase>}
     */
    async openDatabase(dbName, version, storeName) {
      if (!dbName || !storeName) {
        throw new Error('dbName and storeName are required');
      }

      return new Promise((resolve, reject) => {
        const request = indexedDB.open(dbName, version);

        request.onerror = (event) => {
          console.error('Database opening error:', event.target.error);
          reject(new Error(`Failed to open database: ${event.target.error.message}`));
        };

        request.onupgradeneeded = (event) => {
          const db = event.target.result;
          try {
            if (!db.objectStoreNames.contains(storeName)) {
              db.createObjectStore(storeName, { keyPath: 'id' });
              console.log(`Object store '${storeName}' created`);
            }
          } catch (error) {
            console.error('Upgrade error:', error);
            reject(error);
          }
        };

        request.onsuccess = (event) => {
          const db = event.target.result;

          // Handle database version change
          db.onversionchange = () => {
            db.close();
            console.warn('Database is outdated, please reload the page');
          };

          resolve(db);
        };

        request.onblocked = () => {
          reject(new Error('Database upgrade blocked by existing connection'));
        };
      });
    },

    /**
     * Mengambil data dari object store
     * @param {IDBDatabase} db - Database instance
     * @param {string} storeName - Nama object store
     * @param {string|number} key - Key untuk data yang dicari
     * @returns {Promise<any>}
     */
    async getFromStore(db, storeName, key) {
      if (!db || !storeName) {
        throw new Error('db and storeName are required');
      }

      return new Promise((resolve, reject) => {
        const transaction = db.transaction(storeName, 'readonly');
        transaction.onerror = (event) => {
          console.error('Transaction error:', event.target.error);
          reject(event.target.error);
        };

        const store = transaction.objectStore(storeName);
        const request = store.get(key);

        request.onsuccess = () => resolve(request.result);
        request.onerror = (event) => {
          console.error('Get operation error:', event.target.error);
          reject(event.target.error);
        };
      });
    },

    /**
     * Menyimpan data ke object store
     * @param {IDBDatabase} db - Database instance
     * @param {string} storeName - Nama object store
     * @param {object} data - Data yang akan disimpan
     * @returns {Promise<void>}
     */
    async saveToStore(db, storeName, data) {
      if (!db || !storeName || !data) {
        throw new Error('db, storeName and data are required');
      }

      if (typeof data !== 'object' || data === null) {
        throw new Error('Data must be an object');
      }

      return new Promise((resolve, reject) => {
        const transaction = db.transaction(storeName, 'readwrite');
        transaction.oncomplete = () => resolve();
        transaction.onerror = (event) => {
          console.error('Transaction error:', event.target.error);
          reject(event.target.error);
        };

        const store = transaction.objectStore(storeName);
        const request = store.put(data);

        request.onsuccess = () => {
          console.log('Data saved successfully:', data.id);
        };
        request.onerror = (event) => {
          console.error('Save operation error:', event.target.error);
          reject(event.target.error);
        };
      });
    },

    /**
     * Menghapus database
     * @param {string} dbName - Nama database
     * @returns {Promise<void>}
     */
    async deleteDatabase(dbName) {
      if (!dbName) {
        throw new Error('dbName is required');
      }

      return new Promise((resolve, reject) => {
        const request = indexedDB.deleteDatabase(dbName);

        request.onsuccess = () => {
          console.log(`Database '${dbName}' deleted`);
          resolve();
        };

        request.onerror = (event) => {
          console.error('Delete error:', event.target.error);
          reject(event.target.error);
        };

        request.onblocked = () => {
          reject(new Error(`Database '${dbName}' deletion blocked`));
        };
      });
    },
    async printAllTables(dbName, dbVersion, storeName) {
      try {
        const db = await openDatabase(dbName, dbVersion, storeName);
        console.log(`Database: ${dbName}`);
        console.log('Tables (Object Stores):');

        // Iterasi melalui semua object store names
        for (let i = 0; i < db.objectStoreNames.length; i++) {
          console.log(`- ${db.objectStoreNames[i]}`);
        }

        db.close();
      } catch (error) {
        console.error('Error opening database:', error);
      }
    },
    async printAllData(dbName, dbVersion, storeName) {
      try {
        const db = await openDatabase(dbName, dbVersion, storeName);
        const transaction = db.transaction(storeName, 'readonly');
        const store = transaction.objectStore(storeName);

        const getAllRequest = store.getAll();
        const allData = await new Promise((resolve, reject) => {
          getAllRequest.onsuccess = () => resolve(getAllRequest.result);
          getAllRequest.onerror = () => reject('Error fetching all data');
        });

        console.log(`Data in object store "${storeName}":`);
        console.table(allData);

        db.close();
      } catch (error) {
        console.error('Error fetching data from object store:', error);
      }
    },
    async getDataByKey(dbName, dbVersion, storeName, key) {
      try {
        const db = await openDatabase(dbName, dbVersion);
        const transaction = db.transaction(storeName, 'readonly');
        const store = transaction.objectStore(storeName);

        const getRequest = store.get(key);
        const result = await new Promise((resolve, reject) => {
          getRequest.onsuccess = () => resolve(getRequest.result);
          getRequest.onerror = (event) => reject(event.target.error);
        });

        if (result) {
          console.log(`Data found for key "${key}":`, result);
          return result;
        } else {
          console.log(`No data found for key "${key}"`);
          return '';
        }

        db.close();
      } catch (error) {
        console.error('Error getting data by key:', error);
      }
    },

    async deleteStore(dbName, storeName) {
      return new Promise((resolve, reject) => {
        // Pertama buka DB untuk ambil versi saat ini
        const request = indexedDB.open(dbName);

        request.onsuccess = function (event) {
          const currentVersion = event.target.result.version;
          event.target.result.close();

          // Buka lagi dengan versi lebih tinggi untuk trigger onupgradeneeded
          const deleteRequest = indexedDB.open(dbName, currentVersion + 1);

          deleteRequest.onupgradeneeded = function (e) {
            const db = e.target.result;

            if (db.objectStoreNames.contains(storeName)) {
              db.deleteObjectStore(storeName);
              console.log(`Object store '${storeName}' berhasil dihapus.`);
            } else {
              console.warn(`Object store '${storeName}' tidak ditemukan.`);
            }
          };

          deleteRequest.onsuccess = () => resolve();
          deleteRequest.onerror = () => reject(deleteRequest.error);
        };

        request.onerror = function () {
          reject(request.error);
        };
      });
    },
    async updateDataInIndexedDB(dbName, version, storeName, key, value) {
      const request = indexedDB.open(dbName, version);

      request.onsuccess = (event) => {
        const db = event.target.result;
        const tx = db.transaction([storeName], "readwrite");
        const store = tx.objectStore(storeName);

        const dataToPut = {
          id: key, // <-- wajib ada 'id' kalau keyPath adalah 'id'
          data: value
        };

        const putRequest = store.put(dataToPut);

        putRequest.onsuccess = () => {
          console.log('Data berhasil diupdate!');
        };

        putRequest.onerror = (err) => {
          console.error('Error saat update data:', err.target.error);
        };
      };
    },
    async deleteByIndex(db, storeName, indexName, indexValue) {
      try {
        // Membuka transaksi dengan mode readwrite
        const tx = db.transaction(storeName, "readwrite");
        const store = tx.objectStore(storeName);

        // Menggunakan index untuk mencari data
        const index = store.index(indexName); // Menentukan index yang akan digunakan
        const request = index.get(indexValue); // Mencari data berdasarkan nilai index

        request.onsuccess = () => {
          const item = request.result;
          if (item) {
            // Menghapus data berdasarkan key dari hasil pencarian
            store.delete(item.id); // Pastikan id adalah key atau ganti dengan key yang sesuai
            console.log(`Data dengan index ${indexName} dan value ${indexValue} berhasil dihapus.`);
          } else {
            console.log(`Tidak ada data yang ditemukan dengan ${indexName}: ${indexValue}`);
          }
        };

        request.onerror = (err) => {
          console.error("Terjadi kesalahan saat mencari data:", err);
        };

        // Menunggu transaksi selesai
        tx.oncomplete = () => {
          console.log("Transaksi selesai.");
        };

        tx.onerror = (err) => {
          console.error("Gagal melakukan transaksi:", err);
        };
      } catch (err) {
        console.error("Gagal menghapus data berdasarkan index:", err);
      }
    },

    // Function to delete data by key
    async deleteData(dbName, dbVersion, storeName, key) {
      try {
        const db = await openDatabase(dbName, dbVersion);
        const transaction = db.transaction(storeName, 'readwrite');
        const store = transaction.objectStore(storeName);
        console.log(`Data with key "${key}" deleted.`);
        const deleteRequest = store.delete(key);
        await new Promise((resolve, reject) => {
          deleteRequest.onsuccess = () => {
            console.log(`Data with key "${key}" deleted.`);
            resolve();
          };
          deleteRequest.onerror = (event) => reject(event.target.error);
        });

        db.close();
      } catch (error) {
        console.error('Error deleting data:', error);
      }
    },
    async getDataByKeyAndUpdateIfNotFoundData(dbName, dbVersion, storeName, key, apiData) {
      try {
        // Membuka database dan mencari data
        const db = await openDatabase(dbName, dbVersion);
        const transaction = db.transaction(storeName, 'readonly');
        const store = transaction.objectStore(storeName);

        const getRequest = store.get(key);
        const result = await new Promise((resolve, reject) => {
          getRequest.onsuccess = () => resolve(getRequest.result);
          getRequest.onerror = (event) => reject(event.target.error);
        });

        if (0) {
          // Jika data ditemukan di IndexedDB, cek apakah ada 'form_content'
          console.log('Data loaded from IndexedDB:', result.data);
          if (!result.data[row]) {
            console.log('No form_content found. Fetching from API...');
            // Jika form_content tidak ada, ambil data dari API

            data = result.data;
            data[row] = apiData; // Tambahkan form_content
            // Perbarui data di IndexedDB
            await updateDataInIndexedDB(dbName, dbVersion, storeName, key, data);
            console.log('Data updated with form_content:', apiData);
            return data;
          } else {
            console.log('form_content found:', result.data);
            return result.data; // Kembalikan data yang ada
          }
        } else {
          // Jika tidak ada data di IndexedDB, ambil dari API
          // console.log('Data not found in IndexedDB. Fetching from API...');

          let data = {};

          data = apiData; // Tambahkan form_content
          // Simpan data ke IndexedDB
          await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key);
          // console.log('Data fetched from API and saved to IndexedDB:', data);
          return data;
        }
      } catch (error) {
        console.error('Error getting or saving data:', error);
        throw error;
      }
    },
    async getDataByKeyAndUpdateIfNotFound(dbName, dbVersion, storeName, key, endpoint) {
      try {
        const db = await openDatabase(dbName, dbVersion);
        const transaction = db.transaction(storeName, 'readonly');
        const store = transaction.objectStore(storeName);

        const getRequest = store.get(key);
        const result = await new Promise((resolve, reject) => {
          getRequest.onsuccess = () => resolve(getRequest.result);
          getRequest.onerror = (event) => reject(event.target.error);
        });

        if (!isOnline()) {
          // Jika data ditemukan di IndexedDB, cek apakah ada 'form_content'
          console.log('Data loaded from IndexedDB:', result.data);
          // if (result.data[key]) {
          if (!result.data[key] && !isOnline()) {
            alert("Anda tidak terhubung dengan internet");
          } else
            if (!result.data[key] && isOnline()) {
              console.log('No form_content found. Fetching from API...');
              // Jika form_content tidak ada, ambil data dari API
              const apiData = await fetchDataFromApi(endpoint);
              let data = result.data;
              data[key] = apiData; // Tambahkan form_content
              // Perbarui data di IndexedDB
              await updateDataInIndexedDB(dbName, dbVersion, storeName, key, data);
              console.log('Data updated with form_content:', apiData);
              return data;
            } else if (result.data[key]) {

              console.log('form_content found:', result.data);
              return result.data[key]; // Kembalikan data yang ada
            }
        } else {
          // Jika tidak ada data di IndexedDB, ambil dari API
          console.log('Data not found in IndexedDB. Fetching from API...');
          const apiData = await fetchDataFromApi(endpoint);
          console.log("Key" + key);
          console.log(apiData);
          // Siapkan data untuk disimpan
          let data = {};
          data = apiData;
          // data[row] = apiData;

          // Simpan data ke IndexedDB

          await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key);
          console.log('Data fetched from API and saved to IndexedDB:', data);
          return data;
        }

        // Membuka database dan mencari data
        // const db = await openDatabase(dbName, dbVersion);
        // const transaction = db.transaction(storeName, 'readonly');
        // const store = transaction.objectStore(storeName);

        // const getRequest = store.get(key);
        // const result = await new Promise((resolve, reject) => {
        //     getRequest.onsuccess = () => resolve(getRequest.result);
        //     getRequest.onerror = (event) => reject(event.target.error);
        // });

        // if (0) {
        //     // Jika data ditemukan di IndexedDB, cek apakah ada 'form_content'
        //     console.log('Data loaded from IndexedDB:', result.data);
        //     if (!result.data[row]) {
        //         console.log('No form_content found. Fetching from API...');
        //         // Jika form_content tidak ada, ambil data dari API
        //         const apiData = await fetchDataFromApi(endpoint);
        //         data = result.data;
        //         data[row] = apiData; // Tambahkan form_content
        //         // Perbarui data di IndexedDB
        //         await updateDataInIndexedDB(dbName, dbVersion, storeName, key, data);
        //         console.log('Data updated with form_content:', apiData);
        //         return data;
        //     } else {
        //         console.log('form_content found:', result.data);
        //         return result.data; // Kembalikan data yang ada
        //     }
        // } else {
        //     // Jika tidak ada data di IndexedDB, ambil dari API
        //     // console.log('Data not found in IndexedDB. Fetching from API...');
        //     const apiData = await fetchDataFromApi(endpoint);
        //     let data = {};

        //     data = apiData; // Tambahkan form_content
        //     // Simpan data ke IndexedDB
        //     await saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key);
        //     // console.log('Data fetched from API and saved to IndexedDB:', data);
        //     return data;
        // }
      } catch (error) {
        console.error('Error getting or saving data:', error);
        throw error;
      }
    },

    async upgradeIndexedDB(dbName, dbVersion, newStoreName) {
      return new Promise((resolve, reject) => {
        const request = indexedDB.open(dbName, Date.now()); // pakai versi baru agar trigger upgrade

        request.onupgradeneeded = event => {
          const db = event.target.result;
          if (!db.objectStoreNames.contains(newStoreName)) {
            db.createObjectStore(newStoreName, {
              keyPath: 'id'
            });
          }
        };

        request.onsuccess = () => resolve(request.result);
        request.onerror = () => reject(request.error);
      });
    },
    async saveToIndexedDBWithCheck(tableName, data) {
      const db = await openDatabase("MyAppDB", Date.now(), tableName);
      console.log(data);
      // Cek apakah object store tersedia
      if (!db.objectStoreNames.contains(tableName)) {
        console.warn(`Tabel ${tableName} belum ada di IndexedDB. Membuat...`);

        // Tutup & upgrade DB agar bisa buat store baru
        db.close();
        const upgradedDB = await upgradeIndexedDB("MyAppDB", Date.now(), tableName);
        return saveToIndexedDBWithCheck(tableName, data); // ulangi simpan setelah upgrade
      }
      // return new Promise((resolve, reject) => {
      const tx = db.transaction(tableName, 'readwrite');
      const store = tx.objectStore(tableName);

      const request = store.get(data.id);

      request.onsuccess = () => {
        const existing = request.result;

        if (existing) {
          const updated = {
            ...existing,
            ...data
          };
          store.put(updated);
          console.log(`[${tableName}] Updated existing ID: ${data.id}`);
        } else {
          store.put(data);
          console.log(`[${tableName}] Added new ID: ${data.id}`);
        }
      };

      request.onerror = (err) => {
        console.error(`[${tableName}] Gagal membaca data ID: ${data.id}`, err);
      };

      tx.onerror = (err) => {
        console.error(`[${tableName}] Transaction gagal:`, err);
      };

      tx.oncomplete = () => {
        console.log(`[${tableName}] Transaksi selesai.`);
      };
    },
    async saveToIndexedDBWithCheckOnTable(tableName, data) {
      const db = await openDatabase("MyAppDB", Date.now(), tableName);
      console.log(data);
      // Cek apakah object store tersedia
      if (!db.objectStoreNames.contains(tableName)) {
        console.warn(`Tabel ${tableName} belum ada di IndexedDB. Membuat...`);

        // Tutup & upgrade DB agar bisa buat store baru
        db.close();
        const upgradedDB = await upgradeIndexedDB("MyAppDB", Date.now(), tableName);
        return saveToIndexedDBWithCheckOnTable(tableName, data); // ulangi simpan setelah upgrade
      }
      // return new Promise((resolve, reject) => {
      const tx = db.transaction(tableName, 'readwrite');
      const store = tx.objectStore(tableName);

      const request = store.get(data.id);

      request.onsuccess = () => {
        const existing = request.result;

        if (existing) {
          const updated = {
            ...existing,
            ...data
          };
          store.put(updated);
          console.log(`[${tableName}] Updated existing ID: ${data.id}`);
        } else {
          store.put(data);
          console.log(`[${tableName}] Added new ID: ${data.id}`);
        }
      };

      request.onerror = (err) => {
        console.error(`[${tableName}] Gagal membaca data ID: ${data.id}`, err);
      };

      tx.onerror = (err) => {
        console.error(`[${tableName}] Transaction gagal:`, err);
      };

      tx.oncomplete = () => {
        console.log(`[${tableName}] Transaksi selesai.`);
      };
    },
    async ParseAllData(allData, database, search = {}) {
      let row = {};
      let item;
      if (Array.isArray(allData)) {
        allData.forEach(data => {
          if (typeof data.json_data) {

            console.log("data.json_data" + (typeof data.json_data) + " ", data.json_data);
            if (typeof data.json_data === 'string') {
              try {
                const parsed = JSON.parse(data.json_data);
                // console.log(parsed);
                if (search.id_search) {
                  key = search.id_search;
                  row[key] = parsed[key].current;
                } else {

                  for (const key in parsed) {

                    // console.log(parsed[key].current);
                    if (parsed[key]?.current) {
                      item = row[key] = parsed[key].current;

                    }
                  }
                }
              } catch (err) {
                console.warn("Gagal parse JSON:", err, data.json_data);
              }
            }
          }

        });
      }
      return row;
    },
    async getAllFromStore(db, database, storeName, search = {}) {
      try {
        console.log('Nama database:', db.name);
        console.log('Versi database:', db.version);
        console.log('List object store:', Array.from(db.objectStoreNames));
        let row = {};

        if (storeName) {

          // alert("1"+storeName);

          const apiHelper = new ApiDataHelper();
          let allData = await apiHelper.getApiData(db, storeName, search);


          console.log(`Data in object store "${storeName}":`, allData);
          // console.table(allData);
          if (search.id_search) {
            const id_search = parseInt(search.id_search);

            // Filter berdasarkan row_awal <= id_search <= row_akhir
            const filtered = allData.filter(item => {
              const rowAwal = parseInt(item.row_awal || 0);
              const rowAkhir = parseInt(item.row_akhir || 0);
              return id_search >= rowAwal && id_search <= rowAkhir;
            });

            allData = filtered;
            // console.table("filtered", allData);
          }

          // Proses data dan masukkan ke dalam row


          row = await this.ParseAllData(allData, search);






          //     request.onerror = () => reject("Gagal membaca IndexedDB");
          // });
        }
        console.log("row:", row);
        return row;
      } catch (err) {
        alert("Gagal getAllFromStore: " + err.message);
      }

    },
    async prosesJoin(item, database, db) {
      // ...kode di atas
      for (const [table, field, table_in] of database.join) {
        const search = {
          id_search: item[field]
        };
        const joinData = await getAllFromStore(db, {
          utama: table
        }, table, search);

        // alert();
        console.log("Join Data:", joinData);
        // Append data bukan replace
        if (!item[table_in]) item[table_in] = [];
        item[table_in].push(...joinData);

        console.log("Row item:", item);
        console.log("Table:", table);
        console.log("Field:", field);
        console.log("ID join-in:", table_in);

      }

    },
    async saveDataToIndexedDB(db, data, dbName, dbVersion, storeName, key) {
      const transaction = db.transaction(storeName, 'readwrite');
      const store = transaction.objectStore(storeName);

      const dataToSave = {
        id: key,
        data: data,
        timestamp: Date.now()
      };
      console.log("dataToSave" + dataToSave);
      const request = store.put(dataToSave);
      await new Promise((resolve, reject) => {
        request.onsuccess = () => resolve();
        request.onerror = (event) => reject(event.target.error);
      });
    }, async getLatestDBVersion(dbName) {
      return new Promise((resolve, reject) => {
        const req = indexedDB.open(dbName);
        let wasBlocked = false;

        req.onsuccess = (event) => {
          const db = event.target.result;
          const version = db.version;
          db.close();
          resolve(version);
          console.log("Version: " + version);
        };
        req.onerror = (event) => reject(event.target.error);
        req.onblocked = () => {
          wasBlocked = true;
          reject(new Error("Database open was blocked."));
        };
      });
    }

  };
});