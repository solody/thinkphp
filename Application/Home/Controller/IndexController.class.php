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
        $t = function ($unistr, $encoding = 'GBK', $prefix = '&#', $postfix = ';') {
            $arruni = explode($prefix, $unistr);
            $unistr = '';
            for($i = 1, $len = count($arruni); $i < $len; $i++) {
                if (strlen($postfix) > 0) {
                    $arruni[$i] = substr($arruni[$i], 0, strlen($arruni[$i]) - strlen($postfix));
                }
                $temp = intval($arruni[$i]);
                $unistr .= ($temp < 256) ? chr(0) . chr($temp) : chr($temp / 256) . chr($temp % 256);
            }
            return iconv('UCS-2', $encoding, $unistr);
        };


        $getUsername = function (){
            $string = '';
            for ($i=1; $i<8; $i++) {
                $string .= chr(rand(65,90));
            }
            return $string;
        };

        $getNickname = function () use ($t) {
            $string = '';
            for ($i=1; $i<8; $i++) {
                $string .= $t('&#'.rand(19968,40869).';','utf-8');
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

        $rs = D('User')->relation(true)->where(array('id'=>1))->save($user_data);

        print_r($user_data);
        echo PHP_EOL;
        echo $rs;
    }
}