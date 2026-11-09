<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $vehicleID      = filter_input(INPUT_POST, 'vehicle_id', FILTER_SANITIZE_NUMBER_INT);
    $userID    = trim($_POST['user_id'] ?? '');
    $vehicleType    = trim($_POST['vehicle_type'] ?? '');
    $allowedType = ['motorcycle', 'car', 'bus', 'truck'];

    // validation
    if (empty($userID) || !in_array($vehicleType, $allowedType)) {
        die("Invalid form data submitted.");
    }

    try {
        switch ($action) {
            case 'insert':
                $sql = "INSERT INTO UserTB (vehicle_id, user_id, vehicle_type) VALUES (:vehicle_id, :user_id, :vehicle_type)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':vehicle_id'   => $vehicleID,
                    ':user_id' => $userID,
                    ':vehicle_type' => $vehicleType
                ]);
                echo "Record created successfully!";
                break;

            case 'update':
                if (!$vehicleID) die("User ID required for update.");
                $sql = "UPDATE UserTB SET user_id = :user_id, vehicle_type = :vehicle_type WHERE vehicle_id = :vehicle_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':vehicle_id'   => $vehicleID,
                    ':user_id' => $userID,
                    ':vehicle_type' => $vehicleType
                ]);
                echo "Record updated successfully!";
                break;

            case 'delete':
                if (!$vehicleID) die("User ID required for deletion.");
                $sql = "DELETE FROM UserTB WHERE vehicle_id = :vehicle_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':vehicle_id' => $vehicleID
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