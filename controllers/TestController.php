<?php

function test_index(){

    // require(dirname(__FILE__).'/../models/TestModel.php');

    $data = array(
        0 => array(
            'id' => 1,
            'name' => 'Netflix',
        ),
        1 => array(
            'id' => 2,
            'name' => 'Amazon',
        ),
    );

    $genre = array(
        '動画', 'その他'
    );

    $payment_type = array(
        0 => '年額', 1 => '月額'
    );


    $view_string = 'テスト';

    require(dirname(__FILE__).'/../views/view_test.php');
}

function test2(){

    require(dirname(__FILE__).'/../models/TestModel.php');

    $string = 'テスト12345';

    require(dirname(__FILE__).'/../views/view_sample.php');
}