<template>
	<div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
		<box class="md:col-span-7 flex items-center w-full">
			<div class="w-full text-center font-medium text-gray-500">No images</div>
		</box>
		<div class="md:col-span-5 flex flex-col gap-4">
			<box>
				<template #header> Basic info </template>
				<price
					:price="listing.price"
					class="text-2xl font-bold" />
				<listing-space
					:listing="listing"
					class="text-lg" />
				<listing-address
					:listing="listing"
					class="text-gray-500" />
			</box>
			<box>
				<template #header> Offer </template>
				Make an offer
			</box>
		</div>
	</div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue';

defineProps({
	listing: Object,
});
</script>
