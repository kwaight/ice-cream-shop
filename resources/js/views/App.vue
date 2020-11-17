<template>
    <div>
        <div v-if="errorMessage === true" class="bg-red-200 rounded-2xl">
            <p class="text-center p-5 m-5">
                <span class="text-6xl font-bold">!</span><br/>
                Our drones are taking a short break.<br/>
                Please check back later.
            </p>
        </div>
        <div class="container pb-10">
            <router-view :products="products"></router-view>
        </div>
    </div>
</template>
<script>
export default {

    data() {
        return {
            products: {
                container: [],
                topping: [],
                scoop_flavor: []
            },
            errorMessage: false
        }
    },
    mounted() {
        this.axios.get('/api/products', { validateStatus: false }).then((response) => {
            console.log(response.data);
            if (response.status === 200 && response.data.container && response.data.container.length) {
                this.products = response.data;
            } else {
                this.errorMessage = true;
            }
        })
    }
}
</script>
