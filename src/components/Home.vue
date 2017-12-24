<template>
  <div id="page-content">
      <!-- <div class="loader-mask">
       <div class="bike bikeAni"></div>
       <span style="position: absolute;top: 50%;left: 50%;white-space: nowrap;margin-left: -100px;"> 威哥正在去硅谷的路上为您拼命加载.....</span>
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
      <div class="main-content">
       <div class="container">
        <div class="row">
            <div class="article col-xs-12 col-sm-8 col-md-8 mobile-scroll-div" >
               <Content :contentData="contentData" v-if="contentData"></Content>
            </div>
            <div class="sidebar col-xs-12 col-sm-4 col-md-4">
                <NewsFollowRecommend></NewsFollowRecommend>
            </div>
        </div>
       </div>
      </div>
    </div>
</template>

<script>
import Vue from 'vue'
import Content from '../components/Common/Contents.vue'
import NewsFollowRecommend from '../components/Common/NewsFollowRecommend.vue'

Vue.prototype.HtmlContentSub = function(value) {
  return value + "&hellip;";
}
export default {
  data() {
    return {
      items: [],
      recommends: [],
      newArticles: [],
      contentData:[]
    }
  },
  components:{
     NewsFollowRecommend,
     Content
  },
  mounted: function() {
    var _this = this;
    _this.Init();
  },
  computed: {

  },
  methods: {
    Init: function() {
      var _this = this;
      $.get('index.php?c=Index&a=getArticleList', null, function(ret) {
        if (ret) {
          for (var i = 0; i < ret.length; i++) {
            setTimeout(function() {
              $('.loader-mask').css('display', 'none');
            }, 1000);

            _this.contentData.push(ret[i]);
          }
        }
      }, "JSON");
    },
  },
}
</script>
