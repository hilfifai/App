import FolderModel from '../models/folder.model'

const FolderService = {
  async createFolder (name: string, parentId: number | null) {
    return await FolderModel.create(name, parentId)
  },

  async renameFolder (id: number, newName: string) {
    const folder = await FolderModel.getById(id)
    if (!folder) {
      throw new Error('Folder not found')
    }
    return await FolderModel.rename(id, newName)
  },

  async deleteFolder (id: number) {
    // Check if folder has children
    const children = await FolderModel.getChildren(id)
    if (children.length > 0) {
      throw new Error('Cannot delete folder with subfolders')
    }

    await FolderModel.delete(id)
  },

  async listFolders (parentId: number | null = null) {
    return await FolderModel.getChildren(parentId)
  }
}

export default FolderService
