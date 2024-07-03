<template>
	<box>
		<div>
			<Link :href="route('listing.show', { listing: listing.id })">
				<div class="flex items-center gap-1">
					<price
						:price="listing.price"
						class="text-2xl font-bold" />
					<div class="text-xs text-gray-500"><price :price="monthlyPayment" /> pm</div>
				</div>

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
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Box from '@/Components/UI/Box.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';

const props = defineProps({
	listing: {
		Object,
		default: {
			id: 0,
			beds: 0,
			baths: 0,
			area: 0,
			city: null,
			code: null,
			street: null,
			street_nr: null,
			price: 0,
		},
	},
});

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>
