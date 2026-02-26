<?php
require 'connection.php';
$id  = (int)$_GET['id'];
$sql = "DELETE FROM mahasiswa WHERE id = ?";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$id])) {
    header("Location: mahasiswa.php?success=deleted");
} else {
    header("Location: mahasiswa.php?error=1");
}
exit;