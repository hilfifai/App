import { Client } from 'pg';

const client = new Client({
    user: process.env.DB_USER || 'postgres',
    host: process.env.DB_HOST || 'localhost',
    database: process.env.DB_NAME || 'drive_db',
    password: process.env.DB_PASSWORD || 'postgres',
    port: Number(process.env.DB_PORT) || 5432,
});

await client.connect();

export default client;