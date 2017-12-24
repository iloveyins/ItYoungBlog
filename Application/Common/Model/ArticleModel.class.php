<?php
/**
 * 文章
 * User: Trasen
 * Date: 2017/5/22
 * Time: 13:07
 */

namespace Common\Model;
use Think\Model;

class ArticleModel extends Model{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('article');
    }

    //获取文章信息
    public function getArticleList(){
        $ret = $this->_db->order('create_time desc')->select();
        return $ret;
    }

    //获取文章信息
    public function getArticle($Id){
        $ret = $this->_db->where('id='.$Id)->select();
        return $ret;
    }

    //获取浏览量最多文章
    public function getBrowserNumArticleList($num){
        $ret = $this->_db->order('browse_num desc')->limit($num)->select();
        return $ret;
    }

    //随机获取文章
    public function getRandArticleList($num){
        $ret = $this->_db->limit($num)->order('rand() desc')->select();
        return $ret;
    }

    //获取最新文章
    public function getNewArticleList(){
        $ret = $this->_db->order('create_time desc')->limit(5)->select();
        return $ret;
    }

    //获取类型文章
    public function getTypeArticleList($type_name){
        $ret = $this->_db->where('type_name='."'".$type_name."'")->select();
        return $ret;
    }
    //获取上一篇或者下一篇
    public function getArticleNextAndUp($id){
        $ret = $this->_db->where(' id = (select id from t_article where id < '.$id.' order by create_time desc limit 1)')->select();
        $ret[0][img_url] = explode('||', $ret[0][img_url])[0];
        return $ret;
    }

    //LIKE
    public function LikeArticleAdd($id){
          return $this->_db->where("id=".$id)->setInc('like_num');
    }
    
    public function LikeArticleMinus($id){
          return $this->_db->where("id=".$id)->setDec('like_num');
    }

    //browse_num
    public function BrowseNum($id){
        return $this->_db->where("id=".$id)->setInc("browse_num");
    }

    //添加文章
    public function insertAricle($data=array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        $users = session("blogadminUser");
        $data['author']= $users['user_name'];
        $data['create_time']= date('Y-m-d H:i:s',time());
        $data['acc_num']=0;
        $data['auth']="";
        $data['browse_num']=0;
        $data['acce_id']=0;
        return $this->_db->add($data);
    }

    //更新文章信息
    public function updateArticle($data){
        $users = session("blogadminUser");
        $id = $data[id];
        array_shift($data);
        return $this->_db->where("id=".$id)->setField($data);
    }

    public function deleteArticle($Id){
        return $this->_db->where('id='.$Id)->delete();
    }
}
