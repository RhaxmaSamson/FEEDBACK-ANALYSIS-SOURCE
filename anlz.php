<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM fbt";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $totalRows = $result->num_rows;

    $sumFoodTaste = 0;
    $sumFoodQuality = 0;
    $sumAmbiance = 0;
    $sumService = 0;
    $sumRestroom = 0;
    $sumFoodTiming = 0;

    while ($row = $result->fetch_assoc()) {
        $sumFoodTaste += intval($row['food_taste']);
        $sumFoodQuality += intval($row['food_quality']);
        $sumAmbiance += intval($row['ambiance']);
        $sumService += intval($row['service']);
        $sumRestroom += intval($row['restroom']);
        $sumFoodTiming += intval($row['food_timing']);
    }

    $avgFoodTaste = $sumFoodTaste / $totalRows;
    $avgFoodQuality = $sumFoodQuality / $totalRows;
    $avgAmbiance = $sumAmbiance / $totalRows;
    $avgService = $sumService / $totalRows;
    $avgRestroom = $sumRestroom / $totalRows;
    $avgFoodTiming = $sumFoodTiming / $totalRows;

    $lowestRating = min($avgFoodTaste, $avgFoodQuality, $avgAmbiance, $avgService, $avgRestroom, $avgFoodTiming);
    $lowestRatingCategory = "";
    $lowestRatingIndex = 0;

    // Find the index and category of the lowest rating
    $ratings = [$avgFoodTaste, $avgFoodQuality, $avgAmbiance, $avgService, $avgRestroom, $avgFoodTiming];
    foreach ($ratings as $index => $rating) {
        if ($rating === $lowestRating) {
            $lowestRatingIndex = $index;
            break;
        }
    }

    switch ($lowestRatingIndex) {
        case 0:
            $lowestRatingCategory = "Food Taste";
            break;
        case 1:
            $lowestRatingCategory = "Food Quality";
            break;
        case 2:
            $lowestRatingCategory = "Ambiance";
            break;
        case 3:
            $lowestRatingCategory = "Service";
            break;
        case 4:
            $lowestRatingCategory = "Restroom";
            break;
        case 5:
            $lowestRatingCategory = "Food Delivery Timing";
            break;
        default:
            $lowestRatingCategory = "";
            break;
    }
} else {
    echo "No feedback data found.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Average Feedback Ratings</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="container">
        <h2>Average Feedback Ratings</h2>

        <div class="chart-container">
            <canvas id="chart"></canvas>
        </div>

        <?php if (!empty($lowestRatingCategory)) : ?>
            <div class="suggestion">
                <h3>Suggestion:</h3>
                <p>The lowest rating is in <?php echo $lowestRatingCategory; ?> category.</p>
                <ul>
                    <li>Make your customers comfortable through your maintenance and services, particularly by improving the lowest rating in Service.</li>
                </ul>
            </div>
        <?php endif; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chartData = {
                labels: ["Food Taste", "Food Quality", "Ambiance", "Service", "Restroom", "Food Delivery Timing"],
                datasets: [{
                    data: [
                        <?php echo round(($avgFoodTaste / 5) * 100); ?>,
                        <?php echo round(($avgFoodQuality / 5) * 100); ?>,
                        <?php echo round(($avgAmbiance / 5) * 100); ?>,
                        <?php echo round(($avgService / 5) * 100); ?>,
                        <?php echo round(($avgRestroom / 5) * 100); ?>,
                        <?php echo round(($avgFoodTiming / 5) * 100); ?>
                    ],
                    backgroundColor: [
                        "#4682b4",
                        "#f5deb3",
                        "#dda0dd",
                        "#90ee90",
                        "#ff7f50",
                        "#ff69b4"
                    ]
                }]
            };

            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false
            };

            var chart = new Chart(document.getElementById("chart"), {
                type: 'pie',
                data: chartData,
                options: chartOptions
            });
        });
    </script>
</body>
</html>
