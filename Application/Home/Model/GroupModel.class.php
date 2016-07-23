<?php
namespace Home\Model;

use Think\Model\RelationModel;

class GroupModel extends RelationModel
{
    protected $_link = array(
        'users'=>array(
            'mapping_type'      => self::MANY_TO_MANY,
            'class_name'        => 'User',
            'mapping_name'      =>  'users',
            'foreign_key'       =>  'group_id',
            'relation_foreign_key'  =>  'user_id',
            'relation_table'    =>  'group_has_user',
            'relation_deep'      => 'person'
        ),
    );
}