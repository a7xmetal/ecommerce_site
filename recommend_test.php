<?php

require_once("connection.inc.php");
require_once("functions.inc.php");
require_once("recommend.php");
require_once("sample_list.php");

$userdata = check_login($con);
$username = $userdata['name'];
// print_r($books);

$re = new Recommend();
$recommend_list = $re->getRecommendations($books, $username);

// print_r($recommend_list);