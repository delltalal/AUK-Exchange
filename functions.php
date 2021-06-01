<?php 
/*
footer
check_login
itemCard
getUserListingData
getLatestListingsData
Hamad Al-Hendi S00040674
*/

//a function that will print out the footer, this is attached on every page and reduces redundancy.
function footer()
{
    // includes a list of group members along with CSS validator icon.
    $element = '<footer class="footer">
        <div class="footer-content container">
            <div class="footer-title">
                <h4 class="footer-title_subject">CSIS 255 Project</h4>
                <h4 class="footer-title_validation">W3C Validation</h4>
            </div>
            <div class="footer-details">
                <ul class="footer-details-names">
                    <li>Tareq Humood<span class="highlight-yellow">S0042443</span></li>
                    <li>Talal Al-Failakawi<span class="highlight-yellow">S0047597</span></li>
                    <li>Mohammad Al-Mousawi<span class="highlight-yellow">S0042068</span></li>
                    <li>Hamad Al-Hendi <span class="highlight-yellow">S0040674</span></li>
                </ul>
                <ul class="footer-details-icons">
                    <li><p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p></li>
                </ul>
            </div>
        </div>
    </footer>';

    // prints out the footer
    echo $element;
}

// a function that retrieves data from the database about the currently logged in user.
function check_login($con)
{

    if (isset($_SESSION['ID'])) {
        //takes the id from the session array to be used within the sql query
        $id = $_SESSION['ID'];
        $query = "SELECT * FROM accounts WHERE ID = '$id'";

        $result = mysqli_query($con, $query);

        //confirms that the account exist and if true, returns the account data.
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_array($result);
            return $user_data;
        }
    }
}

// a function that prints out the item cards. parameters contain information about the item and allows the user to reuse this function in a loop to print multiple item-card elements
function itemCard($id, $title, $price, $img, $location, $date)
{
    $element = '
<div class="item-card">
    <img class="card-img" src="images/' . $img . '" alt="Ad Image">
    <form method="POST" action="item.php">
    <input type="hidden" value="'.$id.'" name="id">
    <input type="submit" class="card-title" value="'.$title.'">
    </form>
<div class="card-price">' . $price . ' KD</div>
<ul class="item-card-detail">
    <li class="card-location"><i class="fas fa-map-marker-alt"></i> ' . $location . '</li>
<li class="card-date">' . $date . '</li>

</ul>
</div>
';
    echo $element;
}


//returns a query result to the caller of all records where the user's id and foreign key of the item matches (the records created by the user)
function getUserListingsData($con, $id)
{
    $query = "SELECT *, listings.ID AS listing_id  FROM listings WHERE account_fk = '$id'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

//returns a query result to the caller of the last 12 records created within the listings table along with the information of the account that created the listing.
function getLatestListingsData($con)
{
    $query = "SELECT *, listings.ID AS listing_id FROM listings INNER JOIN accounts ON listings.account_fk = accounts.ID ORDER BY listings.ID DESC LIMIT 12";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}