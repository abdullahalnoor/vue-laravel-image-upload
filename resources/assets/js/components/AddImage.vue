<template>
<div>
  <div class="col-md-12">
    <div class="form-group">
      <label for="">Add Image</label>
      <input type="file" class="form-control" @change="fileChange" accept="image/*">
      <span v-if="errors.imageFIle"> {{errors.imageFIle}} </span>
    </div>

    <div class="form-group">
      <label for="">Add Images(3)</label>
      <input type="file" class="form-control" multiple @change="multiFileChange" accept="image/*">
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
      multiImgFiles: [],

      formData: new FormData(),

      errors: {}
    };
  },
  methods: {
    fileChange(e) {
      // console.log(e);
      let selecFIle = e.target.files[0];

      this.imageFIle = selecFIle;
      console.log(this.imageFIle);
    },

    multiFileChange(e) {
      let selectedFiles = e.target.files;
      if (!selectedFiles.length) {
        return false;
      }
      for (let i = 0; i < selectedFiles.length; i++) {
        this.multiImgFiles.push(selectedFiles[i]);
      }
      console.log(this.multiImgFiles);
    },

    uploadImage() {
      this.formData.append("image", this.imageFIle);
      this.formData.append("name", this.list.name);

      for (let i = 0; i < this.multiImgFiles.length; i++) {
        this.formData.append("images[]", this.multiImgFiles[i]);
      }

      // console.log(this.formData);
      const config = { headers: { "Content-Type": "multipart/form-data" } };

      axios
        .post("http://localhost/vlp-1/public/upload", this.formData, config)
        .then(res => console.log(res))
        .catch(err => {
          this.errors = err.response.data.errors;
          console.log(this.errors);
        });
    }
  }
};
</script>
