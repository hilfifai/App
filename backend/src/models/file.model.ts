import client from '../db/client'

interface File {
  id: number
  name: string
  folder_id: number | null
  size: number
  mime_type: string
  url: string
  created_at: Date
  updated_at: Date
}

const FileModel = {
  async create (
    name: string,
    folderId: number | null,
    size: number,
    mimeType: string,
    url: string
  ): Promise<File> {
    const result = await client.query(
      'INSERT INTO drive__file (name, folder_id, size, mime_type, url) VALUES ($1, $2, $3, $4, $5) RETURNING *',
      [name, folderId, size, mimeType, url]
    )
    return result.rows[0]
  },

  async rename (id: number, newName: string): Promise<File> {
    const result = await client.query(
      'UPDATE drive__file SET name = $1, updated_at = NOW() WHERE id = $2 RETURNING *',
      [newName, id]
    )
    return result.rows[0]
  },

  async delete (id: number): Promise<void> {
    await client.query('DELETE FROM drive__file WHERE id = $1', [id])
  },

  async getById (id: number): Promise<File | null> {
    const result = await client.query(
      'SELECT * FROM drive__file WHERE id = $1',
      [id]
    )
    return result.rows[0] || null
  },

  async getByFolder (folderId: number | null): Promise<File[]> {
    const result = await client.query(
      'SELECT * FROM drive__file WHERE folder_id = $1 ORDER BY name',
      [folderId]
    )
    return result.rows
  }
}

export default FileModel
