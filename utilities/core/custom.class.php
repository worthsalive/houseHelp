<?php
class CRUD extends dbTools{
    var $table;
    var $num_of_items;
    var $pk;
    
    function add($field,$values){
        $sql = "INSERT INTO  ".$this -> table."(".implode(',',$field).",reg_date)";
        $sql .= "VALUES('".implode("','",$values)."',now())";
        
        //execute 
        $ins = $this -> query($sql);
        //die($sql);
        return $ins;//returns true on success otherwise false
    }
    
    /*Function to update record
    accepts one paramenter in which is an array of key-> value pair
    the key is the field to be update while value is the value with which to update the field
    */
    function update($id,$fields_val){
        $count=0;$set='';
        foreach($fields_val as $f => $v){
            $count++;
            $set .= "$f = '$v'";
            $set .=($count != count($fields_val))?',':'';
          
        }
          $sql = "UPDATE {$this -> table} SET {$set} WHERE {$this -> pk} = '{$id}'";
            $updt = $this -> query($sql);
            return $updt;//returns true on success and false if otherwise
    }
    
    //function to delete records
    function delete($val){
        $del = $this -> query("DELETE FROM {$this ->table} WHERE {$this -> pk} = '{$val}'");
        return ($del)?true:false;
    }
    //functin to select all record 
    function select_all($order,$asc_desc){
        $select = $this ->query("select * from {$this -> table} order by $order $asc_desc");
        $this -> set_num_items($this -> affected_rows($select));
        return $this -> fetch($select,'assoc');
        
    }
    
    function get_record($field,$value){
        $pdt = $this -> query("SELECT * FROM {$this -> table} WHERE {$field} = '{$value}'");
        $this -> set_num_items($this -> affected_rows($pdt));
        return $this ->fetch($pdt);
    }
    
    
    //function to set current table
    function set_entity($ent){
        $this -> table = $ent;
    }
    function set_pk($pk){
        $this -> pk = $pk;
    }
    
    //function to setup the number of items found after a query
    function set_num_items($num){
        $this -> num_of_items = $num;
    }
    
    function get_num_items(){
        return $this -> num_of_items;
    }
    //SOME METHODS PARTAINING TO USER
    
    
}


/*USER CLASS*/
class USER extends CRUD{
    var $uname;
    var $id;
    var $lname;//declare the last name
    var $fname; //declare the first name
     var $is_login;
    //function to check attribute
   
    
    function set_uname($name){
        $this -> uname = $name;
    }
    function set_id($id){
        $this -> id = $id;
    }
    
    //method to get username
    function get_uname(){
        return $this -> uname;
    }
    //method to ge user id
    function get_id(){
        return $this -> id;
    }
}

class ADMIN extends USER{
    var $uname;
    var $id;
    var $is_default;
    var $privillage;
   
    
    
    function set_uname($name){
        $this -> uname = $name;
    }
    function set_id($id){
        $this -> id = $id;
    }
    
    //method to get username
    function get_uname(){
        return $this -> uname;
    }
    //method to get user id
    function get_id(){
        return $this -> id;
    }



}

class ENTITY extends CRUD{
    var $id;
     function set_id($id){
        $this -> id = $id;
    }
     function is_approved($col = "status"){
        $chk = $this -> search($this->table,["{$this->pk} = '{$this -> id}'"],[$col]);
        return ($chk[0][$col] != 1)?false:true;
    }
    
    //function to get the actual bid status
    function status(){
        return ($this -> is_approved())?"Approved":"Unapproved";
    }
    
    function get_status($col = "status"){
        $status = $this -> search($this->table,["{$this->pk} = '{$this->id}'"],[$col]);
        return $status[0][$col];
    }
}


?>