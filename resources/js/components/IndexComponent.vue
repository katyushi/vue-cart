<template>
    <div>
        <div>
            <img
                src="https://media.giphy.com/media/O6IMv2PdoG2ru/giphy.gif"
                style=" margin-left: auto;margin-right: auto;"
                alt="helo"
            />
            <br />
            <h1 style="text-align:center;">Go Buy Something</h1>
        </div>
        <br/>
        <div>
            <table
            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5"
        >
            <thead class="text-white">
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                >
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Picture</th>
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
                        <img
                            v-bind:src="product.picture"
                            width="250"
                            height="350"
                        />
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <router-link
                            :to="{
                                name: 'details',
                                params: { id: product.id },
                            }"
                            class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-2 inline-block text-teal-100 hover:text-white rounded"
                            >View Product</router-link
                        >
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
        }
    }
}
</script>
