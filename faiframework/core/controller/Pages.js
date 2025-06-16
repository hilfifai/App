const Packages = require("./Packages");

(function (global, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define([], factory);
    } else if (typeof module === 'object' && module.exports) {
        // CommonJS/Node
        module.exports = factory();
    } else {
        // Browser global (fix context)
        (global || window || self).Pages = factory();
    }
})(typeof self !== 'undefined' ? self : this, function () {
    'use strict';
    class Pages {
        async Page(page, type, id, section_menu = '-1') {
          
            const pkg = new Packages();

            page.section = page.section || 'page';
            page.database_provider = page.database_provider || 'mysql';
            page.app_framework = page.app_framework || 'ci';
            const login = page.require_login;

            if (type === 'delete_privilage') {
                type = 'hapus';
            }

            if (type === 'enskripsi') {
                return de(Partial.input('text', '_POST'));
            }

            const crudTypes = [
                'unique_value', 'diferent_value', 'wizard_form'
            ];

            const loginTypes = ['get_login', 'check_login'];
            const layoutTypes = ['view_layout', 'load_data'];
            const ajaxTypes = ['js_ajax'];
            const crudFullTypes = [
                'setting', 'save_setting', 'list_datatable', 'tambah', 'edit', 'edit_approval',
                'update_approval', 'view', 'list', 'hapus', 'save', 'appr', 'update',
                'tree_sub_kategori', 'field_value_automatic_sub_kategori', 'ajax_sub_kategori',
                'decline_appr', 'setujui_appr', 'PDFPage', 'pdf', 'import_excel', 'export_existing',
                'export_empty', 'field_value_automatic', 'result_array_website',
                'field_value_automatic_select_target', 'field_view_sub_kategori',
                'insert_number_code', 'modalform_sub_kategori_add', 'import', 'template_import',
                'execution_import', 'select2'
            ];
            const daftarTypes = ['daftar', 'save_daftar'];
            const arrayWebsiteTypes = ['datatable_array_website'];
            const privilageTypes = ['delete_privilage', 'info_privilage'];
            const datatableTypes = ['datatable'];
            const syncTypes = ['sync', 'cari_sync', 'produk_sync'];
            const searchTypes = ['search_load'];
            const habitTypes = ['habittable', 'save_lapor_habits'];
            const ecommerceTypes = [
                'list_alamat_user', 'jadikan_default_pengiriman', 'list_cart', 'save_pengiriman_ke',
                'gunakan_voucher', 'add_cart', 'excel_produk', 'select_varian', 'select_varian_cart',
                'cek_harga_cart_get_checkout', 'delete_cart', 'update_pemesanan', 'get_all_ongkir',
                'get_change_ongkir', 'print_pesanan'
            ];
            const erpTypes = ['select_order'];
            const chatTypes = [
                'chat', 'kirim_pesan', 'list_pesan', 'list_chat_room', 'list_buat_chat_room',
                'to_chat_room', 'content_message', 'tambah_chat_personal', 'tambah_chat_grup'
            ];

            if (crudTypes.includes(type)) {
                return await CRUDFunc[type](fai, page, type, id);
                // } else if (!login || loginTypes.includes(type)) {
                //     return await pkg.login(page, type, id);
            } else if (layoutTypes.includes(type)) {
                
                const getviewLayout = await pkg.viewLayout(page, type, id, section_menu);
                
                return getviewLayout;
            } else if (ajaxTypes.includes(type)) {
                return await pkg.js_ajax(page, type, id, section_menu);
            } else if (crudFullTypes.includes(type)) {
                return await pkg.crud(page, type, id);
            } else if (daftarTypes.includes(type)) {
                return await pkg.login(page, type, id);
            } else if (arrayWebsiteTypes.includes(type)) {
                return await pkg.datatable_array_website(page, type, id);
            } else if (privilageTypes.includes(type)) {
                return await PrivilageFunc[type](page, type, id);
            } else if (datatableTypes.includes(type)) {
                return await pkg.datatable(page, type, id);
            } else if (syncTypes.includes(type)) {
                return await pkg.sync(page, type, id);
            } else if (searchTypes.includes(type)) {
                return await pkg.search_load(page, type, id);
            } else if (habitTypes.includes(type)) {
                return await HabitsApp[type](page, type, id);
            } else if (ecommerceTypes.includes(type)) {
                console.log(await EcommerceApp[type](page, type, id));
                return;
            } else if (erpTypes.includes(type)) {
                console.log(await ErpPosApp[type](page, type, id));
                return;
            } else if (chatTypes.includes(type)) {
                return await pkg.chat(page, type, id);
            }
        }

    }
    return new Pages();
});