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
                    <th class="p-3 text-left">Actions</th>

                </tr>
            </thead>
            <tbody class="flex-1 sm:flex-none">
                <tr
                    class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                    v-for="product in products"
                    :key="product.id"
                >
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ product.title }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        R${{ product.price }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <input 
                        type="number" 
                        name="custom-input-number" 
                        v-model="product.qtd"
                        ></input>  
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <!--<button
                            class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
                            @click.prevent="deletePost(product.id)"
                        >
                            Delete
                        </button>-->
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
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
            products: [],
        }
    },
    created() {
        this.getPosts()
    },
    methods: {
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
        /*cartQtd() {
            if (product.qtd < cart.qtd) {
                console.error();
            } else {
    
            }
        },*/
    }
}
</script>
