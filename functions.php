<?php

function footer() {
    $element = '<footer class="footer">
        <div class="footer-content container">
            <div class="footer-title">
                <h4 class="footer-title_subject">CSIS 255 Project</h4>
                <h4 class="footer-title_validation">W3C Validation</h4>
            </div>
            <div class="footer-details">
                <ul class="footer-details-names">
                    <li>Tareq <span class="highlight-yellow">S00</span></li>
                    <li>Talal <span class="highlight-yellow">S00</span></li>
                    <li>Mohammad <span class="highlight-yellow">S00</span></li>
                    <li>Hamad Al-Hendi <span class="highlight-yellow">S0040674</span></li>
                </ul>
                <ul class="footer-details-icons">
                    <li>HTML</li>
                    <li>CSS</li>
                </ul>
            </div>
        </div>
    </footer>
</body>';

echo $element;

}

function check_login($con)
{

    if (isset($_SESSION['ID'])) {

        $id = $_SESSION['ID'];
        $query = "SELECT * FROM accounts WHERE ID = '$id'";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_array($result);
            return $user_data;
        }
    }
}

function component($title, $price, $img, $location, $date)
{
$element = '
<div class="item-card">
    <img class="card-img" src="images/'.$img.'" alt="Ad Image">
    <a href="homepage.php" class="card-title">'.$title.'</a>
<div class="card-price">'.$price.' KD</div>
<ul class="item-card-detail">
    <li class="card-location"><i class="fas fa-map-marker-alt"></i> '.$location.'</li>
<li class="card-date">'.$date.'</li>

</ul>
</div>
';
echo $element;
}

function getUserListingsData($con, $id)
{
$query = "SELECT * FROM listings WHERE account_fk = '$id'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
return $result;
}
}


function getLatestListingsData($con)
{
    $query = "SELECT * FROM listings INNER JOIN accounts ON listings.account_fk = accounts.ID ORDER BY listings.ID DESC LIMIT 12";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}