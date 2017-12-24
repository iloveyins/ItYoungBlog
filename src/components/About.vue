<template>
  <div class="page-single">
    <!-- <div class="page-title" style="background-image:url(/static/images/page_bg.jpg);">
        <div class="container">
            <h1 class="title">
                人气文章排行榜
            </h1>
            <div class="page-dec">
            </div>
        </div>
    </div> -->
    <div id="loading" class="loader-mask">
      <div id="loading-center">
        <div id="loading-center-absolute">
          <div class="object" id="object_one"></div>
          <div class="object" id="object_two"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_four"></div>
      </div>
    </div>
  </div>
    <div class="likepage clearfix">
        <div class="container" style="margin-bottom: 50px;">
            <div class="like-post col-xs-6 col-sm-4 col-md-3" v-for="item in items">
                <div class="like-post-box">
                    <a v-bind:href="item.article_url,item.id | HrefStr" target="_blank">
                        <div class="views">
                            <span class="icon s-like">喜欢 |  </span>
                            <span class="count num">{{item.like_num}}</span>
                        </div>
                        <div class="image">
                          <img style="width:100%;height:100%;border-radius:3px 3px 0 0;background-repeat:repeat;" :src="item.img_url | ImgSplit" />
                        </div>
                        <div class="title">
                            <h2>{{item.title}}</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
  export default {
    data () {
         return{
           items:[]
         }
    },
    mounted:function(){
       this.Init();
    },
    methods: {
       Init:function(){
         var _this = this;
        var url = 'index.php?c=Index&a=getBrowserNumArticleList';
          $.post(url,{num:10},function(ret){
              if(ret){
                  for (var i = 0; i < ret.length; i++) {
                      setTimeout(function(){
                          $('.loader-mask').css('display','none');
                      },800);
                        _this.items.push(ret[i]);
                  }
              }
          },"JSON");
       },
    },
    filters:{
       ImgSplit:function(value){
         return value.split("||")[0];
       },
       HrefStr:function(url,id){
          return url+'&id='+id;
       }
    }
  }
</script>

<style lang="css">

</style>
