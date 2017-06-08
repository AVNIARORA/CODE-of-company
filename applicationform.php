
<!DOCTYPE html>
 <html lang="en">

<body>

  <?php

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
    }
    if (file_exists($target_file)) {
       echo "Sorry, file already exists.";
       $uploadOk = 0;
   }

   // Check file size
if ($_FILES["fileupload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileupload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "hpcsphere";
    $dsn = "mysql:host=$host;dbname=$database";

    $conn = @new mysqli($host, $username, $password, $database);
 if (mysqli_connect_errno())
 {
  printf("Unable to connect to database: %s", mysqli_connect_error());
  exit();
 }else{
  echo nl2br("Connection successful \n \n");
 }

     function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     $data = preg_replace('/\s+/', '', $data);
     return $data;
     }

    if(isset($_POST["submit"])) {

        $name = test_input($_POST['name']);
        $qualification = test_input($_POST['qualification']);
        $email = test_input($_POST['email']);
        $mobile = test_input($_POST['mobile']);
        $experience = test_input($_POST['txtage1']);
        $workplace = test_input($_POST['txtage2']);
        $salary = test_input($_POST['txtage3']);
    }
//Add Code here to check that if it is a yes as the radio button, then the 3
//fields are not empty. It can run sql if conditions are satisfied. Before doing this, get checkyes() function checked.

$answer = $_POST['choice1'];
if ($answer == "yes") {
  if ( $experience == "")
   {
      echo'Form Incomplete! Enter your years of experience';
      return false;
   }

   else if ( $workplace == "")
    {
       echo 'Form Incomplete! Enter your current workplace';
       return false;
    }
    else if ( $salary == "")
     {
        echo 'Form Incomplete! Enter your expected salary';
        return false;
     }
}

        $sql = "INSERT INTO `jobapplication`(`Name`, `Qualification`, `Email`, `Mobile`, `YearsofExperience`, `CurentWorkplace`, `ExpectedSalary`)
          VALUES ('$name','$qualification','$email','$mobile','$experience','$workplace','$salary')";
            //$mysqli->query($mysqli,$sql);

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!<br/>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    //PHP CODE TO GET A DIALOG BOX ONCE THE FORM IS SUBMITTED...
    $posted = false;
      if( $_POST ) {
        $posted = true;
      $result = $_POST['name'];
    }

    if($posted)
    {
         if ($result) {
            echo "Thanks for your response. We will get back to you soon!";
         }
        else
        {
            echo "Submission Failed!!";
        }
    }

    $conn->close();
    ?>

</body>
</html>
