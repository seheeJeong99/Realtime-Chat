<?php
    session_start();
    if(isset($_SESSION['unique_id'])){      //사용자 로그인이 되어있을 경우엔 로그인 페이지가 아닌 사용자목록으로 넘어감
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
    <body>
        <div class="wrapper">
            <section class="form login">
                <header>Realtime Sehee</header>
                <form action="#" autocomplete="off">
                    <div class="error-txt"></div>
                        <div class="field input">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Enter your Email">
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your Password">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Continue to Chat">
                        </div>
                </form>
                <div class="link">Not yet signed up? <a href="index.php">signup now</a></div>
            </section>
        </div>
        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>
    </body>
</html>