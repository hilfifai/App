(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD
    define(['../db/idbDB', './pages', './auth'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS/Node
    module.exports = factory(require('../db/idbDB'), require('./pages'), require('./auth'));
  } else {
    // Browser global
    root.AppModule = factory(root.idbDB, root.PagesModule, root.AuthModule, root.appEnv);
  }
})(this, function (idbDB, Pages, Auth) {
  'use strict';

  // Validate dependencies
  if (!idbDB || typeof idbDB.openDatabase !== 'function') {
    throw new Error('idbDB dependency is not properly initialized');
  }
  let last_version;
  let base_url = appEnv.base_url;
  let base_url_non_index = appEnv.base_url_non_index;
  let partial = window.Partial;
 
  const App = {
    // Configuration
    config: {
      transaksiDB: 'MyAppDB',
      configDB: 'MyConfigDB'
    },
    
    // Initialize the module
    init(config = {}) {
      this.config = { ...this.config, ...config };
    },

    /**
     * Handle hash-based routing
     */
    async handleHashRouting() {
      const hash = window.location.hash.substring(1);

      const parts = (hash || "").split("_");

      const section = parts[0] || null;
      const page = parts[1] || null;
      const id = parts[2] || null;

      if (section === "home") {
        await this.processPagesContent(window.getalldata.pages_content.item, window.getalldata.pages_content.page);
      } else if (section === "cart") {
        const encoded = btoa(JSON.stringify(["Ecommerce", "cart", "view_layout", -1]));
        const enPage = this.encodeDataForHref([{ object: 'foreach_1_row' }]);
        await this.navigateTo(enPage, encoded);
      }

      const dividto = (page || "").split("-");
      const page_section = dividto[0] || null;

      if (page_section === 'produk') {
        await this.handleProductPage(id);
      } else {
        await this.handleGenericRoute(parts);
      }
    },

    /**
     * Handle product page display
     * @param {string} productId - Product ID
     */
    async handleProductPage(productId) {
      const db = await idbDB.openDatabase(this.config.transaksiDB, 1, "web__list_apps_menu");
      const allData = await idbDB.getAllFromStore(db, {
        utama: "all_produk"
      }, "all_produk", { id_search: productId });

      const product = allData[productId];
      const json = btoa(unescape(encodeURIComponent(JSON.stringify(product))));

      setTimeout(() => {
        const el = document.querySelector(`.job-card[data-id="${productId}"]`);
        if (el) {
          // Assuming you have a ProductModule with showProductDetails method
          window.ProductModule?.showProductDetails(el, json);
        }
      }, 1000);
    },

    /**
     * Handle generic route navigation
     * @param {Array} parts - Route parts
     */
    async handleGenericRoute(parts) {
      const data = [{ object: 'foreach_1_row' }];
      if (parts[3] === 'view-layout') {
        parts[3] = "view_layout";
      }

      const type = {
        0: parts[0],
        1: parts[1],
        2: parts[2],
        3: parts[3],
      };

      const encoded = btoa(JSON.stringify(type));
      const enPage = this.encodeDataForHref(data);
      await this.navigateTo(enPage, encoded);
    },
    /**
    * Process pages content
    * @param {array} page - AppData
    * @param {object} array - Conversi Array
    * @param {numeric} i - Conversi Array
    * @param {object} array - Conversi Array
    */
    async executeContentLogic(page, array, i, data = {}) {
      const item = array[i];
    
      const func = item[0];
      const type = item[1];
      if (!func && !type) return "";

      let content = {
        content: {
          html: "",
          css: "",
          js: ""
        }
      };
     
      switch (func) {
        case 'bundle':

          if (item[-1] == 'BE3-LINK-DAFTAR') {
            content.content.html = "javascript:open_login()";
          } else if (item[-1] == 'BE3-LINK-LOGOUT') {

            content.content.html = "javascript:jsLogout()";
          }
          break;
        case 'text':
          content.content.html = type;
          break;

        case 'database':
          content.content.html = data[type] || "";
          break;

        case 'get_data_harga':
          content.content.html = "";
          break
        case 'drive_file_db':
          content.content.html = "";
          break
        case 'user_info':
          // const user = await getDataFromDB('content', 'user_info');
          content.content.html = '';
          break;

        case 'pages_content':
          let result_pages_content;
          getalldata.pages_content = {};
          getalldata.pages_content.item = {};
          getalldata.pages_content.page = {};
          getalldata.pages_content.item = btoa(unescape(encodeURIComponent(JSON.stringify(item))));
          getalldata.pages_content.page = btoa(unescape(encodeURIComponent(JSON.stringify(page))));
          // getalldata.data.after_init.push(
          //     "proses_pages_content( '" +
          //     btoa(unescape(encodeURIComponent(JSON.stringify(item)))) +
          //     "', '" +
          //     btoa(unescape(encodeURIComponent(JSON.stringify(page)))) +
          //     "');"
          // );
          // result_pages_content = await pages_content(item, page);
          // content.content = result_pages_content;;
          content.content.html = "<span id='pages_content'></span>";
          // console.log("pages_content", result_pages_content);
          break;

        case 'link':
        
          const encoded = btoa(JSON.stringify(type));
          const enPage = window.Partial.encodeDataForHref(data);
          content.content.html = "javascript:void(link_direct('" + enPage + "','" + encoded + "'))";
          break;
        case 'produk':
         
          storeName = array[i].refer_db;
          // storeName = "store__produk__varian";
          // storeName = "inventaris__asset__list";
          // storeName = "inventaris__asset__list__varian";
          // storeName = "inventaris__master__tipe_varian";
          // storeName = "inventaris__master__tipe_varian__list";
          const db = await openDB(transaksiDB, storeName);
          data = await getApiData(db, storeName, {});
          const array_template = [{
            0: array[i].func_content,
            1: array[i].content,
            return: "html_content"
          },

          ];


          result_template = await executeContentLogic(page, array_template, 0);
        
          const className = array[i]?.include_in_id?.class || '';

          const after = array[i]?.include_in_id?.after || '';
          content.content.html = `<div id="content-` + array[i].variable + `"  class="` + className + `" onload="appendData('` + array[i].variable + `', 1);"></div>
                    <button id="loadMoreButton" class="btn btn-primary" onclick="load_more(\'` + array[i].variable + `\')" type="button">Load More</button>
                    <div class="text-center " id="loading">
                            <div class="spinner"></div>
                    </div>
                    
                    `;

          let allData = await getAllFromStore(db, {
            utama: storeName
          }, storeName);
          if (allData && typeof allData === 'object') {
            const sorted = Object.values(allData).sort((a, b) => {
              return new Date(b.create_date) - new Date(a.create_date);
            });

           
          } else {
            console.warn("Data 'row' kosong atau tidak berbentuk object.");
          }
          // allData.sort((a, b) => new Date(b.create_date) - new Date(a.create_date));
        

          getalldata.data_produk[array[i].variable] = allData;
          getalldata.data_produk_real[array[i].variable] = allData;
          getalldata.data.array[array[i].variable] = array[i].array;
          getalldata.data.itemsPerPage[array[i].variable] = array[i].pagination.limit;
          getalldata.data.content[array[i].variable] = result_template.html;
          getalldata.data.search_field[array[i].variable] = array[i].search.field;
          // getalldata.data.after_init[array[i].variable] = [];
          getalldata.data.after_init.push("appendData('" + array[i].variable + "', 0);");

          let array_header = array[i].search?.header;
         
          if (array_header && typeof array_header === 'object' && Object.keys(array_header).length > 0) {
            getalldata.data.after_init.push(
              "proses_search_produk('header','" + array[i].variable + "', '" +
              btoa(unescape(encodeURIComponent(JSON.stringify(array_header)))) +
              "');"
            );
          }

          let array_sidebar = array[i].search?.sidebar;
          if (array_sidebar && typeof array_sidebar === 'object' && Object.keys(array_sidebar).length > 0) {
            getalldata.data.after_init.push(
              "proses_search_produk('sidebar','" + array[i].variable + "', '" +
              btoa(unescape(encodeURIComponent(JSON.stringify(array_sidebar)))) +
              "');"
            );
          } else {
            getalldata.data.after_init.push(
              "no_search_produk('sidebar');"
            );

          }
        
          break;
        case 'row_web_apps':
          content.content.html = "";
          break;
        case 'menu':
          content.content.html = "";
          break;
        case 'bundle':
          content.content.html = "";
          break;
        case 'base_url':
          content.content.html = "";
          break;


        case 'crud':
          content.content.html = await renderCrudComponent(item, page);
          break;

        case 'view_to_js':
          return renderDynamicJSView(item, page, array, i);
        case 'menu_content':
          set_type = item[2];
         
          last_version = page.menu.versions[type].last_version;

          content = await page.menu.versions[type].versions[last_version][set_type];
          break;
        default:

          last_version = page.data.versions[func].last_version;
          if (page.data.versions[func].versions[last_version][type]) {

           
            content = await page.data.versions[func].versions[last_version][type];
          } else {

            content.content.html = '';
          }
          //$content = self::$function($page, $type, $array[$i], $data)[$type];

          break;
      }
      if (!content?.content) {
        content = {
          content: {
            html: "",
            css: "",
            js: ""
          }
        };
      }
      // if (item.return === "just_template") {
      //     return content;
      // }

      let htmlResult = [];
      let allcontent = "";
      if (content.content.css)
        htmlResult['css'] = content.content.css || "";
      else
        htmlResult['css'] = "";

      if (content.content.html)
        htmlResult['html'] = content.content.html || "";
      else
        htmlResult['html'] = "";
      if (content.content.js)
        htmlResult['js'] = content.content.js || "";
      else
        htmlResult['js'] = "";


      const rowData = await window.Database.databaseConverter(content);
     
      let pagination;
      if (rowData.num_rows > 100) {

        pagination = {
          type: "load_more",
          limit: 50,
          page: 1
        };
      } else {
        pagination = {
          type: "all",
          limit: 50,
          page: 1
        };
      }
   

      allcontent = await this.renderContentWithData(content, page, rowData, htmlResult);
     
      // });

      // if (allcontent.css == 'undefined') {
      //     allcontent.css = "";
      // }
      // if (allcontent.js == 'undefined') {
      //     allcontent.js = "";
      // }
      // if (allcontent.html == 'undefined') {
      //     allcontent.html = "";
      // }
      // You can also include content.content.css and .js if needed.

     
      return allcontent;
    },
    async renderContentWithData(content, page, dataRows, templateString, pagination = {
      type: "load_more",
      limit: 50,
      page: 1
    }) {
      //renderContentWithData(content, page, rowData, htmlResult);
      var all_result_get = {
        html: "",
        css: "",
        js: ""
      };


      const tagNamebe3temp = "BE3-LINK-TEMPLATE";
      const patternbe3template = new RegExp(`<${tagNamebe3temp}></${tagNamebe3temp}>`, 'gi');
      const templateUrl = base_url_non_index + "FaiFramework/Pages/_template/";
      

      // Replace placeholders in templateString
      for (const type of ['css', 'html', 'js']) {
        templateString[type] = templateString[type]?.replace(patternbe3template, templateUrl)
          .replace(/{HTTPS}/gi, "https")
          .replace(new RegExp(base_url + "FaiFramework/Pages/_template/", 'gi'), templateUrl) || "";
      }

      const rows = dataRows?.row || {};
      const allKeys = Object.keys(rows);
      const totalRows = allKeys.length;
      let start = 0,
        end = totalRows;
      if (pagination.type === "load_more" || pagination.type === "page") {
        const limit = pagination.limit || 50;
        const pageNum = pagination.page || 1;
        start = (pageNum - 1) * limit;
        end = start + limit;
      }
      console.log("all_result_get before2(whit_content_array)", all_result_get);

      const paginatedKeys = allKeys.slice(start, end);
      console.log("dataRows.paginatedKeys:", paginatedKeys);
      for (const key of paginatedKeys) {
        const row = rows[key];
        // for (const [key, row] of Object.entries(dataRows.row)) {
        console.log("Key:", key, "Value:", row);

        let returnTemp = [];
        if (templateString.css)
          returnTemp.css = templateString.css;
        else
          returnTemp.css = "";
        if (templateString.js)
          returnTemp.js = templateString.js;
        else
          returnTemp.js = "";

        if (templateString.html)
          returnTemp.html = templateString.html;
        else
          returnTemp.html = "";

        if (content.array) {



          for (let keyArray in content.array) {
            const value = content.array[keyArray];

            let array = [
              []
            ];

            for (let key2 in value) {
              let fixedKey = isNaN(key2) ? key2 : parseInt(key2) - 1;
              array[0][fixedKey] = value[key2];
            }

            const rendered = await this.executeContentLogic(page, array, 0, row); // <-- pakai await
            const tagName = content.array[keyArray][0];
            const pattern = new RegExp(`<${tagName}></${tagName}>`, 'gi');

            returnTemp.css = returnTemp.css.replace(pattern, rendered.css);
            returnTemp.html = returnTemp.html.replace(pattern, rendered.html);
            returnTemp.js = returnTemp.js.replace(pattern, rendered.js);

          }
          all_result_get.js += returnTemp.js;
          all_result_get.html += returnTemp.html;
          all_result_get.css += returnTemp.css;
          // $('#jsscript').append("<br><textarea>" + all_result_get + "</textarea><br><Br>");
        } else {
          all_result_get.js += returnTemp.js;
          all_result_get.html += returnTemp.html;
          all_result_get.css += returnTemp.css;
        }
      }

      return all_result_get;
    },

    /**
     * Process pages content
     * @param {string} item_j - Encoded item data
     * @param {string} page_j - Encoded page data
     */
    async processPagesContent(item_j, page_j) {
      try {
        const item = JSON.parse(decodeURIComponent(escape(atob(item_j))));
        const page = JSON.parse(decodeURIComponent(escape(atob(page_j))));

        const result = await this.renderPagesContent(item, page);
        $('#pages_content').html(result.css + " " + result.html + " " + result.js);
        await this.executeAfterInit();
      } catch (error) {
        console.error('Error processing pages content:', error);
      }
    },

    /**
     * Render pages content
     * @param {Object} item - Content item
     * @param {Object} page - Page data
     * @returns {Promise<Object>} Rendered content
     */
    async renderPagesContent(item, page) {
      const domain = page.load.domain;
      const first_page = page.web[domain].id_first_menu;
     
      const db = await idbDB.openDatabase(this.config.configDB, 1, "web__list_apps_menu");
      const allData = await idbDB.getAllFromStore(db, {
        utama: "web__list_apps_menu"
      }, "web__list_apps_menu", { id_search: first_page });
    
      const menuData = allData[first_page];
     
      const apps = menuData.load_apps;
      const page_view = menuData.load_page_view;
      const load_type = menuData.load_type;
      const load_page_id = menuData.load_page_id;
      const menu = menuData.menu;

      const versions = page.app.versions[apps][page_view];
      const last_version = versions.last_version;
      const view = versions.versions[last_version];

      page.view = view.page;
       let pages = new Pages();
      return await pages.Page(page, load_type, load_page_id, menu);
    },

    /**
     * Navigate to a specific route
     * @param {string} enpage - Encoded page data
     * @param {string} encoded - Encoded route data
     */
    async navigateTo(enpage, encoded) {
      try {
        const viewpage = this.decodeDataFromHref(enpage);
        const data = JSON.parse(atob(encoded));

        const page = window.getalldata.myApp.page;
        const apps = data[0];
        const page_view = data[1];
        let load_type = data[2];
        const load_page_id = data[3];
        const menu = data[4] || '-1';
        const nav = data[5] || '-1';
        const board = data[6] || '-1';

        // Update global page data
        page.load = {
          ...page.load,
          apps,
          page_view,
          load_type,
          load_page_id,
          menu,
          nav,
          board
        };

        let load_type_temp = load_type;
        if (load_type === 'view-layout') load_type = "view_layout";
        if (load_type_temp === 'view_layout') load_type_temp = "view-layout";

        window.location.hash = `${apps}_${page_view}_${load_type_temp}_${load_page_id}_${menu}_${nav}`;

        const versions = page.app.versions[apps][page_view];
        const last_version = versions.last_version;
        const view = versions.versions[last_version];

        view.page.load = {
          apps,
          page_view,
          load_type,
          load_page_id
        };

        page.view = view.page;
        const pages = new Pages();
        const content = await pages.Page(page, load_type, load_page_id, menu);

        $('#pages_content').html(content.css + " " + content.html + " " + content.js);
        this.injectScripts(content);
      } catch (error) {
        console.error('Navigation error:', error);
      }
    },

    /**
     * Execute after-init scripts
     */
    async executeAfterInit() {
      if (!window.getalldata?.data?.after_init) return;

      for (const code of window.getalldata.data.after_init) {
        try {
          await eval(code); // Note: Be cautious with eval, only use with trusted code
        } catch (e) {
          console.error("Error executing after-init code:", code, e);
        }
      }
      window.getalldata.data.after_init = [];
    },

    /**
     * Encode data for href
     * @param {Array} data - Data to encode
     * @returns {string} Encoded string
     */
    encodeDataForHref(data) {
      // Implement your specific encoding logic
      return btoa(unescape(encodeURIComponent(JSON.stringify(data))));
    },

    /**
     * Decode data from href
     * @param {string} data - Encoded data
     * @returns {Object} Decoded data
     */
    decodeDataFromHref(data) {
      // Implement your specific decoding logic
      return JSON.parse(decodeURIComponent(escape(atob(data))));
    },

    /**
     * Inject scripts into the DOM
     * @param {Object} content - Content with scripts
     */
    injectScripts(content) {
      const container = document.createElement('div');
      container.innerHTML = content.css + " " + content.html + " " + content.js;

      const scripts = container.querySelectorAll('script');
      scripts.forEach(script => {
        const newScript = document.createElement('script');
        if (script.src) {
          newScript.src = script.src;
        } else {
          newScript.textContent = script.textContent;
        }
        document.body.appendChild(newScript);
      });
    },
    async hash_view() {

      const hash = window.location.hash.substring(1); // "link_same_page1"
      const parts = (hash || "").split("_");

      const section = parts[0] || null;
      const page = parts[1] || null;
      const id = parts[2] || null;
      if (section === "home") {
        await proses_pages_content(getalldata.pages_content.item, getalldata.pages_content.page);

      } else
        if (section === "cart") {
          const encoded = btoa(JSON.stringify(["Ecommerce", "cart", "view_layout", -1]));
          const enPage = encodeDataForHref([{
            object: 'foreach_1_row'
          }]);;;
          await link_direct(enPage, encoded);
          // content.content.html = "javascript:void(link_direct('" + enPage + "','" + encoded + "'))";
        }
      const dividto = (page || "").split("-");
      page_section = dividto[0] || null;
      page_div = dividto[1] || null;
      if (page_section == 'produk') {


        const db = await openDB(transaksiDB, "web__list_apps_menu");
       
        const allData = await getAllFromStore(db, {
          "utama": "all_produk"
        },
          "all_produk", {
          "id_search": id
        });
        item = allData[id];
     
        json = btoa(unescape(encodeURIComponent(JSON.stringify(item))));
        setTimeout(function () {
          const el = document.querySelector('.job-card[data-id="' + id + '"]');
          show_produk(el, json);
        }, 1000);

      } else {
        const data = [{
          object: 'foreach_1_row'
        }];
        if (parts[3] == 'view-layout') {
          parts[3] = "view_layout";
        }
        const type = {
          0: parts[0],
          1: parts[1],
          2: parts[2],
          3: parts[3],
        };
      
        const encoded = btoa(JSON.stringify(type));
        const enPage = encodeDataForHref(data);;;
        link_direct(enPage, encoded);
      }
    },
    /**
     * Initialize hash change listener
     */
    initHashListener() {
      window.addEventListener('hashchange', () => this.handleHashRouting());
    }
  };

  return App;
});