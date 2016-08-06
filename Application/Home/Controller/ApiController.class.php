<?php
/**
 * Created by PhpStorm.
 * User: kent
 * Date: 2016/7/31
 * Time: 15:40
 */
namespace Home\Controller;

use Think\Controller\RestController;

class ApiController extends RestController
{
    public function group()
    {
        $group = D('Group')->relation(true)->select();
        $this->response($group);
    }
}