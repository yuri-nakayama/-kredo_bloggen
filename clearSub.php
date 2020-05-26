<?php 
session_start();
unset($_SESSION['subject_id']);
header('location:disp_student_list.php');


?>