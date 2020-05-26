<?php
  include 'functions/functions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>upd subject</title>
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
        <a href="disp_subject_list.php" class="btn btn-outline-primary btn-block">View Subject List</a>
        <br>
        <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
      </div>
      <div class="col-lg-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <h3>Edit Subject</h3>
          </div>
          <div class="card-body">
            <?php 
              $data = getSubject($_GET['subject_id']);
            ?>
            <form action="" method="post">
              <div class="form-group">
              <label for="">Subject Name</label>
                <input type="text" name="subject_name" class="form-control" value="<?php echo $data[0]['subject_name']?>">
              </div>
              <div class="form-group">
                <label for="">Subject Description</label>
                <input type="text" name="subject_desc" id="" class="form-control" value="<?php echo $data[0]['subject_description']?>">
              </div>
              <input type="submit" name="saveBtn" value="Save" class="btn btn-warning btn-block">
            </form>
            <?php
              if (isset($_POST['saveBtn'])) {
                
                $subject_id = $_GET['subject_id'];
                $subject_name = $_POST['subject_name'];
                $subject_desc = $_POST['subject_desc'];

                updSubject($subject_id, $subject_name, $subject_desc);

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