<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve donation data
$sql = "SELECT * FROM clothe";
$result = $conn->query($sql);

// Prepare output
$donations = [];

if ($result->num_rows > 0) {
  // Loop through results and create an array of donations
  while($row = $result->fetch_assoc()) {
    $donations[] = $row;
  }
}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donations</title>
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
  <h1>Thank you for your Donations!</h1>
  <p>We appreciate your generosity.</p>
  <div class="donations-container">
    </div>

  <script src="script.js"></script> </body>
</html>

<?php if (count($donations) > 0) : ?>
  <ul class="donations-list">
    <?php foreach ($donations as $donation) : ?>
      <li class="donation-card">
        <h3><?= $donation['name'] ?></h3>
        <div class="donation-details">
          <span>Email: <?= $donation['email'] ?></span>
          <span>Phone: <?= $donation['phone'] ?></span>
          <span>Clothe For: <?= $donation['clothe_type'] ?></span>
          <span>Preferred Date: <?= $donation['preferred_date'] ?></span>
          <span>Preferred Time: <?= $donation['preferred_time'] ?></span>
          <span>Preferred Address: <?= $donation['preferred_address'] ?></span>
          <span>Message: <?= $donation['message'] ?></span>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else : ?>
  <p>No donations available</p>
  <?php endif; ?>

</body>
</html>