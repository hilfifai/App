import FileModel from '../models/file.model'
import FolderModel from '../models/folder.model'

const FileService = {
  async createFile (
    name: string,
    folderId: number | null,
    size: number,
    mimeType: string,
    url: string
  ) {
    if (folderId !== null) {
      const folder = await FolderModel.getById(folderId)
      if (!folder) {
        throw new Error('Parent folder not found')
      }
    }

    return await FileModel.create(name, folderId, size, mimeType, url)
  },

  async renameFile (id: number, newName: string) {
    const file = await FileModel.getById(id)
    if (!file) {
      throw new Error('File not found')
    }
    return await FileModel.rename(id, newName)
  },

  async deleteFile (id: number) {
    await FileModel.delete(id)
  },

  async listFiles (folderId: number | null = null) {
    return await FileModel.getByFolder(folderId)
  }
}

export default FileService
