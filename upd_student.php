<?php
  include 'functions/functions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>upd student</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
        <a href="disp_student_list.php" class="btn btn-outline-primary btn-block">View Student List</a>
        <br>
        <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
      </div>
      <div class="col-lg-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <h3>Edit Student Profile</h3>
          </div>
          <div class="card-body">
            <?php 
              $student_id = $_GET['student_id'];// select all student
              $subject_id = "-1";            
              $data = getStudent($student_id, $subject_id);
            ?>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Student Fisrt Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $data[0]['first_name']?>">
              </div>
              <div class="form-group">
                <label for="">Student Last Name</label>
                <input type="text" name="lname" id="" class="form-control" value="<?php echo $data[0]['last_name']?>">
              </div>
              <div class="form-group">
                <label for="">Student Username</label>
                <input type="text" name="username" id="" class="form-control" value="<?php echo $data[0]['username']?>">
              </div>
              <div class="form-group">
                <label for="">Student Password</label>
                <input type="password" name="password" id="" class="form-control" value="<?php echo $data[0]['password']?>">
              </div>
              <div class="form-group">
                <label for="">Student Email</label>
                <input type="text" name="email" id="" class="form-control" value="<?php echo $data[0]['email']?>">
              </div>
              <div class="form-group">
                <label for="">Subject</label>
                <?php var_dump(intval($data[0]['subject_id']));?>
                
                <select name="subject_id" id="" class="form-control">
                  <option value="<?php echo intval($data[0]['subject_id'])?>"  selected>
                    <?php echo $data[0]['subject_name']?>
                  </option>
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
                <?php var_dump($subject_data);?>
              </div>

              <div class="form-group">
                <label for="">Student Picture</label>
                <div class="custom-file">
                  <input type="file" name="img" id="img" class="custom-file-input">
                  <label class="custom-file-label" for="">
                    <?php echo $data[0]['student_pic']?>
                  </label>
                </div>
              </div>

              <input type="submit" name="saveBtn" value="Save" class="btn btn-warning btn-block">
            </form>
            <?php
              if (isset($_POST['saveBtn'])) {

                $student_id = $_GET['student_id'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $subject_id = $_POST['subject_id'];
                $img = $_FILES['img']['name'];// first[] is for element name, second[] is for machine's temporary name
                // $img = "dog.jpeg";
                
                updStudent($student_id, $fname, $lname, $username, $password, $email, $subject_id, $img);

                echo "<br>";
                echo "<div class='alert alert-success text-center'>
                      SUCESSFUL!!!
                      </div>";

              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>