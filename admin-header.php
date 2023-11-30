<?php
require_once 'connect/db.php';
require_once 'config-url.php';

// Calculate the base URL
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/UR/';

// Define stylesheets
$stylesheets = [
    'mdb.min.css',
    'bootstrap.css',
    'admin.css',
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>UR Admin</title>
    <!-- MDB icon -->
    <link rel="icon" href="<?php echo $baseUrl; ?>img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    
    <?php
    // Output dynamic CSS links
    foreach ($stylesheets as $stylesheet) {
        echo '<link rel="stylesheet" href="' . $baseUrl . 'css/' . $stylesheet . '" />' . PHP_EOL;
    }
    ?>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img src="<?php echo BASE_URL ?>/images/UR logo WHiteonclear.jpg" height="60" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_pages.php">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_users.php">Users</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    