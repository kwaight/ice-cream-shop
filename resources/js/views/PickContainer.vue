<template>
    <div>
        <p class="text-center">
            Pick your container
        </p>
        <div v-if="products.container.length" v-on:click="selectContainer(container.id)" v-for="container in products.container" class="text-center w-full mb-1 mt-1 border border-solid p-5 hover:bg-blue-100 border-blue-500 border-opacity-100 cursor-pointer">
            {{container.title}}
        </div>
    </div>
</template>
<script>
export default {
    props: {
        products: Object
    },
    methods: {
        selectContainer(id) {
            this.$router.push({ name: 'container', params: { id } })
        }
    }
}
</script>
