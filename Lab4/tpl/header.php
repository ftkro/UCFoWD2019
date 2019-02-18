<!doctype html>
<html lang="en">
<head>
    <title><?php echo $titleheader; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="yoga.css">
</head>
<body>
<div id="wrapper">
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
            <img src="../Common/yogadoor.jpg" alt="Yoga door" width="225" height="300" class="align-right">
        <?php }
        ?>
        <h2><?php echo $sub; ?></h2>
        <?php if ($sub == "Yoga Classes") { ?>
            <div id="mathero"></div>
        <?php } elseif ($sub == "Yoga Schedule") { ?>
        <div id="loungehero"></div>
<?php } ?>