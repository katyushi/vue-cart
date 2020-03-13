<template>
    <div>
        <div>
            <table
            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5"
        >
            <thead class="text-white">
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                >
                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">Product Price</th>
                    <th class="p-3 text-left">Product Quantity</th>
                    <th class="p-3 text-left">Subtotal</th>
                    <th class="p-3 text-left">Actions</th>

                </tr>
            </thead>
            <tbody class="flex-1 sm:flex-none">
                <tr
                    class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                    v-for="car in cart"
                    :key="car.id"
                >
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ car.title }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        R${{ car.price }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <input 
                        type="number" 
                        name="custom-input-number" 
                        v-model="car.qtd"
                        />  
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        R${{ (car.qtd*car.price).toFixed(2) }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <div>
                            <button
                                class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
                                @click.prevent="deleteCartIten(car.id)"
                                >
                                Delete
                            </button>
                        </div>
                        <div v-if="car.qtd > car.stock">
                            {{ alerta() }}
                            {{ car.qtd  = car.qtd -1 }}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <br/>
        <button class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-10 py-4 inline-block text-teal-100 hover:text-white rounded">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M20.756 5.345A1.003 1.003 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a.97.97 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1.002 1.002 0 0 0-.234-.797zM18.847 7l-.285 2H15V7h3.847zM14 7v2h-3V7h3zm0 3v2h-3v-2h3zm-4-3v2H7l-.148.03L6.514 7H10zm-2.986 3H10v2H7.347l-.333-2zM15 12v-2h3.418l-.285 2H15z" fill="#ffffff"/><circle cx="8.5" cy="19.5" r="1.5" fill="#ffffff"/><circle cx="17.5" cy="19.5" r="1.5" fill="#ffffff"/><rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" /></svg>
            <span> Buy </span>
        </button>
    </div>
</template>
<style>
html,
body {
    height: 100%;
}

@media (min-width: 640px) {
    table {
        display: inline-table !important;
    }

    thead tr:not(:first-child) {
        display: none;
    }
}

td:not(:last-child) {
    border-bottom: 0;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}

input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .custom-number-input input:focus {
    outline: none !important;
  }

  .custom-number-input button:focus {
    outline: none !important;
  }
</style>
<script>
export default {
    data() {

        return {
            cart: [],
            products: [],
        }
    },
    created() {
        this.getCart()
        this.getPosts()
    },
    methods: {
        alerta() {
            alert('ERROR: THE CHOSEN QUANTITY EXCEEDS THE MAXIMUM CAPACITY');
        },
        getPosts() {
            var uri = '/api/products'
            console.log(uri)
            try {
                this.axios.get(uri).then(response => {
                    this.products = response.data.data
                })
            } catch (error) {
                console.log(error)
            }
        },
        getCart() {
            var uri = '/api/cart'
            try {
                this.axios.get(uri).then(response => {
                    this.cart = response.data.data
                })
                console.log(this.cart)
            } catch (error) {
                console.log(error)
            }
        },
        deleteCartIten(id) {
            let uri = `/api/cart/delete/${id}`
            try {
                this.axios.delete(uri).then(response => {})
                this.getCart()
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>
