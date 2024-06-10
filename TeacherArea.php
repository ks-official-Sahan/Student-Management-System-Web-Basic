<?php
session_start();
require "connection.php";
if (isset($_SESSION["ut"])) {
?>


    <html>

    <head>
        <title>CJ Academy | Teacher Area </title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body onload="getDp2()">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="row r1">
                        <div class="col-12">
                            <h1 class="text-black-50 fw-bold f1 text-center mt-5">CJ Accademy</h1>
                            <h3 class="text-black-50 fst-itali text-center mb-5">Teacher Area </h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5  mb-3 mb-md-0 resize1">

                            <div class="row d-grid rbutton1">
                                <button class="btn btn-success my-2" disabled>My Profle</button>
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


                                                    <?php
                                                    $rs3 =  Database::search("SELECT * FROM `teachers` WHERE `id` = '" . $_SESSION["ut"]["id"] . "';");
                                                    $data3 = $rs3->fetch_assoc();

                                                    if ($data3["status_id"] == 1) {
                                                    ?>
                                                        <a class="nav-link link-danger active bg-success" aria-current="page" href="teacherRegistation.php">Verified Teacher</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a class="nav-link link-danger active bg-danger" aria-current="page" href="teacherRegistation.php">Not Verified Teacher</a>
                                                    <?php
                                                    }
                                                    ?>


                                                </nav>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8"></div>
                                <!--  /nav bar -->

                                <!--  details   -->
                                <div class="col-12 col-lg-6">
                                    <div class="row mt-5">
                                        <div class="col-12">

                                            <div class="row">
                                                <h5 class="text-danger  text-start ms3 mb-2" id="msg"></h5>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">First Name</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" id="fname" class="form-control text-black-50 fs-5 text-center" />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">last Name</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" id="lname" class="form-control text-black-50 fs-5 text-center" />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Email</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="email" id="email2" class="form-control text-black-50 fs-5 text-center" />
                                                </div>
                                            </div>


                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Mobile</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" class="form-control text-black-50 fs-5 text-center" placeholder="Type the NIC" id="mobile" />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Gender</p>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-select text-black-50 fs-5 text-center" id="gender">
                                                        <option value="0">Select gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Date of Birth</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="date" id="dob" class="form-control text-black-50 fs-5 text-center" placeholder="Select the birth day" />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">NIC</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Type the NIC" id="nic" disabled />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Address</p>
                                                </div>
                                                <div class="col-8">
                                                    <textarea cols="4" id="address" class="form-control text-black-50 fs-5 text-center"></textarea>
                                                </div>
                                            </div>


                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">User Name</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" id="username" class="form-control text-black-50 fs-5 text-center" />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Password</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" id="password" class="form-control text-black-50 fs-5 text-center" />
                                                </div>
                                            </div>



                                            <div class="row my-2">
                                                <div class="col-8 offset-2 col-lg-4 ms-lg-3 mt-lg-3">
                                                    <div class="row d-grid">
                                                        <button class="btn btn-success" onclick="Ao_t_sProfileUpdate();">Update</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- /Admin details  -->

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
                                    <div class="row rb1" style="margin-top: 20px;">

                                        <div class=" col-10 offset-1 col-md-6  d-grid">
                                            <input class="d-none" type="file" accept="image" id="imguploader" />
                                            <label class="btn btn-primary" for="imguploader" onclick="changeImage();">Upload</label>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3" style="margin-bottom: 35px;">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoCheckAssignments();">Check Assignments</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-warning my-2" onclick="gotoaddassignments();">Add Assignments</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2"  onclick="gotoLectureNotes();">Add Lecture Notes</button>
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
