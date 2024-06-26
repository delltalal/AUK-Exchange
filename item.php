<!-- 
    Session
    Navigation
    Item Page
    Footer
    Hamad Al-Hendi S00040674

    Search functionality
    Talal Al-Failakawi 47597
-->
<?php
//starts a session and saves the data of the user within $_user_data
session_start();
include("connection.php");
include("functions.php");

$_user_data = check_login($con);

// take the id submitted from the form from the itemcard() function
$id = mysqli_real_escape_string($con, $_POST['id']);
// this id used to identify which item was clicked and its records are pulled from the database
$sql = "SELECT *, listings.ID AS listing_id FROM listings INNER JOIN accounts ON listings.account_fk = accounts.ID WHERE listings.ID = " . $id;

$result = mysqli_query($con, $sql);

// $item_data is used to call the different fields of the record.
if ($result && mysqli_num_rows($result) > 0) {
    $item_data = mysqli_fetch_array($result);
} else {
    echo '<p class="error-message">There has been an error: This record cannot be shown</p>';
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
    <title>AUKExchange | Others</title>
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
                <li class="top-nav_item1">
                    <!-- search option by Talal 47597 -->
                    <form action="search.php" method="POST">
                        <input type="text" name="search" id="search" placeholder="Search" />
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
                <li><a href="homepage.php">Home</a></li>
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

    <?php
    
    // if the user is locked in then this option should be available
    if (isset($_user_data['ID'])) {
    // if the user's ID and the item's user's ID matched then this html will be available
    if ($_user_data['ID'] == $item_data['ID']) { ?>
    <!-- a form that will send the id to the delete_item.php when submitted -->
    <form class="delete-ad" method="POST" action="delete_item.php">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <label for="submitbtn1">To delete this ad, press the button.</label>
        <input type="submit" class="deletebtn" value="Delete Ad" id="submitbtn1">
    </form>
    <?php }
    }
    ?>

    <!-- html of the item.php to display more information about the item. -->
    <main class="item-main-container container">

        <div class="item-container">
            <!-- the different fields are echoed into the html to appear in the webpage -->
            <h2 class="item-container-title"><?php echo $item_data['name'] ?></h2>
            <img src="images/<?php echo $item_data['Image'] ?>" alt="Item Image" class="item-container-image">
            <ul class="item-container-list">
                <li class="item-container-price"><span>Price:</span> <?php echo $item_data['price'] ?> KD</li>
                <li class="item-container-desc">
                    <span>Details: </span> <br /><?php echo $item_data['description'] ?>
                </li>
                <li class="item-container-date">
                    <span>Date added:</span> <?php echo $item_data['date_added'] ?>
                </li>
            </ul>

        </div>
        <div class="info-container">
            <ul class="info-container-list">
                <li class="item-container-user"><span>Created by:</span> <?php echo $item_data['Username'] ?></li>
                <li class="item-container-phone"><span>Phone number:</span> <?php echo $item_data['Phone_Num'] ?>
                </li>
                <li class="item-container-email"><span>Email:</span> <?php echo $item_data['Email'] ?></li>
            </ul>
        </div>
    </main>
    <!-- prints out the footer -->
    <?php footer();
    ?>
</body>

</html>