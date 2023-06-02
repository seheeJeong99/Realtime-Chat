<?php
    session_start();
    if(isset($_SESSION['unique_id'])){      //사용자가 로그인한 경우 이 페이지로 이동함. 로그인 안했으면 로그인 페이지로 이동
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){              //로그아웃 아이디가 정해질 경우
            $status = "Offline now";
            //사용자가 로그아웃하면 status를 오프라인으로 바꾸고 로그인 폼으로 업데이트됨
            //만약 사용자가 성공적으로 로그인을 마치면 status를 다시 active now로 변경
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{
        header("location: ../login.php");
    }
?>