import { Folder, File } from '../types/types'
import FolderModel from '../models/folder.model'
import FileModel from '../models/file.model'

export async function buildFolderTree (
  parentId: number | null = null
): Promise<any> {
  // Get folders
  const folders = await FolderModel.getChildren(parentId)

  // Process each folder recursively
  const folderPromises = folders.map(async folder => {
    const children = await buildFolderTree(folder.id)
    return {
      id: folder.id,
      name: folder.name,
      type: 'folder',
      path: `/${folder.name}`,
      children
    }
  })

  // Get files
  const files = await FileModel.getByFolder(parentId)
  const fileItems = files.map(file => ({
   
    name: file.name,
    type:
      file.mime_type.split('/')[0] === 'image'
        ? 'image'
        : file.mime_type.split('/')[0] === 'video'
        ? 'video'
        : file.name.split('.').pop() || 'file',
    path: `/${file.name}`,
    id: file.id.toString()
  }))

  const folderResults = await Promise.all(folderPromises)
  return [...folderResults, ...fileItems]
}
