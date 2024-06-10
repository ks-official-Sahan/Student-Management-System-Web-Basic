<?php

session_start();
require "connection.php";

if (isset($_SESSION["ua"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy|Admin Panel</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="row r1">
                        <div class="col-12">
                            <h1 class="text-black-50 fw-bold f1 text-center mt-5">CJ Accademy</h1>
                            <h3 class="text-black-50 fst-itali text-center mb-5">Admin Panel | Results Viewing Area</h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5 mt-5 mb-3 mb-md-0">
                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gotoAdminPanel();"> Statictics</button>
                            </div>
                            <div class="row d-grid rbutton1">
                                <button class="btn btn-warning my-2 disabled">Results</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoAdminProfile();">Profile</button>
                            </div>

                        </div>



                        <div class="col-lg-8 col-12 rpanalbody border border-5 ">


                            <div class="row pe-lg-5 ">

                                <!--  nav bar -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">

                                        <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column ">

                                                <nav class="nav nav-pills nav-fill px-2">
                                                    <a class="nav-link link-danger active bg-danger" aria-current="page" href="">Results</a>

                                                </nav>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8"></div>
                                <!--  /nav bar -->

                                <!--  details   -->
                                <div class="col-12  offset-lg-1 col-lg-10 mt-5">
                                    <div class="row">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <td>Student Name</td>
                                                <td>Subject</td>
                                                <td>Assignment_id</td>
                                                <td>Marks</td>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs = Database::search("SELECT students.fname,students.lname,subjects.name AS sname,assignments_id,submissions.marks FROM submissions INNER JOIN 
                                                assignments ON assignments.id = submissions.assignments_id INNER JOIN 
                                                subjects ON subjects.id = assignments.subjects_id INNER JOIN 
                                                students ON students.id = submissions.students_id;");
                                                $n = $rs->num_rows;
                                                if ($n >= 1) {


                                                    for ($i = 0; $i < $n; $i++) {
                                                        $d = $rs->fetch_assoc();
                                                ?>

                                                        <tr>
                                                            <td><?php echo $d["fname"]." ".$d["lname"]; ?></td>
                                                            <td><?php echo $d["sname"] ?></td>
                                                            <td><?php echo $d["assignments_id"] ?></td>
                                                            <td><?php echo $d["marks"] ?></td>
                                                        </tr>

                                                <?php
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        <!-- /details  -->
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3">
                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoAdademicOficers();">Academic officers</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-danger my-2" onclick="mangeStudents();">Students</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gotoTeachers();">Teachers</button>

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
?>

    <script>
        window.location = "index.php";
    </script>

<?php
}
?>