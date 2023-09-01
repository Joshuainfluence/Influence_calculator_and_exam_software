<?php
    require_once(__DIR__. "/../../config/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="login_query.css">
</head>

<body>
    <div class="big-container">
        <div class="content">
            <div class="login">
                <h3 class="login-text">Login</h3>
                <h4 class="sub"> Enter Login details to get access</h4>
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="message">
                    <h4><?= $_SESSION['error'] ?></h4>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['logout'])) : ?>
                <div class="message">
                    <h4><?= $_SESSION['logout'] ?></h4>
                </div>
            <?php endif ?>
            <div class="sub">

            </div>
            <form action="login_action.php" method="POST">
                <div class="inputs">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
                <div class="show">

                    <!-- <div class="checkers">
                    <input type="checkbox" name="show" id="show" class="check">
                    <label for="show" class="show_p">Show passwords</label>
                </div> -->
                    <a href="">Forgot password?</a>
                </div>
                <div class="login-div">
                    <h4 class="login-font">Don't have an account? <a href="../signup/signup.php">Signup</a> Here</h4>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php unset($_SESSION['error']) ?>