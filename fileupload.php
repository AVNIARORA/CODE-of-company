<?php
// Where the file is going to be placed

$target_path = "uploads/";

/* Add the original filename to our target path.
Result is "uploads/filename.extension" */
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

// Array of allowed image file formats
$allowedExtensions = array('jpeg', 'jpg', 'jfif', 'png', 'gif', 'bmp');

foreach ($_FILES as $file) {
  if ($file['tmp_name'] > '') {
    if (!in_array(end(explode(".",
            strtolower($file['name']))),
            $allowedExtensions)) {
      echo '<div class="error">Invalid file type.</div>';
    }
  }
}

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
    echo "The file ".  basename( $_FILES['uploadedfile']['name']).
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}

?>
