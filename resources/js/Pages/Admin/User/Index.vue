<script setup>
import {
  BUTTON_TYPE_PRIMARY,
  BUTTON_TYPE_WARNING,
  BUTTON_TYPE_DANGER,
} from "@/constants";
import { ICON_EYE, ICON_TRASH, ICON_ARROW_PATH, ICON_PLUS } from "@/icons";
import BaseButton from "@/Components/BaseButton.vue";
import BaseIcon from "@/Components/BaseIcon.vue";
import Pagination from "@/Components/Pagination.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import "dayjs/locale/ru";
dayjs.locale("ru");
dayjs.extend(relativeTime);

defineProps({
  users: {
    type: Object,
    required: true,
  },
});
const form = useForm({
});
</script>

<template>
  <Head title="Категории" />

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Пользователи
      </h2>
    </template>

    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="justify-center flex p-6 mx text-gray-900">
            <Link :href="route('admin_user_create')">
            <BaseButton>
              <div class="flex gap-2">
                <p>Добавить пользователя</p>
                <BaseIcon :name="ICON_PLUS" />
              </div>
            </BaseButton>
            </Link>
          </div>
          <div class="px-6 pb-10 text-gray-900">
            <div class="rounded relative overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                  <tr>
                    <th scope="col" class="px-2 py-3">
                      Имя
                    </th>
                    <th scope="col" class="px-2 py-3">
                      email
                    </th>
                    <th scope="col" class="px-2 py-3">
                      Создано
                    </th>
                    <th scope="col" class="px-2 py-3">
                      Изменено
                    </th>
                    <th scope="col" class="px-2 py-3">
                      Просмотр
                    </th>
                    <th scope="col" class="px-2 py-3">
                      Изменить
                    </th>
                    <th scope="col" class="px-2 py-3">
                      Удалить
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in users.data" :key="user.id" class="bg-white border-b">
                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap">
                      {{ user.name }}
                    </th>
                    <td class="px-2 py-1">{{ user.email }}</td>
                    <td class="px-2 py-1">
                      {{
                        dayjs(
                          user.created_at
                        ).fromNow()
                      }}
                    </td>
                    <td class="px-2 py-1">
                      {{
                        dayjs(
                          user.updated_at
                        ).fromNow()
                      }}
                    </td>
                    <td class="px-2 py-1">
                      <Link :href="route(
                            'admin_user_show',
                            user.id
                          )
                          ">
                      <BaseButton :name="BUTTON_TYPE_PRIMARY">
                        <div class="flex gap-2">
                          <BaseIcon :name="ICON_EYE" />
                        </div>
                      </BaseButton>
                      </Link>
                    </td>
                    <td class="px-2 py-1">
                      <Link :href="route(
                        'admin_user_edit',
                        user.id
                      )
                        ">
                      <BaseButton :name="BUTTON_TYPE_WARNING">
                        <div class="flex gap-2">
                          <BaseIcon :name="ICON_ARROW_PATH
                            " />
                        </div>
                      </BaseButton>
                      </Link>
                    </td>
                    <td class="px-2 py-1">
                      <form @submit.prevent="
                        form.delete(
                          route(
                            'admin_user_delete',
                            user.id
                          )
                        )
                        ">
                        <BaseButton :name="BUTTON_TYPE_DANGER">
                          <div class="flex gap-2">
                            <BaseIcon :name="ICON_TRASH" />
                          </div>
                        </BaseButton>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :data="users" />
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
