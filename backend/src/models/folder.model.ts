import client from '../db/client'

interface Folder {
  id: number
  name: string
  parent_id: number | null
  created_at: Date
  updated_at: Date
}

const FolderModel = {
  async create (name: string, parentId: number | null = null): Promise<Folder> {
    const result = await client.query(
      'INSERT INTO drive__folder (name, parent_id) VALUES ($1, $2) RETURNING *',
      [name, parentId]
    )
    return result.rows[0]
  },

  async rename (id: number, newName: string): Promise<Folder> {
    const result = await client.query(
      'UPDATE drive__folder SET name = $1, updated_at = NOW() WHERE id = $2 RETURNING *',
      [newName, id]
    )
    return result.rows[0]
  },

  async delete (id: number): Promise<void> {
    await client.query('DELETE FROM drive__folder WHERE id = $1', [id])
  },

  async getById (id: number): Promise<Folder | null> {
    const result = await client.query(
      'SELECT * FROM drive__folder WHERE id = $1',
      [id]
    )
    return result.rows[0] || null
  },

  async getChildren (parentId: number | null = null): Promise<Folder[]> {
    const query =
      parentId === null
        ? 'SELECT * FROM drive__folder WHERE parent_id IS NULL ORDER BY name'
        : 'SELECT * FROM drive__folder WHERE parent_id = $1 ORDER BY name'

    const params = parentId === null ? [] : [parentId]
    const result = await client.query(query, params)
    return result.rows
  },
  async getByPath (path: string): Promise<Folder | null> {
    const pathParts = path.split('/').filter(p => p !== '')

    let currentId: number | null = null

    for (const part of pathParts) {
      const result = await client.query(
        'SELECT * FROM drive__folder WHERE name = $1 AND parent_id IS NOT DISTINCT FROM $2',
        [part, currentId]
      )

      if (result.rows.length === 0) {
        return null
      }

      currentId = result.rows[0].id
    }

    return currentId ? this.getById(currentId) : null
  },
  async getByIdWithPath(id: number): Promise<Folder | null> {
        const result = await client.query(`
            WITH RECURSIVE folder_path AS (
                SELECT id, name, parent_id, name AS path
                FROM drive__folder
                WHERE id = $1
                
                UNION ALL
                
                SELECT f.id, f.name, f.parent_id, 
                       CONCAT(fp.path, '/', f.name) AS path
                FROM drive__folder f
                JOIN folder_path fp ON f.parent_id = fp.id
            )
            SELECT * FROM folder_path WHERE id = $1
        `, [id]);
        return result.rows[0] || null;
    }
}

export default FolderModel
