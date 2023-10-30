<script setup>
import { BUTTON_TYPE_WARNING, BUTTON_TYPE_SUCCESS } from "@/constants";
import { ICON_PLUS, ICON_XMARK } from "@/icons";
import BaseButton from "@/Components/BaseButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import BaseIcon from "@/Components/BaseIcon.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

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
                    <TextInput v-model="form.content" type="text" name="content"
                      class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
                      placeholder="Введите название категории" />
                    <InputError :message="form.errors.content" class="mt-2" />
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
