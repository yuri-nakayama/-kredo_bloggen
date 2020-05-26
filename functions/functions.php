<?php 
  include 'connection.php';

  function addTeacher ($first_name, $last_name, $username, $password, $email, $department_id) {
    
    $con = connection();
    // sql
    $sql = "INSERT INTO teachers (first_name, last_name, username, password, email, department_id) 
            VALUES ('$first_name', '$last_name', '$username', '$password', '$email', '$department_id')";
    $res = $con->query($sql);

    if ($res) {
      header('location: login.php');

    } else {
      echo $sql. "<br>";
      die('error inserting in the teachers table: '.$con->error);

    }   

  }

  function login ($username, $password) {

    $con = connection();
    // sql
    $sql = "SELECT * FROM teachers WHERE username = '$username' AND password = '$password'";
    $res = $con->query($sql);

    if ($res) {

      if ($res->num_rows == 1) {

        $row = $res->fetch_assoc();
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['username'] = $row['username'];       
        header('location: dashboard.php');

      } else {
        echo "Dosent't Exist!";

      }

    } else {
      echo $sql. "<br>";
      die('error selecting in teachers table: '.$con->error);

    }

  }

  function addStudent ($first_name, $last_name, $username, $password, $email, $subject_id, $img) {

    // $target_dir = 'uploads/';// directory
    // $target_file = $target_dir.basename($img);// basename() - retrurns string, gives you the filename if you specify the file path

    $con = connection();
    // sql
    // $sql = "INSERT INTO students (first_name, last_name, username, password, email, subject_id, student_pic) 
    //         VALUE ('$first_name', '$last_name', '$username', '$password', '$email', '$subject_id', '$target_file');";
    $sql = "INSERT INTO students (first_name, last_name, username, password, email, subject_id) 
            VALUE ('$first_name', '$last_name', '$username', '$password', '$email', '$subject_id');";
    $res = $con->query($sql);

    if ($res) {
      // header('location: login.php');

    } else {
      echo $sql. "<br>";
      die('error inserting in the students table: '.$con->error);

    } 

  }

  function getStudent ($student_id, $subject_id) {

    $con = connection();
    // sql
    $sql = "SELECT * FROM students";
    if ($student_id != "-1") {
      $sql = $sql. 
            " INNER JOIN subject ON students.subject_id = subject.subject_id
             WHERE students.student_id = '$student_id'";
    }
    if ($subject_id != "-1") {
      $sql = $sql. 
            " INNER JOIN subject ON students.subject_id = subject.subject_id
             WHERE subject.subject_id = '$subject_id'";
    }
    $res = $con->query($sql);

    $data = array();
    if ($res) {

      if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {
          $data[] = $row;
        }
        
      } else {
        echo "Dosent't Exist!";

      }

    } else {
      echo $sql. "<br>";
      die('error selecting in students table: '.$con->error);

    }

    return $data;
  
  }

  function delStudent ($student_id) {

    $con = connection();
    $sql = "DELETE FROM students WHERE student_id = '$student_id'";
    $res = $con->query($sql);

    if ($res) {
      header('location: disp_student_list.php');

    } else {
      echo $sql. "<br>";
      die('error deleting in students table: '.$con->error);

    }

    // close
    $con->close();

  }

  function updStudent ($student_id, $first_name, $last_name, $username, $password, $email, $subject_id, $img) {

    // $target_dir = 'uploads/';// directory
    // $target_file = $target_dir.basename($img);// basename() - retrurns string, gives you the filename if you specify the file path
    
    $con = connection();
    $sql = "UPDATE students 
            SET first_name = '$first_name',
                last_name = '$last_name',
                username = '$username',
                password = '$password',
                email = '$email',
                subject_id = '$subject_id'
            WHERE student_id = '$student_id'";
                // student_pic = '$target_file'

    $res = $con->query($sql);

    if ($res) {
      // header('location: disp_student.php);
      
    } else {
      echo $sql. "<br>";
      die('error updating in students table: '.$con->error);

    }

    // close
    $con->close();

  }

  function addSubject ($subject_name, $description) {

    $con = connection();
    // sql
    $sql = "INSERT INTO subject (subject_name, subject_description) 
            VALUE ('$subject_name', '$description');";
    $res = $con->query($sql);

    if ($res) {
      // header('location: login.php');

    } else {
      echo $sql. "<br>";
      die('error inserting in the subject table: '.$con->error);

    } 

  }

  function getSubject ($subject_id) {

    $con = connection();
    $sql = "SELECT * FROM subject";
    if ($subject_id != "-1") {
      $sql = $sql. " WHERE subject_id = '$subject_id'";
    }
    $res = $con->query($sql);

    $data = array();
    if ($res) {

      if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {
          $data[] = $row;
        }
        
      } else {
        echo "Dosent't Exist!";

      }

    } else {
      echo $sql. "<br>";
      die('error selecting in the subject table: '.$con->error);

    } 

    return $data;

  }

  function delSubject ($subject_id) {

    $con = connection();
    $sql = "DELETE FROM subject WHERE subject_id = '$subject_id'";
    $res = $con->query($sql);

    if ($res) {
      header('location: disp_subject_list.php');

    } else {
      echo $sql. "<br>";
      die('error deleting in the subject table: '.$con->error);

    }

    // close
    $con->close();

  }  

  function updSubject ($subject_id, $subject_name, $subject_desc) {

    $con = connection();
    $sql = "UPDATE subject 
            SET subject_name = '$subject_name',
                subject_description = '$subject_desc'
            WHERE subject_id = '$subject_id'";
    $res = $con->query($sql);

    if ($res) {
      // header('location: disp_subject_list.php');

    } else {
      echo $sql. "<br>";
      die('error updating in the subject table: '.$con->error);

    }

    // close
    $con->close();

  }  

  function addDepartment ($department_name, $description) {
    
    $con = connection();
    $sql = "INSERT INTO department (department_name, department_desc)
            VALUES ('$department_name', '$description')";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>";
      die('error inserting in the department table: '. $con->error);

    }

  }

  function getDepartment ($department_id) {

    $con = connection();
    $sql = "SELECT * FROM department";
    if ($department_id != "-1") {
      $sql = $sql. " WHERE department_id = '$department_id'";
    }
    $res = $con->query($sql);

    $data = array();

    if ($res) {

      if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {
          $data[] = $row;
          
        }

      } else {
        echo "Dosent't Exist!";

      }
      

    } else {
      echo $sql. "<br>";
      die('error selecting in the department table: '. $con->error);

    }

    return $data;

  }

  function delDepartment ($department_id) {

    $con = connection();
    $sql = "DELETE FROM department WHERE department_id = '$department_id'";
    $res = $con->query($sql);

    if ($res) {
      header('location: disp_department_list.php');

    } else {
      echo $sql. "<br>";
      die('error deleting in the department table: '. $con->error);

    }

    //close
    $con->close;
    
  }

  function updDepartment ($department_id, $department_name, $department_desc) {
    
    $con = connection();
    $sql = "UPDATE department 
            SET department_name = '$department_name',
                department_desc = '$department_desc'
            WHERE department_id = '$department_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>";
      die('error updating in the department table: '. $con->error);

    }

    // close
    $con->close();

  }

?>