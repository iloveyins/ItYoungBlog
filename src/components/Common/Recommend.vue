<template lang="html">
  <div class="widget suxingme_topic">
   <h3><span>推荐文章</span></h3>
   <ul class="widget_suxingme_topic" v-for="item in recommends">
    <li> <a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">
      <div class="overlay"></div>
      <div class="image">
       <img style="width:100%;height:100%" data-original="" :src="item.img_url | ImgSplit" :alt="item.title" />
      </div>
      <div class="title">
       <h4>{{item.title}}</h4>
       <div class="meta">
        <span>查看文章</span>
       </div>
      </div> </a> </li>
   </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      recommends:[]
    }
  },
  props: {
    //recommends: []
  },
  mounted:function(){
      this.Recommend();
  },
  methods:{
    //推荐
    Recommend: function() {
      var _this = this;
      $.get('index.php?c=Index&a=getBrowserNumArticleList', {
        num: 3
      }, function(ret) {
        if (ret) {
          for (var i = 0; i < ret.length; i++) {
            _this.recommends.push(ret[i]);
          }
        }
      }, "JSON");
    },
  }
}
</script>

<style lang="css">
</style>
