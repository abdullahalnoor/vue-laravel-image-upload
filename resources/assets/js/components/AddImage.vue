<template>
<div>
  <div class="col-md-12">
    <div class="form-group">
      <label for="">Add Image</label>
      <input type="file" class="form-control" @change="fileChange" accept="image/*">
    </div>

    <div class="form-group">
      <label for="">Add Name</label>
      <input type="text" v-model="list.name" class="form-control" >
    </div>

    <div class="form-group">
       <a href="" class="btn btn-primary" @click="uploadImage">Upload</a>
    </div>
    </div>  
</div>  
</template>
<script>
export default {
  name: "add-image",
  data() {
    return {
      list: {
        name: ""
      },
      imageFIle: null,

      formData: new FormData()
    };
  },
  methods: {
    fileChange(e) {
      // console.log(e);
      let selecFIle = e.target.files[0];
      // console.log(selecFIle);
      this.imageFIle = selecFIle;
    },
    uploadImage() {
      this.formData.append("image", this.imageFIle);
      this.formData.append("name", this.list.name);
      // console.log(this.formData);
      const config = { headers: { "Content-Type": "multipart/form-data" } };

      axios
        .post("http://localhost/vlp-1/public/upload", this.formData, config)
        .then(res => console.log(res));
    }
  }
};
</script>
