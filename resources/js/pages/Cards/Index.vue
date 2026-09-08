<script setup lang="ts">

const props = defineProps(['cards'])

</script>

<template>
<h1>Lista kart: {{ props.cards.data.length }}</h1>
<ul>
<li v-for="card in props.cards.data" :key="card.id">{{ card.card_number }}</li>
</ul>

</template>
