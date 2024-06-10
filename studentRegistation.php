<?php
session_start();
require "connection.php";

if (isset($_SESSION["uac"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy | Academic Officer Area</title>
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
                            <h3 class="text-black-50 fst-itali text-center mb-5">Academic Officer Area | Student Registation Area</h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5  mb-3 mb-md-0 resize1">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gotoAcademicOfficerProfile();">My Profle</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-danger my-2" onclick="signout();">Sign Out</button>
                            </div>


                        </div>

                        <div class="col-lg-8 col-12 rpanalbody border border-5 ">
                            <div class="row pe-lg-5 ">

                                <div class="col-12 col-md-5">
                                    <div class="row">

                                        <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column ">

                                                <nav class="nav nav-pills nav-fill px-2">
                                                    <a class="nav-link active bg-primary" aria-current="page" href="#">Student Registation</a>
                                                </nav>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8"></div>

                                <div class="col-12">
                                    <div class="row">
                                        <h5 class="text-danger  text-start ms-5 my-2" id="msg"> </h5>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 div5 mt-5 mb-2">

                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">First Name</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" id="fname" class="form-control text-black-50 fs-5 text-center" placeholder="Type the first name" />
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">Last Name</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" id="lname" class="form-control text-black-50 fs-5 text-center" placeholder="Type the last name" />
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
                                            <p class="fs-5 text-dark text-start">Grade</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Type the grade" id="grade" />
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">Mobile</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Type the mobile" id="mobile" />
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">Address</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Type the address" id="address" />
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">Email</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Type the email" id="email" />
                                        </div>
                                    </div>
                                    
                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">Payment Option</p>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select text-black-50 fs-5 text-center" id="payment_option">
                                                <option value="0">Select Option</option>
                                                <?php
                                                $rs = Database::search("SELECT * FROM `payment_structures`;");
                                                $n = $rs->num_rows;
                                                for ($i = 0; $i < $n; $i++) {
                                                    $data = $rs->fetch_assoc();
                                                ?>
                                                    <option value='<?php echo $data["id"]; ?>'><?php echo $data["name"]; ?></Php>
                                                    </option>
                                                <?php
                                                }

                                                ?>


                                            </select>
                                        </div>
                                    </div>


                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">User name</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Give a user name" id="uname" />
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-4">
                                            <p class="fs-5 text-dark text-start">Password</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Give a password" id="password" />
                                        </div>
                                    </div>



                                </div>



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
                                        </div>


                                    </div>

                                    <div class="row rb1" style="margin-top: 20px;">

                                        <div class=" col-10 offset-1 col-md-6  d-grid">
                                            <input class="d-none" type="file" accept="image" id="imguploader" />
                                            <label class="btn btn-primary" for="imguploader" onclick="changeImage();">Upload</label>
                                        </div>

                                    </div>
                                    <!-- Profile img -->

                                    <div class="row rb1">

                                        <div class="col-10 offset-1 col-md-6  d-grid">
                                            <button class="btn btn-danger text-center" onclick="studentReg();">Register</button>
                                        </div>

                                    </div>


                                </div>


                            </div>
                        </div>


                        <div class="col-12 col-lg-2 px-5 resize1" style="margin-bottom: 35px;">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoResultManagingArea();">Results Managing area </button>
                            </div>

                            <div class="row d-grid rbutton1">
                                <button class="btn btn-warning my-2 disabled">Students Registation</button>
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
