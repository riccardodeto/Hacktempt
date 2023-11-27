<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'connection.php';
    $conn = OpenCon();
    echo "DB Connected Successfully";
    $row = getUsers($conn)->fetch_assoc();
    echo "<br> L'username dell'utente è: ".$row['username']."<br>";
    CloseCon($conn);
    ?>
  </body>
</html>
