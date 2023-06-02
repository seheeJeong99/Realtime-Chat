<?php 
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";
    
    if(mysqli_num_rows($sql) == 1){     //로그인한 유저가 1명인 경우
        $output .= "대화가능한 사용자가 없습니다.";
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>