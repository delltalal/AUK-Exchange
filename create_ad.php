<!-- 
    Session
    Navigation
    Ad creation
    Footer
    Hamad Al-Hendi S00040674
 -->
<?php
//starts a session and saves the data of the user within $_user_data
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
    <!-- top navigation containing the logo of the website, a search option, login/account details, and a signup/logout. -->
    <nav class="top-nav">
        <div class="top-nav_content container">
            <!-- logo -->
            <a href="homepage.php"> <h2 class="top-nav_logo"><span class="logo-span">AUK</span>Exchange  </h2> </a>
            <ul class="top-nav_list">
                <li class="top-nav_item1">
                    <!-- search option -->
                    <form action="search.php" method="POST">
                        <input type="text" name="search" id="search" placeholder="Search" required />
                        <button type="submit"><i class="fas fa-search"></i></button>
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
        <!-- form that will take a title, category, price, description, and an image to be sent to the database. everything is required to avoid missing data -->
        <form method="post" enctype="multipart/form-data">
            <input type="text" class="textbox" name="ad_title" placeholder="Enter title of the ad." required></input>
            <br />
            <!-- a select-option to limit the user to the available categories -->
            <select class="textbox" name="ad_category" required>
                <option value="" disabled selected>Select a category</option>
                <option>Textbook</option>
                <option>Stationery</option>
                <option>Technology</option>
                <option>Others</option>
            </select>

            <br />
            <!-- a type number to avoid non-numeric inputs -->
            <input type="number" class="textbox" name="ad_price" placeholder="Set a price for the item."
                required></input>KD
            <br />
            <!-- a textarea to create a larger textbox -->
            <textarea class="textbox-xl" name="ad_desc" placeholder="Enter a description for the ad."
                required></textarea>
            <br />
            <p class="ad_img_label">Place an image:</p>
            <!-- type file that will only accept images i.e. jpeg, png, etc. -->
            <input type="file" name="image" accept="image/*" required>
            <br />
            <!-- a submit button to submit the form -->
            <input type="submit" name="submit_ad" class="submitbtn" value="Post this ad">
        </form>

        <?php
        // if the submit button is set (clicked) then the following code should be executed.
        if (isset($_POST["submit_ad"])) {

            // assign variables for each form input
            $title = $_POST["ad_title"];
            $price = $_POST["ad_price"];
            $desc = $_POST["ad_desc"];
            // set the date to the current date
            $date = date("Y-m-d");
            $category = $_POST["ad_category"];

            // create a string that has the path to store the image into (the images file)
            $target = "images/" . basename($_FILES['image']['name']);
            $img = $_FILES["image"]['name'];
            // move the file into the path created.
            move_uploaded_file($_FILES["image"]['tmp_name'], $target);

            // use INSERT INTO to store the variable into the listings table with the foreign key set the user's ID.
            $result = mysqli_query($con, "INSERT  INTO listings (account_fk,name,price,description,date_added,Image,Category) VALUES ('" . $_user_data['ID'] . "','" . $title . "','" . $price . "','" . $desc . "','" . $date . "','" . $img . "','" . $category . "')");
            
            //depending on what is returned by $result will determine a message.
            if ($result) {
                echo '<p class="create-ad-message">Student has been added succesfully!<p>';
            } else {
                echo '<p class="create-ad-message">Error: Unable to add student.<p>';
            }
        }
        ?>
    </main>

    <!-- prints out a footer -->
    <?php footer();
    ?>

</html>