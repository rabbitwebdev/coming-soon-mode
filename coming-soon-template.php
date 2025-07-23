<?php
$title = get_option('csm_title', 'Coming Soon');
$message = get_option('csm_message', 'Our site is under construction. Stay tuned!');
$date = get_option('csm_launch_date');

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo esc_html($title); ?></title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        h1 {
            font-size: 3rem;
        }
        p {
            max-width: 500px;
            font-size: 1.2rem;
            line-height: 1.5;
        }
        .date {
            margin-top: 20px;
            font-style: italic;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <h1><?php echo esc_html($title); ?></h1>
    <p><?php echo nl2br(esc_html($message)); ?></p>
    <?php if ($date): ?>
        <p class="date">Launching on <?php echo esc_html(date('F j, Y', strtotime($date))); ?></p>
    <?php endif; ?>
</body>
</html>
