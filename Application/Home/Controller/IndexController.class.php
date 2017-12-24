<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function getArticleList(){
          $ret = D("Article")->getArticleList();
          return exit(json_encode($ret));
    }

    public function getBrowserNumArticleList($num){
      $ret = D("Article")->getBrowserNumArticleList($num);
      return exit(json_encode($ret));
    }

    public function getNewArticleList(){
      $ret = D("Article")->getNewArticleList();
      return exit(json_encode($ret));
    }

    public function getTypeArticleList($type_name){
      $ret = D("Article")->getTypeArticleList($type_name);
      return exit(json_encode($ret));
    }

    public function LikeArticleAdd($id){
      $ret = D("Article")->LikeArticleAdd($id);
      return exit(json_encode($ret));
    }

    public function LikeArticleMinus($id){
      $ret = D("Article")->LikeArticleMinus($id);
      return exit(json_encode($ret));
    }
 
    public function InsertIpAddrss($ip,$name){
      $data = array();
      $data['ip'] = $ip;
      $data['ipname'] = $name;
      $data['ip_time'] = date('Y-m-d H:i:s',time());
      $ret = D("IpAddrss")->InsertIpAddrss($data);
      return exit(json_encode($ret));
    }

}
