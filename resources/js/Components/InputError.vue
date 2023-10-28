<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div class="rounded border border-red-800 bg-red-200" v-show="message">
        <p class="p-2 text-sm text-red-800">
            {{ message }}
        </p>
    </div>
</template>
