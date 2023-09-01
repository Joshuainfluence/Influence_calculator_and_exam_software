<?php
require_once(__DIR__ . "/../config/connection.php");
require_once(__DIR__. "/../config/session.php");
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
                        <p><a href="index.php" class="text-decoration-none"> View Users</a></p>

                        <p><a href="" class="text-decoration-none">Academics</a></p>
                        <p><a href="exam_question.php" class="text-decoration-none">Exam Questions</a></p>
                        <p><a href="../config/logout.php"; class="text-decoration-none">Logout</a></p>
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
                        <table class="table table-responsive table-bordered border--secondary">
                            <thead>
                                <tr>
                                    <th scope="row">S/N</th>
                                    <th scope="row">Name</th>
                                    <th scope="row">Email</th>
                                    <th scope="row">Username</th>
                                    <th scope="row">Registration Number</th>
                                    <th scope="row">Phone Number</th>
                                    <th scope="row">Delete</th>
                                    <th scope="row">Edit</th>
                                    <th scope="row">Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM influence";
                                $stmt = mysqli_query(connection(), $sql);
                                while ($row = mysqli_fetch_assoc($stmt)) :


                                ?>
                                    <?php if (empty($row)) : ?>
                                        <?= "no user record" ?>
                                    <?php endif ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['firstName'] ?> <?= $row['lastName'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['regNo'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn-del btn btn-danger">Delete</a></td>
                                        <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn-del btn btn-primary">Edit</a></td>
                                        <td><img class="img-fluid" style="width:200px; " src="../pages/uploads/<?= $row['profile_photo'] ?>" alt=""></td>
                                    </tr>
                                <?php endwhile ?>

                            </tbody>
                        </table>


                        <?php if (isset($_GET['m'])) : ?>
                            <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
                        <?php endif ?>
                        <script src="../assets/sweetalert/jquery-3.6.4.min.js"></script>
                        <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
                        <script>
                            $('.btn-del').on('click', function(e) {
                                e.preventDefault();
                                const href = $(this).attr('href')

                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'Record will be deleted',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Delete Record',
                                }).then((result) => {
                                    if (result.value) {
                                        document.location.href = href;
                                    }

                                })
                            })
                            const flashdata = $('.flash-data').data('flashdata')
                            if (flashdata) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Record Deleted',
                                    text: 'User has been deleted successfully'
                                })
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>