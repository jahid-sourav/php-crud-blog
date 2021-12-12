<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Blog - PHP CRUD Project</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="home.php" class="navbar-brand">Home</a>
        <ul class="navbar-nav">
            <li><a href="home.php" class="nav-link text-info font-weight-bolder">Add Blog</a></li>
            <li><a href="action.php?status=manage" class="nav-link text-info font-weight-bolder">Manage Blog</a></li>
        </ul>
    </div>
</nav>