<template>
    <div>
        <p class="text-center">
            Thank you for submitting your order!
            <br/>
            <button v-on:click="newOrder()" class="btn btn-blue">New Order</button>
        </p>
    </div>
</template>
<script>
export default {
    methods: {
        newOrder() {
            this.$router.push({ name: 'PickContainer'})
        }
    }
}
</script>
