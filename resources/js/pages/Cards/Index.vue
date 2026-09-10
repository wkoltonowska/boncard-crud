<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["cards"]);

function deleteCard(id) {
    if (confirm("Delete this card? This can't be undone.")) {
        router.delete(`/cards/${id}`);
    }
}
</script>

<template>
    <div class="max-w-4xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold mb-4">Cards</h1>
            <a
                href="/cards/create"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700"
            >
                Add new card
            </a>
        </div>
        <p v-if="props.cards.data.length === 0" class="text-gray-500">
            No cards yet — add one to get started.
        </p>
        <table v-else class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="py-2 pr-4">Card number</th>
                    <th class="py-2 w-48">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="card in props.cards.data"
                    :key="card.id"
                    class="border-b border-gray-200"
                >
                    <td class="py-3 pr-4">{{ card.card_number }}</td>
                    <td class="py-3 space-x-2">
                        <a
                            :href="`/cards/${card.id}/edit`"
                            class="inline-block bg-gray-600 text-white px-3 py-1.5 rounded hover:bg-gray-700 text-sm"
                            >Edit</a
                        >
                        <button
                            @click="deleteCard(card.id)"
                            class="inline-block bg-red-600 text-white px-3 py-1.5 rounded hover:bg-red-700 text-sm"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 flex gap-2 flex-wrap">
            <template v-for="link in props.cards.links" :key="link.label">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    class="px-3 py-1 rounded border text-sm"
                    :class="
                        link.active
                            ? 'bg-blue-600 text-white border-blue-600'
                            : 'text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800'
                    "
                >
                    <span v-html="link.label" />
                </Link>
                <span
                    v-else
                    class="px-3 py-1 rounded border border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>
