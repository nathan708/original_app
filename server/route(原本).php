<?php
// echo $_SERVER['REQUEST_URI'];

// echo 'test';

$url = $_SERVER['REQUEST_URI'];

// echo 'aaaaaa';

if($url == '/'){
    require(dirname(__FILE__).'/../controllers/TopController.php');
    // top_index();
}

// elseif($url == '/login'){
//     require(dirname(__FILE__).'/../controllers/LoginController.php');
//     test2();
// }elseif($url == '/register'){
//     require(dirname(__FILE__).'/../controllers/RegisterController.php');
// }elseif($url == '/service'){
//     require(dirname(__FILE__).'/../controllers/ServiceController.php');
//     index();
// }elseif($url == '/service/create'){
//     require(dirname(__FILE__).'/../controllers/ServiceController.php');
//     create();
// }elseif($url == '/service/edit'){
//     require(dirname(__FILE__).'/../controllers/ServiceController.php');
//     edit();
// }