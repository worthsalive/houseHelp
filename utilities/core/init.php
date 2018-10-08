<?php
###########Declare default variables here###################
$err_arr=array(); $is_submited = false;$is_logged_in=false;
##Require the dbTools class

$script_filename = $_SERVER['SCRIPT_FILENAME'];
require_once "`.php";
//echo $script_filename;
if(preg_match("/(action)/i",$script_filename,$match)){
    //link part for admin-office app
    //echo "match found for action";
    require_once "../../utilities/softGene Class/dbTools.class.php";
    require_once "../../utilities/softGene Class/config.php";
}elseif(preg_match("/(app)/i",$script_filename,$match)){
    require_once "../utilities/softGene Class/dbTools.class.php";
    require_once "../utilities/softGene Class/config.php";  
      
}else{ 
    //link part for general app
    require_once "../utilities/softGene Class/dbTools.class.php";
    require_once "../utilities/softGene Class/config.php";  
}
require_once "custom.class.php";

require_once "util.php";//this has all utility function partaining to currency formating
//require core functions
require_once "functions.php";

/*========================Basic initiallization===================*/
//Establish connection
$dbTools = new dbTools(DB_USER,DB_PASS,DB);//initialize the dbTools properties
//create staff object
$executive = new USER(DB_USER,DB_PASS,DB);//initialize user properties
$executive -> set_entity('executive');//set the curernt table or entity
$executive -> set_pk('executive_id');//set the curernt table or entity

$seeker = new USER(DB_USER,DB_PASS,DB);//initialize user properties
$seeker -> set_entity('seeker');//set the curernt table or entity
$seeker -> set_pk('seeker_id');//set the curernt table or entity

$db = new ENTITY(DB_USER,DB_PASS,DB);
$job = new ENTITY(DB_USER,DB_PASS,DB);//initialize user properties
$job -> set_entity('job');//set the curernt table or entity
$job -> set_pk('job_id');//set the curernt table or entity

$applicant = new ENTITY(DB_USER,DB_PASS,DB);//initialize user properties
$applicant -> set_entity('applied_jobs');//set the curernt table or entity
$applicant -> set_pk('id');//set the curernt table or entity


//create admin object
$admin = new ADMIN(DB_USER,DB_PASS,DB);
$admin -> set_entity('admin');
$admin -> set_pk('admin_id');

//include session control
require_once "session_control.php";



$formater = new NumToWord();
//$connect = $dbTools -> connect(DB_USER,DB_PASS);//connect to server
//get server or database connection id
$con = $dbTools -> get_connection_id();




//select Database
//if($connect){ if($dbTools -> createDb(DB)/*Create the specified database if not exists*/){
        //select database
      //  $dbTools -> select_db();
  //  }}

//Initialize admin entity

$ad = $dbTools -> create_entities($ad_entity);
//Add default admin password
if($ad !== true){
    die($ad);
}else{
    #assign a default admin to the system
    $dbTools -> add_default_admin(ADMIN_USERNAME,ADMIN_PASSWORD);}

//initialize other database entities
$create = $dbTools -> create_entities($entities);
//Add default admin password
if($create !== true){
    die($create);
}
?>