<template lang="html">
  <div id="page-content">
      <div class="container">
          <div class="row">
              <div class="article col-xs-12 col-sm-8 col-md-8">
                  <div class="post-timthumb">
                      <img style="width:100%;height:100%" :src="ArticleItem.img_url | ImgSplit" alt="">
                      <h1>{{ArticleItem.title}}</h1>
                  </div>
                  <div class="post">
                      <div class="post-title">
                          <div class="post_icon">
                              <span class="postauthor" v-if="ArticleItem.author == 'itYoung' ">
                                <img src="/static/images/timg.jpg" class='avatar avatar-96 photo' height='96' width='96'  />
                                <a href="index.php">itYoung</a></span>
                              <span class="postoriginal" v-if="ArticleItem.author == 'itYoung' "><i class="icon-cc-1"></i>原创</span>
                              <span class="postcat"><i class=" icon-list-2"></i> <a href="">{{ArticleItem.type_name}}</a></span>
                              <span class="postclock"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ArticleItem.create_time}}</span>
                              <span class="posteye"><i class="fa fa-eye" aria-hidden="true" title="浏览量"></i> {{ArticleItem.browse_num}}</span>
                              <span class="postcomment"><i class="fa fa-commenting-o" aria-hidden="true" title="评论"></i> {{commonlist.length}}</span>
                              <span class="postlike"><i class="fa fa-heart-o" aria-hidden="true" title="喜欢"></i> {{ArticleItem.like_num}}</span>
                          </div>
                      </div>
                      <div class="post-content" v-html="ArticleItem.content">

                      </div>
                      <div class="post-declare" v-if="ArticleItem.author == 'itYoung' ">
                          <p>原创文章，作者：<a href="">ArticleItem.author</a>，如若转载，请注明出处：{{ArticleItem.title}}http://www.ityoung.cn</p>
                      </div>
                      <div class="post-options  clearfix">
                          <a href="javascript:;"  :data-id="ArticleItem.id" id="Addlike" class="action btn-likes like" title="喜欢">
                              <span class="icon s-like">
                                <i class="icon-heart"></i>
                                <i class="icon-heart-filled"></i> 喜欢 </span>
                              (<span class="count num">{{ArticleItem.like_num}}</span>)
                          </a>
                          <div class="su-dropdown socialdropdown">
                              <a href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="J_showAllShareBtn">
                              <i class="fa fa-share-alt" aria-hidden="true"></i>
                              </a>
                              <div class="su-dropbox action-share bdsha rebuttonbox" aria-labelledby="social">
                                  <a class="bds_tsina icon-weibo" data-cmd="tsina">
                                    <i class="fa fa-weibo" aria-hidden="true"></i>
                                      <span>微博</span>
                                  </a><a class="bds_weixin icon-wechat" data-cmd="weixin">
                                    <i class="fa fa-weixin" aria-hidden="true"></i>
                                      <span>微信</span>
                                  </a><a class="bds_sqq icon-qq" data-cmd="sqq">
                                    <i class="fa fa-qq" aria-hidden="true"></i>
                                    <span>QQ好友</span></a>
                                  <a class="share-links bds_more icon-plus-1" data-cmd="more">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                      <span>更多</span>
                                  </a>
                              </div>
                          </div>
                      </div>
                      <div class="next-prev-posts clearfix">
                          <div class="prev-post" style="width:100%;" v-if="ready.img_url != '' ">
                              <a :href="ready.article_url,ready.id | HrefStr" v-bind:style="{ backgroundImage:'url(' + ready.img_url + ')'}"  title="" target="_blank" class="prev has-background" alt="">
                              <span>下一篇</span><h4>{{ready.title}}</h4> </a>
                          </div>
                      </div>
                  </div>
                  <div class="related-post">
                      <h3><span>猜你喜欢</span></h3>
                      <ul >
                          <li v-for="item in randArticles">
                              <div class="item">
                                  <a :href="item.article_url,item.id | HrefStr" :title="item.title">
                                      <div class="overlay"></div>
                                      <img class="lazy thumbnail" data-original="" :src="item.img_url | ImgSplit" alt="" /> <h4>
                                        <span>{{item.title}}</span></h4>
                                  </a>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="clear"></div>
                  <div id="comments" class="clearfix">
                      <div class="comments-box">
                          <h3 class="comments-title">全部评论：<span class="comments-num">{{commonlist.length}}条</span></h3>
                          <div id="loading-comments">
                            <span><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size:16px"></i> 加载中...</span>
                          </div>
                          <ol class="commentlist" v-for="item in filtersCommonlist">
                              <li class="comment odd alt thread-odd thread-alt depth-1" id="li-comment-68">
                                  <div id="comment-68">
                                      <div class="comment-avatar">
                                          <img alt="" src="" data-original="" srcset="" class="avatar avatar-96 photo" height="96" width="96" />
                                      </div>
                                      <div class="comment-body">
                                          <div class="comment_author">
                                              <span class="name"><a target="_blank" href="" rel="external nofollow" class="url">{{item.nick}}</a></span>
                                              <em>{{item.common_time}}</em>
                                          </div>
                                          <div class="comment-text" v-html="item.content">
                                          </div>
                                          <div class="comment_reply">
                                              <!-- <span> <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label="">回复</a> </span> -->
                                          </div>
                                      </div>
                                  </div>
                                  <ul class="children" v-if="false">
                                      <li class="comment byuser comment-author-suxing bypostauthor even depth-2" id="li-comment-233">
                                          <div id="comment-233">
                                              <div class="comment-avatar">
                                                  <img alt="" src="" data-original="" srcset="" class="avatar avatar-96 photo" height="96" width="96" />
                                              </div>
                                              <div class="comment-body">
                                                  <div class="comment_author">
                                                      <span class="name">suxing</span>
                                                      <span class="comment_admin">官方</span>
                                                      <em>2017-03-10 18:12</em>
                                                  </div>
                                                  <div class="comment-text">
                                                      <p>灌灌灌灌</p>
                                                  </div>
                                                  <div class="comment_reply">
                                                      <span> <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label="回复给suxing">回复</a> </span>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="comment byuser comment-author-suxing bypostauthor odd alt depth-2" id="li-comment-240">
                                          <div id="comment-240">
                                              <div class="comment-avatar">
                                                  <img alt="" src="" data-original="" srcset="" class="avatar avatar-96 photo" height="96" width="96" />
                                              </div>
                                              <div class="comment-body">
                                                  <div class="comment_author">
                                                      <span class="name">suxing</span>
                                                      <span class="comment_admin">官方</span>
                                                      <em>2017-08-13 00:40</em>
                                                  </div>
                                                  <div class="comment-text">
                                                      <p>测试</p>
                                                  </div>
                                                  <div class="comment_reply">
                                                      <span> <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label="回复给suxing">回复</a> </span>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                                  <!-- .children -->
                              </li>
                          </ol>
                          <!-- .comment-list -->
                          <div id="comments-navi" >
                              <!-- <a class="prev page-numbers"><i class="fa fa-angle-left" aria-hidden="true"></i></a> -->
                              <span class="page-numbers" v-if="commonlist.length > showItem" v-bind:class="{current:index==selected}"  @click="pageIndexs(index+1)" v-for="(item,index) in filtersPageCommon">{{index+1}}</span>
                              <!-- <a class="prev page-numbers"><i class="fa fa-angle-right" aria-hidden="true"></i></a> -->
                          </div>
                      </div>
                      <div id="respond" class="respond-box">
                          <h3 class="comments-title">发表评论 <span id="cancel-comment-reply"><a rel="nofollow" id="cancel-comment-reply-link"
                            href="/901.html#respond" style="display:none;">点击这里取消回复。</a></span></h3>
                          <form @submit.prevent="submit" action="" method="post" id="commentform">
                              <div id="comment-author-info" class="clearfix">
                                  <div class="comment-md-3">
                                      <label for="author">昵称<span class="required">*</span></label>
                                      <input  type="text" name="author" id="author" v-model="common.nick" class="comment-md-9" value="" size="22" tabindex="1" />
                                  </div>
                                  <div class="comment-md-3">
                                      <label for="email">邮箱<span class="required">*</span></label>
                                      <input type="email" name="email" id="email" v-model="common.email" class="comment-md-9" value="" size="30" tabindex="2" />
                                  </div>
                                  <div class="comment-md-3 comment-form-url">
                                      <label for="url">网址<span class="required"></span></label>
                                      <input type="text" name="url" id="url" v-model="common.web_url" class="comment-md-9" value="" size="30" tabindex="3" />
                                  </div>
                              </div>
                              <div class="comment-from-main clearfix">
                                  <div class="comment-form-textarea">
                                      <div class="comment-textarea-box">
                                        <textarea id="comment"  class="comment-textarea" name="comment"   placeholder="说点什么吧..." autofocus></textarea>
                                      </div>
                                  </div>
                                  <div class="form-submit">
                                      <button id="smilies" class="smilies" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-smile-o" aria-hidden="true" title="表情"></i> </button>
                                      <div class="dropdown-menu dropdown-menu-left comment-form-smilies" aria-labelledby="smilies">
                                          <div class="smilies-box" v-html="commImg">

                                          </div>
                                      </div>
                                      <input class="btn-comment pull-right" name="submit" type="submit"  id="submit"  tabindex="5" value="发表评论" />
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="sidebar col-xs-12 col-sm-4 col-md-4">
                  <div class="widget suxingme_post_author">
                      <div class="authors_profile">
                          <div class="avatar-panel">
                              <a target="_blank" href="" title="suxing" class="author_pic">
                                <img alt="" src="/static/images/timg.jpg" data-original="" srcset="" class="avatar avatar-80 photo" height="80" width="80" /> </a>
                          </div>
                          <div class="author_name">
                              <a target="_blank" href="" title="itYoung">itYoung</a>
                              <span>官方</span>
                          </div>
                          <p class="author_dec">人之所有能，是因相信能</p>
                      </div>
                  </div>
                  <NewsFollowRecommend></NewsFollowRecommend>
                  <!-- <div class="widget widget_suxingme_comment" style="display:none">
                    <h3> <span>最新评论</span> </h3>
                    <ul class="w_comment">
                     <li>
                      <div class="message">
                       <a href="" title="发表在： 苹果将赞助明年Met Ball，首席设计官乔纳森和Taylor Swift同台碰撞科技与时尚" class="comment_t">这是评论！~~ <img src="http://grace.iwpzt.com/wp-content/themes/Grace/includes/wp-alu/static/img/icon_arrow.gif" alt=":arrow:" class="wp-smiley" style="height: 1em; max-height: 1em;" /></a>
                      </div>
                      <div class="clearfix meta">
                       <div class="avatar">
                        <img alt="" src="http://cdn.v2ex.com/gravatar/d8f8c051596b606f7af278abc1bcfb28?s=96&amp;d=mm&amp;r=g" data-original="http://cdn.v2ex.com/gravatar/d8f8c051596b606f7af278abc1bcfb28?s=96&amp;d=mm&amp;r=g" srcset="http://cdn.v2ex.com/gravatar/d8f8c051596b606f7af278abc1bcfb28?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" height="96" width="96" style="display: block;" />
                       </div>
                       <a href="" title=" 在： 苹果将赞助明年Met Ball，首席设计官乔纳森和Taylor Swift同台碰撞科技与时尚" class="link">猫脸 评 苹果将赞助明年Met Ball，首席设计官乔纳森和Taylor Swift同台碰撞科技与时尚 </a>
                      </div></li>
                     <li>
                      <div class="message">
                       <a href="" title="发表在： 互联网征信，下一个“风口”诞生互联网金融的BAT" class="comment_t"> <img src="http://grace.iwpzt.com/wp-content/themes/Grace/includes/wp-alu/static/img/icon_neutral.gif" alt=":neutral:" class="wp-smiley" style="height: 1em; max-height: 1em;" /> 666厉害了</a>
                      </div>
                      <div class="clearfix meta">
                       <div class="avatar">
                        <img alt="" src="http://cdn.v2ex.com/gravatar/10beb430c93591c14b0a7d73d831225d?s=96&amp;d=mm&amp;r=g" data-original="http://cdn.v2ex.com/gravatar/10beb430c93591c14b0a7d73d831225d?s=96&amp;d=mm&amp;r=g" srcset="http://cdn.v2ex.com/gravatar/10beb430c93591c14b0a7d73d831225d?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" height="96" width="96" style="display: block;" />
                       </div>
                       <a href="http://grace.iwpzt.com/909.html#comment-281" title=" 在： 互联网征信，下一个“风口”诞生互联网金融的BAT" class="link">孙志强 评 互联网征信，下一个“风口”诞生互联网金融的BAT</a>
                      </div></li>
                     <li>
                      <div class="message">
                       <a href="http://grace.iwpzt.com/901.html#comment-280" title="发表在： 视频公司 Netflix 又办了一场黑客比赛，开了很多脑洞" class="comment_t">主题很强大:mrgreen: <img src="http://grace.iwpzt.com/wp-content/themes/Grace/includes/wp-alu/static/img/icon_mrgreen.gif" alt=":mrgreen:" class="wp-smiley" style="height: 1em; max-height: 1em;" /></a>
                      </div>
                      <div class="clearfix meta">
                       <div class="avatar">
                        <img alt="" src="http://cdn.v2ex.com/gravatar/af2f0f3ab1f7b01462737a0f60c40e8b?s=96&amp;d=mm&amp;r=g" data-original="http://cdn.v2ex.com/gravatar/af2f0f3ab1f7b01462737a0f60c40e8b?s=96&amp;d=mm&amp;r=g" srcset="http://cdn.v2ex.com/gravatar/af2f0f3ab1f7b01462737a0f60c40e8b?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" height="96" width="96" style="display: block;" />
                       </div>
                       <a href="http://grace.iwpzt.com/901.html#comment-280" title=" 在： 视频公司 Netflix 又办了一场黑客比赛，开了很多脑洞" class="link">小谈家的猫 评 视频公司 Netflix 又办了一场黑客比赛，开了很多脑洞</a>
                      </div></li>
                     <li>
                      <div class="message">
                       <a href="http://grace.iwpzt.com/901.html#comment-277" title="发表在： 视频公司 Netflix 又办了一场黑客比赛，开了很多脑洞" class="comment_t">我问问</a>
                      </div>
                      <div class="clearfix meta">
                       <div class="avatar">
                        <img alt="" src="http://cdn.v2ex.com/gravatar/44ff3f7d74ff3aa94db90fa37392ce63?s=96&amp;d=mm&amp;r=g" data-original="http://cdn.v2ex.com/gravatar/44ff3f7d74ff3aa94db90fa37392ce63?s=96&amp;d=mm&amp;r=g" srcset="http://cdn.v2ex.com/gravatar/44ff3f7d74ff3aa94db90fa37392ce63?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" height="96" width="96" style="display: block;" />
                       </div>
                       <a href="http://grace.iwpzt.com/901.html#comment-277" title=" 在： 视频公司 Netflix 又办了一场黑客比赛，开了很多脑洞" class="link">heh 评 视频公司 Netflix 又办了一场黑客比赛，开了很多脑洞</a>
                      </div></li>
                     <li>
                      <div class="message">
                       <a href="http://grace.iwpzt.com/1018.html#comment-271" title="发表在： Uber、Facebook、Pinterest等都是用什么发展模式实现增长的？" class="comment_t">十分 <img src="http://grace.iwpzt.com/wp-content/themes/Grace/includes/wp-alu/static/img/icon_question.gif" alt=":?:" class="wp-smiley" style="height: 1em; max-height: 1em;" /></a>
                      </div>
                      <div class="clearfix meta">
                       <div class="avatar">
                        <img alt="" src="http://cdn.v2ex.com/gravatar/82367e890506834cb869dd8b38f5001f?s=96&amp;d=mm&amp;r=g" data-original="http://cdn.v2ex.com/gravatar/82367e890506834cb869dd8b38f5001f?s=96&amp;d=mm&amp;r=g" srcset="http://cdn.v2ex.com/gravatar/82367e890506834cb869dd8b38f5001f?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" height="96" width="96" style="display: block;" />
                       </div>
                       <a href="http://grace.iwpzt.com/1018.html#comment-271" title=" 在： Uber、Facebook、Pinterest等都是用什么发展模式实现增长的？" class="link">hhjkkkk 评 Uber、Facebook、Pinterest等都是用什么发展模式实现增长的？ </a>
                      </div></li>
                    </ul>
                   </div> -->
              </div>
          </div>
      </div>
  </div>
</template>

<script>
$(function(){
  $(".comment-form-smilies a").on('click',function(){
    if(!$(".simditor-placeholder").is(":hidden")){
      $(".simditor-placeholder").hide();
      $(".simditor-body").find('p').html('');
    }
    $(".simditor-body").find('p:last').append($(this).data("smilies"));
  });
});

import NewsFollowRecommend from '../components/Common/NewsFollowRecommend.vue'
export default {
  data() {
    return {
      ArticleItem: {},
      randArticles: [],
      ready:{},
      commonlist:[],
      selected:"-1",
      pageIndex:0,
      pageSize:5,
      current: 1,
      showItem:5,
      allpage:0,
      common:{
        articleId:'',
        url:'',
        email:'',
        nick:'',
        content:''
      },
      commImg:'',
      editor:null
    }
  },

  components:{
     NewsFollowRecommend
  },

  computed: {
    filtersCommonlist: function(){
      var _this = this;
      return _this.commonlist.slice(_this.pageIndex, _this.pageSize);
    },

    filtersPageCommon: function() {
      var pag =[];
      var PageNum =  Math.ceil(this.allpage / this.showItem);
      return PageNum;
    }
  },

  mounted: function() {
    this.Init();
    this.RandArticle(6);
    this.Ready();
    this.CommImg();
    this.pageIndexs(1);
  },
  methods: {
    Init: function() {
      var _this = this;
      var id = getUrlParam('id');
      $.get('index.php?c=Details&a=SearchDetails', {
        id: id
      }, function(ret) {
        _this.ArticleItem = ret[0];
        _this.getCommon();
      }, "JSON");

        //评论输入框初始化
        this.editor = new Simditor({
        textarea: $('#comment'),
        toolbar:false,
      });
    },
    pageIndexs:function(a){
      var _this = this;
       $(".commentlist").slideUp(550);
       $('#loading-comments').slideDown();
      setTimeout(function(){
        _this.selected = a-1;
        _this.pageIndex = _this.showItem * (a-1);
        _this.pageSize =_this.showItem * a;
        $('#loading-comments').slideUp(550);
        $(".commentlist").slideDown();
      },1500);
    },

    //评论表情图片加载
    CommImg:function(){
        var imgStr ="";
        for (var i = 0; i <= 104; i++) {
        var img="https://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/"+i+".gif";
            imgStr+='<a class="add-smily" data-action="addSmily" data-smilies="<img src='+img+'>" ><img class="wp-smiley" src="https://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/'+i+'.gif" /></a>';
        }
        this.commImg = imgStr;
    },

    //随机文章
    RandArticle: function($num) {
      var _this = this;
      $.get('index.php?c=Details&a=getRandArticleList', {
        num: $num
      }, function(ret) {
        if (ret) {
          for (var i = 0; i < ret.length; i++) {
            _this.randArticles.push(ret[i]);
          }
        }
      }, "JSON");
    },
    //上一篇或者下一篇
    Ready:function(){
      var _this = this;
      var id = getUrlParam('id');
      $.get('index.php?c=Details&a=getArticleNextAndUp', {
        id : id
      }, function(ret) {
        _this.ready = ret[0];
      }, "JSON");
    },

    //提交评论
    submit:function(event){
      var _this = this;
      _this.common.article_id = _this.ArticleItem.id;
      _this.common.content    = _this.editor.getValue();
      if(_this.common.content != ''){
        var formData = _this.common;
        $.post('index.php?c=Common&a=InsertCommon',{ array : formData },function(ret){
           if(ret != null){
              _this.getCommon();
              _this.editor.setValue('');
           }
        },'JSON');
      }else {
         alert('不能为空');
      }
    },

    //获取文章评论信息
    getCommon:function(){
      var _this = this;
      var id    = _this.ArticleItem.id;
      $.get('index.php?c=Common&a=getArticleIdCommonList',{ id : id },function(ret){
          _this.commonlist = ret;
          _this.allpage    = ret.length;//获取评论总数量
      },'JSON');
    },

    //微信公众号
    weixin:function(){
      $('.f-weixin-dropdown').toggleClass('is-visible');
    }
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
</style>
