<template>
  <div id="app">
      <div class="ity-content">
         <div class="ity-content-left">
           <div class="ity-side-scroll">
              <ul class="ity-nav">
                <li class="ity-nav-item">
                  <a href="javascript:;" class="ity-nav-item-title">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                    <cite>内容管理</cite>
                    <i class="fa fa-sort-asc ity-sort" aria-hidden="true"></i>
                  </a>
                  <dl class="ity-nav-child">
                    <dd>
                       <router-link :to="{path:'/ArticleManager',query:{id:0}}">
                          <i class="fa fa-gg" aria-hidden="true"></i>
                          <cite>文章管理</cite>
                       </router-link>
                    </dd>
                    <dd>
                       <router-link :to="{path:'/ArticleRecycling',query:{id:1}}">
                          <i class="fa fa-chain-broken" aria-hidden="true"></i>
                          <cite>文章回收站</cite>
                       </router-link>
                    </dd>
                  </dl>
                </li>
                <li class="ity-nav-item" >
                  <a href="javascript:;" class="ity-nav-item-title">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                    <cite>内容管理</cite>
                    <i class="fa fa-sort-desc ity-sort" aria-hidden="true"></i>
                  </a>
                  <dl class="ity-nav-child" style="display:none">
                    <dd>
                      <a href="javascript:;">
                        <i class="fa fa-gg" aria-hidden="true"></i>
                        <cite>文章管理</cite>
                      </a>
                    </dd>
                    <dd>
                      <a href="javascript:;">
                        <i class="fa fa-chain-broken" aria-hidden="true"></i>
                        <cite>文章回收站</cite>
                      </a>
                    </dd>
                  </dl>
                </li>
              </ul>
           </div>
         </div>
         <div class="ity-content-right">
           <div class="ity-contetn">
              <ul class="ity-contetn-ul">
                 <li class="ity-content-li ity-sel">
                   <i class="fa fa-bicycle" aria-hidden="true"></i>
                   <cite>控制面板</cite>
                 </li>
                 <li class="ity-content-li">
                   <i class="fa fa-bicycle" aria-hidden="true"></i>
                   <cite>文章管理</cite>
                   <i class="fa fa-times ity-close" aria-hidden="true"></i>
                 </li>
              </ul>
              <div class="ity-content-div">
                  <router-view></router-view>
              </div>
           </div>
         </div>
      </div>
  </div>
</template>

<script>
$(function(){
  $(".ity-nav-item-title").on('click',function(){
    var _this = $(this);
      $(".ity-nav-item-title").css('background-color','#393D49')
      //  _this.find('.ity-sort').removeClass('fa-sort-desc').addClass('fa-sort-asc');
      $(this).next().toggle(
        function(oEvent){
            _this.css('background-color','#2b2e37');
        }
      );
      if(_this.find('.ity-sort').hasClass('fa-sort-asc')){
         _this.find('.ity-sort').removeClass('fa-sort-asc').addClass('fa-sort-desc');
      }else{
         _this.find('.ity-sort').removeClass('fa-sort-desc').addClass('fa-sort-asc');
      }
  });
  var he = document.documentElement.clientHeight;
  $(".ity-content-left").height(he-60);

  $(".ity-nav-child a").on('click',function(){
      var _this = $(this);
      $(".ity-nav-child a").css("background-color","#393D49");
     _this.css('background-color','#009688');
  });
});
export default {
  created: function() {
    // var id = this.$route.query.id;
    // console.log(id);
  },
  watch: {
        '$route' (to, from) {
            console.log(this.$route.query.id)
        }
    },
}
</script>

<style lang="css">
</style>
