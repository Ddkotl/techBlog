<template>
  <div class="mb-2 pt-2 inline-block text-sm text-gray-800 sm:text-base">Загрузите изображение</div>
  <div class="pt-2 m-auto w-1/3">
    <div ref="dropzone" class=" rounded-md cursor-pointer p-5 bg-violet-500 hover:bg-violet-800 text-center text-slate-200 ">
      drop
    </div>
  </div>
</template>

<script>
import Dropzone from 'dropzone'
export default {
    name: 'Dropzone',

    data() {
        return {
            dropzone: null
        };
    },
    mounted() {
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url: 'fdg',
            method: 'post',
            autoProcessQueue:false,
            uploadMultiple: false,
            maxFilesize: 2000,
        });
    },
}
</script>