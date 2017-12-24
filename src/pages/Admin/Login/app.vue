<template>
  <div id="app">
      <section class="logo-container">
          <section class="logo-from">
              <h1>Welcome .Please Login</h1>
              <input class="ity-input" type="text" name="" value="" placeholder="UserName">
              <input class="ity-input" type="password" name="" value="" placeholder="Password">
              <button class="ity-btn" type="button" @click="Login()" name="button"><i style="font-size:10px;"></i>Sign in</button>
          </section>
          <section class="logo-from-sm">
              <h1>Welcome.Login itYoung</h1>
              <input class="ity-input" type="text" name="" value="itYoung" placeholder="UserName" ref="userName">
              <input class="ity-input" type="password" name="" value="123456" placeholder="Password" ref="passWord">
              <button class="ity-btn" type="button" name="button" @click="Login()"><i style="font-size:10px;"></i>Sign in</button>
          </section>
      </section>
  </div>
</template>

<script>
export default {
  data() {

  },
  methods: {
    Login:function () {
      let userName= this.$refs.userName.value,passWord = this.$refs.passWord.value;
      if(userName=='itYoung' && passWord =='123456'){
        $('.ity-btn').find('i').addClass('fa fa-spinner fa-spin fa-3x fa-fw');
        setTimeout(function(){
           window.location.href='admin.php/Index/index';
        },2000);
      }
    }
  }
}
</script>
<style media="screen">
    .logo-container{
      width: 100%;
      height: 100%;
    }
    .logo-from{
      position: absolute;
      width: 400px;
      height: 400px;
      left: 50%;
      top: 50%;
      margin-left: -200px;
      margin-top:-200px;
    }
    .logo-from h1,.logo-from-sm h1{
    	font-size: 20px;
    	color: #fff;
    	font-family: 'Arial';
    	font-weight: normal;
    }

    .ity-input{
    	border:0 none;
    	border-bottom: 1px dotted #fff;
    	background-color: transparent !important;
    	width: 100%;
    	height: 50px;
    	color: #fff;
    	padding-left: 15px;
    }

    .ity-btn{
    	width:80px;
    	height: 40px;
    	background-color: #fff;
    	border: 0 none;
    	margin-top: 10px;
    	float: right;
    	color:#5D92BA;
    }
    .logo-from-sm{
    	visibility: hidden;
    }
    @media screen and (max-width:768px){
      /*admin*/
      .logo-from-sm{
        padding: 20px;
        position: absolute;
        width: 100%;
        height: 220px;
        top: 50%;
        margin-top:-110px;
        visibility: visible !important;
      }
      .logo-from{
        display: none;
      }
    }


</style>
