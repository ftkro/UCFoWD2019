<!doctype html>
<html lang="en">
<head>
    <title><?php echo $titleheader; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="yoga.min.css">
</head>
<body>
<header>
    <h1><?php echo $title; ?></h1>
</header>
<nav>
    <a href="index.html">Home</a> &nbsp; <a href="classes.html">Classes</a> &nbsp; <a
            href="schedule.html">Schedule</a> &nbsp; <a href="contact.html">Contact</a>
</nav>
<main>
    <?php
    if ($sub == "Find Your Inner Light") { ?>
        <img src="../Common/img/yogadoor.jpg" alt="Yoga door" width="225" height="300" class="align-right">
    <?php } elseif ($sub == "Yoga Classes") { ?>
        <img src="../Common/img/yogamat.jpg" alt="Yoga mat" width="900" height="300">
    <?php } elseif ($sub == "Yoga Schedule") { ?>
        <img src="../Common/img/yogalounge.jpg" alt="Yoga lounge" width="900" height="300">
    <?php }
    ?>
    <h2><?php echo $sub; ?></h2>