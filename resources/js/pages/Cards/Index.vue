<script setup lang="ts">

const props = defineProps(['cards'])

</script>

<template>
<h1>Cards</h1>
<a href="/cards/create">Add new card</a>
<ul>
<li v-for="card in props.cards.data" :key="card.id">{{ card.card_number }}</li>
</ul>

</template>
