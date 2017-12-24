<?php

namespace Home\Controller;

use Think\Controller;

/*
  文章评论控制器
*/
class CommonController extends Controller{

  public function InsertCommon($array){
      $ret = D("Common")->InsertCommon($array);
      return exit(json_encode($ret));
  }

  public function getArticleIdCommonList($id){
    $ret = D("Common")->getArticleIdCommonList($id);
    return exit(json_encode($ret));
  }

}
