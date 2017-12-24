<template lang="html">
   <div>
     <div class="widget widget_suxingme_postlist">
      <h3><span>最新文章</span></h3>
      <ul class="recent-posts-widget">
       <li v-for="(item,index) in newArticles" v-bind:class="index==0?'one':'others'">
        <template v-if="index==0">
         <a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">
          <div class="overlay"></div> <img class="lazy thumbnail" data-original="" :src="item.img_url | ImgSplit" :alt="item.title" />
          <div class="title">
           <span>{{item.create_time}}</span>
           <h4>{{item.title}}</h4>
          </div> </a>
        </template>
        <template v-if="index!=0">
         <div class="image">
          <a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank"> <img class="lazy thumbnail" data-original="" :src="item.img_url | ImgSplit" :alt="item.title" /> </a>
         </div>
         <div class="title">
          <h4><a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">{{item.title}}</a></h4>
          <span>{{item.create_time}}</span>
         </div>
        </template> </li>
      </ul>
     </div>
   </div>
</template>

<script>
export default {
  data() {
    return{
      newArticles:[]
    }
  },
  mounted: function() {
     this.NewArticle();
  },
  props:{
    
  },
  methods: {
    //最新文章
    NewArticle: function() {
      var _this = this;
      $.get('index.php?c=Index&a=getNewArticleList', null, function(ret) {
        if (ret) {
          for (var i = 0; i < ret.length; i++) {
            _this.newArticles.push(ret[i]);
          }
        }
      }, "JSON");
    },
  }
}
</script>

<style lang="css">
</style>
