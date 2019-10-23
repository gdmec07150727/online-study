<?php
    echo "大家好";
session_start();
    $class_id = $_GET['class_id'];
    $stu_id = $_SESSION['id'];

    $con = new mysqli("localhost","root","","edu002");
    mysqli_set_charset($con, "utf8");
    if(!$con){
        die("connect error:".mysqli_connect_error());
    }

    $sql = "delete from edu_stu where stu_id='$stu_id' AND class_id='$class_id'";
    $result=$con->query($sql);
    include('http://127.0.0.1/online-study/index.php/Users/myclass');
?>