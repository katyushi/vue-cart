<template>
    <div>
        <h1>Products</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="mt-8 flex">
                <router-link
                    :to="{ name: 'create' }"
                    class="cursor-pointer bg-blue-600 hover:bg-blue-500 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                    >Add Product</router-link
                >
            </div>
        </div>
        <br />
        <table
            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5"
        >
            <thead class="text-white">
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                >
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Item Name</th>
                    <th class="p-3 text-left">Item Picture</th>
                    <th class="p-3 text-left">Item Description</th>
                    <th class="p-3 text-left">Item Price</th>
                    <th class="p-3 text-left">Item Quantity</th>
                    <th class="p-3 text-left">Created At</th>
                    <th class="p-3 text-left">Updated At</th>
                    <th class="p-3 text-left">Actions</th>
                    <th class="p-3 text-left">Other Actions</th>
                </tr>
            </thead>
            <tbody class="flex-1 sm:flex-none">
                <tr
                    class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                    v-for="product in products"
                    :key="product.id"
                >
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ product.id }}
                    </td>
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
                        {{ product.description }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        R${{ product.price }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ product.qtd }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ product.created_at }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ product.updated_at }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <router-link
                            :to="{ name: 'edit', params: { id: product.id } }"
                            class="cursor-pointer bg-gray-700 hover:bg-gray-600 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                            >Edit</router-link
                        >
                        <button
                            class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
                            @click.prevent="deletePost(product.id)"
                        >
                            Delete
                        </button>
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <router-link
                            :to="{
                                name: 'details',
                                params: { id: product.id }
                            }"
                            class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-2 inline-block text-teal-100 hover:text-white rounded"
                            >View Product</router-link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
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
            products: []
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            var uri = "/api/products";
            console.log(uri);
            try {
                this.axios.get(uri).then(response => {
                    this.products = response.data.data;
                });
            } catch (error) {
                console.log(error);
            }
        },
        deletePost(id) {
            let uri = `/api/products/delete/${id}`;
            try {
                this.axios.delete(uri).then(response => {});
                this.getPosts();
            } catch (error) {
                console.log(error);
            }
        }
    }
};
</script>
