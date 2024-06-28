<template>
  <h3>Default Layout</h3>

  <Link href="/">Main Page</Link>&nbsp;
  <Link href="/hello">Hello Page</Link>

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
