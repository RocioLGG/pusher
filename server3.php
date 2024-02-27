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


for ($i = 0; $i < 10 ; $i++) {
    $xValues = ["Andalucia", "Aragon", "Asturias", "Baleares", "Canarias", "Cantabria", "Castilla y Leon"];
    $yValues = [];


    for ($j = 0; $j < count($xValues); $j++) {
        $yValues[] = rand(1000, 5000);
    }

    $yValuesJavaScript = json_encode($yValues);

    // Trigger the event with modified values
    $pusher->trigger('my-channel', 'my-event', array('values' => $yValuesJavaScript));

    //sleep(1);
    time_nanosleep(1,0);
}
    header("Location: index.html");
    exit();
?>
