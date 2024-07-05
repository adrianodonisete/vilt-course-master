<template>
	<div>
		<div>Index</div>
		<br />

		<Link :href="route('page.hello')">Page Hello</Link>

		<div>The message is {{ message }}</div>
	</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
	message: {
		String,
		default: 'Message default',
	},
});
</script>
