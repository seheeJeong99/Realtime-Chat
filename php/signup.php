<?php
    session_start();
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
                    if(in_array($img_ext, $extensions) === true){ //사용자가 업로드한 이미지의 확장자명과 배열에 저장된 확장자명이 일치할 경우
                        $time = time(); //현재 시간 리턴

                        //사용자가 업로드한 이미지를 특정 폴더로 이동하기. db에는 url만 올리고 실제 파일은 특정 폴더에 있음.
                        $new_img_name = $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $status = "Active now"; //사용자가 가입하면 사용자의 상태가 active now됨
                            $random_id = rand(time(), 10000000); //사용자를 위한 랜덤 아이디 생성
                            
                            //테이블에 모든 사용자의 데이터를 넣음
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                 VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){      //위의 데이터들이 삽입된 경우
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysql_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //이 세션을 활용하여 다른 php파일에서 사용자의 unique_id를 사용함
                                    echo "Success";
                                }
                            }else{
                                echo "뭔가 잘못되었습니다";
                            }
                        }

                    }else{
                        echo "이미지 파일을 선택하세요 - jpeg, jpg, png";
                    }
                }else{
                    echo "이미지 파일을 선택하세요";
                }
            }
        }else{
            echo "$email - 이 이메일은 사용할수 없는 이메일입니다.";
        }

    }else{
        echo "모든 입력란을 입력하세요";
    }
?>