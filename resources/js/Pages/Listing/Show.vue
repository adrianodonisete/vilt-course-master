<template>
  <div>
    <listing-address :listing="listing"></listing-address>
  </div>

  <Link href="/listing">Back listings</Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/Components/ListingAddress.vue';

defineProps({
  listing: Object,
});
</script>
