<?php

require('events.php');


$holidays = [];
$holidays['last_updated'] = date('Y-m-d H:i:s');
$holidays['solar'] = [];
$holidays['lunar'] = [];

foreach($events as $event) {
    $type = $event['type'];
    $date = $event['date'];
    list($month, $day) = sscanf($event['date'], '%d/%d');
    $title = str_replace('‌', ' ', $event['title']);
    $is_holiday = $event['holiday'];
    $importance = $event['importance'];
    
    $holidays[$type][] = [
        'title' => $title,
        'date' => [
           'formated' => $date,
           'day' => $day,
           'month' => $month,
        ],
        'is_holiday' => $is_holiday,
        'importance' => $importance
    ];
}


echo json_encode($holidays);
