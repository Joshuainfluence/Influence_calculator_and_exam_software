<?php
require_once(__DIR__ . "/../../config/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="signup_query.css">
</head>

<body>
    <div class="big-container">
        <div class="content">
            <div class="login">
                <h3 class="login-text">Signup</h3>
                <h4 class="sub"> Create a Free Account</h4>
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="message">
                    <h4><?= $_SESSION['error'] ?></h4>
                </div>
            <?php endif ?>
            <form action="signup_action.php" method="POST">
                <div class="inputs">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" placeholder="First name" class="form-control">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Last name" class="form-control">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Email address" class="form-control">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="conPassword" id="conPassword" placeholder="Confirm Password" class="form-control">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone number" class="form-control">
                </div>

                <div class="login-div">
                    <h4 class="login-font">Already have an account? <a href="../Login/login.php">Login</a> Here</h4>
                    <button type="submit" name="submit">Signup</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php unset($_SESSION['error']) ?>