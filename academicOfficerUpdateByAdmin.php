<?php

session_start();
require "connection.php";

$id = $_POST["id"];
$notes = $_POST["notes"];
$teachers = $_POST["teachers"];
$status = $_POST["status"];

// echo $id." ";
// echo $grade." ";
// echo $subject." ";
// echo $status." ";

if ($id == "0") {
    echo "please select a academic officer";
}  else if ($teachers == "0") {
    echo "please select a teacher";
} else {

    $rs2 = Database::search("SELECT * FROM `academic_officers_has_teachers` WHERE `academic_officers_id` = '" . $id . "'; ");


//asigning or updating a teacher to academic officer
    if ($rs2->num_rows == 0) {     
        
        Database::iud("INSERT INTO `academic_officers_has_teachers`(`academic_officers_id`,`teachers_id`) VALUES('".$id."','".$teachers."');");
        Database::iud("UPDATE `academic_officers` SET `notes`='" . $notes . "'  WHERE `id`='" . $id . "'; ");
    
    } else {

        Database::iud("UPDATE `academic_officers_has_teachers` SET `teachers_id`='" . $teachers . "', WHERE `academic_officers_id`='" . $id . "'; ");
        Database::iud("UPDATE `academic_officers` SET `notes`='" . $notes . "' WHERE `id`='" . $id . "'; ");
        
    }


  

    if ($status != "0") {
        Database::iud("UPDATE `academic_officers` SET `status_id`='" . $status . "' WHERE `id`='" . $id . "'; ");
    }

    echo "Update successfull";
}
