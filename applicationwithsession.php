
<!DOCTYPE html>
 <html lang="en">

<body>

    <?php
    
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

  //  try {

    //$conn = new mysqli( $host, $username, $password, $database );
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["submit"])) {
        $name = $_POST["name"];
        $qualification = $_POST["qualification"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $experience = $_POST["txtage1"];
        $workplace = $_POST["txtage2"];
        $salary = $_POST["txtage3"];
}

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


//Add Code here to check that if it is a yes as the radio button, then the 3
//fields are not empty. It can run sql if conditions are satisfied. Before doing this, get checkyes() function checked.

        $sql = "INSERT INTO `jobapplication`(`Name`, `Qualification`, `Email`, `Mobile`, `YearsofExperience`, `CurentWorkplace`, `ExpectedSalary`)
          VALUES ('$name','$qualification','$email','$mobile','$experience','$workplace','$salary')";
            //$mysqli->query($mysqli,$sql);

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
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
            echo "<script type='text/javascript'>alert('submitted successfully!Thanks for your response. We will get back to you soon!')</script>";
         }
        else
        {
            echo "<script type='text/javascript'>alert('failed!')</script>";
        }
    }

    $conn->close();
    ?>

</body>
</html>
