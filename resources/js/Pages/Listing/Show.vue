<template>
	<div>
		<listing-address :listing="listing"></listing-address>
	</div>

	<br />
	<Link :href="route('listing.index')">Back listings</Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/Components/ListingAddress.vue';

defineProps({
	listing: Object,
});
</script>
