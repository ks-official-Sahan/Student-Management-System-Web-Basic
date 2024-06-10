<?php

session_start();
require "connection.php";
$data;
if (isset($_SESSION["ut"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy | Teacher Panel | Check assigments</title>
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
                            <h3 class="text-black-50 fst-itali text-center mb-5">Teacher Panel | Check assigments</h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5  mb-3 mb-md-0 resize1">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gototeacherarea();">My Profle</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-danger my-2" onclick="signout();">Sign Out</button>
                            </div>


                        </div>


                        <div class="col-lg-8 col-12 rpanalbody  border border-5 ">


                            <div class="row pe-lg-5 ">

                                <!--  nav bar -->
                                <div class="col-12 col-lg-3">
                                    <div class="row">



                                        <div class="row mt-3 ms-2">

                                            <div class="nav flex-column nav-pills me-3 my-3 " role="tablist" aria-orientation="vertical">
                                                <nav class="nav flex-column ">

                                                    <nav class="nav nav-pills nav-fill px-2">
                                                        <a class="nav-link active bg-light text-black-50 fw-bold" href="#">Check assigments</a>
                                                    </nav>

                                                </nav>
                                            </div>

                                            <div class=" col-12">
                                                <div class="row">
                                                    <div class="col-12 darkbg">
                                                        <div class="row mx-1 my-2">
                                                            <div class="col-12 ul">

                                                                <?php
                                                                //show assignments with subject and assignment id which is added ny the relervent teacher

                                                                $rs1 = Database::search("SELECT assignments.id AS aid,subjects.name   FROM `assignments` INNER JOIN `subjects` ON subjects.id = assignments.subjects_id WHERE assignments.teachers_id='" . $_SESSION["ut"]["id"] . "';");
                                                                $n = $rs1->num_rows;
                                                                if ($n > 0) {
                                                                    // echo $n;
                                                                    for ($i2 = 0; $i2 < $n; $i2++) {
                                                                        $data = $rs1->fetch_assoc();
                                                                ?>
                                                                        <div id="<?php echo $i2; ?>" class="row li my-2" style="border-radius: 10px;">
                                                                            <p class="fs-5 text-center" onclick='parseAssignmentId(<?php echo $data["aid"]; ?>,<?php echo $i2; ?>);'><?php echo $data["name"] . " (AS_ID:" . $data["aid"] . ")";  ?></p>
                                                                        </div>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>



                                        </div>
                                    </div>


                                </div>





                                <!-- subbmited students table -->
                                <div class="col-12 col-lg-9" style="margin-top: 90px;">
                                    <div class="row">
                                        <table class="table scrolldiv">
                                            <thead class="table-dark">
                                                <td>Student name</td>
                                                <td>Assignment_id</td>
                                                <td>Subject</td>
                                                <td>Aswers</td>
                                                <td>Marks</td>

                                            </thead>
                                            <tbody id="tbody">

                                            </tbody>
                                        </table>
                                        <!-- /details  -->
                                    </div>
                                </div>




                            </div>
                        </div>

                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3" style="margin-bottom: 35px;">

                            <div class="row d-grid rbutton1">
                                <button class="btn btn-primary my-2 disabled" onclick="gotoCheckAssignments();">Check Assignments</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-warning my-2 " onclick="gotoaddassignments();">Add Assignments</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2 " onclick=" gotoLectureNotes();">Add Lecture Notes</button>
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