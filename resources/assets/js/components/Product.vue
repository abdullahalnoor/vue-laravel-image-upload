<template>
  <div class="col-md-12">
   <form action="" @submit.prevent="create">
      <div class="form-group">
      <label for="">Image</label>
      <input type="file"  @change="changeImage" accept="image/*" class="form-control" >
    </div>
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" v-model="product.name" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" v-model="product.price" class="form-control" >
    </div>
    <div class="form-group">
      <label for="">Name</label>
      <textarea type="text" v-model="product.description" class="form-control" ></textarea>
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
      }
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
        .then(res => console.log(this.product));
    }
  }
};
</script>
