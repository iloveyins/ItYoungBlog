<template >
  <div>
    <div class="scroll-loading-top" style="position:relative;text-align:center;display:none">
       <i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size:16px"></i>
       <!-- <span>正在加载中...</span> -->
    </div>
      <div class="ajax-load-box posts-con mobile-scroll-content" >
        <div class="ajax-load-con content wow fadeInUp" v-for="item in filtersItems">
         <div class="content-box posts-gallery-box" v-if="item.cssstyle == 1">
          <div class="posts-gallery-img">
           <a :href="item.article_url,item.id | HrefStr" :title="item.title " target="_blank">
             <img class="lazy thumbnail" data-original="" :src="item.img_url" alt="" /> </a>
          </div>
          <div class="posts-gallery-content">
           <h2><a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">{{item.title}}</a></h2>
           <div class="posts-gallery-text text-overflow-content"   v-html="item.content"></div>
           <div class="posts-default-info posts-gallery-info">
            <ul>
             <li class="post-author hidden-xs hidden-sm">
              <div class="avatar" >
                 <img alt="" src="/static/images/timg.jpg" data-original="#" srcset="" class="avatar avatar-96 photo" height="96" width="96" />
              </div>
              <a href="" target="_blank">{{item.author}}</a>
            </li>
             <li class="postoriginal hidden-xs hidden-sm"><span><i class="icon-cc-1"></i>{{item.original}}</span> </li>
             <li class="ico-cat"><i class="icon-list-2"></i> <a href="#"> {{item.type_name}}</a></li>
             <li class="ico-time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{item.create_time}}</li>
             <li class="ico-eye hidden-xs hidden-sm"><i class="fa fa-eye" aria-hidden="true"></i> {{item.browse_num}}</li>
             <li class="ico-like hidden-xs hidden-sm"><i class="fa fa-heart-o" aria-hidden="true"></i> {{item.like_num}}</li>
            </ul>
           </div>
          </div>
         </div>
         <div class="content-box posts-image-box" v-else-if="item.cssstyle  == 2">
          <div class="posts-default-title">
           <h2><a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">{{item.title}}</a></h2>
          </div>
          <div class="post-images-item">
           <ul>
            <li>
             <div class="image-item">
              <a :href="item.article_url,item.id | HrefStr">
               <div class="overlay"></div> <img class="lazy thumbnail" data-original="" :src="item.img_url,0 | strImgSplit " alt="" /> </a>
             </div> </li>
            <li>
             <div class="image-item">
              <a :href="item.article_url,item.id | HrefStr">
               <div class="overlay"></div> <img class="lazy thumbnail" data-original="" :src="item.img_url,1 | strImgSplit" alt="" /> </a>
             </div> </li>
            <li>
             <div class="image-item">
              <a :href="item.article_url,item.id | HrefStr">
               <div class="overlay"></div> <img class="lazy thumbnail" data-original="" :src="item.img_url,2 | strImgSplit" alt="" /> </a>
             </div> </li>
           </ul>
          </div>
          <div class="posts-default-content">
           <div class="posts-text text-overflow-content"  v-html="item.content"></div>
          </div>
          <div class="posts-default-info">
           <ul>
            <li class="post-author hidden-xs hidden-sm">
             <div class="avatar">
              <img alt="" src="/static/images/timg.jpg" data-original="" srcset="" class="avatar avatar-96 photo" height="96" width="96" />
             </div>
             <a href="" target="_blank">{{item.author}}</a>
           </li>
            <li class="ico-cat"><i class="icon-list-2"></i> <a href=""> {{item.type_name}}</a></li>
            <li class="ico-time"><i class="fa fa-clock-o" aria-hidden="true" ></i> {{item.create_time}}</li>
            <li class="ico-eye hidden-xs hidden-sm"><i class="fa fa-eye" aria-hidden="true"></i> {{item.browse_num}}</li>
            <li class="ico-like hidden-xs hidden-sm"><i class="fa fa-heart-o" aria-hidden="true"></i> {{item.like_num}}</li>
           </ul>
          </div>
         </div>
         <div class="content-box" v-else-if="item.cssstyle == 3">
          <div class="posts-default-img">
           <a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">
            <div class="overlay"></div> <img class="lazy thumbnail" data-original="" :src="item.img_url" alt="" /> </a>
          </div>
          <div class="posts-default-box">
           <div class="posts-default-title">
            <h2><a :href="item.article_url,item.id | HrefStr" :title="item.title" target="_blank">{{item.title}}</a></h2>
           </div>
           <div class="posts-default-content">
            <div class="posts-text text-overflow-content"  v-html="item.content"></div>
            <div class="posts-default-info">
             <ul>
              <li class="ico-cat"><i class="icon-list-2"></i> <a href="">{{item.type_name}}</a></li>
              <li class="ico-time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{item.create_time}}</li>
              <li class="ico-eye hidden-xs hidden-sm"><i class="fa fa-eye" aria-hidden="true"></i> {{item.browse_num}}</li>
              <li class="ico-like hidden-xs hidden-sm"><i class="fa fa-heart-o" aria-hidden="true"></i> {{item.like_num}}</li>
             </ul>
            </div>
           </div>
          </div>
         </div>
        </div>
      </div>
      <div class="scroll-loading" style="position:relative;text-align:center;display:none">
         <i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size:16px"></i>
         <span>正在加载中...</span>
      </div>
      <div class="clearfix"></div>
      <div id="ajax-load-posts">
          <button  @click="loadMore" class="button button-more wow fadeInUp"><span>加载更多</span><i style="display:none" class="fa fa-spinner fa-pulse"></i></button>
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items:    [],
      limitNum: 3,
    }
  },
  props:{
    contentData:["contentData"],
  },
  created(){

  },
  computed: {
    filtersItems: function() {
      var _this = this;
      return _this.items.slice(0, _this.limitNum);
    },
  },
  mounted: function() {
    var _this = this;
    _this.$nextTick(function() {
       _this.items= _this.contentData;
       var result3 = window.matchMedia('(max-width:768px)');
       if(result3.matches){
         window.addEventListener('scroll', _this.Scrollbottom);
         window.addEventListener('scroll', _this.ScrollTop);
       }
    });
  },
  methods: {
    Scrollbottom: function() {
      var _this = this;
      //下面这句主要是获取网页的总高度，主要是考虑兼容性所以把Ie支持的documentElement也写了，这个方法至少支持IE8
      var htmlHeight=document.body.scrollHeight||document.documentElement.scrollHeight;
      //clientHeight是网页在浏览器中的可视高度，
      var clientHeight= document.documentElement.clientHeight;
      //scrollTop是浏览器滚动条的top位置，
      var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
      //通过判断滚动条的top位置与可视网页之和与整个网页的高度是否相等来决定是否加载内容；
      if(scrollTop+clientHeight==htmlHeight){
          $('.scroll-loading').css('display','block');
          $(".ajax-load-box").animate({ top: -60 });
          $('.scroll-loading').animate({ bottom: 55 });
          if(_this.limitNum >= _this.items.length){
            $('.scroll-loading').find('i').css('display','none');
            $('.scroll-loading').find('span').text('暂时没有更多的文章了啦');
            setTimeout(function(){
              $(".ajax-load-box").animate({top: -25 });
              $('.scroll-loading').animate({ bottom: 0 });
              document.documentElement.scrollTop = document.documentElement.scrollTop - 1;
            },2000);
          }else{
          $('.scroll-loading').find('i').css('display','');
          $('.scroll-loading').find('span').text('正在加载中...');
          setTimeout(function(){
              _this.limitNum = _this.limitNum + 5;
              $(".ajax-load-box").animate({top: -25 });
              $('.scroll-loading').animate({ bottom: 0 });
          },2000);
        }
      }
    },
    ScrollTop: function() {
      var _this = this;
      //下面这句主要是获取网页的总高度，主要是考虑兼容性所以把Ie支持的documentElement也写了，这个方法至少支持IE8
      var htmlHeight=document.body.scrollHeight||document.documentElement.scrollHeight;
      //clientHeight是网页在浏览器中的可视高度，
      var clientHeight= document.documentElement.clientHeight;
      //scrollTop是浏览器滚动条的top位置，
      var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
      //通过判断滚动条的top位置与可视网页之和与整个网页的高度是否相等来决定是否加载内容；
      if(scrollTop==0){
          $('.scroll-loading-top').css('display','');
          $(".ajax-load-box").animate({ top: 25 });
        //  $('.scroll-loading').animate({ bottom: -55 });

        $('.scroll-loading-top').find('i').css('display','');
        //$('.scroll-loading-top').find('span').text('正在加载中...');
        setTimeout(function(){
            _this.limitNum = _this.limitNum + 5;
            $(".ajax-load-box").animate({top: -25 });
              document.documentElement.scrollTop = document.documentElement.scrollTop + 1;
            //$('.scroll-loading').animate({ bottom: 0 });
        },2000);

          // if(_this.limitNum >= _this.items.length){
          //   $('.scroll-loading').find('i').css('display','none');
          //   $('.scroll-loading').find('span').text('暂时没有更多的文章了啦');
          //   setTimeout(function(){
          //     $(".ajax-load-box").animate({top: 25 });
          //     $('.scroll-loading').animate({ bottom: 0 });
          //     document.documentElement.scrollTop = document.documentElement.scrollTop - 1;
          //   },2000);
          // }else{
          // $('.scroll-loading').find('i').css('display','');
          // $('.scroll-loading').find('span').text('正在加载中...');
          // setTimeout(function(){
          //     _this.limitNum = _this.limitNum + 5;
          //     $(".ajax-load-box").animate({top: -25 });
          //     $('.scroll-loading').animate({ bottom: 0 });
          // },2000);
        // }
      }
    },
    //加载更多
    loadMore: function(even) {
      var _this =this;
      var $loadMore = even.currentTarget;
          $loadMore.children[1].style.display='';
      setTimeout(function(){
          _this.limitNum = _this.limitNum + 5;
          $loadMore.children[1].style.display='none';
      },3000);
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
      if (value)
        return value.split("||")[0];
    },
    HrefStr: function(url, id) {
        return url + '&id=' + id;
    },
  }
}
</script>

<style lang="css">
  a:link{
      text-decoration:none;
  }
</style>
