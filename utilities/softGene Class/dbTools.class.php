<?php
class dbTools{
    var $server = 'localhost';
    var $db_user;
    var $db_pass;
    var $dbase;
    var $con;
    var $query_err;// declare property for storing errors which result from the mysqli query execution
    var $num_records;//declare property for holding number of records after any data selection.
    
    /*Constructor*/
    public function __construct($user,$pass,$db){
        $this -> init($user,$pass,$db);
        
    }
    
    //public function to create db
    public function createDb($db){
        $cdb = mysqli_query($this -> con,"CREATE DATABASE IF NOT EXISTS `$db`") or die("Error Creating database ".mysqli_error($this -> con));
        
        return ($cdb)?true:false;//return true on success and false if otherwise
    }
    
    //public function to establish connection
    public function connect($user,$pass){
        $this -> con = mysqli_connect($this -> server,$user,$pass) or die("Server Connection failure");

        return ($this -> con)?true:false;
    }
    
    //public function to select database
    public function select_db(){
        return mysqli_select_db($this -> con,$this -> dbase) or die("cant select dbase ".mysqli_error($this -> con));
        return true;
        
    }
    
    //public function to initialize connection
    public function init($user,$pass,$db){
        //initialize member properties
        $this -> dbase = $db;
        $this -> db_user = $user;
        $this -> db_pass = $pass;
        //establish connection
        if($this -> connect($user,$pass)){
            //create database if not exists
            if($this -> createDb($db)){
                //select database
                if($this -> select_db()){
                }//end select database
            }//end create database
        }//end establish connection        
    }
    
    /*public function to create entities:
    $this public function takes only one parameter which is an array object
    the array is a two dimensional associative array
    key: String - name of the entity or table to be created if not exists
    value: Array - index array of the fields definition
    This function will return an error message whenever an sql error is encounterd while creating the entities. Otherwise, it will return true value on successfull creation of the table.
    */
    public function create_entities($ent){
        $qry_err = "";
        if(!is_array($ent)){die("Fatal error!<br>create_entites expects an array object");}
        foreach($ent as $tbl => $attr){
            $sql_str="CREATE TABLE IF NOT EXISTS $tbl(";
            if(!is_array($attr)){die("Error! attribute definition of entity '$tbl' must be in array");}
            $sql_str.=implode(",",$attr);
            $sql_str.="); ";
            //Execute the query
            $exe_query = mysqli_query($this -> con,$sql_str) or $qry_err .="<font color='red'><b>Error! </b>Cant create entity '$tbl' ".mysqli_error($this -> con)."</font><br><font color='#922'>SQL:$sql_str</font><br><br>";
            
        }//end foreach loop
            return ($exe_query)?true:$qry_err;
       
    }
    
    //public function to get connection id
    public function get_connection_id(){
        return $this -> con;
    }
    
    //public function to add default admin details
    public function add_default_admin($uname,$pass){
        //hash password
        $hash_pass = md5($pass);
        //check if an admin exists
        if($chk = mysqli_query($this -> con,"SELECT * FROM admin")){
            //if no admin found, insert the default admin details
            if(mysqli_num_rows($chk) <= 0){
                //insert the default admin details
                $ins = mysqli_query($this -> con,"INSERT INTO admin(name,uname,pass,is_default,privillage) VALUES('Administrator','$uname','$hash_pass',1,'admin')") or die('Unable to create default admin '.mysqli_error($this -> con));
                if($ins){return true;}
            }
        }
    }
    
    //public function to escape string 
    public function esc_str($str){
        if(! get_magic_quotes_gpc()){
            return addslashes($str);
        }else{
            return mysqli_real_escape_string($this -> con,$str);
        }
    }
    
//    public function to search database
    /*The search public function takes 3 parameters
    The first 2 parametes are required while the third parameter is optional
    Param 1: takes the string name of the table to be searched
    Param 2: takes a string array of the search criteria for searching the table
    Param 3: (optional) takes an array of fields to be returned from the searched table after search completed.
    EG: search('table_name',["fld1 = 'value1'","fld2 like '%value2%'"],['fld1,fld2,fld3'])
    Note: The search method will return all fields in the table if the third parameter is not defined
            Returns false if no search criteria dosent match any data in the database table
            Returns associative Array of data results matched after searching.Using database fields as key*/
    public function search($tbl,$search_param,$fld = '*'){
        if(!is_array($search_param)){
            die('Error: search method expects second parameter to be an array of serch criteria');
        }
        if(!is_array($fld)  && $fld !=='*'){
            die('Error: search method expects third parameter to either be empty or an array of fields to be returned');
        }elseif(!is_array($fld) && $fld === '*'){
            
        }else{$fld = implode(",",$fld); }
        //Prepare the search criteria
        $where = implode(" and ",$search_param);
        $qry = mysqli_query($this -> con,"SELECT $fld FROM $tbl WHERE $where");
        if($qry){
            if(mysqli_num_rows($qry) > 0){
                //fetch data
                while($data = mysqli_fetch_assoc($qry)){
                    $data_arr[] = $data;
                }
                return $data_arr;
            }else{//if data not found
                return false;
            }
        }else{//if error occured in the query string
            $this -> query_err = mysqli_error($this -> con);
            die("Error! Unable to process the query");
        }
        
    }
    
    /*Public function to get affect rows afte a query*/
    function affected_rows($obj){
        $this -> num_records = mysqli_num_rows($obj);
        return mysqli_num_rows($obj);
    }
    
    //function to return to tatal number of records after feteching any data
    function get_num_records(){
        return $this -> num_records;
    }
    
    /*function to fetch data from a query in associative array
    this uses the two parameters 
    para1 -> the sql object
    para2 -> type of data to be fectch (optional)
    para2 takes three possble values which are
    object, array, and assoc(default)*/
    public function fetch($obj,$type = "assoc"){
        if(self::affected_rows($obj) > 0){
            if($type == "object"){
                while ($data = mysqli_fetch_object($obj)){
                    $data_arr[] = $data;
                }
            }
            elseif($type == "assoc"){
                 while ($data = mysqli_fetch_assoc($obj)){
                    $data_arr[] = $data;
                }
            }
            elseif($type == "array"){
                 while ($data = mysqli_fetch_array($obj)){
                    $data_arr[] = $data;
                }
            }
            return $data_arr;
        }
    }
   
    //function to fetch single items/record from database
   public function fetch_single_item($table,$field,$value){
        $pdt = $this -> query("SELECT * FROM {$table} WHERE {$field} = '{$value}'");
        return $this ->fetch($pdt);
    }
    /*public function to query */
    public function query($str){
        //die($this -> con);
        $qry = mysqli_query($this -> con,$str) or die("Error Processing query. ".mysqli_error($this -> con)." $str");
        $this -> query_err = mysqli_error($this -> con);
        return ($qry)?$qry:false;
        
    }
    
    //function to get query errors
    function get_query_error(){
        $err = $this -> query_err;//copy the query error in another variable
        //clear the original query error
        $this -> query_err = '';
        return $err;//return the error
    }
    
    //public function to generate new id from database
    public function generate_id($fmt,$del,$tbl,$fld){
        $con = $this -> con;
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
    
    /*public function to check existence of data in database
    this public function takes two parameters
    Param1: An array holding holding table name and feild name as values respectively
    param2:  the string data to be checked*/
    public function is_exists($tbl_fld,$data){
        $con = $this -> con;
        //if the tbl_fld public staticiable is an array
        if(!is_array($tbl_fld)){
            die("is_exists public function expects parameter one to be an array holding table and field name as values");
        }

        $table = $tbl_fld[0];
        $feild = $tbl_fld[1];
        $sql = mysqli_query($con,"select * from $table where $feild = '$data'");
        if($sql){
            if(mysqli_num_rows($sql) > 0){
                //if data found
                return true;
            }else return false;
        }else die("error in query in is_exists public function".mysqli_error($con));
    }
}
?>