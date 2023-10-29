<script setup>
import { Link } from "@inertiajs/vue3";

</script>

<script>
export default {
  props: {
    data: Object,
  },
  computed: {
    filteredLinks() {
      // Фильтруем массив links и оставляем только те элементы, у которых label не равен "Next »" или "« Previous"
      return this.data.links.filter(
        (link) => link.label !== "Next &raquo;" && link.label !== "&laquo; Previous"
      );
    },
  },
};
</script>
<template>
    <div
        v-if="data.links.length > 3"
        class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
    >
        <div class="flex flex-1 justify-between sm:hidden">
            <Link
                :disabled="data.prev_page_url"
                :href="
                    data.prev_page_url ? data.prev_page_url : '#'
                "
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Предыдущая</Link
            >
            <Link
                :disabled="data.next_page_url === null"
                :href="
                    data.next_page_url ? data.next_page_url : '#'
                "
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Следующая</Link
            >
        </div>
        <div
            class="hidden sm:flex gap-2 sm:flex-1 sm:items-center sm:justify-between"
        >
            <div>
                <p class="text-sm text-gray-700">
                    Показано c
                    <span class="font-medium">{{ data.from }}</span>
                    по
                    <span class="font-medium">{{ data.to }}</span>
                    из
                    <span class="font-medium">{{ data.total }}</span>
                   
                </p>
            </div>
            <div>
                <nav
                    class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                    aria-label="Pagination"
                >
                    <Link
                        :disabled="data.prev_page_url === null"
                        :href="
                            data.prev_page_url
                                ? data.prev_page_url
                                : '#'
                        "
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    >
                        <span class="sr-only">Предыдущая</span>
                        <svg
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </Link>
                    <Link
                        v-for="(link, key) in filteredLinks"
                        :key="key"
                        :disabled="link.url === null"
                        :href="link.url ? link.url : '#'"
                        aria-current="page"
                        :class="{
                            'bg-indigo-600 text-white focus-visible:outline-indigo-600':
                                link.active,
                        }"
                        class="relative z-10 inline-flex items-center px-1 py-1 text-sm font-semibold text-black focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 border  justify-center"
                    >
                    {{ link.label }}
                    </Link>
                    <Link
                        :href="
                            data.next_page_url
                                ? data.next_page_url
                                : '#'
                        "
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    >
                        <span class="sr-only">Следующая</span>
                        <svg
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>
