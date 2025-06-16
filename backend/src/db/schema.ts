import client from './client';

async function setupDatabase() {
    await client.query(`
        CREATE TABLE IF NOT EXISTS drive__folder (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            parent_id INTEGER REFERENCES drive__folder(id),
            created_at TIMESTAMP DEFAULT NOW(),
            updated_at TIMESTAMP DEFAULT NOW()
        );
    `);

    await client.query(`
        CREATE TABLE IF NOT EXISTS drive__file (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            folder_id INTEGER REFERENCES drive__folder(id),
            size INTEGER,
            mime_type VARCHAR(100),
            url VARCHAR(255),
            created_at TIMESTAMP DEFAULT NOW(),
            updated_at TIMESTAMP DEFAULT NOW()
        );
    `);
}

export default setupDatabase;