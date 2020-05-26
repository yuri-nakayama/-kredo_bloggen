<?php
  include 'functions/functions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>disp student</title>
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
        <br>
        <br>
        <a href="upd_student.php?student_id=<?php echo $_GET['student_id']?>" class="btn btn-outline-warning 
        btn-block">
          Edit User
        </a>
        <br>        
        <a href="del_student.php?student_id=<?php echo $_GET['student_id']?>" class="btn btn-outline-danger btn-block">
          Delete Student
        </a>
        <br>
      </div>
      <?php
        $student_id = $_GET['student_id'];
        $subject_id = "-1";
        $data = getStudent($student_id, $subject_id);
        ?>
      <div class="col-lg-8 mx-auto">
        <div class="card text-center">
          <div class="card-header">
            <?php 
              $img = $data[0]['student_pic'];
              if ($img):
            ?>
              <img class="card-img-top w-25 mx-auto" src="uploads/<?php echo $data[0]['student_pic']?>" alt="">
            <?php endif;?>
          </div>
          <div class="card-body">
            <div class="row mx-auto mb-3">
              <h3>Student Profile</h3>
            </div>
            <table class="table table-striped text-left table-bordered">
              <tbody>
                <tr>
                  <th>First Name</th>
                  <td><?php echo $data[0]['first_name'] ?></td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td><?php echo $data[0]['last_name'] ?></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td><?php echo $data[0]['username'] ?></td>
                </tr>
                <tr>
                  <th>Password</th>
                  <td><?php echo $data[0]['password'] ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $data[0]['email'] ?></td>
                </tr>
                <tr>
                  <th>Subject</th>
                  <td><?php echo $data[0]['subject_name'] ?></td>
                </tr>
              </tbody>
            </table>           
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