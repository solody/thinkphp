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

    public function addGroup()
    {
        $group_data =array(
            'name'=>'电影爱好者',
            'users'=>array(
                array(
                    'username'=>$this->getUsername(),
                    'password'=>'group_add_password',
                    'person'=>array(
                        'nickname'=>$this->getNickname(),
                        'avatar'=>'^@^'
                    )
                ),
                array(
                    'username'=>$this->getUsername(),
                    'password'=>'group_add_password',
                    'person'=>array(
                        'nickname'=>$this->getNickname(),
                        'avatar'=>'^@^'
                    )
                ),
                array(
                    'username'=>$this->getUsername(),
                    'password'=>'group_add_password',
                    'person'=>array(
                        'nickname'=>$this->getNickname(),
                        'avatar'=>'^@^'
                    )
                )
            )
        );

        $rs = D('Group')->relation(true)->add($group_data);
        echo $rs;
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
        $user_data = array(
            'username'=>$this->getUsername(),
            'password'=>'123456',
            'person'=>array(
                'nickname'=>$this->getNickname(),
                'avatar'=>'^o^'
            )
        );

        $rs = D('User')->relation(true)->where(array('id'=>1))->save($user_data);

        print_r($user_data);
        echo PHP_EOL;
        echo $rs;
    }

    public function addFamily()
    {
        $family = array(
            'name'=>'快乐家庭',
            'girls'=>array(
                array('name'=>'小红'),
                array('name'=>'小爱'),
                array('name'=>'小青')
            )
        );

        $rs = D('Family')->relation(true)->add($family);

        echo $rs;
    }

    public function editFamily()
    {
        $family = array(
            'name'=>'快乐家庭改',
            'girls'=>array(
                array('name'=>'旧成员改名', 'id'=>1),
                array('name'=>'小红+'),
                array('name'=>'小爱+'),
                array('name'=>'小青+')
            )
        );

        $rs = D('Family')->relation(true)->where(array(
            'id'=>1
        ))->save($family);

        echo $rs;
    }

    public function deleteFamily()
    {
        $rs = D('Family')->relation('girls')->delete(2);

        echo $rs;
    }

    private function t($unistr, $encoding = 'GBK', $prefix = '&#', $postfix = ';') {
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
    }

    private function getUsername(){
        $string = '';
        for ($i=1; $i<8; $i++) {
            $string .= chr(rand(65,90));
        }
        return $string;
    }

    private function getNickname(){
        $string = '';
        for ($i=1; $i<8; $i++) {
            $string .= $this->t('&#'.rand(19968,40869).';','utf-8');
        }
        return $string;
    }
}