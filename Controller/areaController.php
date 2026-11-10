<?php
include '../Database/connector.php';

while ($spotID <= 20){
    $spotID = 'spot_id';
    $sql ="INSERT INTO AreaTB (spot_id, spot_type, occupation) VALUES (:spot_id, :spot_type, :occupation)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':spot_id'       => $spotID++,
        ':spot_type'     => 'regular',
        ':occupation'    => false
    ]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spotID       = filter_input(INPUT_POST, 'spot_id', FILTER_SANITIZE_NUMBER_INT);
    $spotType     = ($_POST['spot_type'] ?? '');
    $allowedType  = ['regular', 'reserved', 'whitelisted'];
    $occupation   = ($_POST['occupation'] ?? '');

    try{
        $sql = "UPDATE AreaTB SET spot_type = :spot_type, occupation =:occupation WHERE spot_id = :spot_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':spot_id'    => $spotID,
            ':spot_type'  => $spotType,
            ':occupation' => $occupation
        ]);
        echo "Record updated successfully!";
    } catch (\PDOException $error) {
        echo "Database error: " . $error->getMessage();
    }
}