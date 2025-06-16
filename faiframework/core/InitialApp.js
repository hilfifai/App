// lib/js/InitialApp.js
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // define(['./mainLoader', './authService', './logger'], factory);
    define(['./mainLoader'], factory);
  } else if (typeof module === 'object' && module.exports) {
    module.exports = factory(
      require('./mainLoader'),

    );
    //  require('./authService'),
    //   require('./logger')
  } else {
    root.InitialApp = factory(root.MainLoader);
  }
})(this, function (MainLoader) {
  class InitialApp {

    static async initialize(domain, { idbDB, apiFetcher, baseUrl, App }) {
      try {

        const { getMainLoadData } = MainLoader.createMainLoader({
          idbDB,
          apiFetcher,
          baseUrl
        });

        // 2. Get data
        const { data, web, menu, app } = await getMainLoadData();
        const appData = {
          data,
          web,
          menu,
          app,
          load: { domain }
        };
        console.log(appData);
        const templateUtama = web[domain].template_utama;

        // Update data structure
        // data.load = { domain };


        window.getalldata = window.getalldata || {};
        window.getalldata.myApp = { page: appData };



        const result = await App.executeContentLogic(
          appData,
          [{ 0: templateUtama, 1: "base", return: "html_content" }],
          0,
          data
        );
        console.log("result", result);
        return result;
      } catch (error) {
        console.error('Initialization failed:', error);
        throw error;
      }
    }

    static async renderScripts(jsString) {
      const container = document.createElement('div');
      container.innerHTML = jsString;

      container.querySelectorAll('script').forEach(script => {
        const newScript = document.createElement('script');
        script.src ? newScript.src = script.src : newScript.textContent = script.textContent;
        document.body.appendChild(newScript);
      });
    }
    static async loadScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = resolve;
        script.onerror = reject;
        document.body.appendChild(script);
      });
    };
    // Private methods


  }
  return InitialApp;
});


if (typeof module !== 'undefined' && module.exports) {
  // Node/CommonJS
  module.exports = InitialApp;
} else if (typeof define === 'function' && define.amd) {
  // AMD
  define([], () => InitialApp);
} else {
  // Browser global
  window.InitialApp = InitialApp;
}