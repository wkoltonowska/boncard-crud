<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const props = defineProps(["card"]);

const form = useForm({
    card_number: props.card.card_number,
    pin: props.card.pin,
    activation_date: props.card.activation_date,
    expiration_date: props.card.expiration_date,
    balance: props.card.balance,
});

function submit() {
    form.put(`/cards/${props.card.id}`);
}
</script>

<template>
    <form @submit.prevent="submit">
        <label for="card_number">Card number</label>
        <input v-model="form.card_number" type="text" id="card_number" />
        <span v-if="form.errors.card_number">{{
            form.errors.card_number
        }}</span>

        <label for="pin">PIN</label>
        <input v-model="form.pin" type="text" id="pin" />
        <span v-if="form.errors.pin">{{ form.errors.pin }}</span>

        <label for="activation_date">Activation date</label>
        <input
            v-model="form.activation_date"
            type="datetime-local"
            id="activation_date"
        />
        <span v-if="form.errors.activation_date">{{
            form.errors.activation_date
        }}</span>

        <label for="expiration_date">Expiration date</label>
        <input
            v-model="form.expiration_date"
            type="date"
            id="expiration_date"
        />
        <span v-if="form.errors.expiration_date">{{
            form.errors.expiration_date
        }}</span>

        <label for="balance">Balance</label>
        <input v-model="form.balance" type="number" step="0.01" id="balance" />
        <span v-if="form.errors.balance">{{ form.errors.balance }}</span>

        <button type="submit">Save</button>
    </form>
</template>
