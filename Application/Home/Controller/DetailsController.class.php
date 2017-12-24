<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 2017/3/23
 * Time: 上午11:47
 */

namespace Home\Controller;

use Think\Controller;

class DetailsController extends Controller
{
    public function index($id){
        $ret = D("Article")->BrowseNum($id);
        $this->display();
    }

    public function SearchDetails(){
        $id = $_GET['id'];
        $ret = D("Article")->getArticle($id);
        return exit(json_encode($ret));
    }

    public function getRandArticleList($num){
        $ret = D("Article")->getRandArticleList($num);
        return exit(json_encode($ret));
    }

    public function getArticleNextAndUp($id){
       $ret = D("Article")->getArticleNextAndUp($id);
        return exit(json_encode($ret));
    }
}
