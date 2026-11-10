<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $blacklistID = filter_input(INPUT_POST, 'blacklist_id', FILTER_SANITIZE_NUMBER_INT);
    $userID      = ($_POST['user_id'] ?? '');
    $vehicleID   = ($_POST['vehicle_id'] ?? '');

    // validation
    if (empty($userID)) {
        die("Invalid form data submitted.");
    }

    try {
        switch ($action) {
            case 'insert':
                $sql = "INSERT INTO BlacklistTB (blacklist_id, user_id, vehicle_id) VALUES (:blacklist_id, :user_id, :vehicle_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':blacklist_id' => $blacklistID,
                    ':user_id'      => $userID,
                    ':vehicle_id'   => $vehicleID
                ]);
                echo "Record created successfully!";
                break;

            case 'update':
                if (!$blacklistID) die("Blacklist ID required for update.");
                $sql = "UPDATE BlacklistTB SET user_id = :user_id, vehicle_id =:vehicle_id WHERE blacklist_id = :blacklist_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':blacklist_id' => $blacklistID,
                    ':user_id'      => $userID,
                    ':vehicle_id'   => $vehicleID
                ]);
                echo "Record updated successfully!";
                break;

            case 'delete':
                if (!$blacklistID) die("Blacklist ID required for deletion.");
                $sql = "DELETE FROM BlacklistTB WHERE blacklist_id = :blacklist_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':blacklist_id' => $blacklistID
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