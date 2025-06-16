
class IndexedDBQueryParser {
    constructor(dbName) {
        this.dbName = dbName;
    }

    async execute(query) {
        const tokens = this.tokenize(query);
        return await this.parseAndExecute(tokens);
    }

    // Tokenizer: Memecah string SQL menjadi array kata-kata
    tokenize(query) {
        return query.match(/[\w\*]+|\S/g);
    }

    // Parser: Menafsirkan token dan mengeksekusi IndexedDB
    async parseAndExecute(tokens) {
        const db = await this.openDB();
        const action = tokens[0].toUpperCase();

        if (action === "SELECT") {
            return this.handleSelect(tokens, db);
        } else {
            throw new Error("Hanya mendukung SELECT untuk saat ini.");
        }
    }

    // Membuka database IndexedDB
    openDB() {
        return new Promise((resolve, reject) => {
            const request = indexedDB.open(this.dbName, 1);
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject("Gagal membuka IndexedDB");
        });
    }

    // Menangani query SELECT
    async handleSelect(tokens, db) {
        const fromIndex = tokens.indexOf("FROM");
        const whereIndex = tokens.indexOf("WHERE");
        const joinIndex = tokens.indexOf("JOIN");

        if (fromIndex === -1) throw new Error("Query harus memiliki FROM");

        const tableName = tokens[fromIndex + 1];

        // Jika query JOIN
        if (joinIndex !== -1) {
            return this.handleJoin(tokens, db);
        }

        return new Promise((resolve, reject) => {
            const transaction = db.transaction(tableName, "readonly");
            const store = transaction.objectStore(tableName);
            let request;

            // Jika ada kondisi WHERE
            if (whereIndex !== -1) {
                const field = tokens[whereIndex + 1];
                const operator = tokens[whereIndex + 2];
                const value = tokens[whereIndex + 3];

                if (operator !== "=") {
                    return reject("Hanya mendukung operator '=' untuk sekarang.");
                }

                const index = store.index(field);
                request = index.getAll(Number(value));
            } else {
                request = store.getAll();
            }

            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject("Gagal mengeksekusi query SELECT");
        });
    }

    // Menangani query JOIN
    async handleJoin(tokens, db) {
        const fromTable = tokens[tokens.indexOf("FROM") + 1];
        const joinTable = tokens[tokens.indexOf("JOIN") + 1];
        const onField1 = tokens[tokens.indexOf("ON") + 1].split(".")[1];
        const onField2 = tokens[tokens.indexOf("=") + 1].split(".")[1];

        const transaction = db.transaction([fromTable, joinTable], "readonly");
        const fromStore = transaction.objectStore(fromTable);
        const joinStore = transaction.objectStore(joinTable);

        const fromData = await new Promise((resolve, reject) => {
            const request = fromStore.getAll();
            request.onsuccess = () => resolve(request.result);
            request.onerror = () => reject("Gagal mengambil data dari " + fromTable);
        });

        const joinPromises = fromData.map(async (row) => {
            return new Promise((resolve) => {
                const request = joinStore.get(row[onField1]);
                request.onsuccess = () => {
                    row[joinTable] = request.result;
                    resolve(row);
                };
            });
        });

        return Promise.all(joinPromises);
    }
}

// // Contoh Penggunaan
// const parser = new IndexedDBQueryParser("MyDatabase");

// async function runQuery() {
//     // Query SELECT sederhana
//     // const result1 = await parser.execute("SELECT * FROM orders WHERE customer_id = 1;");
//     // console.log("Query 1:", result1);

//     // // Query JOIN
//     // const result2 = await parser.execute("SELECT * FROM orders JOIN customers ON orders.customer_id = customers.id;");
//     // console.log("Query 2 (JOIN):", result2);
// }