<template>
  <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Description</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>

    <tbody>
      <tr v-for="(item,index) in product" :key="index">
        <td> {{item.name}} </td>
        <td> {{item.price}} </td>
        <td> {{item.description}} </td>
        <td> <img :src="item.image" alt="fgd" class="img-responsive " style="width:100px;height:100px"> </td>
        <td>
          <router-link :to="{name:'editProduct',params:{id:item.id}}" class="btn btn-info"> Edit</router-link>
          <router-link to="/" class="btn btn-danger"> Delete</router-link>
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
      product: {}
    };
  },
  created() {
    axios.get("http://localhost/vlp-1/public/view-products").then(res => {
      this.product = res.data.data;
    });
  },
  methods: {
    getData() {}
  }
};
</script>
