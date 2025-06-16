import { Elysia } from 'elysia'
import setupDatabase from './db/schema'
import FolderService from './services/folder.service'
import FileService from './services/file.service'
import { buildFolderTree } from './utils/treeBuilder'
import FolderModel from './models/folder.model'
import FileModel from './models/file.model'
import { cors } from '@elysiajs/cors'
await setupDatabase()

const app = new Elysia()
  .use(cors({
    origin: true, 
    methods: ['GET', 'POST', 'PUT', 'DELETE'],
    allowedHeaders: ['Content-Type'], 
    credentials: true 
  }))
  .group('/folders', app =>
    app
      .post('/', async ({ body }) => {
        const { name, parentId } = body as { name: string; parentId?: number }
        return await FolderService.createFolder(name, parentId || null)
      })
      .put('/:id/rename', async ({ params, body }) => {
        const { id } = params
        const { newName } = body as { newName: string }
        return await FolderService.renameFolder(Number(id), newName)
      })
      .delete('/:id', async ({ params }) => {
        const { id } = params
        await FolderService.deleteFolder(Number(id))
        return { message: 'Folder deleted successfully' }
      })
      .get('/', async ({ query }) => {
        const parentId =
          query.parentId === 'null' || query.parentId === undefined
            ? null
            : Number(query.parentId)
        return await FolderService.listFolders(parentId)
      })
  )
  // File endpoints
  .group('/files', app =>
    app
      .post('/', async ({ body }) => {
        const { name, folderId, size, mimeType, url } = body as {
          name: string
          folderId?: number
          size: number
          mimeType: string
          url: string
        }
        return await FileService.createFile(
          name,
          folderId || null,
          size,
          mimeType,
          url
        )
      })
      .put('/:id/rename', async ({ params, body }) => {
        const { id } = params
        const { newName } = body as { newName: string }
        return await FileService.renameFile(Number(id), newName)
      })
      .delete('/:id', async ({ params }) => {
        const { id } = params
        await FileService.deleteFile(Number(id))
        return { message: 'File deleted successfully' }
      })
      .get('/', async ({ query }) => {
        const folderId = query.folderId ? Number(query.folderId) : null
        return await FileService.listFiles(folderId)
      })
  )
  .get('/structure', async () => {
    const rootStructure = {
      name: 'Root',
      type: 'folder',
      path: '/',
      children: await buildFolderTree(null)
    }

    return rootStructure
  })
  .get('/structure/:path(*)', async ({ params }) => {
    const pathParts = params.path.split('/').filter(p => p !== '')

    let currentId: number | null = null
    let currentPath = '/'

    // Traverse the path to find the target folder
    for (const part of pathParts) {
      const folders = await FolderModel.getChildren(currentId)
      const folder = folders.find(f => f.name === part)

      if (!folder) {
        throw new Error('Path not found')
      }

      currentId = folder.id
      currentPath += `${part}/`
    }

    const children = await buildFolderTree(currentId)

    return {
      name: pathParts[pathParts.length - 1] || 'Root',
      type: 'folder',
      path: currentPath,
      children
    }
  })
  .listen(3000)

console.log(
  `🦊 Elysia is running at ${app.server?.hostname}:${app.server?.port}`
)
