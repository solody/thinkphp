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

    public function editUser()
    {
        $getUsername = function (){
            $string = '';
            for ($i=1; $i<8; $i++) {
                $string .= chr(rand(65,90));
            }
            return $string;
        };

        $getNickname = function () {
            $string = '';
            for ($i=1; $i<8; $i++) {
                $string .= chr(rand(19968,40869));
            }
            return $string;
        };

        $user_data = array(
            'username'=>$getUsername(),
            'password'=>'123456',
            'person'=>array(
                'nickname'=>$getNickname(),
                'avatar'=>'^o^'
            )
        );

        print_r($user_data);
    }
}