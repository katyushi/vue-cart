<template>
    <div>
        <h1>Create a Product</h1>
        <br />
        <form @submit.prevent="addPost">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Title:</label>
                        <div
                            class="flex flex-wrap items-stretch w-full mb-4 relative"
                        >
                            <div class="flex -mr-px">
                                <span
                                    class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm"
                                    >Name</span
                                >
                            </div>
                            <input
                                type="text"
                                v-model="product.title"
                                class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow"
                                placeholder="plumbus"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Picture Url:</label>
                        <div
                            class="flex flex-wrap items-stretch w-full mb-4 relative"
                        >
                            <div class="flex -mr-px">
                                <span
                                    class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm"
                                    >Url</span
                                >
                            </div>
                            <input
                                type="text"
                                v-model="product.picture"
                                class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow"
                                placeholder="https://images-na.ssl-images-amazon.com/images/I/31z1vD53V2L._AC_.jpg"
                            />
                        </div>
                        <br />
                        <label>Image Preview:</label>
                        <img
                            v-bind:src="product.picture"
                            width="250"
                            height="350"
                            alt="your image"
                        />
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product description:</label>
                        <br />
                        <textarea
                            v-model="product.description"
                            class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                            rows="5"
                        ></textarea>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Price:</label>
                        <div class="flex flex-row">
                            <div class="flex -mr-px">
                                <span
                                    class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm"
                                    >R$</span
                                >
                            </div>
                            <input
                                type="text"
                                v-model="product.price"
                                class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow"
                                placeholder="9.99"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Amount in Stock:</label>
                        <div class="flex flex-row">
                            <span
                                class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker"
                                >Qtd</span
                            >
                            <input
                                type="number"
                                v-model="product.qtd"
                                name="price"
                                class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none font-bold"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="form-group">
                <button
                    class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-2 inline-block text-teal-100 hover:text-white rounded"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            product: {},
        }
    },
    methods: {
        addPost() {
            let uri = 'api/products/create'
            try {
                this.axios.post(uri, this.product).then(response => {
                    this.$router.push({ name: 'products' })
                })
                console.log(this.product)
            } catch (error) {
                console.log(error)
            }
        },
    },
}
</script>
