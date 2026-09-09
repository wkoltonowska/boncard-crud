<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["cards"]);

function deleteCard(id) {
    router.delete(`/cards/${id}`);
}
</script>

<template>
    <h1>Cards</h1>
    <a href="/cards/create">Add new card</a>
    <ul>
        <li v-for="card in props.cards.data" :key="card.id">
            {{ card.card_number }}
            <a :href="`/cards/${card.id}/edit`">Edit</a>
            <button @click="deleteCard(card.id)">Delete</button>
        </li>
    </ul>

    <template v-for="link in props.cards.links" :key="link.label">
        <Link v-if="link.url" :href="link.url" v-html="link.label" />
        <span v-else v-html="link.label" />
    </template>
</template>
