<!DOCTYPE html>
<html>
<head>
    <title>Feedback System</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<body>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    {
      pageLanguage: 'en', // Set the source language (English in this case)
      includedLanguages: 'ta,en', // Add the target languages you want to support (Tamil and English)
      layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
    },
    'google_translate_element' // The ID of the container element where the plugin will be placed
  );
}
</script>
<div id="google_translate_element"></div>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $foodTaste = $_POST['food-taste'];
    $foodQuality = $_POST['food-quality'];
    $ambiance = $_POST['ambiance'];
    $service = $_POST['service'];
    $restroom = $_POST['restroom'];
    $foodTiming = $_POST['food-timing'];

    $sql = "INSERT INTO fbt (food_taste, food_quality, ambiance, service, restroom, food_timing) VALUES ('$foodTaste', '$foodQuality', '$ambiance', '$service', '$restroom', '$foodTiming')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<form method="POST" action="">
<div class="rating-container">
<label for="rate" class="food-taste-label excellent-label">Excellent</label>
<label for="rate" class="food-taste-label good-label">Good</label>
<label for="rate" class="food-taste-label average-label">Average</label>
<label for="rate" class="food-taste-label poor-label">Poor</label>

    <br><br>
    <div class="label-container">
        <label>How was accuracy of your order :</label>
        <label for="accuracy">
            <input type="radio" name="food-taste" id="excellent-taste" value="5" required>
            <input type="radio" name="food-taste" id="good-taste" value="4">
            <input type="radio" name="food-taste" id="average-taste" value="3">
            <input type="radio" name="food-taste" id="poor-taste" value="2">
        </label>
    </div>
    <br>
    <div class="label-container">
        <label>How was the speed of service:</label>
        <label for="service">
            <input type="radio" name="food-quality" id="excellent-quality" value="5" required>
            <input type="radio" name="food-quality" id="good-quality" value="4">
            <input type="radio" name="food-quality" id="average-quality" value="3">
            <input type="radio" name="food-quality" id="poor-quality" value="2">
        </label>
    </div>
    <br>
    <div class="label-container">
        <label>To rate the standard of hygiene:</label>
        <label for="hygiene">
            <input type="radio" name="ambiance" id="excellent-ambiance" value="5" required>
            <input type="radio" name="ambiance" id="good-ambiance" value="4">
            <input type="radio" name="ambiance" id="average-ambiance" value="3">
            <input type="radio" name="ambiance" id="poor-ambiance" value="2">
        </label>
    </div>
    <br>
    <div class="label-container">
        <label>Rate the quality of the food:</label>
        <label for="quality">
            <input type="radio" name="service" id="excellent-service" value="5" required>
            <input type="radio" name="service" id="good-service" value="4">
            <input type="radio" name="service" id="average-service" value="3">
            <input type="radio" name="service" id="poor-service" value="2">
        </label>
    </div>
    <br>
    <div class="label-container">
        <label>Rate the decor of the restaurant:</label>
        <label for="decor">
            <input type="radio" name="restroom" id="excellent-restroom" value="5" required>
            <input type="radio" name="restroom" id="good-restroom" value="4">
            <input type="radio" name="restroom" id="average-restroom" value="3">
            <input type="radio" name="restroom" id="poor-restroom" value="2">
        </label>
    </div>
    <br>
    <div class="label-container">
        <label>Food Delivery Timing:</label>
        <label for="timing">
            <input type="radio" name="food-timing" id="excellent-timing" value="5" required>
            <input type="radio" name="food-timing" id="good-timing" value="4">
            <input type="radio" name="food-timing" id="average-timing" value="3">
            <input type="radio" name="food-timing" id="poor-timing" value="2">
        </label>
    </div>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
