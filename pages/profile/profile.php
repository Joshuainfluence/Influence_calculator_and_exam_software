<?php
require_once(__DIR__ . "/../../config/connection.php");
require_once(__DIR__ . "/../../config/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../../assets/nav.css">
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="profile.css">
    <script src="../../assets/nav.js" defer></script>
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
                                <a href="../exam/exam_login.php">Exam <i class="fa fa-sign-in"></i></a>
                            </li>
                            <li>
                                <a href="../exam/exam_login.php">Logout <i class="fa fa-sign-out"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <?php if (isset($_SESSION['username'])) : ?>
                        <h3> <img src="../../image/img_avatar.png" alt="" class="img-fluid rounded-circle" width="50px" height="50px"> <?= ucfirst($_SESSION['username']) ?></h3>
                    <?php endif ?>
                   
                </div>
            </div>

            <div class="row d-flex justify-content-start mt-3">


                <div class="col-md-9">
                    <div class="card p-3 py-4">
                        <div class="d-flex justify-content-center border">
                            <div class="d-flex border w-100" style="height: 25rem;">

                                <img src="../../image/img_avatar.png" class="w-100 h-100" style="object-fit: cover;">

                            </div>
                        </div>
                        <div class="text-start">
                            <div class="border position-relative" style="width: 9rem; margin-top: -60px; height: 9rem; border-radius: 100%; overflow: hidden">
                                <img src="../../image/img_avatar.png" class="w-100 h-100" style="object-fit: cover;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row text-center d-flex mt-5">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <p>
                    <h4 class="text-primary fw-bold">Find Friends</h4>
                    </p>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="col-md-3 carousel-item active">
                                <div class="card" style="width: 100%;">
                                    <div class="w-100" style="height: 25rem;">
                                        <img src="../../img/IMG-20230409-WA0055.jpg" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-title text-center fw-bold fs-4">felix victory</p>
                                        <h5 class="fs-5">PHP scholar @megaMindstICT solutions</h5>
                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-plus-circle"></i>
                                            View Profile<a>
                                                <a href="#" class="btn btn-outline-primary"></i> Message<a></a>
                                    </div>
                                </div>
                            </div>


                            <?php
                            $sql = "SELECT * FROM influence";
                            $result = mysqli_query(connection(), $sql);
                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <div class="col-md-3 carousel-item">
                                    <div class="card" style="width: 100%;">

                                        <div class="w-100" style="height: 25rem;">
                                            <img src="../../pages/uploads/<?= $row['profile_photo'] ?>" class="w-100 h-100" style="object-fit: cover;">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-title text-center fw-bold fs-4">
                                                <?= ucfirst($row['firstName']) . " " . ucfirst($row['lastName']) ?>
                                            </p>
                                            <h5 class="fs-5">PHP scholar @megaMindstICT solutions</h5>
                                            <a href="view_val.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary"><i class="fa fa-plus-circle"></i> View Profile<a>
                                                    <a href="#" class="btn btn-outline-primary"></i> Message<a></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                    <div class="col-12">
                        <?php
                        $username = $_SESSION['username'];
                        $stmt = "SELECT * FROM influence WHERE username = '$username'";
                        $result = mysqli_query(connection(), $stmt);
                        while ($row = mysqli_fetch_assoc($result)) :
                        ?>
                            <h3><?= $row['regNo'] ?></h3>
                            <h3><?= $row['phone'] ?></h3>
                            <h3><?= ucfirst($row['firstName']." ". $row['lastName']) ?></h3>
                            <h3><?= $row['email'] ?></h3>
                        <?php endwhile ?>

                    </div>

                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">

                </div>
            </div>
        </div>
        <script src="../../assets/bootstrap/bootstrap.min.js"></script>
    </section>
</body>

</html>