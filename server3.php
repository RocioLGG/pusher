<?php
// First, run 'composer require pusher/pusher-php-server'
require __DIR__ . '/vendor/autoload.php';

$pusher = new Pusher\Pusher(
    "da58fa4f016071aacf8a", // Replace with 'key' from dashboard
    "efa82dc325b17e3d1f39", // Replace with 'secret' from dashboard
    "1762881", // Replace with 'app_id' from dashboard
    array(
        'cluster' => 'eu' // Replace with 'cluster' from dashboard
    )
);

// Modify the values of the pie chart and the text below it 10 times
for ($i = 0; $i < 10 ; $i++) {
    // Modify the values for Andalucia, Aragon, Asturias, Baleares, Canarias, Cantabria, and Castilla y Leon respectively
    $xValues = ["Andalucia", "Aragon", "Asturias", "Baleares", "Canarias", "Cantabria", "Castilla y Leon"];
    $yValues = [];

    // Generate random values for each region
    for ($j = 0; $j < count($xValues); $j++) {
        $yValues[] = rand(1000, 5000); // Generating random values between 1000 and 5000 for each region
    }

    // Convert the array of random values to JavaScript array format
    $yValuesJavaScript = json_encode($yValues);

    // Trigger the event with modified values
    $pusher->trigger('my-channel', 'my-event', array('values' => $yValuesJavaScript));

    // Sleep for 1 second to simulate real-time updates
    sleep(1);
}
?>
