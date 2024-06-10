<?php
session_start();
require "connection.php";
if (isset($_SESSION["us"])) {
?>




    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy | Student Area</title>
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
                            <h3 class="text-black-50 fst-itali text-center mb-5">Student Area | Payment Area </h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5  mb-3 mb-md-0 resize1">
                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gotoStudentArea();">My Profle</button>
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
                                                    <a class="nav-link link-danger active bg-danger" aria-current="page" href="teacherRegistation.php">Payment </a>

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
                                                <h5 class="text-danger  text-start ms3 mb-2" id="msg2"></h5>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Student Name</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" id="studentname" class="form-control text-black-50 fs-5 text-center" placeholder="type your first and last name" />
                                                </div>
                                            </div>


                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Email</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="email" id="email2" class="form-control text-black-50 fs-5 text-center" placeholder="type your email" />
                                                </div>
                                            </div>



                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Payment Option</p>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-select text-black-50 fs-5 text-center" disabled id="payment_option">

                                                        <?php
                                                        $rs = Database::search("SELECT * FROM `students` INNER JOIN `payment_structures` ON `payment_structures`.id = `students`.payment_structures_id  WHERE `students`.`id` = '" . $_SESSION["us"]["id"] . "';");
                                                        $n = $rs->num_rows;
                                                        for ($i = 0; $i < $n; $i++) {
                                                            $data = $rs->fetch_assoc();
                                                        ?>
                                                            <option value='<?php echo $data["payment_structures_id"]; ?>'><?php echo $data["name"]; ?></Php>
                                                            </option>
                                                        <?php
                                                        }

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start">Amount</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" id="amount" class="form-control text-black-50 fs-5 text-center" placeholder="Select the amount" />
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <p class="fs-5 text-dark text-start ">Grade which the payment for</p>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control text-black-50 fs-5 text-center" placeholder="Type the grade" id="grade" />
                                                </div>
                                            </div>








                                            <div class="row my-2">
                                                <div class="col-8 offset-2 col-lg-4 ms-lg-3 mt-lg-3">
                                                    <div class="row d-grid">
                                                        <button class="btn btn-success" onclick="payModelOpen();">Process</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- /Admin details  -->


                            </div>
                        </div>

                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3" style="margin-bottom: 35px;">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2" onclick="gotoStudentAssignments();">Assignments</button>
                            </div>


                            <div class="row d-grid rbutton">
                                <button class="btn btn-warning my-2" onclick="gotoStudentLectureNotes();">Lecture Notes</button>
                            </div>


                            <div class="row d-grid rbutton1">
                                <button class="btn btn-danger my-2 disabled">Payment</button>
                            </div>


                        </div>


                    </div>


                </div>
            </div>
        </div>



        <!-- Model -->

        <div class="modal fade" tabindex="-1" id="paymentGetwayModel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="row">
                                <h5 class="text-danger  text-start ms3 mb-2" id="msg"></h5>
                            </div>


                            <div class="col-12">
                                <lable class="form-lable">Card Holder</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="ch" />
                                </div>
                            </div>

                            <div class="col-12">
                                <lable class="form-lable">Card Number</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="cn" />
                                </div>
                            </div>

                            <div class="col-12">
                                <lable class="form-lable">Expire Date</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="ed" />
                                </div>
                            </div>

                            <div class="col-12">
                                <lable class="form-lable">CVC</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="cvc" />
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" onclick="payment();">Pay</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Model -->

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
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
