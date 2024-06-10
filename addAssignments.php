<?php

session_start();
require "connection.php";

if (isset($_SESSION["ut"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy | Teacher Panel | Add Assignments</title>
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
                            <h3 class="text-black-50 fst-itali text-center mb-5">Teacher Panel | Add Assignments</h3>
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


                        <div class="col-lg-8 col-12 rpanalbody border border-5 ">


                            <div class="row pe-lg-5 ">

                                <!--  nav bar -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">

                                        <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column ">

                                                <nav class="nav nav-pills nav-fill px-2">
                                                    <a class="nav-link active bg-warning " href="#">Add Assignments</a>
                                                </nav>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8"></div>
                                <!--  /nav bar -->

                                <!-- Teacher managing area  -->
                                <div class="col-12 col-lg-6">
                                    <div class="row mt-5">
                                        <div class="col-12">

                                            <div class="row">
                                                <h5 class="text-danger  text-start ms3 mb-2" id="msg"></h5>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Subject</p>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-select text-black-50 fs-5 text-center" id="subject" disabled>
                                                        
                                                        <?php

                                                        $rs2 = Database::search("SELECT * FROM `teacher_has_subjects` INNER JOIN `subjects` ON `subjects`.`id` =`teacher_has_subjects`.`subjects_id`  WHERE `teachers_id`='" . $_SESSION["ut"]["id"] . "';");
                                                        if ($rs2->num_rows > 0) {
                                                            $data = $rs2->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Grade</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" id="grade" class="form-control text-black-50 fs-5 text-center" placeholder="Select the grade" />
                                                </div>
                                            </div>

                                            <div class="row my-2 mb-lg-4">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Duration</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" id="duration" class="form-control text-black-50 fs-5 text-center" placeholder="Type the Duration" />
                                                </div>
                                            </div>


                                            <div class="row my-2">
                                                <div class="col-8 offset-2 col-lg-4 ms-lg-3 mt-lg-5">
                                                    <div class="row d-grid">
                                                        <button class="btn btn-success" onclick="uploadpdf1();">Upload</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- Teacher managing area  -->

                                <div class="col-12  col-lg-6 ">



                                    <div class="row rprof">


                                        <div class="col-12">
                                            <div class="row">
                                                <img src="Images/Open-file-icon.png" class="col-8  col-lg-6 productImage1" id="prev" />
                                            </div>


                                        </div>

                                    </div>

                                    <div class="row rb1" style="margin-top: 20px;">

                                        <div class=" col-10 offset-1 col-md-6  d-grid">
                                            <input class="d-none" type="file" accept="application/pdf,application/vnd.ms-exel" id="fileuploader" onchange="changeImageByDocument();" />
                                            <label class="btn btn-primary" for="fileuploader">Upload PDF</label>
                                        </div>

                                    </div>
                                    <!-- Profile img -->

                                </div>


                            </div>
                        </div>

                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3" style="margin-bottom: 35px;">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoCheckAssignments();">Check Assignments</button>
                            </div>

                            <div class="row d-grid rbutton1">
                                <button class="btn btn-warning my-2 disabled">Add Assignments</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick=" gotoLectureNotes();">Add Lecture Notes</button>
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