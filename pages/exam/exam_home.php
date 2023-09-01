<?php
require_once(__DIR__ . "/../../config/connection.php");
require_once(__DIR__ . "/../../config/session.php");
// require_once(__DIR__ . "/previous.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php if (isset($_SESSION['regNo'])) : ?>
                    <div class="message">
                        <?= $_SESSION['regNo'] ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="col text-end">
                <!-- getting details from database using regnNo on session as key -->
                <?php
                $regNo = $_SESSION['regNo'];
                $stmt = "SELECT * FROM influence WHERE regNo='$regNo'";
                $result = mysqli_query(connection(), $stmt);
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <img src="../../image/img_avatar.png" alt="" class="img-fluid rounded-circle" width="50px" height="50px"> <?= ucfirst($row['username']) ?>
                <?php endwhile ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- setting a unique id from the start button -->

                <!-- Setting the start button to an id of one -->
                <a href="exam_home.php?id=1" class="btn btn-primary">start</a>
                <?php
                // the if condition is to display the exam question only if the start button isset
                if (isset($_GET['id'])) :

                    // the id is set so one from the start value, which is the beginning of the counting from the database
                    $id = $_GET['id'];
                    $stmt = "SELECT * FROM exam WHERE id='$id'";
                    $result = mysqli_query(connection(), $stmt);
                    while ($row = mysqli_fetch_assoc($result)) :



                ?>

                        <div class="form-control mt-3">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="question">
                                    <?= $row['question'] ?>
                                </div>
                                <div class="question">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                </div>
                                <div class="question">
                                    a. <input type="radio" name="ans" id="a" value="a"><?= $row['optionA'] ?>
                                </div>
                                <div class="question">
                                    b. <input type="radio" name="ans" id="b" value="b"><?= $row['optionB'] ?>
                                </div>
                                <div class="question">
                                    c. <input type="radio" name="ans" id="c" value="c"><?= $row['optionC'] ?>
                                </div>
                                <div class="question">
                                    d. <input type="radio" name="ans" id="d" value="d"><?= $row['optionD'] ?>
                                </div>
                                <input type="submit" value="submit">
                            </form>
                            

                            <div class="form-control d-flex">
                                <!-- when the id is reduced by one is takes you to the previous question in the database -->
                                <a href="exam_home.php?id=<?php echo $row['id'] - 1 ?>" class="btn btn-secondary me-3">Previous</a>
                                <!-- when id is increased by one it takes you to the next question in the data base -->
                                <a href="exam_home.php?id=<?php echo $row['id'] + 1 ?>" class="btn btn-success">Next</a>

                            </div>
                        </div>

                    <?php endwhile ?>
                <?php endif ?>
                <?php
                if (isset($_SESSION['regNo'])) {
                    $regNo = $_SESSION['regNo'];
                    $stmt = "SELECT * FROM influence WHERE regNo = '$regNo'";
                    $result = mysqli_query(connection(), $stmt);
                    $row = mysqli_fetch_assoc($result);
                    $username = $row['username'];
                } else {
                    header("Location:exam_login.php");
                    exit();
                }

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['ans'])) {
                        $userAns = $_POST['ans'];

                        $id = $_POST['id'];
                        $anstmt = "SELECT ans FROM exam WHERE id = '$id'";
                        $ansresult = mysqli_query(connection(), $anstmt);
                        $ansrow = mysqli_fetch_assoc($ansresult);
                        $correctAns = $ansrow['ans'];

                        if ($userAns == $correctAns) {
                            $feedback = "Correct!";
                        } else {
                            $feedback = "Wrong, try again";
                        }
                    }
                }



                ?>

                <?php if (isset($feedback)) : ?>
                    <div class="alert alert-info"><?= $feedback ?></div>
                <?php endif ?>

               
            </div>
        </div>
    </div>
</body>

</html>