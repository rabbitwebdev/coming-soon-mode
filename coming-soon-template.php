<?php
$title      = get_option('csm_title', 'Coming Soon');
$message    = get_option('csm_message', 'Our site is under construction. Stay tuned!');
$date       = get_option('csm_launch_date');
$logo       = get_option('csm_logo');
$bg_image   = get_option('csm_bg_image');
$text_color = get_option('csm_text_color', '#ffffff');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo esc_html($title); ?></title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('<?php echo esc_url($bg_image); ?>') no-repeat center center fixed;
            background-size: cover;
            color: <?php echo esc_attr($text_color); ?>;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 98vh;
            height: 100%;
            padding: 20px;
        }
        img.logo {
            max-width: 200px;
            margin-bottom: 30px;
  object-fit: contain;
  width: 100%;
  height: auto;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        p {
            max-width: 600px;
            font-size: 1.2rem;
            line-height: 1.6;
        }
        .date {
            margin-top: 20px;
            font-style: italic;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <?php if ($logo): ?>
        <img class="logo" src="<?php echo esc_url($logo); ?>" alt="Logo">
    <?php endif; ?>
    <h1><?php echo esc_html($title); ?></h1>
    <?php if ($message) { ?>
    <p><?php echo nl2br(esc_html($message)); ?></p>
    <?php } ?>
    <?php if ($date): ?>
        <p class="date">Launching on <?php echo esc_html(date('F j, Y', strtotime($date))); ?></p>
    <?php endif; ?>
</body>
</html>
