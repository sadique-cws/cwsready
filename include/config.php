
<?php

$connect = mysqli_connect('localhost','root','','cwsready');
session_start();
//insertion
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function insertRecords($table, $fields){
    global $connect;

    if(!empty($fields)){
        $col = implode(",", array_keys($fields));
        $rows = implode("','",array_values($fields));
        $query = mysqli_query($connect,"insert into $table ($col) values ('$rows')");
        return ($query)? TRUE : FALSE;
    }
    else{
        return "Something went wrong";
    }
}

//calling more then one data
function callingRecords($table, $cond = null, $select=null){
    global $connect;
    $array = [];

    if($select==null){
        $select = '*';
    }

    if($cond!=null){
        $query = mysqli_query($connect,"select $select from $table where $cond");
    }
    else{
        $query = mysqli_query($connect,"select $select from $table");
    }
    while($row = mysqli_fetch_array($query)){
        $array[] = $row;
    }
    return (!empty($array))? $array: "Error in Fetching Data";
}

//calling single row
function callingRecord($table,$cond){
    global $connect;
    $query  = mysqli_query($connect,"select * from $table where $cond");
    return $row = mysqli_fetch_array($query);
}

function countRecord($table,$cond=null){
    global $connect;
    if($cond==null){
        $query = mysqli_query($connect,"select * from $table");
    }else{
        $query = mysqli_query($connect,"select * from $table where $cond");
    }
    $count = mysqli_num_rows($query);
    return $count;
}
function updateRecord($table,$fields, $cond=null){
    global $connect;
    $query = mysqli_query($connect,"update $table SET $fields where $cond");
}
//deleting data
function deleteRecord($table, $cond){
    global $connect;
    $query = mysqli_query($connect,"DELETE from $table where $cond");
    return ($query)? true: false;
}

//redirecting using js
function redirect($page){
    echo "<script> open('$page.php','_self')</script>";
}

function alert($msg, $type="primary"){
    echo "<div class='alert alert-$type  alert-dismissible fade show'> $msg 
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
function check_session($session){
    if(!isset($session)) {
        return false;
    }
    else{
        return true;
    }
}

function joinRecord($table, $table2, $cond, $cond1){
    // select * from table Join table2 ON table.id = table2.id where id = d ;
    global $connect;
    $query = mysqli_query($connect,"select * from $table join $table2 on $cond where $cond1");
    while($row = mysqli_fetch_array($query)){
        $array[] = $row;
    }
    return (!empty($array))? $array: "Error in Fetching Data";

}

