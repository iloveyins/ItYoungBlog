<template lang="html">
  <div>
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
     <div class="widget suxingme_social">
       <h3><span>关注微信公众号，学习更进一步 ^-^ </span></h3>
       <!-- <div class="attentionus">
         <ul class="items clearfix">
           <span class="social-widget-link social-link-weibo">
             <span class="social-widget-link-count"><i class="fa fa-weibo" aria-hidden="true"></i>大白葱思维</span>
             <span class="social-widget-link-title">新浪微博</span> <a href="http://weibo.com/iloveyins" target="_blank" rel="nofollow"></a></span>
           <span class="social-widget-link social-link-qq">
             <span class="social-widget-link-count"><i class="fa fa-qq" aria-hidden="true"></i>58299928</span>
             <span class="social-widget-link-title">QQ号</span>
           <a href="" target="_blank" rel="nofollow"></a> </span>
           <span class="social-widget-link social-link-email">
             <span class="social-widget-link-count"><i class="fa fa-envelope-o" aria-hidden="true"></i>iloveyins@126.com</span>
             <span class="social-widget-link-title">邮箱</span> <a href="#" target="_blank" rel="nofollow"></a></span>
           <span class="social-widget-link social-link-wechat">
             <span class="social-widget-link-count"><i class="fa fa-weixin" aria-hidden="true"></i>ITYOUNG</span>
             <span class="social-widget-link-title">微信公众号</span> <a  @click="weixin" href="javascript:void(0);"></a></span>
         </ul>
       </div> -->
        <img src="/static/images/iloveyins.png"  alt="微信公众号">
     </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      recommends: [],
      newArticles: [],
    }
  },
  mounted: function() {
    var _this = this;
    _this.Recommend();
    _this.NewArticle();
  },
  methods: {
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
  },
  filters: {
    replace: function(value) {
      return value.replace(/<.*?>/ig, "");
    },
    strImgSplit: function(value, num) {
      return value.split('||')[num];
    },
    ImgSplit: function(value) {
      if(value.split("||").length == 1)
        return value;
      else
        return value.split("||")[0];
    },
    HrefStr: function(url, id) {
      return url + '&id=' + id;
    },
  }
}
</script>

<style lang="css">
</style>
