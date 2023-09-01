<?php
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <style>
        .position {
            position: fixed;
            z-index: 9999;

        }

        a {
            color: white;
        }

        a:hover {
            color: orange;
        }

        #input-button {
            border: 0px solid white;
            border-bottom: 1px solid blue;
            outline: none;
            width: 100%;
        }

        .submit-button {
            width: 100px;
            height: 50px;
            background-color: transparent;
            color: blue;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
        }

        .submit-button:hover {
            background-color: red;
            color: white;
            border: 1px solid red;
        }

        #input-button:focus {
            border-bottom: 4px solid red;
        }

        @media (max-width: 60rem) {
            .position {
                position: relative;
            }

            .posture {
                position: fixed;
                z-index: 9999;
            }

        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2 bg-dark">
                <div class="position col bg-dark mt-3 ">
                    <div class="column text-center">
                        <p class="text-light fw-bold fs-4"><i class="fa fa-grin-wink"></i> ADMIN</p>
                    </div>
                    <hr class="text-light">
                    <div class="column text-light">
                        <p class="text-light fw-bold fs-6"><i class="fa fa-dashboard" aria-hidden="true"></i> <a href="" class="text-decoration-none">Dashboard</a></p>
                        <hr class="text-light">
                        <p class="text-muted fw-bold fs-6">INTERFACE</p>
                        <p><i class="fa fa-cog" aria-hidden="true"></i> <a href="" class="text-decoration-none"> Webpages</a></p>
                        <p><i class="fa fa-bar-chart" aria-hidden="true"></i><a href="" class="text-decoration-none"> Admin Profile</a></p>
                        <p><a href="admin.php" class="text-decoration-none"> View Users</a></p>

                        <p><a href="" class="text-decoration-none">Academics</a></p>
                        <p><a href="" class="text-decoration-none">Exam Questions</a></p>
                        <p><a href="../config/logout.php" ; class="text-decoration-none">Logout</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-10 ">
                <div class="col-12 mb-3 d-flex mt-3">
                    <input type="search" name="" id="" class="form-control" placeholder="Search for...">
                    <button class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="col-12 text-muted fw-bold mb-2">
                    joshuajulius2030@gmail.com <img src="../img/IMG-20230409-WA0055.jpg" class="img-fluid rounded-circle" width="30" alt="">
                </div>
                <h6>User details</h6>
                <div class="card table-responsive">
                    <!-- <div class="card-header w-100">
                        user details
                    </div> -->
                    <div class="card-body">
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                        <?php endif ?>
                        <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                        <?php endif ?>
                        <div class="form-group mb-3">
                            <label for="">Enter Question</label><br>
                            <form action="exam_question_action.php" method="POST">
                                <h4><input type="text" name="question" id="input-button"></h4>
                                a. <input type="text" name="a" id="input-button">
                                b. <input type="text" name="b" id="input-button">
                                c. <input type="text" name="c" id="input-button">
                                d. <input type="text" name="d" id="input-button"><br><br>
                                <h5>set answer</h5>
                                <div class="first">
                                    a <input type="radio" name="ans" value="a" id="a">
                                </div>
                                <div class="second">
                                    b <input type="radio" name="ans" value="b" id="b">
                                </div>
                                <div class="third">
                                    c <input type="radio" name="ans" value="c" id="c">
                                </div>
                                <div class="forth">
                                    d <input type="radio" name="ans" value="d" id="d">
                                </div>

                                <input type="submit" name="submitQuestion" class="submit-button" value="Post">
                            </form>
                        </div>
                        <div class="row">
                            <?php
                            $stmt = "SELECT * FROM exam";
                            $result = mysqli_query(connection(), $stmt);

                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <div class="form-control">
                                    <?= $row['question'] ?>
                                    <div class="first">
                                        a. <input type="radio" name="a" id="a" value="a"> <?= $row['optionA'] ?>

                                    </div>
                                    <div class="second">
                                        b. <input type="radio" name="b" id="b" value="b"> <?= $row['optionB'] ?>
                                    </div>
                                    <div class="third">
                                        c. <input type="radio" name="c" id="c" value="c"> <?= $row['optionC'] ?>
                                    </div>
                                    <div class="forth">
                                        d. <input type="radio" name="d" id="d" value="d"> <?= $row['optionD'] ?>
                                    </div>
                                    <div class="ans text-success fw-bold">
                                        Answer is <?= $row['ans']?>
                                    </div>
                                    <div class="delete">
                                        <a href="delete_question.php?id=<?=$row['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>

                            <?php endwhile ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php unset($_SESSION['error'], $_SESSION['success']) ?>