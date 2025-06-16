export interface Folder {
  id: number
  name: string
  parent_id: number | null
  path?: string
  created_at: Date
  updated_at: Date
}

export interface File {
  id: number
  name: string
  folder_id: number | null
  path?: string
  size: number
  mime_type: string
  url: string
  created_at: Date
  updated_at: Date
}

export interface CreateFolderRequest {
  name: string
  parentId?: number
}

export interface RenameRequest {
  newName: string
}

export interface CreateFileRequest {
  name: string
  folderId?: number
  size: number
  mimeType: string
  url: string
}
