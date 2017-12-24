<?php
/**
 * 评论
 * User: yangyu
 * Date: 2017/5/22
 * Time: 13:07
 */

namespace Common\Model;
use Think\Model;

class CommonModel extends Model{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('common');
    }

    //添加评论信息
    public function InsertCommon($array){
        $array[common_time]=date('Y-m-d H:i:s',time());
        $ret =  $this->_db->add($array);
        return $ret;
    }

    //查询评论信息
    public function getArticleIdCommonList($id){
        $ret = $this->_db->where('article_id='.$id)->select();
        return $ret;
    }

    public function InsertIpAddrss($array){
        $ret = $this->$_db->add($array);
        return $ret;
    }
}
