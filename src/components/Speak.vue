<template lang="html" id="limit">
  <div id="page-content">
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

export default {
  data() {
    return {
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
      $.get('index.php?c=Index&a=getTypeArticleList', {type_name: '讲道理'}, function(ret) {
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

<style lang="css">
</style>
