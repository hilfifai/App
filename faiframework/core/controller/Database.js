// lib/js/database.js
(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['../db/idbDB'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // CommonJS/Node
        module.exports = factory(require('../db/idbDB'));
    } else {
        // Browser global
        root.Database = factory(root.idbDB);
    }
})(this, function (idbDB) {
    'use strict';

    // Validate idbDB dependency
    if (!idbDB || typeof idbDB.openDatabase !== 'function') {
        throw new Error('idbDB dependency is not properly initialized');
    }
    let transaksiDB = "transaksiDB";
    const Database = {
        /**
         * Renders content with data
         * @param {object} content - Content configuration
         * @param {object} page - Page data
         * @param {object} dataRows - Data rows to render
         * @param {object} templateString - Template strings
         * @param {object} pagination - Pagination settings
         * @returns {Promise<object>} Object with html, css, and js
         */
        async renderContentWithData(content, page, dataRows, templateString, pagination = {
            type: "load_more",
            limit: 50,
            page: 1
        }) {
            const all_result_get = { html: "", css: "", js: "" };
            const tagNamebe3temp = "BE3-LINK-TEMPLATE";
            const patternbe3template = new RegExp(`<${tagNamebe3temp}></${tagNamebe3temp}>`, 'gi');
            const templateUrl = `${base_url_non_index}FaiFramework/Pages/_template/`;

            // Replace placeholders in templateString
            for (const type of ['css', 'html', 'js']) {
                if (templateString[type]) {
                    templateString[type] = templateString[type]
                        .replace(patternbe3template, templateUrl)
                        .replace(/{HTTPS}/gi, "https")
                        .replace(new RegExp(`${base_url}FaiFramework/Pages/_template/`, 'gi'), templateUrl);
                }
            }

            const rows = dataRows?.row || {};
            const allKeys = Object.keys(rows);
            const totalRows = allKeys.length;
            let start = 0, end = totalRows;

            if (pagination.type === "load_more" || pagination.type === "page") {
                const limit = pagination.limit || 50;
                const pageNum = pagination.page || 1;
                start = (pageNum - 1) * limit;
                end = start + limit;
            }

            const paginatedKeys = allKeys.slice(start, end);

            for (const key of paginatedKeys) {
                const row = rows[key];
                let returnTemp = {
                    css: templateString.css || "",
                    js: templateString.js || "",
                    html: templateString.html || ""
                };

                if (content.array) {
                    for (let keyArray in content.array) {
                        const value = content.array[keyArray];
                        let array = [[]];

                        for (let key2 in value) {
                            let fixedKey = isNaN(key2) ? key2 : parseInt(key2) - 1;
                            array[0][fixedKey] = value[key2];
                        }

                        const rendered = await executeContentLogic(page, array, 0, row);
                        const tagName = content.array[keyArray][0];
                        const pattern = new RegExp(`<${tagName}></${tagName}>`, 'gi');

                        returnTemp.css = returnTemp.css.replace(pattern, rendered.css);
                        returnTemp.html = returnTemp.html.replace(pattern, rendered.html);
                        returnTemp.js = returnTemp.js.replace(pattern, rendered.js);
                    }
                }

                all_result_get.js += returnTemp.js;
                all_result_get.html += returnTemp.html;
                all_result_get.css += returnTemp.css;
            }

            return all_result_get;
        },

        /**
         * Handles incoming data transaction
         * @param {string} tableName - Table name
         * @param {object} transaksi - Transaction data
         * @param {string} visitorId - Visitor ID
         * @returns {Promise<string>} Primary key
         */
        async handleIncomingData(tableName, transaksi, visitorId) {
            try {
                transaksi = JSON.parse(transaksi);
                const tipe = transaksi.tipe_transaksi;
                const dataAwal = JSON.parse(transaksi.data_awal);
                const rowId = transaksi.primary_id;

                const json = {};
                json[transaksi.waktu_perubahan] = dataAwal.array_utama;
                const rowData = {
                    id: rowId,
                    key: rowId,
                    json: json,
                };

                const db = await idbDB.openDatabase('MyAppDB', 1, tableName);

                if (tipe === 'Pembuatan') {
                    await idbDB.saveToStore(db, tableName, rowData);
                    console.log(`[${tipe}] Data baru dimasukkan ke ${tableName}`);
                } else if (tipe === 'Perubahan') {
                    const existing = await idbDB.getFromStore(db, tableName, rowId);

                    if (existing) {
                        const updated = { ...existing, ...rowData };
                        await idbDB.saveToStore(db, tableName, updated);
                        console.log(`[${tipe}] Data ID ${rowId} di-update di ${tableName}`);
                    } else {
                        await idbDB.saveToStore(db, tableName, rowData);
                        console.log(`[${tipe}] Data ID ${rowId} belum ada, ditambahkan ke ${tableName}`);
                    }
                } else {
                    console.warn(`Transaksi tipe tidak dikenal: ${tipe}`);
                }

                return transaksi.primary_key;
            } catch (err) {
                console.error("Gagal handleIncomingData:", err);
                throw err;
            }
        },

        /**
         * Starts synchronization process
         * @param {string} apiEndpoint - API endpoint
         * @param {string} visitorId - Visitor ID
         * @param {string} db - Database name
         * @param {string} lase_device__id - Last device ID
         * @param {number} delay - Delay between syncs in ms
         */
        async startSyncUntilDone(apiEndpoint, visitorId, db, lase_device__id, delay = 3000) {
            let intervalId;

            const sync = async () => {
                try {
                    const apiData = await this.fetchDataFromApi(apiEndpoint, "GET", {
                        device_id: visitorId,
                        db: db,
                        lase_device__id: lase_device__id,
                        timestamp: new Date().toISOString()
                    });

                    await this.handleAllTransaksi(apiData.transaksi, visitorId, db, lase_device__id);

                    if (!apiData.totaltransaksi || apiData.totaltransaksi === 0) {
                        console.log("Sinkronisasi selesai. Tidak ada transaksi baru.");
                        clearInterval(intervalId);
                    }
                } catch (err) {
                    console.error("Gagal sinkronisasi:", err);
                    clearInterval(intervalId);
                }
            };

            intervalId = setInterval(sync, delay);
            return () => clearInterval(intervalId); // Return cleanup function
        },

        /**
         * Fetches data from API
         * @param {string} apiEndpoint - API endpoint
         * @param {string} method - HTTP method
         * @param {object} data - Request data
         * @returns {Promise<object>} Response data
         */
        async fetchDataFromApi(apiEndpoint, method = 'GET', data = null) {
            const options = {
                method,
                headers: { 'Content-Type': 'application/json' }
            };

            if (method === 'GET' && data) {
                const params = new URLSearchParams(data).toString();
                apiEndpoint += (apiEndpoint.includes('?') ? '&' : '?') + params;
            } else if (data && method !== 'HEAD') {
                options.body = JSON.stringify(data);
            }

            const response = await fetch(apiEndpoint, options);
            if (!response.ok) throw new Error('Network response was not ok');
            return await response.json();
        },

        /**
         * Converts database content for rendering
         * @param {object} content - Content configuration
         * @param {object} page - Page data
         * @returns {Promise<object>} Converted data
         */
        async databaseConverter(content, page) {
            const row = {
                query: 0,
                is_json: 0,
                num_rows: 0,
                row: []
            };

            if (!content.database) {
                row.row = [{ object: 'foreach_1_row' }];
                row.num_rows = 1;
                return row;
            }

            const storeName = content.database.utama;
            const db = await idbDB.openDatabase(transaksiDB, Date.now(), storeName);
            const allData = await idbDB.getAllFromStore(db, storeName);

            Object.entries(allData).forEach(([key, obj]) => {
                obj.primary_key = key;
            });

            row.row = allData;
            row.num_rows = Object.keys(allData).length;
            row.query = 1;

            if (content.pagination?.page === 'json') {
                row.is_json = 1;
            }

            return row;
        }
    };

    return Database;
});