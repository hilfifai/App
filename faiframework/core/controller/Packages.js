(function (global, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define([], factory);
    } else if (typeof module === 'object' && module.exports) {
        // CommonJS/Node
        module.exports = factory();
    } else {
        // Browser global (fix context)
        (global || window || self).Packages = factory();
    }
})(typeof self !== 'undefined' ? self : this, function () {
    'use strict';
    class Packages {

    static htmlspecialchars(str) {
        return str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // Simulasi `htmlentities` di JavaScript
    static htmlentities(str) {
        return str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;')
            .replace(/ /g, '&nbsp;') // Menambahkan pengganti untuk spasi
            .replace(/\t/g, '&emsp;') // Menambahkan pengganti untuk tab
            .replace(/\n/g, '<br>'); // Menambahkan pengganti untuk newline
    }
    async view_website(page, content_template = {
        html: "",
        css: "",
        js: ""
    }) {

        if (page.view.config?.database) {
            console.log("config database", page.view.config?.database);
            const entries = Object.entries(page.view.config?.database);
            console.log("page.view", page.view);
            for (const [key, value] of entries) {
                let storeName = "config_database-" + page.view.load.apps + "-" + page.view.load.page_view + "-" + key;
                search = {
                    tipe: 'config_database',
                    apps: page.view.load.apps,
                    page_view: page.view.load.page_view,
                    key: key,
                    live: 1
                };
                if (!page.row_section) {
                    page.row_section = [];
                }

                const db = await openDB(transaksiDB, storeName);
                // allData =  await getApiData(db, storeName, search);
                page.row_section[key] = await getApiData(db, storeName, search);
                console.log("page.row_section", page.row_section);
                console.log(`Key: ${key}, Value: ${value},page${page.view.load.apps} ${page.view.load.page_view}`);
                //page.row_section
            }


            //     if (isset($page['config']['database'][$key])) {
            //         $page['row_section'][$key] = Database::database_coverter($page, $page['config']['database'][$key], array(), 'all');
            //     } else {
            //         $page['row_section'][$key] = (object)['object' => 'foreach_1_row'];
            //     }
            // }
        }

        const partial = new Partial();
        const contentList = page.website.content;
        console.log("contentList", contentList);

        if (typeof content_template !== 'object' || content_template === null) {
            content_template = {
                html: "",
                css: "",
                js: ""
            };
        }


        let content_template_temp = content_template;
        let result;
        for (let i = 0; i < contentList.length; i++) {
            console.log("proses contentList", contentList[i]);
            const temp_first = {
                ...contentList[i]
            };
            const key_array = contentList[i].tag || "";
            let content = "";

            if (Bundlecontent.router(page, 'array', temp_first).includes(key_array)) {
                content = Bundlecontent.router(page, 'content', contentList[i], key_array);
                // await executeContentLogic(page, array, i, data = {})
                if (contentList[i].col_row) {
                    content = `<div class="${contentList[i].col_row}">${content}</div>`;
                }
            } else if (contentList[i].content_source) {
                // alert("content_source");
                content = await partial.content_source(page, contentList[i]);
                console.log("content after  content_source", content);
                // alert(content);
            }

            if (contentList[i].row) {
                content.html = `<div class="${contentList[i].row}">${content.html}</div>`;
            } else if (contentList[i].col_row) {
                content.html = `<div class="${contentList[i].col_row}">${content.html}</div>`;
            } else {
                content.html = `<div class="col-md-12">${content.html}</div>`;
            }

            // Handle template_array
            if (Array.isArray(contentList[i].template_array)) {
                for (let j = 0; j < contentList[i].template_array.length; j++) {
                    let array = {
                        ...contentList[i].template_array[j]
                    };
                    console.log("proses template_array", array);
                    const tag = array.tag;
                    let content_array = "";
                    const temp = contentList[i];

                    if (!array.refer) {
                        array.refer = "text";
                        array.text = "";
                    }

                    if (array.refer === "database" && !array.database_refer) {
                        console.error(`${tag} harus disertai database_refer`);
                        return `<div class="alert alert-danger">${tag} harus disertai database_refer</div>`;
                    }

                    if (Bundlecontent.router(page, 'array', array).includes(tag)) {
                        content_array += Bundlecontent.router(page, 'content', array, tag);
                    } else {
                        if (array.refer === "text" && array.value) {
                            array.text = array.value;
                        }

                        if (array.refer === "database" && array.database_row) {
                            array.row = array.database_row;
                        }

                        if (array.database_refer !== undefined) {
                            const db_refer = array.database_refer;

                            if (db_refer <= -1) {
                                let database_db = array.database;

                                if (database_db.where_get_array) {
                                    for (let wga = 0; wga < database_db.where_get_array.length; wga++) {
                                        const var_get_data = database_db.where_get_array[wga].get_row;
                                        const array_row = database_db.where_get_array[wga].array_row;

                                        if (page[array_row] && page[array_row][var_get_data] !== undefined) {
                                            database_db.where = database_db.where || [];
                                            database_db.where.push([
                                                database_db.where_get_array[wga].row,
                                                '=',
                                                page[array_row][var_get_data]
                                            ]);
                                        }
                                    }
                                }

                                if (!page.row_section[db_refer]) {
                                    page.row_section[db_refer] = {
                                        row: [{
                                            object: 'foreach_1_row'
                                        }],
                                        num_rows: 1
                                    };
                                }

                                page.row_section[db_refer] = await Database.database_coverter(page, database_db, [], 'all');
                            }

                            if (page.row_section[db_refer].num_rows) {
                                // partial = new Partial();
                                console.log('Ada num_rows', {
                                    1: content,
                                    2: array,
                                    3: array.tag,
                                    4: page.row_section[db_refer].row[0]
                                });
                                content = await partial.array_website(
                                    page, content, array, array.tag, j, page.row_section[db_refer].row[0]
                                );
                                // if()
                                console.log("selesai", content);
                            }
                        } else {

                            const row = {
                                object: 'foreach_1_row'
                            };
                            console.log('Tidak db_refer', {
                                1: content,
                                2: array,
                                3: array.tag,
                                4: row
                            });
                            content = await partial.array_website(page, content, array, array.tag, j, row);
                        }
                    }
                }
            } else if (Bundlecontent.router(page, 'array', contentList[i]).includes(key_array)) {
                // alert("masuk bundles");
                content = Bundlecontent.router(page, 'content', contentList[i], key_array);

                if (contentList[i].col_row) {
                    content = `<div class="${contentList[i].col_row}">${content}</div>`;
                }
            }

            page.website.content[i] = temp_first;

            const tag = contentList[i].tag || "-99999999999";
            console.log("tag", tag);
            if (content_template.html.includes(`<${tag}></${tag}>`) && contentList[i].tag) {
                console.log("masuk2");
                alert("masuk2");
                // content_template = content_template.replace(`<${tag}></${tag}>`, content);
            } else {


                console.log("masuk contentList content_template", content_template);
                content_template.html += content.html || "";
                content_template.css += content.css || "";
                content_template.js += content.js || "";


                console.log("masukafter contentList content_template", content_template);
                console.log("masuk contentList content_template", content);
                // alert("masuk");

            }
            console.log("after contentList content_template", content_template);
        }
        console.log("content_template", content_template);
        result = {
            css: content_template.css,
            js: content_template.js,
            html: `<div class="row">${content_template.html}</div>`
        };

        return result;


    }
    async viewLayout(page, type, id, section_menu) {
        const pkg = new Packages();

        let content_view_layout_return = {
            html: "",
            css: "",
            js: ""
        };
        let result;
        if (type === 'load_data') {
            const i_card = Partial.input('i_card') ?? 0;

            page.section = "card";
            page.view_layout_number = i_card;

            return await Packages.card(
                page,
                type,
                id,
                section_menu,
                page.view.view_layout[i_card][2]
            );
        } else {
            const layoutList = page.view.view_layout;

            for (let i = 0; i < layoutList.length; i++) {
                page.view_layout_number = i;
                console.log("layoutList", layoutList[i]);
                const layoutType = layoutList[i][0];
                const layoutData = layoutList[i][2];

                if (layoutType === 'card') {
                    page.section = "card";
                    content_view_layout_return += await Packages.card(
                        page,
                        type,
                        id,
                        section_menu,
                        layoutData
                    );
                } else if (layoutType === 'website') {


                    page.website = layoutData;
                    result = await pkg.view_website(page, "");;
                    console.log("result website", result);
                    content_view_layout_return.html += result.html || "";
                    content_view_layout_return.css += result.css || "";
                    content_view_layout_return.js += result.js || "";
                } else if (layoutType === 'step') {
                    await DB.connection(page);
                    const step = layoutData;

                    page.wizard = step.wizard;

                    let database = null;
                    if (step.parameter_check.get_data === 'refer') {
                        database = page.config.database[step.parameter_check.database_refer];
                    }

                    const row_base = await Database.database_coverter(page, database, null, 'all');

                    let step_id;
                    if (row_base.num_rows) {
                        const row_step = step.parameter_check.row_data;
                        const id_done = row_base.row[0][row_step];

                        step_id = (id_done === 0) ? 1 : page.wizard.step[id_done].next;
                    } else {
                        step_id = 1;
                    }

                    page.load = {
                        step: step_id,
                        next_step: page.wizard.step[step_id].next
                    };

                    const step_content = step.content;
                    const step_config = step.wizard.step[step_id];

                    content_view_layout_return += await Packages.step(
                        page,
                        step_id,
                        step_config,
                        step_content,
                        database,
                        ""
                    );
                }
            }
            console.log("content_view_layout_return viewLayout", content_view_layout_return);
            return content_view_layout_return;
        }
    }
};
return new Packages();
});
