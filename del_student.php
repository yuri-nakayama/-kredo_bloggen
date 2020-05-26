<?php
  include 'functions/functions.php';

  echo $student_id = $_GET['student_id'];

  delStudent($student_id);  
?>