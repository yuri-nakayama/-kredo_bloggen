<?php
  include 'functions/functions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>disp subject list</title>
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
        <a href="add_subject.php" class="btn btn-outline-primary btn-block">Add Subject</a>
        <br>
        <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
      </div>
      <div class="col-lg-8 mx-auto">
        <div class="alert alert-danger text-uppercase">
          list of all kredo subject
        </div>
        <div class="row px-3">
          <?php
            $subject_id = "-1";// select all student
            $data = getSubject($subject_id);
            foreach ($data as $row):
          ?>
          <div class="col-lg-4 p-0">
            <div class="card text-center">
              <div class="card-header bg-secondary text-white">
                <?php echo $row['subject_name']?>
              </div>
              <div class="card-body">
                <p class="card-text text-secondary">
                  <?php echo $row['subject_description']?>
                </p>
                <div class="col-lg-12 text-right">
                  <a href="del_subject.php?subject_id=<?php echo $row['subject_id']?>" class="text-danger">
                    <i class="fas fa-book-dead fa-2x fa-fw"></i>
                  </a>
                  <a href="upd_subject.php?subject_id=<?php echo $row['subject_id']?>"  class="text-success">
                    <i class="fas fa-angle-double-right fa-2x fa-fw"></i>
                  </a>
                </div>
              </div>
            </div>         
          </div>
          <?php 
            endforeach;
          ?>
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