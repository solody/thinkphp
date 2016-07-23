<?php
/**
 * Created by PhpStorm.
 * User: kent
 * Date: 2016/7/23
 * Time: 23:08
 */
namespace Home\Model;

use Think\Model\RelationModel;

class FamilyModel extends RelationModel
{
    protected $_link = array(
        'girls'=>array(
            'mapping_type'      => self::HAS_MANY,
            'class_name'        => 'Girl',
            'mapping_name'  => 'girls',
        ),
    );
}