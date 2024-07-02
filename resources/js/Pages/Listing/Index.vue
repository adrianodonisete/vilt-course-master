<template>
	<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
		<box
			v-for="listing in listings"
			:key="listing.id">
			<div>
				<Link :href="route('listing.show', { listing: listing.id })">
					<price
						:price="listing.price"
						class="text-2xl font-bold" />
					<listing-space
						:listing="listing"
						class="text-lg" />
					<listing-address
						:listing="listing"
						class="text-gray-500" />
				</Link>
			</div>
			<div>
				<Link :href="route('listing.edit', { listing: listing.id })">Edit</Link>
			</div>
			<div>
				<Link
					:href="route('listing.destroy', { listing: listing.id })"
					method="delete"
					as="button">
					Delete
				</Link>
			</div>
		</box>
	</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Box from '@/Components/UI/Box.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue';

defineProps({
	listings: {
		Array,
		default: [],
	},
});
</script>
