<?php
session_start();
include("connection.php");
include("functions.php");

$_user_data = check_login($con);

?>

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
                <li><a href="homepage.php">Home</a></li>
                <li><a href="book.php">Textbooks</a></li>
                <li>
                    <a href="stationery.php">Stationery</a>
                </li>
                <li><a href="technology.php">Technology</a></li>
                <li><a href="other.php">Others</a></li>
                <li class="bottom-nav_lastitem">
                    <a href="ad.php" class="highlight-dark-yellow highlight-dark-yellow-border"> Place an
                        Ad</a>
                </li>
            </ul>
        </div>
    </nav>



    <main class="create_ad_container">
        <h1 class="FormHeading">Place an Ad</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="text" class="textbox" name="ad_title" placeholder="Enter title of the ad." required></input>
            <br />
            <select class="textbox" name="ad_catergory" required>
                <option value="" disabled selected>Select a category</option>
                <option>Textbook</option>
                <option>Stationery</option>
                <option>Tutoring</option>
                <option>Others</option>
            </select>

            <br />
            <input type="number" class="textbox" name="ad_price" placeholder="Set a price for the item."
                required></input>KD
            <br />
            <textarea class="textbox-xl" name="ad_desc" placeholder="Enter a description for the ad."
                required></textarea>
            <br />
            <p class="ad_img_label">Place an image:</p>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image" accept="image/*" required>
            <br />

            <input type="submit" name="submit_ad" class="submitbtn" value="Post this ad">
        </form>

        <?php
        if (isset($_POST["submit_ad"])) {
            $title = $_POST["ad_title"];
            $price = $_POST["ad_price"];
            $desc = $_POST["ad_desc"];
            $date = date("Y-m-d");
            $category = $_POST["ad_catergory"];
            

            $target = "images/".basename
            ($_FILES['image']['name']); 
            $img = $_FILES["image"]['name'];
            move_uploaded_file($_FILES["image"]['tmp_name'],$target);

            $result = mysqli_query($con, "INSERT  INTO listings (account_fk,name,price,description,date_added,Image,Category) VALUES ('" . $_user_data['ID'] . "','" . $title . "','" . $price . "','" . $desc . "','" . $date . "','" . $img . "','" . $category . "')");

            if ($result) {
                echo '<p class="successmessage">Student has been added succesfully.<p>';
            } else {
                echo '<p class="successmessage">Error: Unable to add student.<p>';
            }
        }
        ?>
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
                    <li>CSS</li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>