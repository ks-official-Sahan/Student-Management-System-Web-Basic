<?php

session_start();
require "connection.php";
if (isset($_SESSION["ua"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy|Admin Panel | Academic Officers Managing Area </title>
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
                            <h3 class="text-black-50 fst-itali text-center mb-5">Admin Panel | Academic Officers Managing Area</h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <!--  main button set1 -->

                        <div class="col-12 col-lg-2 px-5 mt-5 mb-3 mb-md-0">

                            <div class="row  rbutton">
                                <button class="btn btn-success my-2" onclick="gotoAdminPanel();"> Manage Administration</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-warning my-2" onclick="gotoResultsArea();">Results</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoAdminProfile();">Profile</button>
                            </div>

                        </div>

                        <!--  /main button set1 -->



                        <div class="col-lg-8 col-12 rpanalbody border border-5 ">


                            <div class="row pe-lg-5 ">

                                <!--  nav bar -->
                                <div class="col-12 col-md-5">
                                    <div class="row">

                                        <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column ">

                                                <nav class="nav nav-pills nav-fill px-2">
                                                    <a class="nav-link link-primary" aria-current="page" href="academicOfficerRegistation.php"> Academic Officers Registation</a>
                                                    <a class="nav-link active bg-primary " href="#">Manage Academic officers</a>
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
                                                    <p class="fs-5 text-dark text-start">Select the teacher</p>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-select text-black-50 fs-5 text-center" id="id" onchange='getDp("academicOfficer");'>
                                                        <option value="0">Select an academic officer</option>

                                                        <?php

                                                        $rs2 = Database::search("SELECT * FROM `academic_officers`;");


                                                        for ($i = 0; $i < $rs2->num_rows; $i++) {

                                                            $data = $rs2->fetch_assoc();

                                                        ?>
                                                            <option value="<?php echo $data["id"]; ?>"><?php echo $data["fname"] . " " . $data["lname"]; ?></option>

                                                        <?php
                                                        }


                                                        ?>
                                                    </select>


                                                </div>
                                            </div>


                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Select a teacher</p>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-select text-black-50 fs-5 text-center" id="teachers">
                                                        <option value="0">Select a teacher</option>
                                                        <?php

                                                        $rs2 = Database::search("SELECT * FROM `teachers`;");


                                                        for ($i = 0; $i < $rs2->num_rows; $i++) {

                                                            $data = $rs2->fetch_assoc();

                                                        ?>
                                                            <option value="<?php echo $data["id"]; ?>"><?php echo $data["fname"] . " " . $data["lname"]; ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Special notices</p>
                                                </div>
                                                <div class="col-8">
                                                    <textarea rows="8" id="notes" class="form-control text-black-50 fs-5 text-center" placeholder="Type special things for the accademic officer"></textarea>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Status</p>

                                                </div>
                                                <div class="col-8">
                                                    <select class="form-select text-black-50 fs-5 text-center" id="status">
                                                        <option value="0">Select the status</option>
                                                        <?php
                                                        $rs3 = Database::search("SELECT * FROM `status`;");
                                                        for ($i2; $i2 < $rs3->num_rows; $i2++) {
                                                            $data3 = $rs3->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $data3["id"]; ?>"><?php echo $data3["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="fs-6 text-danger text-start">(If you need to change)</p>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-8 offset-2 col-lg-4 ms-lg-3 mt-lg-3">
                                                    <div class="row d-grid">
                                                        <button class="btn btn-success" onclick="updateAcademicOfficerByAdmin();">Update</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- Teacher managing area  -->

                                <div class="col-12  col-lg-6 ">

                                    <!-- Profile img -->
                                    <div class="row rb1" style="margin-top: 20px;">

                                        <div class="col-10 offset-1 col-md-6 mt-5 mt-lg-0 d-grid">
                                            <label class="form-label fs-5 text-center text-dark ">Profile Image</label>
                                        </div>

                                    </div>

                                    <div class="row rprof">


                                        <div class="col-12">
                                            <div class="row">
                                                <img src="Images/contact.png" class="col-8  col-lg-6 productImage" id="prev" />
                                            </div>

                                            <div class="row">
                                                <h4 class="text-start text-light mt-3" id="name"></h4>
                                                <p class="fs-5 text-start text-light " id="email"></p>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- Profile img -->

                                </div>


                            </div>
                        </div>


                        <!--  main button set1 -->
                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3">
                            <div class="row d-grid rbutton1">
                                <button class="btn btn-primary my-2 disabled" onclick="gotoAdademicOficers();">Academic officers</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-danger my-2 " onclick="mangeStudents();">Students</button>
                            </div>
                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gotoTeachers();">Teachers</button>
                            </div>

                        </div>
                        <!-- / main button set1 -->

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