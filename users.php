<!-- ♥태화니 사랑행♡ -->
<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="users">
        <header>
          <?php
            include_once "php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}"); //현재 로그인한 사용자의 세션을 모두 가져옴
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="content">
            <!-- php로 이미지, 이름, 상태 넣음 -->
            <img src="php/images/<?php echo $row['img'] ?>" alt=""> 
            <div class="details">
              <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
              <p><?php echo $row['status'] ?></p>
            </div>
          </div>
          <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
        </header>
        <div class="search">
          <span class="text">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search . . ." />
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
        </div>
      </section>
    </div>
    <script src="javascript/users.js"></script>
  </body>
</html>
