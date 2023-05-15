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
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}"); //현재 로그인한 사용자가 사용하고 있는 세션의 모든 데이터를 선택
            
          ?>
          <div class="content">
            <img src="sehee.jpg" alt="">
            <div class="details">
              <span>Coding Sehee</span>
              <p>Active now</p>
            </div>
          </div>
          <a href="#" class="logout">Logout</a>
        </header>
        <div class="search">
          <span class="text">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search . . ." />
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
          <a href="#">
            <div class="content">
              <img src="sehee.jpg" alt="" />
              <div class="details">
                <span>Coding Sehee</span>
                <p>This is test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <img src="sehee.jpg" alt="" />
              <div class="details">
                <span>Coding Sehee</span>
                <p>This is test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <img src="sehee.jpg" alt="" />
              <div class="details">
                <span>Coding Sehee</span>
                <p>This is test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <img src="sehee.jpg" alt="" />
              <div class="details">
                <span>Coding Sehee</span>
                <p>This is test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <img src="sehee.jpg" alt="" />
              <div class="details">
                <span>Coding Sehee</span>
                <p>This is test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <img src="sehee.jpg" alt="" />
              <div class="details">
                <span>Coding Sehee</span>
                <p>This is test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
        </div>
      </section>
    </div>
    <script src="javascript/users.js"></script>
  </body>
</html>
