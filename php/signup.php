<?php
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //사용자 이메일이 사용가능한지 확인하기
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // 사용자 이메일이 DB에 존재하는지 확인
            $sql = mysqli_query($conn, "SELECT email From users where email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){      //DB에 이미 이메일이 존재할 경우
                echo "$email - 이미 존재하는 이메일입니다.";
            }else{
                //사용자가 파일을 업로드 했는지 확인
                if(isset($_FILES['image'])){  // 파일이 업로드되었을 경우
                    $img_name = $_FILES['image']['name'];   //업로드한 이미지파일의 이름을 얻어옴
                    $img_type = $_FILES['image']['type'];   //업로드한 이미지파일의 타입을 얻어옴
                    $tmp_name = $_FILES['image']['tmp_name']; //tmp_name은 폴더에 파일을 저장하거나 이동하는데 사용됨

                    //이미지를 분해시켜 이미지의 확장자를 얻어오기
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);   //사용자가 업로드한 이미지파일의 확장자를 얻어옴
                    
                    $extensions = ['png', 'jpeg', 'jpg']; //유효한 이미지 확장자명. 배열에 저장함
                }else{
                    echo "이미지 파일을 선택하세요";
                }
            }
        }else{
            echo "$email - 이 이메일은 사용할수 없는 이메일입니다.";
        }

    }else{
        echo "모든 입력란이 입력되었습니다";
    }
?>