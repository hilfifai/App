<template>
  <div class="file-manager-container">
    <!-- Left Panel -->
    <div class="left-panel">
      <div class="panel-header">
        <h3>Folders</h3>
        <button @click="createNewFolder" class="icon-btn" title="New Folder">
          <i class="fas fa-folder-plus"></i>
        </button>
      </div>
      <div class="folder-tree">
        <FolderTree 
          :folder="fileSystemData" 
          :currentPath="currentPath"
          @navigate="navigateToFolder"
        />
      </div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <div class="cm-address-bar-search">
        <div class="address-search">
          <div class="pos">
            <input 
              type="text" 
              class="address-search-input" 
              v-model="currentPath" 
              @keyup.enter="navigateByPath"
            >
            <div class="cm-button address-button" @click="navigateByPath">
              <i class="fas fa-arrow-right"></i>
            </div>
            <div class="address-short-btn">
              <div v-for="(part, index) in breadcrumbs" :key="index" @click="navigateToBreadcrumb(index)">
                <span>{{ part }}</span>
                <i class="fas fa-caret-right" v-if="index < breadcrumbs.length - 1"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="search-file-and-folder">
          <div class="pos">
            <input 
              placeholder="Search.." 
              type="text" 
              class="files-search-input"
              v-model="searchQuery"
              @input="searchFiles"
            >
            <div class="cm-button file-search-button">
              <i class="fas fa-search"></i>
            </div>
          </div>
           
        </div>
      </div>
      <div class="toolbar">
            <button 
              @click="handleRename" 
              :disabled="!selectedItem"
              class="tool-button"
            >
              <i class="fas fa-pen"></i> Rename
            </button>
            
            <button 
              @click="handleDelete" 
              :disabled="!selectedItem"
              class="tool-button danger"
            >
              <i class="fas fa-trash"></i> Delete
            </button>
            
            <button 
              @click="createNewFolder" 
              class="tool-button primary"
            >
              <i class="fas fa-folder-plus"></i> New Folder
            </button>
            <button 
              @click="createNewFile" 
              class="tool-button primary"
            >
              <i class="fas fa-file-plus"></i> New File
            </button>
        </div>
      <div class="theme-structure big-file-manager" 
           @click.self="clearSelection">
        <FileList 
          :items="currentFolderItems" 
          :currentPath="currentPath"
          @navigate="navigateToFolder"
          @select="selectItem"
          @rename="showRenameModal"
          @delete="deleteItem"
        />
      </div>
    </div>

    <!-- Rename Modal -->
    <div class="rename-modal" v-if="showModal">
      <div class="rename-modal-content">
        <div class="rename-modal-header">
          <h3>Rename Item</h3>
          <span class="close-modal" @click="closeModal">&times;</span>
        </div>
        <div class="rename-modal-body">
          <p>Current name: <strong>{{ selectedItem.name }}</strong></p>
          <input 
            type="text" 
            v-model="newItemName" 
            class="rename-input" 
            placeholder="Enter new name" 
            @keyup.enter="confirmRename" 
            @keyup.esc="closeModal"
            ref="renameInput"
          >
          <div class="error-message">{{ errorMessage }}</div>
        </div>
        <div class="rename-modal-footer">
          <button class="cancel-btn" @click="closeModal">Cancel</button>
          <button class="confirm-btn" @click="confirmRename">Rename</button>
        </div>
      </div>
    </div>

    <!-- Notification -->
    <div class="notification" v-if="notification.show" @click="notification.show = false">
      {{ notification.message }}
    </div>
    <div 
    class="file-manager"
    @contextmenu.prevent="showContextMenu"
    @click="hideContextMenu"
  >
    <!-- Konten file manager -->
    <ContextMenu
      v-if="contextMenu.visible"
      :visible="contextMenu.visible"
      :position="contextMenu.position"
      @action="handleMenuAction"
      @close="hideContextMenu"
    />
  </div>
    
  </div>
</template>

<script>
import { ref, computed, onMounted, onBeforeUnmount, nextTick } from 'vue'
import FolderTree from './FolderTree.vue'
import FileList from './FileList.vue'
import axios from 'axios'
import ContextMenu from './ContextMenu.vue'

export default {
  components: {
    FolderTree,
    FileList,
    ContextMenu
  },
  setup() {
     const contextMenu = ref({
      visible: false,
      position: { x: 0, y: 0 },
      targetType: 'empty',
      targetIsFile: false
    })

    
    const fileSystemData = ref({
      name: "Root",
      type: "folder",
      path: "/",
      children: []
    })

    const currentPath = ref('/')
    const selectedItem = ref(null)
    const showModal = ref(false)
    const newItemName = ref('')
    const errorMessage = ref('')
    const searchQuery = ref('')
    const notification = ref({
      show: false,
      message: ''
    })
    const clipboard = ref(null)
    const clipboardAction = ref(null)
    const renameInput = ref(null)

    const breadcrumbs = computed(() => {
      return currentPath.value.split('/').filter(p => p !== '')
    })

    const currentFolderItems = computed(() => {
      const folder = findItemByPath(currentPath.value)
      return folder ? folder.children : []
    })

    const fetchFileStructure = async () => {
      try {
        const response = await axios.get('http://localhost:3000/structure')
        fileSystemData.value = response.data
      } catch (error) {
        console.error('Error fetching file structure:', error)
        showNotification('Failed to load file structure')
      }
    }

    const navigateToFolder = (path) => {
      currentPath.value = path
      clearSelection()
    }

    const navigateByPath = () => {
      const path = currentPath.value
      if (findItemByPath(path)) {
        currentPath.value = path
        clearSelection()
      } else {
        showNotification('Path not found')
      }
    }

    const navigateToBreadcrumb = (index) => {
      const path = '/' + breadcrumbs.value.slice(0, index + 1).join('/')
      currentPath.value = path
      clearSelection()
    }

    const findItemByPath = (path) => {
      const parts = path.split('/').filter(p => p !== '')
      let currentItem = fileSystemData.value
      
      for (const part of parts) {
        const found = currentItem.children?.find(child => child.name === part)
        if (!found) return null
        currentItem = found
      }
      
      return currentItem
    }

    const selectItem = (item) => {
      selectedItem.value = item
    }

    const clearSelection = () => {
      selectedItem.value = null
    }

    const showRenameModal = (item) => {
      if (!item) item = selectedItem.value
      if (!item) return
      
      selectedItem.value = item
      newItemName.value = item.name
      errorMessage.value = ''
      showModal.value = true
      
      nextTick(() => {
        renameInput.value.focus()
        renameInput.value.select()
      })
    }

    const closeModal = () => {
      showModal.value = false
    }

    const confirmRename = async () => {
      if (!selectedItem.value) return
      
      const newName = newItemName.value.trim()
      if (!newName) {
        errorMessage.value = 'Name cannot be empty'
        return
      }
      
      if (newName === selectedItem.value.name) {
        closeModal()
        return
      }
      
      try {
        let endpoint, payload
        
        if (selectedItem.value.type === 'folder') {
          endpoint = `http://localhost:3000/folders/${selectedItem.value.id}/rename`
          payload = {
            oldPath: selectedItem.value.path,
            newName: newName
          }
        } else {
          endpoint = `http://localhost:3000/files/${selectedItem.value.id}/rename`
          payload = {
            filePath: selectedItem.value.path,
            newName: newName
          }
        }
        
        const response = await axios.put(endpoint, payload)
        
      if (response.data?.id && response.data?.name) {
          const parentPath = selectedItem.value.path.split('/').slice(0, -1).join('/') || '/'
          const parent = findItemByPath(parentPath)
          
          if (parent) {
            const itemIndex = parent.children.findIndex(child => child.path === selectedItem.value.path)
            if (itemIndex !== -1) {
              const oldPath = parent.children[itemIndex].path
              parent.children[itemIndex].name = newName
              parent.children[itemIndex].path = `${parentPath}/${newName}`
              
              if (parent.children[itemIndex].children) {
                updateChildrenPaths(parent.children[itemIndex], oldPath, parent.children[itemIndex].path)
              }
            }
          }
            await fetchFileStructure();
          showNotification(`"${selectedItem.value.name}" renamed to "${newName}"`)
          closeModal()
        } else {
          errorMessage.value = response.data.message || 'Failed to rename item'
        }
      } catch (error) {
        console.error('Error renaming item:', error)
        errorMessage.value = error.response?.data?.message || 'Failed to rename item'
      }
    }

    const updateChildrenPaths = (item, oldPath, newPath) => {
      item.children.forEach(child => {
        child.path = child.path.replace(oldPath, newPath)
        if (child.children) {
          updateChildrenPaths(child, oldPath, newPath)
        }
      })
    }

    const deleteItem = async (item) => {
      if (!item) item = selectedItem.value
      if (!item) return
      
      if (!confirm(`Are you sure you want to delete "${item.name}"?`)) {
        return
      }
      
      try {
       
        let endpoint, payload
        
        if (item.type === 'folder') {
          endpoint = `http://localhost:3000/folders/${item.id}`
          payload = { folderPath: item.path }
        } else {
          endpoint = `http://localhost:3000/files/${item.id}`
          payload = { filePath: item.path }
        }
        
        const response = await axios.delete(endpoint, payload)
        
        if (response.data.success) {
          const parentPath = item.path.split('/').slice(0, -1).join('/') || '/'
          const parent = findItemByPath(parentPath)
          
          if (parent) {
            parent.children = parent.children.filter(child => child.path !== item.path)
          }
          await fetchFileStructure();
          showNotification(`"${item.name}" deleted`)
          clearSelection()
        } else {
          await fetchFileStructure();
          showNotification(response.data.message || 'Failed to delete item')
        }
      } catch (error) {
        console.error('Error deleting item:', error)
        showNotification(error.response?.data?.message || 'Failed to delete item')
      }
    }

    const createNewFolder = async () => {
        try{
        const parent = await axios.get(`http://localhost:3000/structure${currentPath.value}`);
    
        const parentId = parent.data.id || null;
        let folderName = 'New Folder';
        let counter = 1;
        
        const existingFolders = parent.data.children?.filter(child => child.type === 'folder') || [];
        while (existingFolders.some(child => child.name === folderName)) {
        folderName = `New Folder (${counter++})`;
        }
        
       
        const response = await axios.post('http://localhost:3000/folders', {
          name: folderName,
          parentId: parentId
        });
        
        
        if (response.data && response.data.id) {
        if (!parent.data.children) parent.data.children = [];
        
        parent.data.children.push({
            id: response.data.id,
            name: folderName,
            type: 'folder',
            path: `${currentPath.value}/${folderName}`.replace('//', '/'),
            children: []
        });
        
        showNotification(`Folder "${folderName}" created`);
        await fetchFileStructure()
        return response.data; // Return folder yang baru dibuat
        }
    } catch (error) {
        console.error('Error creating folder:', error);
        showNotification(error.response?.data?.message || 'Failed to create folder');
        throw error;
    }
    }

    const createNewFile = async (type) => {
      try {
        const parent = findItemByPath(currentPath.value)
        console.log(parent);
        if (!parent) return
        
        let fileName = `New File.txt`
        let counter = 1
        
        while (parent.children?.some(child => child.name === fileName)) {
          fileName = `New File (${counter++}).txt`
        }
        
        const response = await axios.post('http://localhost:3000/files', {
          parentPath: currentPath.value,
          folderId: parent.id,
          name: fileName,
          fileType: type,
          "mimeType": "text/plain",
          "url": "/uploads/example.txt"
        })
        
        if (response.data && response.data.id) {
          if (!parent.children) parent.children = []
          
          parent.children.push({
            name: fileName,
            type: type,
            path: `${currentPath.value}/${fileName}`,
            id: response.data.fileId || Date.now().toString()
          })
           await fetchFileStructure()
          showNotification(`File "${fileName}" created`)
        } else {
          showNotification(response.data.message || 'Failed to create file');
           await fetchFileStructure()
        }
      } catch (error) {
        console.error('Error creating file:', error)
        showNotification(error.response?.data?.message || 'Failed to create file')
      }
    }

    const searchFiles = () => {
      // Implement search functionality
    }

    const showNotification = (message) => {
      notification.value.message = message
      notification.value.show = true
      setTimeout(() => {
        notification.value.show = false
      }, 3000)
    }

    const handleKeyDown = (event) => {
      if (event.keyCode === 46) { // Delete
        deleteItem()
      } else if (event.keyCode === 113) { // F2
        event.preventDefault()
        showRenameModal()
      } else if (event.ctrlKey && event.keyCode === 67) { // Ctrl+C
        clipboard.value = selectedItem.value
        clipboardAction.value = 'copy'
      } else if (event.ctrlKey && event.keyCode === 86) { // Ctrl+V
        pasteItem()
      } else if (event.ctrlKey && event.keyCode === 88) { // Ctrl+X
        clipboard.value = selectedItem.value
        clipboardAction.value = 'cut'
      }
    }

    const pasteItem = async () => {
      if (!clipboard.value || !clipboardAction.value) return
      
      try {
        const targetPath = currentPath.value
        
        if (clipboardAction.value === 'copy') {
          if (clipboard.value.type === 'folder') {
            await axios.post('http://localhost:3000/folders/copy', {
              sourcePath: clipboard.value.path,
              targetPath: targetPath
            })
          } else {
            await axios.post('http://localhost:3000/file/copy', {
              sourcePath: clipboard.value.path,
              targetPath: targetPath
            })
          }
        } else { // cut (move)
          if (clipboard.value.type === 'folder') {
            await axios.post('http://localhost:3000/folders/move', {
              sourcePath: clipboard.value.path,
              targetPath: targetPath
            })
          } else {
            await axios.post('http://localhost:3000/file/move', {
              sourcePath: clipboard.value.path,
              targetPath: targetPath
            })
          }
        }
        
        await fetchFileStructure()
        showNotification(`Item ${clipboardAction.value === 'copy' ? 'copied' : 'moved'} successfully`)
        
        if (clipboardAction.value === 'cut') {
          clipboard.value = null
          clipboardAction.value = null
        }
      } catch (error) {
        console.error('Error performing paste operation:', error)
        showNotification(error.response?.data?.message || 'Failed to perform operation')
      }
    }
        
    

    const hideContextMenu = () => {
      contextMenu.value.visible = false;
    };

    const handleMenuAction = (action) => {
      switch(action) {
        case 'rename':
          // Handle rename
          break;
        case 'delete':
          // Handle delete
          break;
        case 'new-folder':
          // Handle new folder
          break;
      }
      hideContextMenu();
    };

    const showContextMenu = (event) => {
      // Jika mengklik kanan pada item yang dipilih
      const isItem = selectedItem.value !== null
      
      contextMenu.value = {
        visible: true,
        position: { x: event.pageX, y: event.pageY },
        targetType: isItem ? 'item' : 'empty',
        targetIsFile: isItem ? selectedItem.value.type !== 'folder' : false
      }
    }
    const handleRename = () => {
      if (selectedItem.value) {
        showRenameModal(selectedItem.value)
      }
    }

    const handleDelete = () => {
      if (selectedItem.value) {
        deleteItem(selectedItem.value)
      }
    }

    onMounted(() => {
      fetchFileStructure()
      window.addEventListener('keydown', handleKeyDown)
    })

    onBeforeUnmount(() => {
      window.removeEventListener('keydown', handleKeyDown)
    })

    return {
      fileSystemData,
      currentPath,
      selectedItem,
      showModal,
      newItemName,
      errorMessage,
      searchQuery,
      notification,
      breadcrumbs,
      currentFolderItems,
      renameInput,
      navigateToFolder,
      navigateByPath,
      navigateToBreadcrumb,
      selectItem,
      clearSelection,
      showRenameModal,
      closeModal,
      confirmRename,
      deleteItem,
      createNewFolder,
      createNewFile,
      searchFiles,
      showNotification,
       contextMenu,
      showContextMenu,
      handleRename,
      handleDelete
    }
  }
}
</script>

<style scoped>
/* CSS styles tetap sama seperti sebelumnya */
.file-manager-container {
  display: flex;
  height: 100vh;
}

.left-panel {
  width: 250px;
  border-right: 1px solid #ddd;
  overflow-y: auto;
  padding: 10px;
}

.right-panel {
  flex: 1;
  display: flex;
  flex-direction: column;
  background-color: #fff;
}

/* ... (seluruh CSS sebelumnya tetap sama) ... */
</style>