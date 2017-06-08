
<!DOCTYPE html>
 <html lang="en">

<body>

    <?php
    // define variables and set to empty values

    function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
     }

    $nameErr = $qualificationErr = $emailErr = $mobileErr = $experienceErr = $workplaceErr = $salaryErr= "";
    $name = $email = $phone = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST['name']);
      }

      if (empty($_POST["qualification"])) {
        $qualificationErr = "Qualification is required";
      } else {
        $qualification = test_input($_POST['qualification']);
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST['email']);
      }

      if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile number is required";
      } else {
        $mobile = test_input($_POST['mobile']);
      }


     if (empty($_POST["txtage1"])) {
       $experienceErr = "Years of Experience is required";
     } else {
       $experience = test_input($_POST['txtage1']);
     }

    if (empty($_POST["txtage2"])) {
      $workplaceErr = "Current Workplace is required";
    } else {
      $workplace = test_input($_POST['txtage2']);
    }

    if (empty($_POST["txtage3"])) {
     $salaryErr = "Expected Salary is required";
    } else {
     $salary = test_input($_POST['txtage3']);
    }
}


    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "hpcsphere";
    $dsn = "mysql:host=$host;dbname=$database";

    $mysqli = @new mysqli($host, $username, $password, $database);
 if (mysqli_connect_errno())
 {
  printf("Unable to connect to database: %s", mysqli_connect_error());
  exit();
 }else{
  echo "connection successfull";
 }

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $qualification = $_POST['qualification'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $experience = $_POST['txtage1'];
        $workplace = $_POST['txtage2'];
        $salary = $_POST['txtage3'];

            $sql = "INSERT INTO `jobapplication`(`Name`, `Qualification`, `Email`, `Mobile`, `YearsofExperience`, `CurentWorkplace`, `ExpectedSalary`)
            VALUES (`$name`,`$qualification`,`$email`,`$mobile`,`$experience`,`$workplace`,`$salary`)";
            $conn->query($sql);
            echo "<br>";
            echo "New record created successfully";

        }

    exit("Connection failed: " . $e->getMessage());
    ?>

    <?php
    //PHP CODE TO GET A DIALOG BOX ONCE THE FORM IS SUBMITTED...
    $posted = false;
      if( $_POST ) {
        $posted = true;
      $result = $_POST['name'];
    }

    if($posted)
    {
         if ($result) {
            echo "<script type='text/javascript'>alert('submitted successfully!Thanks for your response. We will get back to you soon!')</script>";
         }
        else
        {
            echo "<script type='text/javascript'>alert('failed!')</script>";
        }
    }
    ?>

</body>
</html>
