<?php

session_start();
$a = "";


if (isset($_GET["a"])) {
    $a = $_GET["a"];
}

?>


<!DOCTYPE html>

<html>

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="row r1">
                    <div class="col-12">
                        <h1 class="text-black-50 fw-bold f1 text-center m-5">CJ Accademy</h1>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-lg-10 offset-lg-1 col-12 r2 border border-5 ">


                        <div class="row pe-lg-5 " style="margin-top: 100px;">
                            <div class="col-12 col-lg-6 div2 ">


                                <?php
                                if ($a == "Admin") {
                                ?>
                                    <h3 class="text-black-50 fst-itali text-start ms-4 my-3">Welcome The Admin</h3>
                                    <h5 class="text-black-50 fw-light text-start ms-5 my-2 text-dark">You can login with your user name and password.</h5>


                                <?php
                                } else if ($a == "Academic officer") {
                                ?>
                                    <h3 class="text-black-50 fst-itali text-start ms-4 my-3">Welcome Academic officer</h3>
                                    <h5 class="text-black-50 fw-light text-start ms-5 my-2text-dark">You can login with your user name and password which the Admin have sent you.</h5>


                                <?php
                                } else if ($a == "Teacher") {
                                ?>
                                    <h3 class="text-black-50 fst-itali text-start ms-4 my-3">Welcome Teacher</h3>
                                    <h5 class="text-black-50 fw-light text-start ms-5 my-2 text-dark">You can login with your user name and password which the Admin have sent you.</h5>


                                <?php
                                } else if ($a == "Student") {
                                ?>
                                    <h3 class="text-black-50 fst-itali text-start ms-4 my-3">Welcome Student</h3>
                                    <h5 class="text-black-50 fw-light text-start ms-5 my-2 text-dark">You can login with your user name and password which the Academic officer have sent you.</h5>

                                <?php
                                } else if ($a == "do_verify") {
                                ?>
                                    <h3 class="text-black-50 fst-itali text-start ms-4 my-3">Login Verification</h3>
                                    <h5 class="text-black-50 fw-light text-start ms-5 my-2 text-dark">Please enter the verification code which you are recived by the email. This verification code will expire with this first login. You don't need a verification code after. </h5>

                                <?php
                                } else {
                                ?>
                                    <h3 class="text-black-50 fst-itali text-start ms-4 my-3">Welcome, Please Tell Us Who are You here,,,</h3>
                                    <h5 class="text-black-50 fw-light text-start  ms-5 my-2 text-dark">Please select your user type and then you can sign in with your currect login details. In the first login you should have to verify your login with provided verification code. </h5>

                                <?php
                                }
                                ?>
                            </div>

                            <?php

                            $un = "";
                            $pw = "";

                            if (isset($_COOKIE["username"])) {
                                $un = $_COOKIE["username"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $pw = $_COOKIE["password"];
                            }



                            ?>

                            <div class="col-12  col-lg-6  border  border-5 border-bottom-0 border-end-0 border-top-0 div1">

                                <h1 class="text-white  f2 ms-5  my-lg-2 my-5">Sign In</h1>

                                <div class="row msgdiv2">
                                    <h5 class="text-danger  text-start ms-5 my-2" id="msg"></h5>
                                </div>

                                <div class="row">


                                    <?php
                                    if ($a == "do_verify") {
                                    } else {
                                    ?>
                                        <!-- login details -->
                                        <div class="col-4 p-3">
                                            <h4 class=" text-white">User type</h4>
                                        </div>

                                        <div class="col-8">
                                            <div class="form-floating">
                                                <select class="form-select" id="usertype" aria-label="Floating label select example" onchange="abc();">
                                                    <?php
                                                    if ($a == "Admin") {
                                                    ?>
                                                        <option>select the user type</option>
                                                        <option value="<?php echo "Admin" ?>" selected>Admin</option>
                                                        <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                        <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                        <option value="<?php echo "Student" ?>">Student</option>
                                                    <?php
                                                    } else if ($a == "Academic officer") {
                                                    ?>
                                                        <option>select the user type</option>
                                                        <option value="<?php echo "Admin" ?>">Admin</option>
                                                        <option value="<?php echo "Academic officer" ?>" selected>Academic officer</option>
                                                        <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                        <option value="<?php echo "Student" ?>">Student</option>
                                                    <?php
                                                    } else if ($a == "Teacher") {
                                                    ?>
                                                        <option>select the user type</option>
                                                        <option value="<?php echo "Admin" ?>">Admin</option>
                                                        <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                        <option value="<?php echo "Teacher" ?>" selected>Teacher</option>
                                                        <option value="<?php echo "Student" ?>">Student</option>
                                                    <?php
                                                    } else if ($a == "Student") {
                                                    ?>
                                                        <option>select the user type</option>
                                                        <option value="<?php echo "Admin" ?>">Admin</option>
                                                        <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                        <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                        <option value="<?php echo "Student" ?>" selected>Student</option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option selected>select the user type</option>
                                                        <option value="<?php echo "Admin" ?>">Admin</option>
                                                        <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                        <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                        <option value="<?php echo "Student" ?>">Student</option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                                <label for="floatingSelectGrid">Works with selected</label>
                                            </div>
                                        </div>




                                </div>



                                <div class="row">
                                    <div class="col-4 p-3">
                                        <h4 class=" text-white">User name</h4>
                                    </div>
                                    <div class="col-8 p-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="un" placeholder="User name" value="<?php echo $un; ?>">
                                                    <label for="floatingInputGrid">type user name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4 p-3">
                                        <h4 class=" text-white">Password</h4>
                                    </div>
                                    <div class="col-8 p-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="pw" placeholder="Password" pl value="<?php echo $pw; ?>">
                                                    <label for="floatingInputGrid">type password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div

                            <?php
                                    }
                            ?>


                            <?php


                            if ($a == "do_verify") {
                            ?>
                                <div class="row">
                                    <div class="col-4 p-3">
                                        <h4 class=" text-white">Verification code</h4>
                                    </div>
                                    <div class="col-8 p-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="vc">
                                                    <label for="floatingInputGrid">type verification code</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            } else {
                            }


                            if ($a != "do_verify") {
                            ?>

                                <div class="row">
                                    <div class="col-4 offset-4">
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="checkbox" id="remember" checked>
                                            <label class="form-check-lable text-white">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <a class="link-primary text-white" href="#" onclick="fogotPasswordmodel();">Fogot Password</a>
                                    </div>
                                </div>
                                
                            <?php
                            }
                            ?>







                            <div class="row">
                                <?php
                                if ($a == "Admin") {
                                ?>
                                    <div class="col-3 p-3 my-3 d-grid">
                                        <button class="btn btn-success f3" onclick='si("Admin");'>Sign In</button>
                                    </div>


                                <?php
                                } else if ($a == "Academic officer") {
                                ?>
                                    <div class="col-3 p-3 my-3 d-grid">
                                        <button class="btn btn-success f3" onclick='si("Academic officer");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "Teacher") {
                                ?>
                                    <div class="col-3 p-3 my-3 d-grid">
                                        <button class="btn btn-success f3" onclick='si("Teacher");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "Student") {
                                ?>
                                    <div class="col-3 p-3 my-3 d-grid">
                                        <button class="btn btn-success f3" onclick='si("Student");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "do_verify") {
                                ?>
                                    <div class="col-3 p-3 my-3 d-grid">
                                        <button class="btn btn-success f3" onclick='si2();'>Sign In</button>
                                    </div>

                                <?php
                                } else {
                                ?>
                                    <div class="col-3 p-3 my-3 d-grid">
                                        <button class="btn btn-success f3" onclick='si("Admin");'>Sign In</button>
                                    </div>
                                <?php
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



    <!-- fogot Password Model -->

    <div class="modal fade" tabindex="-1" id="fogetPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Password Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-12">
                            <lable class="form-lable">Email</lable>
                            <div class="input-group mb-3">

                                <input class="form-control" type="text" id="e" placeholder="type your email for varification." />

                                <?php
                                if ($a == "Academic officer") {
                                ?>
                                    <button class="btn btn-outline-warning" type="button" onclick='sendVerificationCode("Academic officer");' id="nb1">Send verification code</button>
                                <?php
                                } else if ($a == "Teacher") {
                                ?>
                                    <button class="btn btn-outline-warning" type="button" onclick='sendVerificationCode("Teacher");' id="nb1">Send verification code</button>
                                <?php
                                } else if ($a == "Student") {
                                ?>
                                    <button class="btn btn-outline-warning" type="button" onclick='sendVerificationCode("Student");' id="nb1">Send verification code</button>
                                <?php
                                }
                                ?>



                            </div>

                        </div>

                        <div class="col-12">
                            <lable class="form-lable">New Password</lable>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="np" />
                                <button class="btn btn-outline-primary" type="button" onclick="showPassword1();" id="nb1">Show</button>
                            </div>

                        </div>

                        <div class="col-12">
                            <lable class="form-lable">Re-type Password</lable>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="rnp" />
                                <button class="btn btn-outline-primary" type="button" onclick="showPassword2();" id="nb2">Show</button>
                            </div>

                        </div>

                        <div class="col-12">
                            <lable class="form-lable">Verification code</lable>
                            <input class="form-control" type="text" id="vc" />
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <?php

                    if ($a == "Academic officer") {
                    ?>
                        <button type="button" class="btn btn-primary" onclick='resetPassword("Academic officer");'>Reset</button>
                    <?php
                    } else if ($a == "Teacher") {
                    ?>
                        <button type="button" class="btn btn-primary" onclick='resetPassword("Teacher");'>Reset</button>
                    <?php
                    } else if ($a == "Student") {
                    ?>
                        <button type="button" class="btn btn-primary" onclick='resetPassword("Student");'>Reset</button>
                    <?php
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>

    <!-- fogot Password Model -->


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>