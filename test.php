<!DOCTYPE html>
<html lang="en">
<body>

<h1>PHP page</h1>

<?php
echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';
?>

</body>
</html>
