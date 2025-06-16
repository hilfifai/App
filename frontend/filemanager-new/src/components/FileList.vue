<template>
  <ul>
    <li 
      v-for="item in filteredItems" 
      :key="item.path"
      :data-file-icon="item.type"
      :data-path="item.path"
      :class="{ 
        'select': selectedItems.includes(item.path),
        'has-files-of-folder': item.type === 'folder' && item.children && item.children.length,
        'empty-folder': item.type === 'folder' && (!item.children || !item.children.length)
      }"
      @click="selectItem(item, $event)"
      @dblclick="navigate(item)"
      @contextmenu.prevent="$emit('contextmenu', { item, event: $event })">
      <b>
        <i :class="getIconClass(item.type)"></i> {{ item.name }}
      </b>
      <ul v-if="item.type === 'folder' && item.children && item.children.length" class="active-folder-wrapper">
        <FileList 
          :items="item.children" 
          :currentPath="currentPath"
          @navigate="$emit('navigate', $event)"
          @select="$emit('select', $event)"
          @rename="$emit('rename', $event)"
          @delete="$emit('delete', $event)"
        />
      </ul>
      <ul v-else-if="item.type === 'folder'" class="no-item-inside-folder">
        <span>This folder has no items.</span>
      </ul>
    </li>
  </ul>
</template>

<script>
import { computed, ref } from 'vue'

export default {
  name: 'FileList',
  props: {
    items: {
      type: Array,
      default: () => []
    },
    currentPath: {
      type: String,
      required: true
    }
  },
  emits: ['navigate', 'select', 'rename', 'delete', 'contextmenu'],
  setup(props, { emit }) {
    const selectedItems = ref([])

    const filteredItems = computed(() => {
      return props.items
    })

    const getIconClass = (type) => {
      switch(type) {
        case 'folder': return 'fas fa-folder'
        case 'image': return 'far fa-images'
        case 'video': return 'fas fa-video'
        case 'html': 
        case 'css': 
        case 'js': 
        case 'php': return 'fas fa-file'
        default: return 'fas fa-file'
      }
    }

    const navigate = (item) => {
      if (item.type === 'folder') {
        emit('navigate', item.path)
      }
    }

    const selectItem = (item, event) => {
      if (event.ctrlKey) {
        const index = selectedItems.value.indexOf(item.path)
        if (index === -1) {
          selectedItems.value.push(item.path)
        } else {
          selectedItems.value.splice(index, 1)
        }
      } else {
        selectedItems.value = [item.path]
      }
      emit('select', item)
    }

    return {
      selectedItems,
      filteredItems,
      getIconClass,
      navigate,
      selectItem
    }
  }
}
</script>

<style scoped>
ul {
  list-style: none;
  padding: 0;
}

li {
  padding: 5px;
  cursor: pointer;
}

li b {
  display: flex;
  align-items: center;
}

li i {
  margin-right: 5px;
}

.select {
  background-color: #e0f0ff;
  outline: 1px solid #4a90e2;
}

.has-files-of-folder {
  position: relative;
}

.no-item-inside-folder {
  padding: 10px;
  color: #999;
  font-style: italic;
}

.active-folder-wrapper {
  display: block;
  margin-left: 15px;
}
</style>