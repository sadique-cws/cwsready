 
<?php 

$connect = mysqli_connect('localhost','root','','cwsready');

//insertion
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
function callingRecords($table, $cond = null){
    global $connect;
    $array = [];

    if($cond==null){
        $query = mysqli_query($connect,"select * from $table where $cond");
    }
    else{
        $query = mysqli_query($connect,"select * from $table");
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




?>