<template lang="html">
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
             <a href="#">
               <i class="fa fa-gg" aria-hidden="true"></i>
               <cite>文章管理</cite>
             </a>
           </dd>
           <dd>
             <a href="#">
               <i class="fa fa-chain-broken" aria-hidden="true"></i>
               <cite>文章回收站</cite>
             </a>
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
  var he = document.documentElement.clientHeight ;
  $(".ity-content-left").height(he-60);

  $(".ity-nav-child a").on('click',function(){
      var _this = $(this);
      $(".ity-nav-child a").css("background-color","#393D49");
     _this.css('background-color','#009688');
  });
});
export default {

}
</script>

<style lang="css">
</style>
