(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD
    define([], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS
    module.exports = factory();
  } else {
    // Browser global
    root = root || window || self || global;
    root.apiFetcher = factory(); // Ekspos sebagai apiFetcher
  }
}(typeof self !== 'undefined' ? self : this, function () {
  'use strict';

  // Implementasi apiFetcher
  return {

    // const response = await fetch(apiEndpoint, options);
    // if (!response.ok) {
    //   throw new Error(`HTTP error! status: ${response.status}`);
    // }
    // return response.json();
    async fetchData(apiEndpoint, data = {}, method = 'GET') {
      return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        const url = apiEndpoint;

        if (method === 'GET') {
          // For GET requests, append data as query params
          const params = new URLSearchParams();
          for (const key in data) {
            params.append(key, data[key]);
          }
          xhr.open('GET', `${url}?${params.toString()}&t=${Date.now()}`);
        } else {
          xhr.open(method, url);
        }

        xhr.withCredentials = false;
        xhr.setRequestHeader('Content-Type', 'application/json');


        xhr.onload = () => {
          if (xhr.status >= 200 && xhr.status < 300) {
            resolve(JSON.parse(xhr.response));
          } else {
            reject(new Error(`HTTP error! status: ${xhr.status}`));
          }
        };

        xhr.onerror = () => reject(new Error('Network error'));
        if (method === 'GET') {
          xhr.send();
        } else {
          
          xhr.send(JSON.stringify(data));
        }
      });
    },
    async post(apiEndpoint, data) {
      return this.fetch(apiEndpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
      });
    }
  };
}));