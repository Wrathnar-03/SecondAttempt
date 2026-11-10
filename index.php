<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

function getCurrentUserType() {
    return $_SESSION['user_type'] ?? 'admin';
}

function requireRole(array $allowedRoles) {
    $currentUserType = getCurrentUserType();

    if (!in_array($currentUserType, $allowedRoles)) {
        http_response_code(403);
        die("Access Denied: You do not have permission to view this page.");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Decor/style.css">
    <script src="/Decor/script.js"></script>
</head>
<body>
    <header>
        <?php include "Views/Partials/nav.php"?>
    </header>

    <main>
        <?php
        $view = $_GET['view'] ?? 'home';

        switch ($view) {
            case 'areas':
                include 'Views/Main/areas.php';
                break;
            case 'listings':
                include 'Views/Main/listings.php';
                break;
            case 'logs':
                include 'Views/Main/logs.php';
                break;
            case 'report':
                include 'Views/Main/report.php';
                break;
            case 'values':
                include 'Views/Main/values.php';
                break;
            default:
                include 'Views/home.php';
                break;
        }
        ?>
    </main>

    <footer>
        <?php include "Views/Partials/footer.php"?>
    </footer>
</body>
</html>