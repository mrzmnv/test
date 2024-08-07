<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();
include "baglanti.php";

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    $sql = "DELETE FROM qeydiyyat WHERE id = ? ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "istifadeci ugurla silindi.";
    } else {
        echo "istifadeci silinende bir problem yarandi: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    echo "sehv istifadeci ID si.";
}

header("Location: admin.php");
exit();
?>
