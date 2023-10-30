<script setup>
import {
    BUTTON_TYPE_PRIMARY,
    BUTTON_TYPE_WARNING,
    BUTTON_TYPE_DANGER,
} from "@/constants";
import { ICON_TRASH, ICON_ARROW_PATH, ICON_XMARK } from "@/icons";
import BaseButton from "@/Components/BaseButton.vue";
import BaseIcon from "@/Components/BaseIcon.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import "dayjs/locale/ru";
dayjs.locale("ru");
dayjs.extend(relativeTime);

defineProps({
    post: {
        type: Object,
        required: true,
    },
});
const form = useForm({
});
</script>

<template>
    <Head title="Пост " />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Пост
            </h2>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="justify-center flex p-3 sm:p-6 mx text-gray-900">
                        <!-- Main modal -->
                        <div class="p-2 sm:p-4 w-full max-w-xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                    <div class="text-lg text-gray-900 md:text-xl">
                                        <h3 class="font-semibold">
                                            Название поста :
                                        </h3>
                                        <p class="font-bold">{{ post.title }}</p>
                                    </div>

                                </div>
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Контент
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5">
                                       {{ post.content }}
                                    </dd>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Категория: ?
                                    </dt>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Тэги: ?
                                    </dt>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Коментариев: ?
                                    </dt>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Лайков: ?
                                    </dt>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Создано: {{ dayjs(post.created_at).fromNow() }}
                                    </dt>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 ">
                                        Изменено: {{ dayjs(post.updated_at).fromNow() }}
                                    </dt>

                                </dl>
                                <div class="flex gap-2 sm:flex-row flex-col justify-between items-center">
                                    <div>
                                        <Link :href="route(
                                            'admin_post_index'
                                        )
                                            ">
                                        <BaseButton :name="BUTTON_TYPE_PRIMARY">
                                            <div class="flex gap-2 sm:w-28 w-40 justify-center">
                                                <p>Назад</p>
                                                <BaseIcon :name="ICON_XMARK" />
                                            </div>
                                        </BaseButton>
                                        </Link>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <Link :href="route(
                                            'admin_post_edit', post.id
                                        )
                                            ">
                                        <BaseButton :name="BUTTON_TYPE_WARNING">
                                            <div class="flex gap-2 sm:w-28 w-40 justify-center ">
                                                <p>Изменить</p>
                                                <BaseIcon :name="ICON_ARROW_PATH" />
                                            </div>
                                        </BaseButton>
                                        </Link>
                                        <form @submit.prevent="
                                            form.delete(
                                                route(
                                                    'admin_post_delete',
                                                    post.id
                                                ),
                                                {
                                                    onSuccess: () =>
                                                        form.reset(),
                                                }
                                            )
                                            ">
                                            <BaseButton :name="BUTTON_TYPE_DANGER">
                                                <div class="flex gap-2 sm:w-28 w-40 justify-center ">
                                                    <p>Удалить</p>
                                                    <BaseIcon :name="ICON_TRASH" />
                                                </div>
                                            </BaseButton>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
