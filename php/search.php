<?php 
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);       //searchTerm : 검색어
                                                                                //검색어는 ajax에서 php로 보내지고 php에서 ajax로 받는다.
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} 
           AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){  
        include "data.php";
    }else{
        $output .= "검색어와 일치하는 사용자가 존재하지 않습니다.";
    }
    echo $output;
?>