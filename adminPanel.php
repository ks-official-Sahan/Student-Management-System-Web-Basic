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
                            <h3 class="text-black-50 fst-itali text-center mb-5">Admin Panel | Manage Adminstration</h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5 mt-5 mb-3 mb-md-0">
                            <div class="row d-grid rbutton1">
                                <button class="btn btn-success my-2" disabled> Statictics</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-warning my-2" onclick="gotoResultsArea();">Results</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoAdminProfile();">Profile</button>
                            </div>

                        </div>



                        <div class="col-lg-8 col-12 rpanalbody border border-5 ">
                            <!--  nav bar -->
                            <div class="col-12">
                                <div class="row">


                                    <div class="col-8 col-lg-4">
                                        <div class="row">

                                            <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                                <nav class="nav flex-column ">

                                                    <nav class="nav nav-pills nav-fill px-2">
                                                        <a class="nav-link link-danger active bg-success" aria-current="page" href="teacherRegistation.php">Admin Profile | Statictics</a>

                                                    </nav>

                                                </nav>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4 offset-lg-6 col-lg-2 mt-2 mt-lg-3 d-grid">
                                        <button class="btn btn-danger" onclick="signout();">Sign Out</button>
                                    </div>

                                </div>



                            </div>

                            <?php

                            $rs1 = Database::search("SELECT * FROM `students`;");
                            $rs2 = Database::search("SELECT * FROM `teachers`;");
                            $rs3 = Database::search("SELECT * FROM `academic_officers`;");

                            $data1 = intval($rs1->num_rows); //getting students amount
                            $data2 = intval($rs2->num_rows); // getting teachers amount
                            $data3 = intval($rs3->num_rows); //getting accedemic officer amount





                            ?>


                            <div class="row pe-lg-5 " style="margin-top: 50px;">

                                <div class="col-12 ms-2 ms-lg-4  div5 ">

                                    <div class="row p-4 border border-dark rounded">
                                        <div class="col-6 col-lg-3 ">
                                            <div class="row my-1 mx-1 ">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Students</p>
                                                    <p class="fs-5 text-success text-center fw-bold"><?php echo $data1; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-3">
                                            <div class="row my-1 mx-1">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Teachers</p>
                                                    <p class="fs-5 text-danger text-center fw-bold"><?php echo $data2; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="row my-1 mx-1">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Academic Officers</p>
                                                    <p class="fs-5 text-info text-center fw-bold"><?php echo $data3; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="row my-1 mx-1">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">All staff members</p>
                                                    <p class="fs-5 text-warning text-center fw-bold"><?php echo $data2 + $data3; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        //calculating revanue tasks
                                        $rs4 = Database::search("SELECT * FROM `payment`;");

                                        $monthly = 0;
                                        $semesterly = 0;
                                        $yearly = 0;

                                        $n4 = $rs4->num_rows;
                                        $today = date("Y-m-d");

                                        $thisMonth = date("m");
                                        $thisYear = date("Y");

                                        for ($i = 0; $i < $n4; $i++) {

                                            $d = $rs4->fetch_assoc();
                                            $date1 = $d["date"];

                                            $date2 = explode(" ", $date1);

                                            $date = $date2[0];



                                            $dateSplit = explode("-", $date);

                                            $month = $dateSplit[1];
                                            $year = $dateSplit[0];

                                            if ($month == $thisMonth) {
                                                $monthly = $monthly + $d["amount"];
                                            }

                                            if ($month == $thisMonth + 3) {
                                                $semesterly =  $semesterly + $d["amount"];
                                            }

                                            if ($year == $thisYear) {
                                                $yearly = $yearly + $d["amount"];
                                            }
                                        }

                                        ?>

                                        <div class="col-6 col-lg-3 ">
                                            <div class="row my-1 mx-1 ">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Monthly Revenue</p>
                                                    <p class="fs-5 text-warning text-center fw-bold">Rs:<?php echo " " . number_format($monthly) . "/="; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-3">
                                            <div class="row my-1 mx-1">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Sementer Revenue</p>
                                                    <p class="fs-5 text-info text-center fw-bold">Rs:<?php echo " " . number_format($semesterly) . "/="; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="row my-1 mx-1">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Yeally Officers</p>
                                                    <p class="fs-5 text-danger text-center fw-bold">Rs:<?php echo " " . number_format($yearly) . "/="; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="row my-1 mx-1">
                                                <div class="col-12 statictisbox border border-warning border-4 rounded ">
                                                    <p class="fs-5 text-light text-center" style="margin-top: 85px;">Total Revenue</p>
                                                    <p class="fs-5 text-success text-center fw-bold">Rs:<?php echo " " . number_format($monthly + $semesterly + $yearly) . "/="; ?></p>
                                                </div>
                                            </div>
                                        </div>

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