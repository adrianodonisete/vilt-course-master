<template>
	<div>
		<div>Show</div>
		<br />
		<Link :href="route('page.index')">Main Page</Link>
	</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
