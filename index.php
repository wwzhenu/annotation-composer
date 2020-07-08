<?php
/**
 * User: Marin
 * 2020/7/8 14:58
 */
// 在项目入口文件引入vendor目录中autoload.php文件
use test\test;

$loader = require_once "./vendor/autoload.php";
//spl_autoload_register('loadTest',true, true);
require_once "a.php";
$a = new test();
//spl_autoload_unregister('loadTest');
//spl_autoload_register('loadTest1',true, true);
//$b = new \test\test();
//spl_autoload_unregister('loadTest1');
//include "b.php";
echo $a->a;
//echo $b->a;

function loadTest($class){
    if ($class == 'test\test'){
        require_once 'a.php';
    }
}

function loadTest1($class){
    if ($class == 'test\test'){
        require_once 'b.php';
    }
}

call_user_func(Closure::bind(function ()use($a){
    $a->b = '123123132';
},null,test::class));
$a->echoB();
