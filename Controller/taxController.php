<?php
include '../Database/connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine action
    $action = $_POST['action'] ?? '';
    
    // inputs
    $taxID       = filter_input(INPUT_POST, 'tax_id', FILTER_SANITIZE_NUMBER_INT);
    $taxValue    = ($_POST['tax_value'] ?? '');
    $taxType     = ($_POST['tax_type'] ?? '');
    $allowedType = ['motorcycle', 'car', 'bus', 'truck'];

    // validation
    if (empty($taxValue) || !in_array($taxType, $allowedType)) {
        die("Invalid form data submitted.");
    }

    try {
        if (!$taxID) die("Tax ID required for update.");
            $sql  = "UPDATE TaxTB SET tax_value = :tax_value, tax_type = :tax_type WHERE tax_id = :tax_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':tax_id'    => $taxID,
                ':tax_value' => $taxValue,
                ':tax_type'  => $taxType
            ]);
            echo "Record updated successfully!";
    } catch (\PDOException $error) {
        echo "Database error: " . $error->getMessage();
    }
} else {
    echo "Direct access to this script is not allowed.";
}