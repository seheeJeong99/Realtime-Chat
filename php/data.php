<!-- 검색창과 사용자 리스트에서 같은 코드가 필요해서 php 파일을 하나 더 만듬 -->
<?php 
    while($row = mysqli_fetch_assoc($sql)){
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                        <img src="php/images/'. $row['img'] .'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                            <p>This is test message</p>
                        </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>