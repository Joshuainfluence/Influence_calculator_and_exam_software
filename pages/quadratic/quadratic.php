<?php 
    require_once(__DIR__. "/../../config/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/nav.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
    <script src="../../assets/nav.js" defer></script>
    <link rel="stylesheet" href="quadratic.css">
</head>

<body>
    <header class="primary-header">
        <nav>
            <div class="container">
                <div class="nav-content">
                    <div class="logo">
                        <!-- <img src="image/hacker2.jpg" class="image" alt=""> -->
                        <div class="title">Influence Calculator</div>
                    </div>
                    <button class="mobile-nav-toggle" aria-expanded="false" aria-controls=".content"></button>
                    <div class="content">
                        <ul class="content1" id="content" data-visible="false">
                            <li>
                                <a href="../../index.php">Home</a>
                            </li>
                            <li>
                                <a href="">Contents</a>
                            </li>
                            <li>
                                <a href="../about/about.php">About</a>
                            </li>
                            <li>
                                <a href="../contact/contact.php">Contact</a>
                            </li>
                            <li>
                                <a href="../signup/signup.php">Register <i class="fa fa-sign-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="value-container">
            <div class="definition">
                Quadratic Equation
            </div>
            <form action="quad_action.php" method="POST">
                <div class="inputs">
                    <div class="equation">
                        <label for="equation">Type your question</label>
                        <textarea name="text" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mass">
                        <label for="a">
                            Enter the value of a
                        </label>
                        <input type="number" name="a" id="a" placeholder="a" class="form-control">
                    </div>
                    <div class="volume">
                        <label for="b">
                            Enter the value of b
                        </label>
                        <input type="number" name="b" id="b" placeholder="b" class="form-control">
                    </div>
                    <div class="volume">
                        <label for="c">
                            Enter the value of c
                        </label>
                        <input type="number" name="c" id="c" placeholder="c" class="form-control">
                    </div>

                    <div class="solve">
                        <div class="view">

                        </div>
                        <input type="submit" value="Solve" class="button">
                    </div>
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="answer">
                            <?= $_SESSION['success'] ?>
                        </div>

                    <?php endif ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <?= $_SESSION['error'] ?>
                        </div>

                    <?php endif ?>
                    <?php if (isset($_SESSION['explain'])) : ?>
                        <div class="explanation">
                        <h3 class="font">
                            <?= $_SESSION['explain']?>
                        </h3>
                    </div>

                    <?php endif ?>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
<?php unset($_SESSION['success'], $_SESSION['error'], $_SESSION['explain'])?>