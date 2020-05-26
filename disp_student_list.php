<?php
  include 'functions/functions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>disp student list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-dark text-center text-white">
      <h3>Kredo Bloggen</h3>
    </div>
    <div class="row mx-auto mb-5">
      <div class="col-lg-3 mx-auto">
        <a href="dashboard.php" class="btn btn-outline-primary btn-block">HomePage</a>
        <br>
        <a href="add_student.php" class="btn btn-outline-primary btn-block">Add Student</a>
        <br>
        <div class="form-group">
          <form action="" method="post">
            <select name="subject_id" id="" 
            class="form-control">
              <option value="" disabled selected></option>
            <?php
              $subject_id = "-1";// select all department
              $subject_data = getSubject($subject_id);
              foreach ($subject_data as $row):
            ?>
              <option value="<?php echo $row['subject_id']?>">
                <?php echo $row['subject_name']?>
              </option>
            <?php
              endforeach;
            ?>
            </select>
          </form>
          <a href="disp_student_list.php?subject_id=<?php echo $_POST['subject_id']?>" 
                  class="btn btn-outline-success btn-block">Display Student</a>
        </div>
        <!-- <br> -->
        <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
      </div>
      <div class="col-lg-8 mx-auto">
        <div class="alert alert-warning text-uppercase">
          list of all kredo students
        </div>
        <?php
          $student_id = "-1";// select all student
          $subject_id = $_GET['subject_id'];
          if (!$subject_id) {
            $subject_id = "-1";
          }
          $data = getStudent($student_id, $subject_id);
          foreach ($data as $row):
        ?>
        <div class="alert alert-success">
          <div class="row">
            <div class="col-lg-12">
              <h6>Student Last Name:</h6>
            </div>            
          </div>
          <div class="row">
            <div class="col-lg-6">
              <?php echo $row['last_name']?>
            </div>
            <div class="col-lg-6 text-primary text-right text-bottom">
              <a href="del_student.php?student_id=<?php echo $row['student_id']?>">
                <i class="fas fa-user-times fa-2x fa-fw"></i>
              </a>
              <a href="disp_student.php?student_id=<?php echo $row['student_id']?>">
                <i class="fas fa-angle-double-right fa-2x fa-fw"></i>
              </a>
            </div>
          </div>
        </div>
        <?php 
          endforeach;
        ?>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>