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
				<template #header> Monthy Payment </template>
				<div>
					<label>Interest rate ({{ interestRate }} %)</label>
					<input
						v-model.number="interestRate"
						type="range"
						min="0.1"
						max="30"
						step="0.1"
						class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />

					<label>Duration ({{ duration }} years)</label>
					<input
						v-model.number="duration"
						type="range"
						min="3"
						max="35"
						step="1"
						class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />

					<div class="text-gray-600 dark:text-gray-300 mt-2">
						<div class="text-gray-400">Your monthly payment</div>
						<price
							:price="monthlyPayment"
							class="text-3xl" />
					</div>

					<div class="text-gray-500 dark:text-gray-400 mt-2">
						<div class="flex justify-between">
							<div>Total paid</div>
							<div>
								<price
									:price="totalPaid"
									class="font-medium" />
							</div>
						</div>

						<div class="flex justify-between">
							<div>Principal paid</div>
							<div>
								<price
									:price="listing.price"
									class="font-medium" />
							</div>
						</div>

						<div class="flex justify-between">
							<div>Interest paid</div>
							<div>
								<price
									:price="totalInterest"
									class="font-medium" />
							</div>
						</div>
					</div>
				</div>
			</box>
		</div>
	</div>
</template>

<script setup>
import { ref } from 'vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';
import Box from '@/Components/UI/Box.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue';

const interestRate = ref(2.5);
const duration = ref(25);

const props = defineProps({
	listing: {
		Object,
		default: {
			price: 0,
		},
	},
});

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(props.listing.price, interestRate, duration);
</script>
