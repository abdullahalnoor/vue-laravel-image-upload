<template>
  <div class="col-md-12">
   <ol>
     <li v-for="(data,index) in image" :key="index" >
       <img :src="data.image" alt="" style="width:50px;height:50px;">
       <ol >
         <li v-if="data.id == item.parent_id" v-for="(item,index) in subImage" :key="index">
            <img :src="item.name" alt="" style="width:50px;height:50px;">
         </li>
       </ol>
     </li>
   </ol>

 
   
  </div>
</template>
<script>
export default {
  data() {
    return {
      image: {},
      subImage: {}
    };
  },

  created() {
    axios.get("http://localhost/vlp-1/public/get-files").then(res => {
      console.log(res.data.subImage);
      this.image = res.data.uploads;
      this.subImage = res.data.subImage;
    });
  }
};
</script>
