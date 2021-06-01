<!-- 
    Session
    Navigation
    Footer
    Hamad Al-Hendi S0004067 

    Account information display
    Mohammad Al-Mousawi S0042068
-->
 <!--
    Search functionality
    Talal Al-Failakawi 47597
-->
<?php
//starts a session and saves the data of the user within $_user_data
session_start();
include("connection.php");
include("functions.php");

$_user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/94d3d9c85c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>AUKExchange | Account</title>
</head>

<body>
    <!-- top navigation containing the logo of the website, a search option, login/account details, and a signup/logout. -->
    <nav class="top-nav">
        <div class="top-nav_content container">
            <!-- logo -->
            <a href="homepage.php">
                <h2 class="top-nav_logo"><span class="logo-span">AUK</span>Exchange </h2>
            </a>
            <ul class="top-nav_list">
                <!-- the search option by Talal 47597-->
                <li class="top-nav_item1">
                    <form action="search.php" method="POST">
                        <input type="text" name="search" id="search" placeholder="Search" required />
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <!-- if a $_user_data's ID is set display their username and a logout option, else display the login and signup options. -->
                <?php if (isset($_user_data['ID'])) { ?>
                <li class="top-nav_item2"><a class="highlight-dark-yellow" href="account.php"><i
                            class="fas fa-user fa-lg"></i>&nbsp; <?php echo $_user_data['Username'] ?></a></li>
                <li class="top-nav_item3"><a href="logout.php">Log Out</a></li>

                <?php } else { ?>

                <li class="top-nav_item2"><a href="login.php">Log In</a></li>
                <li class="top-nav_item3"><a href="signup.php">Sign Up</a></li>

                <?php } ?>
            </ul>
        </div>
    </nav>
    <nav class="bottom-nav">
        <div class="bottom-nav_content container">
            <!-- a list of webpages that the user can navigate to -->
            <ul class="bottom-nav_list">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="book.php">Textbooks</a></li>
                <li>
                    <a href="stationery.php">Stationery</a>
                </li>
                <li><a href="technology.php">Technology</a></li>
                <li><a href="other.php">Others</a></li>
                <!-- if the $_user_data is set/logged in then the user can create an ad, else direct the user to the
                login page. -->
                <li class="bottom-nav_lastitem"><a <?php if (isset($_user_data['ID'])) { ?> href="create_ad.php"
                        <?php } else { ?> href="login.php" <?php } ?>>Place an Ad</a></li>
            </ul>
        </div>
    </nav>

    <main class="account_main container">
        <h1 class="account_heading"><?php echo $_user_data['Username'] ?>'s Account</h1>
        <div class="account_content">
            <ul class="account_list">
                <li class="first-item">Navigation</li>
                <li><a class="highlight-dark-yellow" href="account.php">Account Information</a></li>
                <li><a href="active_ads.php">Active Ads</a></li>
            </ul>

            <ul class="account_info">
                <li class="account_info_title">Account Information</li>
                <li>
                    <span>Name:</span> <?php echo $_user_data['Fname'] ?> <?php echo $_user_data['Lname'] ?>
                </li>
                <li><span>Username:</span> <?php echo $_user_data['Username'] ?> </li>
                <li>
                    <span>
                        Email:</span> <?php echo $_user_data['Email'] ?>
                </li>
                <li><span>Location:</span> <?php echo $_user_data['Location'] ?></li>
                <li><span>Phone Number:</span> <?php echo $_user_data['Phone_Num'] ?></li>
            </ul>
        </div>
    </main>
    <!-- prints out the footer -->
    <?php footer();
    ?>
</body>

</html>