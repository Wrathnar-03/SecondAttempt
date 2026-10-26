<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--PHP scripts-->
    <?php
    $view = $_GET['view'] ?? 'home';
    $user = $_GET['user'] ?? 'isAdmin';

    switch ($view) {
        case 'areas':
            include 'Main/areas.php';
            break;
        case 'listings':
            include 'Main/listings.php';
            break;
        case 'logs':
            include 'Main/logs.php';
            break;
        case 'report':
            include 'Main/report.php';
            break;
        case 'values':
            include 'Main/values.php';
            break;
        default:
            include 'home.php';
            break;
    }
    ?>
</head>
