<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //밑의 응답은 새로고침 없이 ajax를 통해 php파일에서 보내짐
    if(!empty($email) && !empty($password)){
        //사용자가 입력한 이메일&패스워드가 db의 행과 일치하는지 확인
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql > 0)){  //사용자 자격과 일치할때

        }else{
            
        }
    }else{
        echo "모든 필드를 입력하세요";
    }
?>