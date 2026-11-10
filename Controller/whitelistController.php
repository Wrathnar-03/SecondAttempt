<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $whitelistID = filter_input(INPUT_POST, 'whitelist_id', FILTER_SANITIZE_NUMBER_INT);
    $userID      = ($_POST['user_id'] ?? '');
    $vehicleID   = ($_POST['vehicle_id'] ?? '');

    // validation
    if (empty($userID)) {
        die("Invalid form data submitted.");
    }

    try {
        switch ($action) {
            case 'insert':
                $sql = "INSERT INTO WhitelistTB (whitelist_id, user_id, vehicle_id) VALUES (:whitelist_id, :user_id, :vehicle_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':whitelist_id' => $whitelistID,
                    ':user_id'      => $userID,
                    ':vehicle_id'   => $vehicleID
                ]);
                echo "Record created successfully!";
                break;

            case 'update':
                if (!$whitelistID) die("Blacklist ID required for update.");
                $sql = "UPDATE WhitelistTB SET user_id = :user_id, vehicle_id =:vehicle_id WHERE whitelist_id = :whitelist_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':whitelist_id' => $whitelistID,
                    ':user_id'      => $userID,
                    ':vehicle_id'   => $vehicleID
                ]);
                echo "Record updated successfully!";
                break;

            case 'delete':
                if (!$whitelistID) die("Blacklist ID required for deletion.");
                $sql = "DELETE FROM WhitelistTB WHERE whitelist_id = :whitelist_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':whitelist_id' => $whitelistID
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