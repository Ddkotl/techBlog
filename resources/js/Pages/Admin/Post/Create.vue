<script>
import Dropzone from 'dropzone'
export default {
  data() {
    return {
      dropzone: null
    };
  },
  mounted() {
    this.dropzone = new Dropzone(this.$refs.dropzone, {
      url: 'fdg',
      method: 'post',
      autoProcessQueue: false,
    });
  },
  methods:{
    store(){
      this.dropzone.getAcceptedFiles()
    }
  }
}
</script>
<script setup>
import { BUTTON_TYPE_WARNING, BUTTON_TYPE_SUCCESS } from "@/constants";
import { ICON_PLUS, ICON_XMARK } from "@/icons";
import BaseButton from "@/Components/BaseButton.vue";
import InputError from "@/Components/InputError.vue";
import BaseIcon from "@/Components/BaseIcon.vue";
// import Dropzone from "@/Components/Dropzone.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
// import TinyEditor from "@/Components/TinyEditor.vue";
import Editor from '@tinymce/tinymce-vue'

defineProps({
  categories: {
    required: true,
    type: Object
  },
  tags: {
    required: true,
    type: Object
  }
})

const form = useForm({
  title: "",
  content: "",
});
</script>

<template>
  <Head title="Создание поста" />

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Создание поста
      </h2>
    </template>

    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="justify-center flex p-6 mx text-gray-900">
            <div class="bg-white py-6 sm:py-8 lg:py-12">
              <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-6 md:mb-10">
                  <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                    Создание поста
                  </h2>

                  <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                    Вы можете создать новый пост
                    заполнив форму ниже
                  </p>
                </div>
                <!-- text - end -->

                <!-- form - start -->
                <form @submit.prevent="
                  form.post(
                    route('admin_post_store'),
                    {
                      onSuccess: () => form.reset(),
                    }
                  )
                  " class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                  <div class="sm:col-span-2">
                    <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Название</label>
                    <input v-model="form.title" type="text" name="title"
                      class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
                      placeholder="Введите название категории" />
                    <InputError :message="form.errors.title" class="mt-2" />
                  </div>
                  <div class="sm:col-span-2">
                    <label for="content" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Контент</label>
                    <div class="col-span-full">
                      <div class="mt-2">

                        <main id="sample">
                          <Editor v-model="form.content" id="content" name="content" placeholder="Редактируйте пост"
                            api-key="yf3mku75qoybk2xrqpz4mysjpprd4lfnmgmrlks722lskr8n" :init="{
                              toolbar_mode: 'sliding',
                              plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                              toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                            }" initial-value="" />
                        </main>
                        <InputError :message="form.errors.content" class="mt-2" />
                      </div>
                    </div>
                    <div class="col-span-full">
                      <div class="mt-2">
                        <!-- <Dropzone /> -->
                        <div class="mb-2 pt-2 inline-block text-sm text-gray-800 sm:text-base">Загрузите изображение</div>
                        <div class="pt-2 m-auto w-1/3">
                          <div ref="dropzone"
                            class=" rounded-md cursor-pointer p-5 bg-violet-500 hover:bg-violet-800 text-center text-slate-200 ">
                            drop
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Категория</label>
                      <div class="mt-2">
                        <select id="country" name="country" autocomplete="country-name"
                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                          <option>United States</option>
                          <option>Canada</option>
                          <option>Mexico</option>
                        </select>
                      </div>
                    </div>

                  </div>

                  <div class="flex gap-2 items-center justify-between sm:col-span-2">
                    <Link :href="route('admin_post_index')
                      ">
                    <BaseButton type="button" :name="BUTTON_TYPE_WARNING">
                      <div class="flex gap-2">
                        <p>Отмена</p>
                        <BaseIcon :name="ICON_XMARK" />
                      </div>
                    </BaseButton>
                    </Link>
                    <BaseButton type="submit" :name="BUTTON_TYPE_SUCCESS">
                      <div class="flex gap-2">
                        <p>Добавить</p>
                        <BaseIcon :name="ICON_PLUS" />
                      </div>
                    </BaseButton>
                  </div>
                </form>
                <!-- form - end -->
              </div>
            </div>
          </div>
          <div class="flex p-6 mx text-gray-900"></div>
        </div>
      </div>
    </div>
  </AdminLayout>
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