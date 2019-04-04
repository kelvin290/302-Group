<?php
    date_default_timezone_set('Asia/Hong_Kong');
    $deadlineDate = date('Y-m-d H:i:s');
    echo date('Y-m-d H:i:s', strtotime($deadlineDate. ' + 30 days'));
?>
