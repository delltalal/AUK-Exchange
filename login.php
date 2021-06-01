<!-- 
    Session
    Login functionality
    Navigation
    Footer
    Hamad Al-Hendi S00040674
-->
<?php
//starts a session and saves the data of the user within $_user_data
session_start();
include("connection.php");
include("functions.php");

//if the a post has been submitted then execute the following code
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //assign the post values into a variables
    $user = $_POST['user'];
    $password = $_POST['password'];

    //select the record from the accounts table with the matching username.
    $query = "select * from accounts where Username = '$user'";
    $result = mysqli_query($con, $query);

    //if the query result was successful then continue.
    if ($result) {
        //if query result was successful and there are one or more results.
        if ($result && mysqli_num_rows($result) > 0) {
            // assign the record to the user_data variable
            $user_data = mysqli_fetch_assoc($result);
            // the the record from user_data matches the form input for password then exccute
            if ($user_data['Password'] === $password) {
                //set the session ID to the user's ID (login)
                $_SESSION['ID'] = $user_data['ID'];
                // redirect the homepage
                header("Location: homepage.php");
                // die
                die;
            }
        }
        // if the function did not die then one of the if statements above are false and failed to login.
        echo "<div class='error-message'>Wrong username or password!</div>";
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
    <script src="validation.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <title>AUKExchange | Log In</title>
</head>

<body>
    <!-- top navigation containing the logo of the website, a search option, login/account details, and a signup/logout. -->
    <nav class="top-nav">
        <div class="top-nav_content container">
            <!-- logo -->
            <a href="homepage.php"> <h2 class="top-nav_logo"><span class="logo-span">AUK</span>Exchange  </h2> </a>
            <ul class="top-nav_list">
                <li class="top-nav_item1">
                    <form action="search.php" method="POST">
                        <!-- search option -->
                        <input type="text" name="search" id="search" placeholder="Search" required />
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <li class="top-nav_item2"><a class="highlight-dark-yellow" href="login.php">Log In</a></li>
                <li class="top-nav_item3"><a href="signup.php">Sign Up</a></li>
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
    <section class="loginFormContainer container" class="loginFormSection">
        <h2 class="FormHeading">Login Here</h2>
        <form name="loginForm" class="loginForm" method="POST" onsubmit="return validateLoginForm()">
            <input type="text" name="user" class="textbox" placeholder="Username" />
            <input type="password" name="password" class="textbox" placeholder="Password" />
            <input type="submit" class="submitbtn" value="Login">
        </form>
    </section>
    <!-- prints out the footer -->
    <?php footer();
    ?>
</body>

</html>