

<template>
<div id="app">
  <div id="header" class="navbar-fixed-top">
    <div class="container">
      <h1 class="logo">
        <a href="index.php" title="GRACE" style="background-image: url(/static/images/logo.png);" /></a>
      </h1>
      <div role="navigation" class="site-nav  primary-menu">
        <div class="menu-fix-box">
          <ul id="menu-navigation" class="menu">
            <li>
               <router-link to='/Home'>首页</router-link>
            </li>
            <li>
                <router-link to='/Limit'>学无止境</router-link>
            </li>
            <li>
                <router-link to='/LiveLearn'>慢生活</router-link>
            </li>
            <li>
                <router-link to='/Speak'> 创业之路</router-link>
            </li>
            <li>
                <router-link to='/About'>人气文章排行榜</router-link>
            </li>
            <li>
                <router-link to='/PlaceFile'>年度归档</router-link>
            </li>
          </ul>
        </div>
      </div>
      <div class="bottom-nav">
        <div class="bottom-nav-div">
            <router-link to='/Home' class="bottom-nav-item" >
              <i class="fa fa-home" aria-hidden="true"></i>
              <span>首页</span>
            </router-link>
            <router-link to='/Limit' class="bottom-nav-item" >
                <i class="fa fa-hacker-news" aria-hidden="true"></i>
              <span>学</span>
            </router-link>
            <router-link to='/LiveLearn' class="bottom-nav-item" >
                <i class="fa fa-yelp" aria-hidden="true"></i>
              <span>生</span>
            </router-link>
            <router-link to='/Speak' class="bottom-nav-item" >
                <i class="fa fa-child" aria-hidden="true"></i>
              <span>创</span>
            </router-link>
            <router-link to='/About' class="bottom-nav-item" >
                <i class="fa fa-heart" aria-hidden="true"></i>
              <span>Like</span>
            </router-link>
        </div>
      </div>
    </div>
  </div>

  <router-view></router-view>

  <div class="clearfix"></div>
  <div id="footer" class="two-s-footer clearfix">
    <div class="footer-box">
      <div class="container">
        <div class="social-footer">
          <a id="tooltip-f-weixin" class="wxii" href="javascript:void(0);"><i class="fa fa-weixin" aria-hidden="true"></i></a>
        </div>
        <div class="nav-footer">
             <router-link to='/Home'>首页</router-link>
             <router-link to='/Limit'>学无止境</router-link>
             <router-link to='/LiveLearn'>慢生活</router-link>
             <router-link to='/Speak'>讲道理</router-link>
        </div>
        <div class="copyright-footer">
          <p>
            Copyright © 2017 <a class="site-link" href="" title="GRACE" rel="home">IT</a> · <a href="" target="_blank">itYoung</a>
          </p>
        </div>
        <div class="links-footer">
          <span>友情链接：</span>
          <a href="" title="" target="_blank">等待极客们到来</a>
          <a href="" target="_blank"></a>
          <a href="" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
  <div class="search-form">
    <form method="get" action="" role="search">
      <div class="search-form-inner">
        <div class="search-form-box">
          <input class="form-search" type="text" name="s" placeholder="键入搜索关键词">
          <button type="submit" id="btn-search"><i class="icon-search"></i> </button>
        </div>
        <div class="search-commend">
          <h4>大家都在搜</h4>
          <ul>
            <li><a href="http://grace.wpbyg.com/?s=科技">科技</a></li>
            <li><a href="http://grace.wpbyg.com/?s=生物">生物</a></li>
            <li><a href="http://grace.wpbyg.com/?s=计算机">计算机</a></li>
          </ul>
        </div>
      </div>
    </form>
    <div class="close-search">
      <span class="close-top"></span>
      <span class="close-bottom"></span>
    </div>
  </div>
</div>
</template>
<script>

export default {
  data() {
     
  },
  components:{
    
  },
  mounted:function(){
    this.IpAddrss();
  },

  methods: {
    IpAddrss:function(){
      var url = 'index.php?c=Index&a=InsertIpAddrss';
      var datas  =  {
        ip:returnCitySN["cip"],
        ipname:returnCitySN["cname"]
      }
      $.post(url,{ip:returnCitySN["cip"],name:returnCitySN["cname"]},function(ret){
          console.log(ret);
      },"JSON");
    }
  }
}
</script>
