<template>
	<h3>Default Layout</h3>

	<Link :href="route('listing.index')">Listings</Link> &nbsp;
	<Link :href="route('listing.create')">Add New Listing</Link>

	<div>The page with time {{ timer }}</div>

	<slot>
		<h3>Default html</h3>
	</slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const timer = ref(0);

setInterval(() => timer.value++, 1000);
</script>
