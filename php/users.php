<?php 
    session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = "";
    
    if(mysqli_num_rows($sql) == 1){     //로그인한 유저가 1명인 경우
        $output .= "대화가능한 사용자가 없습니다.";
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>