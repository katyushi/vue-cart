<template>
    <div class="row">
        <div>
            <label><h1><b>Product Page</b></h1></label>
            <br />
            <br />
        </div>

        <div class="image">
            <img v-bind:src="product.picture" width="450" height="500"/>
        </div>
        <form @submit.prevent="addToCart"  class="funct">
            <div class="form-group">
                <label><b>{{ product.title }}</b></label>
                <br />
                <label>Price: R${{ product.price }}</label>
                <div class="flex flex-col">
                    <label for="price" class="mt-4 mb-1 uppercase text-grey-darker text-xs font-bold">Quantity</label>
                    <div class="flex flex-row">
                        <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">Qtd</span>
                        <input 
                        type="number" 
                        name="price" 
                        class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none font-bold" 
                        v-model="cart.qtd"
                        >
                    </div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <button
                    class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-2 inline-block text-teal-100 hover:text-white rounded"
                    type="submit"
                    >
                        <span>Add to Cart</span>
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                        aria-hidden="true" 
                        focusable="false" 
                        width="1em" 
                        height="1em" 
                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
                        preserveAspectRatio="xMidYMid meet" 
                        viewBox="0 0 24 24">
                        <path 
                        d="M20.756 5.345A1.003 1.003 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a.97.97 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1.002 1.002 0 0 0-.234-.797zM18.847 7l-.285 2H15V7h3.847zM14 7v2h-3V7h3zm0 3v2h-3v-2h3zm-4-3v2H7l-.148.03L6.514 7H10zm-2.986 3H10v2H7.347l-.333-2zM15 12v-2h3.418l-.285 2H15z" 
                        fill="#ffffff"/>
                        <circle cx="8.5" cy="19.5" r="1.5" fill="#ffffff"/>
                        <circle cx="17.5" cy="19.5" r="1.5" fill="#ffffff"/>
                        <rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" />
                        </svg>
                </button>
            </div>
        </form>
        <!--<div>
            <h1><b>Description:</b></h1>
            <br/>
            <label>{{product.description}}</label>
        </div>-->
    </div>
</template>
<style>
* {
  box-sizing: border-box;
}
.funct{
    width: 25%;
    float: left;
}
.image{
    width: 75%;
    float: left;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

</style>

<script>
export default {
    data() {
        return {
            product: {},
            cart: {},
        }
    },
    created() {
        let uri = `/api/products/edit/${this.$route.params.id}`
        try {
            this.axios.get(uri).then(response => {
                this.product = response.data
            })
        } catch (error) {
            console.log(error)
        }
    },
    methods: {
        addToCart() {
            this.cart.title = this.product.title;
            this.cart.price = this.product.price;
            this.cart.stock = this.product.qtd;
            if (this.cart.qtd <= this.product.qtd && this.cart.qtd > 0) {
                let uri = '/api/addtocart'
                try {
                    this.axios.post(uri, this.cart).then(response => {
                        this.$router.push({ name: 'cart' })
                       })
                    console.log(this.cart)
                } catch (error) {
                    console.log(error)
                }
            } else {
                alert('ERROR UNAVALIABLE QUANTITY');
            }
        },
    },
}
</script>