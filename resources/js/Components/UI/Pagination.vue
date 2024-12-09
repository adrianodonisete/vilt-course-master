<template>
	<div class="flex gap-1">
		<Link
			v-for="(link, index) in links"
			:key="index"
			:href="link.url"
			class="py-2 px4 rounded-md"
			:class="{ 'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active }">
			{{ link.label }}
		</Link>
	</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

Link;
defineProps({
	links: {
		Array,
		default: [],
	},
});
</script>
