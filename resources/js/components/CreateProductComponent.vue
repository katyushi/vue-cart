<template>
  <div>
    <h1>Create A Product</h1>
    <br />
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Title:</label>
            <br />
            <input type="text" class="form-control" v-model="product.title" placeholder="plumbus" />
          </div>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Picture Url:</label>
            <br />
            <input
              type="text"
              class="form-control"
              v-model="product.picture"
              placeholder="https://images-na.ssl-images-amazon.com/images/I/31z1vD53V2L._AC_.jpg"
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
            <textarea class="form-control" v-model="product.description" rows="5" placeholder="maybe i am description maybe not"></textarea>
          </div>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Price:</label>
            <br />
            <label>R$</label>
            <input type="text" class="form-control" v-model="product.price" placeholder="9.99" />
          </div>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Amount in Stock:</label>
            <br />
            <input type="text" class="form-control" v-model="product.qtd" placeholder="2"/>
          </div>
        </div>
      </div>
      <br />
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      product: {}
    };
  },
  methods: {
    addPost() {
      let uri = "api/products/create";
      this.axios.post(uri, this.product).then(response => {
        this.$router.push({ name: "product" });
      });
      console.log(this.product);
    }
  }
};
</script>
