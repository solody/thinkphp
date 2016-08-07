<?php
namespace Common\Behaviors;

use Think\Behavior;

class RenderBehavior extends Behavior{
    //行为执行入口
    public function run(&$param)
    {
        header('Content-Type: application/json; charset=utf-8');
    }
}