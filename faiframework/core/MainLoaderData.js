// Universal module pattern (UMD)
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    define(['../db/idbDB'], factory);
  } else if (typeof module === 'object' && module.exports) {

    module.exports = factory(require('../db/idbDB'));
  } else {

    const idbDB = root.idbDB;
    if (!idbDB) {
      throw new Error('idbDB dependency not found');
    }
    root.MainLoader = factory(idbDB);
  }
})(this, function (idbDB) {
  // Dependency injection untuk API dan DB helpers
  const createMainLoader = ({ idbDB, apiFetcher, baseUrl }) => {
    const DB_NAME = 'FaiBe3DB';
    const STORE_NAME = 'mainStore';
    const DB_VERSION = 1;

    const getDataByKeyAndUpdateIfNotFound = async (key, endpoint) => {
      const db = await idbDB.openDatabase(DB_NAME, DB_VERSION, STORE_NAME);
      const cachedData = await idbDB.getFromStore(db, STORE_NAME, key);

      // if (cachedData?.data) {
      //   console.log(`Cache hit for ${key}`);
      //   return cachedData.data;
      // }

      console.log(`Cache miss for ${key}, fetching...`);
      const freshData = await apiFetcher.fetchData(`${baseUrl}${endpoint}`);
      await idbDB.saveToStore(db, STORE_NAME, {
        id: key,
        data: freshData,
        timestamp: Date.now()
      });

      return freshData;
    };

    const getMainLoadData = async () => {
      try {
        const [data, web, menu, app] = await Promise.all([
          getDataByKeyAndUpdateIfNotFound('main_page', 'api/main_load_data'),
          getDataByKeyAndUpdateIfNotFound('main_web', 'api/main_web'),
          getDataByKeyAndUpdateIfNotFound('main_menu', 'api/main_load_menu'),
          getDataByKeyAndUpdateIfNotFound('main_app', 'api/main_load_app')
        ]);

        return { data, web, menu, app };
      } catch (error) {
        console.error('MainLoader error:', error);
        throw error;
      }
    };

    return { getMainLoadData };
  };

  return { createMainLoader };
});