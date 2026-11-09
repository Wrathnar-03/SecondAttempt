<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $userID      = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $userName    = ($_POST['user_name'] ?? '');
    $userType    = ($_POST['user_type'] ?? '');
    $allowedType = ['admin', 'security', 'visitor'];

    // validation
    if (empty($userName) || !in_array($userType, $allowedType)) {
        die("Invalid form data submitted.");
    }

    try {
        switch ($action) {
            case 'insert':
                $sql = "INSERT INTO UserTB (user_id, user_name, user_type) VALUES (:user_id, :user_name, :user_type)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':user_id'   => $userID,
                    ':user_name' => $userName,
                    ':user_type' => $userType
                ]);
                echo "Record created successfully!";
                break;

            case 'update':
                if (!$userID) die("User ID required for update.");
                $sql = "UPDATE UserTB SET user_name = :user_name, user_type = :user_type WHERE user_id = :user_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':user_id'   => $userID,
                    ':user_name' => $userName,
                    ':user_type' => $userType
                ]);
                echo "Record updated successfully!";
                break;

            case 'delete':
                if (!$userID) die("User ID required for deletion.");
                $sql = "DELETE FROM UserTB WHERE user_id = :user_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':user_id' => $userID
                ]);
                echo "Record deleted successfully!";
                break;

            default:
                echo "Invalid action specified.";
                break;
        }
    } catch (\PDOException $error) {
        echo "Database error: " . $error->getMessage();
    }
} else {
    echo "Direct access to this script is not allowed.";
}