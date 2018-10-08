<?php
//ERROR_REPORTING(0);
 ob_start();
 session_start();



 //DB SETTINGS
 include("db_setup.php");


 ////SITE SETTING////

 global $config;
 global $developer;
 global $presenter;

 //already retrieved from set.php

// $config->url = $site_url;

@$config->site_title ="House help recruitement System"; // Your site title.
@$config->site_slogan ="Busy executives"; // Your site slogan.
$config->site_url = "http://localhost/myProjects/2018-Projects/houseHelp/";
$config->favicon = $config->site_url."assets/img/favicon.png";//url of the favicon

 $config->email = EMAIL; // Email Of Owner

 $config->Admin_username = ADMIN_USERNAME;//retrieved from db_setup
 $config->Admin_password = ADMIN_PASSWORD;//retrieved from db_setup

//configure developer details
@$developer ->name = "Ifeanyi Michael";
$developer -> email = "worthswork@gmail.com";
$developer -> phone = "0706-151-1953";
$developer -> fb = "@worthsalive";
$developer -> whatsapp = "0706-151-1953";

//Configure presenter and supervisor details
@$presenter -> name = "Loveth";
$presenter -> reg_num = "16H/0170/CS";
$presenter -> supervisor = "Mrs Ijeoma Emeagi";
 
?>