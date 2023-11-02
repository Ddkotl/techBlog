<script setup>
  import Editor from '@tinymce/tinymce-vue'

  defineProps({
    content:{
      required:true,
      type:String
    }
  })
</script>

<template>
  <main id="sample">
    <Editor
    v-model="content"
      placeholder="Редактируйте пост"
      api-key="yf3mku75qoybk2xrqpz4mysjpprd4lfnmgmrlks722lskr8n"
      :init="{
        toolbar_mode: 'sliding',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
      }"
      initial-value=""
    />
  </main>
</template>

<style scoped>
@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 100%;
  }
}
</style>