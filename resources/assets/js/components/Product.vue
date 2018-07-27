<template>
  <div class="col-md-12">
   <form action="" @submit.prevent="create">
      <div class="form-group">
      <label for="">Image</label>
      <input type="file"  @change="changeImage" accept="image/*" class="form-control" >
      <span v-if="errors.image" class="text-danger font-weight-bold">  {{errors.image[0]}} </span>
    </div>
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" v-model="product.name" class="form-control">
        <span v-if="errors.name" class="text-danger font-weight-bold">  {{errors.name[0]}} </span>
    </div>
    <div class="form-group">
      <label for="">Price</label>
      <input type="text" v-model="product.price" class="form-control" >
        <span v-if="errors.price" class="text-danger font-weight-bold">  {{errors.price[0]}} </span>
    </div>
    <div class="form-group">
      <label for="">description</label>
      <textarea type="text" v-model="product.description" class="form-control" ></textarea>
        <span v-if="errors.description" class="text-danger font-weight-bold">  {{errors.description[0]}} </span>
    </div>
    <div class="form-group">
      <input type="submit"  value="Create" class="btn btn-primary">
    </div>
   </form>

  </div>
</template>
<script>
export default {
  data() {
    return {
      product: {
        name: "",
        price: "",
        description: "",
        image: ""
      },
      successMsg: "",
      errors: {}
    };
  },

  methods: {
    changeImage(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = e => {
        this.product.image = e.target.result;
      };
      // console.log(this.product);
    },
    create() {
      axios
        .post("http://localhost/vlp-1/public/product", this.$data.product)
        .then(res => {
          this.$router.push({ path: "/view-products" });
          successMsg = "Product info added successfully..";
        })
        .catch(err => {
          this.errors = err.response.data.errors;
        });
    }
  }
};
</script>
