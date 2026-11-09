<?php
include '../Database/connector.php';

$spotID = 'spot_id';
while ($spotID <= 20){
    $sql ="INSERT INTO AreaTB (spot_id, spot_type, occupation) VALUES (:spot_id, :spot_type, :occupation)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':spot_id'       => $spotID++,
        ':spot_type'     => 'regular',
        ':occupation'    => false
    ]);
}