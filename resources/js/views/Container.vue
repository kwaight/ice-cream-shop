<template>
    <div>
        <p class="text-center font-bold text-3xl">
            Container: {{container.title}}
        </p>

        <label class="font-bold">Name</label>
        <input type="text" class='border w-full' v-model="name"/>

        <br/>
        <br/>

        <label class="font-bold">Email</label>
        <input type="text" class='border w-full' v-model="email"/>


        <br/>
        <br/>
        <hr class="mb-5"/>
        <p class="text-center font-bold">
            Select Scoop Flavors (Max 3 scoops)
        </p>

        <label class="font-bold">Scoop #1:</label>
        <div>
            ** First Scoop Required
        </div>
        <div v-for="(flavor, index) in products['scoop_flavor']" >
            - {{flavor.title}}:
            <input type="radio" :value="flavor.id" name="scoopOne" v-model="scoops[0]"/>
        </div>

        <br/>

        <label class="font-bold">Scoop #2:</label>
        <div>
            - None: <input type="radio" value="0" name="scoopTwo" v-model="scoops[1]"/>
        </div>
        <div v-for="(flavor, index) in products['scoop_flavor']" >
            - {{flavor.title}}:
            <input type="radio" :value="flavor.id" name="scoopTwo" v-model="scoops[1]"/>
        </div>

        <br/>

        <label class="font-bold">Scoop #3:</label>
        <div>
            - None: <input type="radio" value="0" name="scoopThree" v-model="scoops[2]"/>
        </div>
        <div v-for="(flavor, index) in products['scoop_flavor']" >
            - {{flavor.title}}:
            <input type="radio" :value="flavor.id" name="scoopThree" v-model="scoops[2]"/>
        </div>

        <br/>
        <br/>

        <hr class="mb-5"/>
        <p class="text-center font-bold">
            Select Toppings
        </p>

        <div v-for="(topping, index) in products['topping']" >
            {{topping.title}}:
            <input type="checkbox" :value="topping.id" name="scoopThree[]" v-model="toppings"/>
        </div>

        <br/>
        <br/>
        <hr class="mb-5"/>
        <div class="flex justify-end font-bold"><span>Subtotal: ${{subtotal}}</span></div>
        <div class="flex justify-end font-bold"><span>Total: ${{total}}</span></div>

        <br/>
        <div class="flex justify-end font-bold">
            <button v-on:click="onSubmit()" class="btn btn-blue">Submit Order</button>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        products: Object
    },
    computed: {
        container() {
            return this.products.container.filter(container => container.id === parseInt(this.$route.params.id)).shift();
        },
        subtotal() {
            let price = this.container.price;
            this.toppings.forEach((topping) => {
                if (!topping) {
                    return;
                }
                price += this.products.lookup[topping].price;
            })
            this.scoops.forEach((scoop) => {
                if (!scoop) {
                    return;
                }
                price += this.products.lookup[scoop].price;
            })

            return price.toFixed(2);
        },
        total() {
            return Math.round((this.subtotal * 1.0825) * 100) / 100;
        }
    },
    data() {
        return {
            scoops: [0,0,0],
            toppings: [],
            name: '',
            email: ''
        }
    },
    mounted() {
        if (!this.products.container.length) {
            this.$router.push({ name: 'PickContainer'})
        }

        this.scoops = [this.products['scoop_flavor'][0].id,0,0]
    },
    methods: {
        onSubmit() {
            if (!this.name.length || !this.email.length) {
                //alert("Name and Email is required");
                //return;
            }

            let data = {
                container: this.$route.params.id,
                scoops: this.scoops.filter(scoop => scoop != 0),
                toppings: this.toppings,
                name: this.name,
                email: this.email
            };

            this.axios.post('/api/order', data, { validateStatus: false }).then((response) => {
                console.log(response.data);
                if (response.status === 200) {
                    this.$router.push({ name: 'confirm'})
                } else {
                    if (response.status === 422) {
                        let errors = Object.keys(response.data.errors).map((key, index) => {
                            return response.data.errors[key].join(', ');
                        }).join(', ');
                        alert(errors);
                    } else {
                        alert('There was an error with your order. Please try again.');
                    }
                }
            })
        }
    }
}
</script>
