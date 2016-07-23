<?php
namespace Home\Model;

use Think\Model\RelationModel;

class UserModel extends RelationModel
{
    protected $_link = array(
        'person'=>array(
            'mapping_type'      => self::HAS_ONE,
            'class_name'        => 'Person',
        ),
    );
}