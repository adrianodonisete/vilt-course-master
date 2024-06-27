<template>
  <Link href="/">Main Page</Link>&nbsp;
  <Link href="/hello">Hello Page</Link>

  <slot>
    <h3>Default html</h3>
  </slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  message: String,
});
</script>
