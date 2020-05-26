<?php
  include 'functions/functions.php';

  echo $subject_id = $_GET['subject_id'];

  delSubject($subject_id);  
?>