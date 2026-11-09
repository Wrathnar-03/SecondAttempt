<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $userID      = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $userName    = trim($_POST['user_name'] ?? '');
    $userType    = trim($_POST['user_type'] ?? '');
    $allowedType = ['admin', 'security', 'visitor'];

    // validation
    if (empty($userName) || !in_array($userType, $allowedType)) {
        die("Invalid form data submitted.");
    }

    try {
        if (!$userID) die("User ID required for update.");
            $sql = "UPDATE UserTB SET user_name = :user_name, user_type = :user_type WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':user_id'   => $userID,
                ':user_name' => $userName,
                ':user_type' => $userType
            ]);
            echo "Record updated successfully!";
    } catch (\PDOException $error) {
        echo "Database error: " . $error->getMessage();
    }
} else {
    echo "Direct access to this script is not allowed.";
}