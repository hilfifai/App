<!-- ContextMenu.vue -->
<template>
  <div 
    v-if="visible"
    class="context-menu"
    :style="{ top: position.y + 'px', left: position.x + 'px' }"
    @click.stop
  >
    <div v-if="targetType === 'item'" class="menu-item" @click="emit('rename')">
      <i class="fas fa-pen"></i> Rename
    </div>
    <div v-if="targetType === 'item'" class="menu-item" @click="emit('delete')">
      <i class="fas fa-trash"></i> Delete
    </div>
    <div class="menu-item" @click="emit('new-folder')">
      <i class="fas fa-folder-plus"></i> New Folder
    </div>
    <div class="menu-item submenu-trigger">
      <i class="fas fa-file-plus"></i> New File
      <i class="fas fa-chevron-right"></i>
      <div class="submenu">
        <div @click="emit('new-file', 'txt')">Text File</div>
        <div @click="emit('new-file', 'html')">HTML File</div>
        <div @click="emit('new-file', 'css')">CSS File</div>
        <div @click="emit('new-file', 'js')">JS File</div>
        <div @click="emit('new-file', 'php')">PHP File</div>
      </div>
    </div>
  </div>
</template>

<script setup>
// Import the Composition API functions explicitly
import { defineProps, defineEmits, onMounted, onBeforeUnmount,toRefs } from 'vue';



// Destructure props to avoid unused variable warning
const props = defineProps({
  visible: Boolean,
  position: Object
})

const { visible, position } = toRefs(props)
const emit = defineEmits([
  'rename',
  'delete',
  'new-folder',
  'new-file',
  'close'
]);

// Close menu when clicking outside
const onClickOutside = () => {
  emit('close');
};

onMounted(() => {
  document.addEventListener('click', onClickOutside);
});

onBeforeUnmount(() => {
  document.removeEventListener('click', onClickOutside);
});
</script>

<style scoped>
.context-menu {
  position: fixed;
  background: white;
  border: 1px solid #ddd;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  z-index: 1000;
  min-width: 200px;
  border-radius: 4px;
  overflow: hidden;
}

.menu-item {
  padding: 8px 15px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.menu-item:hover {
  background-color: #f0f0f0;
}

.menu-item i {
  margin-right: 8px;
  width: 20px;
  text-align: center;
}

.submenu-trigger {
  position: relative;
}

.submenu {
  display: none;
  position: absolute;
  left: 100%;
  top: 0;
  background: white;
  border: 1px solid #ddd;
  min-width: 150px;
  box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
}

.submenu-trigger:hover .submenu {
  display: block;
}
</style>
<style scoped>
.context-menu {
  position: fixed;
  background: white;
  border: 1px solid #ddd;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  z-index: 1000;
  min-width: 150px;
}
.context-menu div {
  padding: 8px 12px;
  cursor: pointer;
}
.context-menu div:hover {
  background: #f0f0f0;
}
</style>