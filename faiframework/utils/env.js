// env.js - Universal Module Definition
(function (global, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD (RequireJS)
        define([], factory);
    } else if (typeof module === 'object' && module.exports) {
        // CommonJS (Node)
        module.exports = factory();
    } else {
        // Browser global
        global.appEnv = factory();
    }
}(typeof self !== 'undefined' ? self : this, function () {
    'use strict';

    // Konfigurasi default
    const defaultConfig = {
        BASE_URL: 'http://localhost/FrameworkServer_V1/',
        BASE_URL_NON_INDEX: 'http://localhost/FrameworkServer_V1/'
    };

    // Coba baca dari window._env (untuk override dari HTML)
    const browserEnv = typeof window !== 'undefined' ? window._env : {};

    return {
        base_url: defaultConfig.BASE_URL,
        base_url_non_index:  defaultConfig.BASE_URL_NON_INDEX
    };
}));