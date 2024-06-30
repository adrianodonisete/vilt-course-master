<template>
	<h3>Main Layout</h3>

	<Link href="/listing">Listings</Link> &nbsp;
	<Link href="/listing/create">Add New Listing</Link>

	<div v-if="flashSuccess" class="success">
		{{ flashSuccess }}
	</div>

	<br />
	<br />

	<!-- <div>The page with time {{ timer }}</div> -->

	<slot>
		<h3>Default</h3>
	</slot>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const flashSuccess = computed(() => {
	if (page.props.flash && page.props.flash.success) {
		return page.props.flash.success;
	}
	return null;
});

//
// const timer = ref(0);
// setInterval(() => timer.value++, 1000);
</script>

<style scoped>
.success {
	background-color: green;
	color: white;
}
</style>
