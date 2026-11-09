<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $logID       = filter_input(INPUT_POST, 'log_id', FILTER_SANITIZE_NUMBER_INT);
    $userID      = ($_POST['user_id'] ?? '');
    $logType     = ($_POST['log_type'] ?? '');
    $allowedType = ['admin', 'security', 'visitor'];
    $logDetails  = ($_POST['log_details'] ?? '');

    // validation
    if (empty($userID) || !in_array($logType, $allowedType)) {
        die("Invalid form data submitted.");
    }

    try {
        switch ($action) {
            case 'insert':
                $sql = "INSERT INTO LogTB (log_id, user_id, log_type, log_details) VALUES (:log_id, :user_id, :log_type, :log_details)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':log_id'      => $logID,
                    ':user_id'     => $userID,
                    ':log_type'    => $logType,
                    ':log_details' => $logDetails
                ]);
                echo "Record created successfully!";
                break;

            case 'update':
                if (!$logID) die("User ID required for update.");
                $sql = "UPDATE LogTB SET user_id = :user_id, log_type = :log_type, log_details =:log_details WHERE log_id = :log_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':log_id'      => $logID,
                    ':user_id'     => $userID,
                    ':log_type'    => $logType,
                    ':log_details' => $logDetails
                ]);
                echo "Record updated successfully!";
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