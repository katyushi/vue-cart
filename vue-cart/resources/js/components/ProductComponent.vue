<template>
  <div>
    <h1>Products</h1>
    <br />
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'create' }" class="btn btn-primary">Add Product</router-link>
      </div>
    </div>
    <br />

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Item Name</th>
          <th>Item Picture</th>
          <th>Item Description</th>
          <th>Item Price</th>
          <th>Item Quantity</th>
          <th>Actions</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in products" :key="post.id">
          <td>{{ post.id }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.picture }}</td>
          <td>{{ post.description }}</td>
          <td>{{ post.price }}</td>
          <td>{{ post.qtd }}</td>
          <td>
            <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link>
          </td>
          <td>
            <button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: []
    };
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      var uri = "/api/posts";
      console.log(uri);
      this.axios.get(uri).then(response => {
        this.posts = response.data.data;
      });
    },
    deletePost(id) {
      let uri = `/api/post/delete/${id}`;
      this.axios.delete(uri).then(response => {});
      this.getPosts();
    }
  }
};
</script>
