<!-- 검색창과 사용자 리스트에서 같은 코드가 필요해서 php 파일을 하나 더 만듬 -->
<?php 
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "사용가능한 메시지가 없습니다.";
        }

        //단어가 44자 이상 넘어갈 경우 잘라냄
        (strlen($result) > 44) ? $msg = substr($result, 0, 44).'...' : $msg = $result;
        //로그인 id가 메시지를 보낼때 메시지 전에 you: 추가
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "YOU: " : $you = "";
        //사용자가 온라인인지 오프라인인지 체크
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                        <img src="php/images/'. $row['img'] .'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>