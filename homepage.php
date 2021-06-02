<!--
Session
Navigation
Header
Item Slider
Footer
Hamad Al-Hendi S0004067
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/94d3d9c85c.js" crossorigin="anonymous"></script>
    <script src="slider.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <title>AUKExchange | Home</title>
</head>

<body>
    <!-- top navigation containing the logo of the website, a search option, login/account details, and a signup/logout. -->
    <nav class="top-nav">
        <div class="top-nav_content container">
            <!-- logo -->
            <a href="homepage.php"> <h2 class="top-nav_logo"><span class="logo-span">AUK</span>Exchange  </h2> </a>
            <ul class="top-nav_list">
                <li class="top-nav_item1">
                    <!-- search option by Talal 47597-->
                    <form action="search.php" method="POST">
                        <input type="text" name="search" id="search" placeholder="Search" required />
                        <button type="submit" name="submit-search"><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <!-- if a $_user_data's ID is set display their username and a logout option, else display the login and signup options. -->
                <?php if (isset($_user_data['ID'])) { ?>
                <li class="top-nav_item2"><a href="account.php"><i class="fas fa-user fa-lg"></i>&nbsp;
                        <?php echo $_user_data['Username'] ?></a></li>
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
            <ul class="bottom-nav_list">
                <!-- a list of webpages that the user can navigate to -->
                <li><a class="highlight-yellow" href="homepage.php">Home</a></li>
                <li><a href="book.php">Textbooks</a></li>
                <li><a href="stationery.php">Stationery</a></li>
                <li><a href="technology.php">Technology</a></li>
                <li><a href="other.php">Others</a></li>
                <!-- if the $_user_data is set/logged in then the user can create an ad, else direct the user to the login page. -->
                <li class="bottom-nav_lastitem"><a <?php if (isset($_user_data['ID'])) { ?> href="create_ad.php"
                        <?php } else { ?> href="login.php" <?php } ?>>Place an Ad</a></li>
            </ul>
        </div>
    </nav>
    <!-- a header introducing the user to the home webpage along with a description about what the website -->
    <header class="header">
        <div class="header_content container">
            <h1 class="header_title">A Marketplace for Students.</h1>
            <p class="header_info">
                A place for AUK students to buy or sell from other students.
                <span class="highlight-yellow">AUK Exchange</span> gives students a
                platform to sell textbooks, class supplies, tutoring, and more!
            </p>
        </div>
    </header>
    <main class="main">
        <div class="main-content container">
            <div class="main-content_title">
                <h3 class="main-content_title_header">Recently Added</h3>
                <div class="main-content_title_line"></div>
            </div>
            <div class="carousel-main">
                <i class="fas fa-arrow-left" id="prevBtn"></i>
                <div class="carousel-container">
                    <div class="carousel-slide">
                        <?php
                        $result = getLatestListingsData($con);
                        if (!$result) {
                            exit('No listings are available at the moment.');
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            itemCard($row['listing_id'], $row['name'], $row['price'], $row['Image'], $row['Location'], $row['date_added']);
                        }
                        ?>
                    </div>
                </div>
                <i class="fas fa-arrow-right" id="nextBtn"></i>
            </div>
        </div>
    </main>
    <!-- prints out the footer -->
    <?php footer();
    ?>
</body>

</html>