<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $user = $_POST['user'];
  $password =  $_POST['password'];

  //read from database
  $query = "select * from accounts where Username = '$user'";

  $result = mysqli_query($con, $query);

  if ($result) {
    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);
      if ($user_data['Password'] === $password) {
        $_SESSION['ID'] = $user_data['ID'];
        header("Location: homepage.php");
        die;
      }
    }
    echo "Wrong username or password!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/94d3d9c85c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>AUKExchange | Log In</title>
</head>

<body>
  <nav class="top-nav">
    <div class="top-nav_content container">
      <h2 class="top-nav_logo"><span class="logo-span">AUK</span>Exchange</h2>
      <ul class="top-nav_list">
        <li class="top-nav_item1">
          <form action="script.js">
            <input type="text" name="search" id="search" placeholder="Enter search terms..." required />
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </li>
        <li class="top-nav_item2"><a href="login.php">Log In</a></li>
        <li class="top-nav_item3"><a href="signup.php">Sign Up</a></li>
      </ul>
    </div>
  </nav>
  <nav class="bottom-nav">
    <div class="bottom-nav_content container">
      <ul class="bottom-nav_list">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="book.php">Textbooks</a></li>
        <li><a href="stationery.php">Stationery</a></li>
        <li><a href="tutoring.php">Tutoring</a></li>
        <li><a href="other.php">Others</a></li>
        <li class="bottom-nav_lastitem"><a <?php if (isset($_user_data['ID'])) { ?> href="ad.php" <?php } else { ?> href="login.php" <?php } ?>>Place an Ad</a></li>
      </ul>
    </div>
  </nav>
  <section class="loginFormContainer container" class="loginFormSection">
    <h2 class="FormHeading">Login Here</h2>
    <form class="loginForm" method="POST">
      <input type="text" name="user" class="loginbox" placeholder="Username" required />
      <input type="password" name="password" class="loginbox" placeholder="Password" required />
      <input type="submit" class="submitbtn" value="Login">
    </form>
  </section>
  <footer class="footer">
    <div class="footer-content container">
      <div class="footer-title">
        <h4 class="footer-title_subject">CSIS 255 Project</h4>
        <h4 class="footer-title_validation">W3C Validation</h4>
      </div>
      <div class="footer-details">
        <ul class="footer-details-names">
          <li>Tareq</li>
          <li>Talal</li>
          <li>Mohammad</li>
          <li>Hamad</li>
        </ul>
        <ul class="footer-details-icons">
          <li>HTML</li>
          <li>CSS</li>
        </ul>
      </div>
    </div>
  </footer>
</body>

</html>