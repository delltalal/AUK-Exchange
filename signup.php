<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $fname = $_POST['Fname'];
  $lname = $_POST['Lname'];
  $user = $_POST['user'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $number = $_POST['number'];
  $password =  $_POST['password'];

  $query = "insert into accounts (Username,Fname,Lname,Email,Location,Phone_Num,Password) values ('$user','$fname','$lname','$email','$location','$number','$password')";

  mysqli_query($con, $query);
  header("Location: login.php");
  die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/94d3d9c85c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>AUKExchange | Sign Up</title>
</head>

<body>
    <nav class="top-nav">
        <div class="top-nav_content container">
            <h2 class="top-nav_logo"><span class="logo-span">AUK</span>Exchange</h2>
            <ul class="top-nav_list">
                <li class="top-nav_item1">
                    <form action="search.php" method="GET">
                        <input type="text" name="search" id="search" placeholder="Enter search terms..." required />
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <li class="top-nav_item2"><a href="login.php">Log In</a></li>
                <li class="top-nav_item3">
                    <a class="highlight-yellow" href="signup.php">Sign Up</a>
                </li>
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
                <li class="bottom-nav_lastitem"><a <?php if (isset($_user_data['ID'])) { ?> href="create_ad.php"
                        <?php } else { ?> href="login.php" <?php } ?>>Place an Ad</a></li>
            </ul>
        </div>
    </nav>
    <section class="signupFormContainer container">
        <h2 class="FormHeading">Sign Up Here</h2>
        <form class="signupForm" id="signupForm" action="signup.php" method="POST">
            <input type="text" name="Fname" class="textbox" id="signupFname" placeholder="First Name" required />
            <input type="text" name="Lname" class="textbox" id="signupLname" placeholder="Last Name" required />
            <input type="text" name="user" class="textbox" id="signupUser" placeholder="Username" required />
            <input type="email" name="email" class="textbox" id="signupEmail" placeholder="Email" required />
            <select class="textbox" name="location" required>
                <option value="" disabled selected>Location</option>
                <option>Abdalah Port</option>
                <option>Abdullah Al Mubarak - West Jleeb</option>
                <option>Abohasanya</option>
                <option>Abuftaira</option>
                <option>Abuhalifa</option>
                <option>Adailiya</option>
                <option>Adan</option>
                <option>Ahmadi</option>
                <option>Ahmadi port</option>
                <option>Andalous</option>
                <option>Ardya</option>
                <option>Ardya Industrial</option>
                <option>Ashbeliah</option>
                <option>Bayan</option>
                <option>Bedaae</option>
                <option>Bneid-Gar</option>
                <option>Canada Dry</option>
                <option>Dahya</option>
                <option>Daiya</option>
                <option>Dasma</option>
                <option>Dasman</option>
                <option>Dhaher</option>
                <option>Dhajeej</option>
                <option>Doha</option>
                <option>Egiala</option>
                <option>Establat</option>
                <option>Fahaheel</option>
                <option>Fahedsalem</option>
                <option>Faiha</option>
                <option>Farwaniya</option>
                <option>Farwaniya Hospital</option>
                <option>Ferdous</option>
                <option>Fintas</option>
                <option>Fnaitess</option>
                <option>Ghornata</option>
                <option>Hadiya</option>
                <option>Hawally</option>
                <option>Hitteen</option>
                <option>Jaber elali</option>
                <option>Jabriya</option>
                <option>Jahra</option>
                <option>Jahra Industrial</option>
                <option>Jahraa Hospital</option>
                <option>Jleeb Residential</option>
                <option>Jiwan</option>
                <option>Kaifan</option>
                <option>Khaitan</option>
                <option>Khaldiya</option>
                <option>Mahboula</option>
                <option>Manqaf</option>
                <option>Mansouriya</option>
                <option>Messila</option>
                <option>Maidan Hawally</option>
                <option>Mirqab</option>
                <option>Mishref</option>
                <option>Mubarak Kabeer</option>
                <option>Mubarakiya</option>
                <option>Naeem</option>
                <option>Nahda</option>
                <option>Nasseem</option>
                <option>New Andlos</option>
                <option>New Messila</option>
                <option>North West Al Sulaibekhat</option>
                <option>Nuzha</option>
                <option>Omalhiyman</option>
                <option>Omariya</option>
                <option>Oyoun</option>
                <option>Qadsiya</option>
                <option>Qairawan</option>
                <option>Qasr</option>
                <option>Qortuba</option>
                <option>Qurain</option>
                <option>Qurain Markets</option>
                <option>Qusour</option>
                <option>Rabiya</option>
                <option>Rai</option>
                <option>Rawda</option>
                <option>Reggai</option>
                <option>Rehab</option>
                <option>Riqqa</option>
                <option>Rumaithiya</option>
                <option>Saadabdalah</option>
                <option>Sabah nasser</option>
                <option>Sabahiya</option>
                <option>Sabahsalem</option>
                <option>Sabhan</option>
                <option>Salam</option>
                <option>Salmiya</option>
                <option>Salwa</option>
                <option>Sawaber</option>
                <option>Shaab</option>
                <option>Shamiya</option>
                <option>Sharq</option>
                <option>Shuhada</option>
                <option>Shuwaikh Hospital</option>
                <option>Shuwaikh Hesidential</option>
                <option>Shuwaikh Industrial</option>
                <option>Siddiq</option>
                <option>South Jahra</option>
                <option>Sulabiya Industrial</option>
                <option>Sulaibikhat</option>
                <option>Sulaibiya</option>
                <option>Surra</option>
                <option>Tima</option>
                <option>Waha</option>
                <option>West Fintas</option>
                <option>West Mishref</option>
                <option>Yarmouk</option>
                <option>Zahra</option>
            </select>
            <input type="number" name="number" class="textbox" id="signupphoneNumber" placeholder="Phone Number"
                required />
            <input type="password" name="password" class="textbox" id="signupPassword" placeholder="Password"
                required />
            <input type="submit" class="submitbtn" Sign Up" />
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