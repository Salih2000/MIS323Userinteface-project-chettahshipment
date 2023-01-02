<?php

if ($_POST) {
  // Sanitize and validate form data
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $password = mysqli_real_escape_string($db, $_POST['psw']);

  // Check if username and password match a user in the database
  $stmt = mysqli_prepare($db, "SELECT * FROM users WHERE username = ? AND password = ?");
  mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if (mysqli_num_rows($result) > 0) {
    // Login successful, redirect to home page
    header("Location: /home.php");
  } else {
    // Login failed, display error message
    echo "Error: Invalid username or password";
  }
  mysqli_stmt_close($stmt);
}

?>