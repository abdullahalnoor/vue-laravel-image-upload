<template>
  <div class="col-md-12">
   <form action="" @submit.prevent="update">
     <div class="row">
       <div class="col-md-6">
         <label for="">current image</label>
         <img :src="product.image" alt="asdf" style="width:100px;height:100px">
       </div>
       <div class="col-md-6">
          <div class="form-group">
      <label for="">Image</label>
      <input type="file"  @change="changeImage" accept="image/*" class="form-control" >
    </div>
       </div>
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
      <input type="submit"  value="Update" class="btn btn-primary">
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

  created() {
    // console.log(this.$route.params.id);
    axios
      .get(
        "http://localhost/vlp-1/public/edit-product/" + this.$route.params.id
      )
      .then(res => {
        this.product = res.data;
      });
  },

  methods: {
    changeImage(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = e => {
        this.product.image = e.target.result;
      };
    },
    update() {
      axios
        .post(
          "http://localhost/vlp-1/public/update-product",
          this.$data.product
        )
        .then(res => {
          console.log(res.data);
        });
    }
  }
};
</script>
