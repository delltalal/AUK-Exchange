<?php
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
    <link rel="stylesheet" href="style.css" />
    <title>AUKExchange | Home</title>
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
                <li><a class="highlight-yellow" href="homepage.php">Home</a></li>
                <li><a href="book.php">Textbooks</a></li>
                <li><a href="stationery.php">Stationery</a></li>
                <li><a href="tutoring.php">Tutoring</a></li>
                <li><a href="other.php">Others</a></li>
                <li class="bottom-nav_lastitem"><a <?php if (isset($_user_data['ID'])) { ?> href="create_ad.php"
                        <?php } else { ?> href="login.php" <?php } ?>>Place an Ad</a></li>
            </ul>
        </div>
    </nav>
    <header class="header">
        <div class="header_content container">
            <h1 class="header_title">A Marketplace for Students.</h1>
            <p class="header_info">
                A place for AUK students to buy or sell from other students.
                <span id="highlight-yellow">AUK Exchange</span> gives students a
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

            <div class="main-content_slider"></div>
        </div>
    </main>
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
                    <li>
                        <p>
                            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                                <img style="border:0;width:88px;height:31px"
                                    src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" />
                            </a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>