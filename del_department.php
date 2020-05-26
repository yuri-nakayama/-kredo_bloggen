<?php
  include 'functions/functions.php';

  echo $department_id = $_GET['department_id'];

  delDepartment($department_id);  
?>