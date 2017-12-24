<?php
/**
 * 评论
 * User: yangyu
 * Date: 2017/5/22
 * Time: 13:07
 */

namespace Common\Model;
use Think\Model;

class IpAddrssModel extends Model{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('ipaddress');
    }
    public function InsertIpAddrss($array){
        $ret = $this->_db->add($array);
        return $ret;
    }
}
