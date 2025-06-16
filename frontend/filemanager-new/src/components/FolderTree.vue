<template>
  <div>
    <div 
      class="folder" 
      :class="{ 'select': folder.path === currentPath }"
      @click="navigate(folder.path)">
      <b>
        <i class="fas fa-folder"></i> {{ folder.name }}
      </b>
    </div>
    <div class="children" v-if="folder.children && folder.children.length">
      <FolderTree 
        v-for="child in folder.children.filter(c => c.type === 'folder')" 
        :key="child.path"
        :folder="child"
        :currentPath="currentPath"
        @navigate="$emit('navigate', $event)"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: 'FolderTree',
  props: {
    folder: {
      type: Object,
      required: true
    },
    currentPath: {
      type: String,
      required: true
    }
  },
  emits: ['navigate'],
  setup(props, { emit }) {
    const navigate = (path) => {
      emit('navigate', path)
    }

    return {
      navigate
    }
  }
}
</script>

<style scoped>
.folder {
  padding: 5px;
  cursor: pointer;
}

.folder:hover {
  background: #f0f0f0;
}

.children {
  margin-left: 15px;
}

.select {
  background-color: #e0f0ff;
  outline: 1px solid #4a90e2;
}
</style>