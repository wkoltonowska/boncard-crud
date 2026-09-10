<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const props = defineProps(["card"]);

const form = useForm({
    card_number: props.card.card_number,
    pin: props.card.pin,
    activation_date: props.card.activation_date?.replace(" ", "T").slice(0, 16),
    expiration_date: props.card.expiration_date,
    balance: props.card.balance,
});

function submit() {
    form.put(`/cards/${props.card.id}`);
}
</script>

<template>
    <div class="max-w-md mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit card</h1>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label for="card_number" class="block text-sm font-medium mb-1"
                    >Card number</label
                >
                <input
                    v-model="form.card_number"
                    type="text"
                    id="card_number"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                />
                <span
                    v-if="form.errors.card_number"
                    class="text-red-600 text-sm"
                    >{{ form.errors.card_number }}</span
                >
            </div>

            <div>
                <label for="pin" class="block text-sm font-medium mb-1"
                    >PIN</label
                >
                <input
                    v-model="form.pin"
                    type="text"
                    id="pin"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                />
                <span v-if="form.errors.pin" class="text-red-600 text-sm">{{
                    form.errors.pin
                }}</span>
            </div>

            <div>
                <label
                    for="activation_date"
                    class="block text-sm font-medium mb-1"
                    >Activation date</label
                >
                <input
                    v-model="form.activation_date"
                    type="datetime-local"
                    id="activation_date"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                />
                <span
                    v-if="form.errors.activation_date"
                    class="text-red-600 text-sm"
                    >{{ form.errors.activation_date }}</span
                >
            </div>

            <div>
                <label
                    for="expiration_date"
                    class="block text-sm font-medium mb-1"
                    >Expiration date</label
                >
                <input
                    v-model="form.expiration_date"
                    type="date"
                    id="expiration_date"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                />
                <span
                    v-if="form.errors.expiration_date"
                    class="text-red-600 text-sm"
                    >{{ form.errors.expiration_date }}</span
                >
            </div>

            <div>
                <label for="balance" class="block text-sm font-medium mb-1"
                    >Balance</label
                >
                <input
                    v-model="form.balance"
                    type="number"
                    step="0.01"
                    id="balance"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                />
                <span v-if="form.errors.balance" class="text-red-600 text-sm">{{
                    form.errors.balance
                }}</span>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50"
            >
                Save
            </button>
        </form>
    </div>
</template>
