<?php
namespace Home\Behaviors;

use Think\Behavior;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineORMInitBehavior extends Behavior
{
    //行为执行入口
    public function run(&$param)
    {
        $paths = array(APP_PATH .'../src');
        $isDevMode = true;

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => C('DB_USER'),
            'password' => C('DB_PSD'),
            'dbname'   => C('DB_NAME'),
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        global $DoctrineEM;
        $DoctrineEM = EntityManager::create($dbParams, $config);
        error_log($DoctrineEM->find('haha'));
    }
}