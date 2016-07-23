<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller 
{
    public function index()
    {
        $group = D('Group')->relation(true)->select();
        print_r($group);
    }
    
    public function addUser()
    {
        $user_data = array(
            'username'=>'haha',
            'password'=>'123',
            'person'=>array(
                'nickname'=>'小张',
                'avatar'=>'^o^'
            )
        );
        
        $rs = D('User')->relation(true)->add($user_data);
        print_r($rs);
    }
}