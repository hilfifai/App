// lib/js/product.js
(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD
    define(['../db/idbDB', 'jquery', 'sweetalert'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS/Node
    module.exports = factory(require('../db/idbDB'), require('jquery'), require('sweetalert'));
  } else {
    // Browser global
    root.ProductModule = factory(root.idbDB, root.$, root.Swal);
  }
})(this, function(idbDB, $, Swal) {
  'use strict';

  // Validate dependencies
  if (!idbDB || typeof idbDB.openDatabase !== 'function') {
    throw new Error('idbDB dependency is not properly initialized');
  }
  if (!$ || typeof $.ajax !== 'function') {
    throw new Error('jQuery is required for this module');
  }

  const Product = {
    // Configuration
    config: {
      baseUrl: '',
      transaksiDB: 'MyAppDB',
      sizeOrder: ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL', '5XL', '6XL']
    },

    // Initialize the module
    init(config = {}) {
      this.config = { ...this.config, ...config };
    },

    /**
     * Sort sizes according to predefined order
     * @param {Array} arr - Array of sizes to sort
     * @returns {Array} Sorted array
     */
    sortSizes(arr) {
      return arr.sort((a, b) => {
        return this.config.sizeOrder.indexOf(a) - this.config.sizeOrder.indexOf(b);
      });
    },

    /**
     * Sort product variants
     * @param {Array} arr - Array of variants to sort
     * @returns {Array} Sorted array
     */
    sortVariants(arr) {
      return arr.sort((a, b) => {
        const sizeIndexA = this.config.sizeOrder.indexOf(a.nama_varian);
        const sizeIndexB = this.config.sizeOrder.indexOf(b.nama_varian);
        return sizeIndexA - sizeIndexB;
      });
    },

    /**
     * Generate HTML for variant selection
     * @param {Object} productData - Product data
     * @param {string} type - Variant type
     * @param {number} variantIndex - Variant index
     * @param {string} jsonData - JSON encoded product data
     * @returns {string} HTML string
     */
    generateVariantHTML(productData, type, variantIndex, jsonData) {
      const original = productData.list_varian[type].detail;
      const uniqueArray = Object.values(original).filter((item, index, self) =>
        index === self.findIndex(obj => obj.nama_varian === item.nama_varian)
      );

      const uniqueObject = Object.fromEntries(uniqueArray.map((item, i) => [i, item]));
      const sortedArray = this.sortVariants(Object.values(uniqueObject));
      const sortedObject = Object.fromEntries(sortedArray.map((item, i) => [i, item]));

      let disabled = variantIndex >= 2 ? "disabled" : "";
      let html = `<div class="col-4"><label>${productData.nama_variasi[variantIndex]}</label></div>
                 <div class="col-8" id="variasi-content-${variantIndex}">
                 <div class="form-selectgroup mt-3">`;

      Object.values(sortedObject).forEach(item => {
        html += `<label class="form-selectgroup-item">
                <input type="radio" ${disabled} name="varian${variantIndex}[]" id="varian${variantIndex}" 
                  value="${item.id_varian}" class="form-selectgroup-input" 
                  onclick="ProductModule.changeVariant(${variantIndex},'${item.id_varian}','${jsonData}')">
                <span class="form-selectgroup-label">${item.nama_varian}</span>
                </label>`;
      });

      html += `</div></div>`;
      return html;
    },

    /**
     * Handle variant selection change
     * @param {number} variantIndex - Variant index
     * @param {string} variantId - Selected variant ID
     * @param {string} jsonData - JSON encoded product data
     */
    changeVariant(variantIndex, variantId, jsonData) {
      const raw = decodeURIComponent(escape(atob(jsonData)));
      const productData = JSON.parse(raw);

      if (parseInt(productData.max_variasi) === parseInt(variantIndex)) {
        const variantDetailId = productData.list_varian_detail.all[variantId];
        const detail = productData.varian[variantDetailId];

        $(".job-subtitle-wrapper").text(this.formatRupiah(detail.harga_pokok_varian));
        $(".job-logos").html(`<img src="${detail.gambar_produk_varian}" onclick="ProductModule.showPopup(this)">`);
        $("#stok-content").text(detail.stok);
        $("#id_produk_varian").val(variantDetailId);
        $("#id_asset_varian").val(detail.id_barang_varian);
      } else {
        $(".job-subtitle-wrapper").text(productData.harga_detail[variantId].harga_full);
        $(".job-logos").html(`<img src="${productData.foto_detail[variantId]}" onclick="ProductModule.showPopup(this)">`);
        $("#stok-content").text(productData.stok_detail[variantId]);

        let disabled = "";
        for (let i = variantIndex + 1; i <= 3; i++) {
          $(`#variasi-content-${i}`).html('');
          const type = `tipe_${variantIndex + 1}`;
          const original = productData.list_varian[type].breakdown[i][variantId];
          
          const uniqueArray = Object.values(original).filter((item, index, self) =>
            index === self.findIndex(obj => obj.nama_varian === item.nama_varian)
          );

          const uniqueObject = Object.fromEntries(uniqueArray.map((item, i) => [i, item]));
          const sortedArray = this.sortVariants(Object.values(uniqueObject));
          const sortedObject = Object.fromEntries(sortedArray.map((item, i) => [i, item]));

          let variantHtml = '<div class="form-selectgroup mt-3">';
          Object.values(sortedObject).forEach(item => {
            variantHtml += `<label class="form-selectgroup-item">
                          <input type="radio" ${disabled} id="varian${i}" name="varian${i}[]" 
                            value="${item.id_varian}" class="form-selectgroup-input" 
                            onclick="ProductModule.changeVariant(${i},'${item.id_varian}','${jsonData}')">
                          <span class="form-selectgroup-label">${item.nama_varian}</span>
                          </label>`;
          });
          variantHtml += '</div>';
          $(`#variasi-content-${i}`).html(variantHtml);
          disabled = "disabled";
        }
      }
    },

    /**
     * Show product details
     * @param {HTMLElement} jobCard - Product card element
     * @param {string} jsonData - JSON encoded product data
     */
    showProductDetails(jobCard, jsonData) {
      const wrapper = $(".wrapper-job");
      const logo = $(jobCard).find("img");
      const desc = $(jobCard).find("#desc").html();
      const price = $(jobCard).find(".job-card-price").html();
      const title = $(jobCard).find(".job-card-title").text();
      const bg = logo.attr("src") || `${this.config.baseUrl}image_placeholder.jpg`;

      $(".job-explain").show();
      $(".job-explain-content .job-card-title").text(title);
      $(".job-logos").html(`<img src="${bg}" onclick="ProductModule.showPopup(this)">`);
      $(".overview-desc").html(desc);
      $(".job-subtitle-wrapper").html(price);
      wrapper.addClass("detail-page").scrollTop(0);

      $(".job#job-produk").addClass("job-overview");
      $(".job-cards").addClass("job-overview-cards");
      $(".job-card").addClass("job-overview-card job-card overview-card");

      const raw = decodeURIComponent(escape(atob(jsonData)));
      const productData = JSON.parse(raw);
      
      let html = '<div class="row">';
      html += `<input type="hidden" id="max_variasi" value="${parseInt(productData.max_variasi)}">`;
      
      if (parseInt(productData.max_variasi) >= 1) {
        html += this.generateVariantHTML(productData, "tipe_1", 1, jsonData);
      }
      if (parseInt(productData.max_variasi) >= 2) {
        html += this.generateVariantHTML(productData, "tipe_2", 2, jsonData);
      }
      if (parseInt(productData.max_variasi) >= 3) {
        html += this.generateVariantHTML(productData, "tipe_3", 3, jsonData);
      }
      
      html += '</div>';
      html += `<input type="hidden" id="id_asset" value="${productData.id_asset}">`;
      html += `<input type="hidden" id="id_produk" value="${productData.id}">`;
      html += `<input type="hidden" id="id_asset_varian" value="">`;
      html += `<input type="hidden" id="id_produk_varian" value="">`;

      $(".job-varian").html(html);
      $("#stok-content").text(productData.stok);
    },

    /**
     * Add product to cart
     * @returns {Promise<void>}
     */
    async addToCart() {
      try {
        const isLoggedIn = await this.checkLoginStatus();
        if (!isLoggedIn) {
          this.openLogin();
          return;
        }

        const maxVariant = $("#max_variasi").val();
        const productId = $("#id_produk").val();
        const productVariantId = $("#id_produk_varian").val();
        const assetId = $("#id_asset").val();
        const assetVariantId = $("#id_asset_varian").val();
        const quantity = $("#set_qty").val();

        let variantIds = [null, null, null];
        let isValidProduct = false;

        if (parseInt(maxVariant) === 0) {
          isValidProduct = true;
        } else {
          const selected = $(`input[name="varian${maxVariant}[]"]:checked`);
          if (selected.length) {
            isValidProduct = true;
            variantIds = selected.val().split("-");
          }
        }

        if (!isValidProduct) {
          Swal.fire("Gagal!", "Pilih Varian terlebih dahulu", "error");
          return;
        }

        Swal.fire({
          title: 'Sedang memproses...',
          allowOutsideClick: false,
          showConfirmButton: false,
          didOpen: () => Swal.showLoading()
        });

        const response = await $.ajax({
          type: "GET",
          url: `${this.config.baseUrl}api/add_cart`,
          dataType: "json",
          data: {
            "first": this.getLinkRoute(),
            "link_route": $("#load_link_route").val(),
            "frameworksubdomain": $("#load_domain").val(),
            "apps": "Ecommerce",
            "page_view": "add_cart",
            "type": "add_cart",
            "id": $("#load_id").val(),
            "id_user": isLoggedIn.userId,
            "id_asset": assetId,
            "id_produk": productId,
            "level": $("#level").val(),
            "id_varian_3": variantIds[2],
            "id_varian_2": variantIds[1],
            "id_varian_1": variantIds[0],
            "set_qty": quantity,
            "id_produk_varian": productVariantId,
            "id_asset_varian": assetVariantId
          }
        });

        Swal.close();
        if (response.status === 1) {
          Swal.fire("Sukses!", "Produk sudah masuk kedalam cart!", "success");
        } else {
          Swal.fire("Gagal!", response.keterangan || "Terdapat Kesalahan Teknis", "error");
        }
      } catch (error) {
        Swal.close();
        console.error("Add to cart error:", error);
        Swal.fire("Gagal!", "Terjadi kesalahan saat menambahkan ke keranjang", "error");
      }
    },

    /**
     * Format number to Rupiah currency
     * @param {number} number - Number to format
     * @param {string} prefix - Currency prefix
     * @returns {string} Formatted currency string
     */
    formatRupiah(number, prefix = "Rp. ") {
      if (isNaN(number)) return prefix + "0";
      const formatted = new Intl.NumberFormat("id-ID").format(number);
      return prefix + formatted;
    },

    /**
     * Show image popup
     * @param {HTMLElement} imgElement - Image element
     */
    showPopup(imgElement) {
      // Implement your popup logic here
      console.log("Show popup for image:", imgElement.src);
    },

    /**
     * Check user login status
     * @returns {Promise<object|boolean>} Session data or false if not logged in
     */
    async checkLoginStatus() {
      try {
        const db = await idbDB.openDatabase(this.config.transaksiDB, 1, "session");
        const session = await idbDB.getFromStore(db, "session", "current");
        return session && session.isLoggedIn ? session : false;
      } catch (error) {
        console.error('Error checking login status:', error);
        return false;
      }
    },

    /**
     * Open login modal
     */
    openLogin() {
      // Implement your login modal opening logic
      console.log("Opening login modal");
    },

    /**
     * Get link route
     * @returns {string} Current link route
     */
    getLinkRoute() {
      // Implement your route getting logic
      return window.location.pathname;
    }
  };

  return Product;
});