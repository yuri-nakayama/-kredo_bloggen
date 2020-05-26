<?php
  include 'functions/functions.php';
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-dark text-center text-white m-0">
      <h3>Kredo Bloggen</h3>
    </div>
    <div class="bg-info mx-auto">
      <div class="col-lg-12 text-center text-uppercase text-white">
        <p class="lead">
          hello! teacher 
          <?php echo $_SESSION['first_name']?>
        </p>    
      </div>
    </div>
    <div class="jumbotron jumbotron-fluid bg-white m-0">
      <div class="row text-center mx-auto">
        <div class="col-lg-4">
          <p class="display-3"><i class="fas fa-user-plus"></i></p>
          <a href="add_student.php" class="btn btn-sm btn-outline-primary btn-block">
            Add Student
          </a>
        </div>
        <div class="col-lg-4">
          <p class="display-3"><i class="fas fa-book"></i></p>
          <a href="add_subject.php" class="btn btn-sm btn-outline-warning btn-block">
            Add Subject
          </a>
        </div>
        <div class="col-lg-4">
          <p class="display-3"><i class="fas fa-building"></i></p>
          <a href="add_department.php" class="btn btn-sm btn-outline-secondary btn-block">
            Add Department
          </a>
        </div>
      </div>
      <div class="row text-center mx-auto mt-5">
        <div class="col-lg-4">
          <p class="display-3"><i class="fas fa-address-book"></i></p>
          <a href="disp_student_list.php" class="btn btn-sm btn-outline-success btn-block">
            View Student List
          </a>
        </div>
        <div class="col-lg-4">
          <p class="display-3"><i class="fas fa-book-open"></i></p>
          <a href="disp_subject_list.php" class="btn btn-sm btn-outline-danger btn-block">
            View Subject List
          </a>
        </div>
        <div class="col-lg-4">
          <p class="display-3"><i class="far fa-list-alt"></i></p>
          <a href="disp_department_list.php" class="btn btn-sm btn-outline-info btn-block">
            View Department List
          </a>
        </div>
      </div>      
    </div> 
    <div class="container container-fluid">
      <a class="btn btn-danger btn-block" href="logout.php">Logout</a>
    </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
