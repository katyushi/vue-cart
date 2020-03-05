<template>
  <div>
    <h1>Create A Product</h1>
    <br />
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Title:</label>
            <div class="flex flex-wrap items-stretch w-full mb-4 relative">
			    <div class="flex -mr-px">
				    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">Name</span>
			    </div>
			    <input type="text"  v-model="post.title" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="plumbus">
		        </div>
          </div>
        </div>
        </div>
        <br />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Picture Url:</label>
		        <div class="flex flex-wrap items-stretch w-full mb-4 relative">
			    <div class="flex -mr-px">
				    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">Url</span>
			    </div>
			    <input type="text"  v-model="post.picture" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="https://stayhipp.com/wp-content/uploads/2020/01/helo-fish-.jpg">
		        </div>
            </div>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product description:</label><br />
              <textarea class="form-control" v-model="post.description" rows="5"></textarea>
            </div>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Price:</label>
                <div class="flex flex-row">
                    <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">R$</span>
                    <input type="number" v-model="post.price" name="price" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none font-bold">
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
                    <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">Qtd</span>
                    <input type="number" v-model="post.qtd" name="price" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none font-bold">
                </div>
            </div>
          </div>
        </div>
        <br />
        <div class="form-group">
          <button class="bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {}
    };
  },
  methods: {
    addPost() {
      console.log(this.post);
    }
  }
};
</script>
