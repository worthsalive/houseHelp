<?php
#Define database  constants
define('DB','househelp_db');//Enter the database name
define('DB_USER','root');//difine the dabase connection username
define('DB_PASS','');//difine database connection password
//define default admin login credentials
define('ADMIN_USERNAME','admin');//difine default administrative username
define('ADMIN_PASSWORD','admin123');//define default administrative password
define('EMAIL','worthsalive@gmail.com');




//create admin entity
$ad_entity = array(
    "admin" => array(
        "admin_id int(10) auto_increment not null",
        "name varchar(50) not null",
        "uname varchar(30) not null",
        "pass varchar(255) not null",
        "is_default int(1) not null",
        "privillage varchar(15) not null",
        "PRIMARY KEY(admin_id)"
    )
);


//CREATE DATBASE ENTITITIES
$entities = array(
    "seeker" => array(
        "seeker_id int(30) auto_increment not null",
        "lastname varchar(30) not null",
        "othernames varchar(20) not null",
        "raddress varchar(20) not null",
        "paddress varchar(20) not null",
        "state_of_o varchar(30) not null",
        "sex  varchar(16) not null",
        "m_status varchar(20) not null",
        "lga varchar(30) not null",
        "phone varchar(16) not null",
        "email varchar(60) not null",
        "education varchar(50) not null",
        "hobby varchar(255) not null",
        "job_interest varchar(255) not null",
        "likes varchar(255) not null",
        "dislikes varchar(255) not null",
        "passport varchar(255) not null",
        "regid varchar(40) not null",
        "pass text not null",
        "reg_date datetime",
        "PRIMARY KEY(seeker_id)",
        "UNIQUE KEY(regid)"
    ),
    "job" => array(
        "job_id int(30) auto_increment not null",
        "exid varchar(30) not null",
        "title varchar(70) not null",
        "description text not null",
        "reg_date varchar(255) not null",
        "PRIMARY KEY(job_id)"
    ),
    "executive" => array(
        "executive_id int(30) not null auto_increment",
        "exid varchar(30) not null",
        "fullname varchar(70) not null",
        "occupation varchar(80) not null",
        "raddress varchar(150) not null",
        "sex varchar(8) not null",
        "m_status varchar(20) not null",
        "phone varchar(16) not null",
        "email varchar(150) not null",
        "description varchar(255) not null",
        "office_address varchar(150) not null",
        "passport varchar(255) not null",
        "pass text not null",
        "reg_date datetime",
        "PRIMARY KEY(executive_id)"
    ),
    "applied_jobs" => array(
        "id int(20) auto_increment not null",
        "job_id int(30) not null",
        "seeker varchar(30) not null",
        "reg_date datetime not null",
        "PRIMARY KEY(id)"
    ),
    "recruited" => array(
        "recruit_id int(20) auto_increment not null",
        "job_id int(30) not null",
        "executive_id varchar(30) not null",
        "seeker_id varchar(30) not null",
        "reg_date datetime not null",
        "PRIMARY KEY(recruit_id)"
    )
);
?>