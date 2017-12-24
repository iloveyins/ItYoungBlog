<template lang="html">
  <div class="page-single">
      <!-- <div class="page-title" style="background-image:url(/static/images/222-2-1920x1080.jpg);">
          <div class="container">
              <h1 class="title">
                  年度归档
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
      <div class="container">
          <div class="page-content">
              <div class="mod-archive" v-for="(item,key) in array">
                  <div id="2015" class="mod-archive-year" >{{key}}</div>
                  <ul class="mod-archive-list" v-for ="(list,key) in item">
                      <li>
                        <time class="mod-archive-time" datetime="" >{{list.time}}</time>
                        <span title="浏览量"><i  class="fa fa-eye" aria-hidden="true"></i>{{list.bornum}}</span>
                        <a href="" title="" >{{list.title}}</a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="clear"></div>
      </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      array : {}
    }
  },
  mounted:function(){
    this.$nextTick(function() {
      this.Init();
    })
  },
  methods:{
    Init: function() {
      var _this = this;
      $.get('index.php?c=Index&a=getArticleList', null, function(ret) {
        if (ret) {
          var $array  = {};
          for (var i = 0; i < ret.length; i++) {
              var year =  ret[i].create_time.substr(0,4);
              if($array[year] == undefined){
                  $array[year] = [{
                    time: ret[i].create_time.substr(5,5),
                    title: ret[i].title,
                    bornum:ret[i].browse_num
                  }]
              } else {
                $array[year].push ({
                  time: ret[i].create_time.substr(5,5),
                  title: ret[i].title,
                  bornum:ret[i].browse_num
                })
              }
          }
          setTimeout(function() {
            $('.loader-mask').css('display', 'none');
          }, 900);
          _this.array = $array;
        }
      }, "JSON");
    },
  },
}
</script>

<style lang="css">
</style>
