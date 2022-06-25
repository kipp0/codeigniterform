<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To My Test Submission!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/styles.css">
</head>
<body>
<header>
<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img class="custom-logo" src="<?= base_url()?>/assets/logo.png" alt="logo">
        </a>
    </div>
    </nav>

    <div class="hero">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="content">
                    <h4 class="title"><?= esc($title) ?></h4>
                    <p>We're always adding to our clever staffing roster! If you pride yourself in interacting with people and the idea of working for a superb staffing agency entices you, please answer our essential questionaire.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
