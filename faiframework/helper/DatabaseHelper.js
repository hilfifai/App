async function ParseAllData(allData, database, search = {}) {
            let row = {};
            console.log("ParseAllData", allData);
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
                                            // if (database.join) {
                                            //     //prosesJoin(item, database, db);

                                            // }
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
        }
        async function getAllFromStore(db, database, storeName, search = {}) {
            try {
                console.log('Nama database:', db.name);
                console.log('Versi database:', db.version);
                console.log('List object store:', Array.from(db.objectStoreNames));
                let row = {};

                if (storeName) {

                    // alert("1"+storeName);
                    getApiData(db, storeName, search);
                    const tx = db.transaction(storeName, "readwrite");
                    const store = tx.objectStore(storeName);
                    const getAllRequest = store.getAll();
                    let allData = await new Promise((resolve, reject) => {
                        getAllRequest.onsuccess = async () => {
                            if (getAllRequest.result) {

                                resolve(getAllRequest.result);
                            } else {
                                reject('Error fetching all data')

                            }
                        };

                        getAllRequest.onerror = () => reject('Error fetching all data');
                    });

                    console.log(`Data in object store "${storeName}":`);
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


                    row = await ParseAllData(allData, search);






                    //     request.onerror = () => reject("Gagal membaca IndexedDB");
                    // });
                }
                console.log("row:", row);
                return row;
            } catch (err) {
                alert("Gagal getAllFromStore: " + err.message);
            }

        }