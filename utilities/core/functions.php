<?php
function show_error($arr){
    print "<div class='alert togle-display alert-danger' style='display:none;'>";
    if(is_array($arr)){
        foreach($arr as $val){

            print "<h5>$val</h5>";
        }
    }
    print "</div>";
    echo "<script>$('.togle-display').fadeIn(1000)</script>";
}

//functin to check login
function is_user_logged(){
    if(isset($_SESSION['username']) && isset($_SESSION['user_id'])){
        return true;
    }else{return false;}
}
//function to check user status

//function to login
function admin_login($id,$name,$un,$priv,$default){
    
    $_SESSION['admin_id'] = $id;
    $_SESSION['admin_name'] = $name;
    $_SESSION['admin_uname'] = $un;
    $_SESSION['admin_priv'] = $priv;
    $_SESSION['is_default'] = ($default == 1)?true:false;
    //redirect to the admin office
    redirect('index.php');
}

function user_login($id,$name,$un){
    
    $_SESSION['user_id'] = $id;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_uname'] = $un;
    //redirect to the user account
    redirect('index.php');
}

//function for page redirection
function redirect($url){
    echo "<script>document.location.assign('$url');</script>";
}
function pass_gen(){
    $lcase = str_split('abcdefghijklmnopqrstuvwxyz');
    $ucase = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $schars = str_split('@#$%^&*+-={}[]?\/;:');
    $num = str_split('1234567890');
    $passchars = array_merge($lcase,$schars,$ucase,$num);
   
    srand( microtime() * 1000000 );
    $pwrd = '';
    for($x=1;$x<=6;$x++){
        $n = rand(0,count($passchars)-1);
        $pwrd .= $passchars[$n];
    }
    $pwrd =  str_shuffle($pwrd);
    return $pwrd;
}

//function to get Id from database
function db_id_gen($con,$fmt,$del,$tbl,$fld){
    $exist=mysqli_query($con,"select * from $tbl");
    if(mysqli_num_rows($exist) == 0){//if record not found
        $id = $fmt.$del.'001';
    }else{//if record is found
        $sql = mysqli_query($con,"SELECT max($fld) as id FROM $tbl");
        if($sql){//if query ok
            if(mysqli_num_rows($sql) == 1){//if max record found
                //fetch data 
                $data = mysqli_fetch_assoc($sql);
                $explode_id = explode($del,$data['id']);
                $id_num = $explode_id[1]+1;
                $id = $fmt.$del.$id_num;
            }//end if max record found
        }//end if query ok
        
    }//end if record is found
    return $id;
}

/*VALIDATOR FUNCTIONS*/

/*##############This function returns false if the variable is empty or null and returns the value of the variable if not empty or null*/
function clean($con,$d,$req){
    if(($req !="" || $req != null) && $req == true){//if required
        //check if data is empty
        if($d == '' || $d == null){
            return false;//return false if empty
        }else{
            $d=strip_tags(htmlspecialchars($d));
            $d=trim($d);
    
            return $d;
        }
    }else{//if data is not require
        //just validate the data
        $d=strip_tags(htmlspecialchars($d));
        $d=trim($d);
    
        return mysqli_real_escape_string($con,$d);
    }
}

function sanitize($con,$d){
    $d = strip_tags(htmlspecialchars($d));
    $d=trim($d);
    return escape_string($con,$d);
}

function escape_string($con,$data){
    return mysqli_real_escape_string($con,$data);
}

function isEmail($email){
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
        return false;
}else return true;

}

function isUrl($url){
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
  return false;
}else{return true;}

}

//FUNCTION TO REARRANGE UPLOADED FILE ARRAY
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

/*###//VALIDATOR FUNCTIONS*/

?>