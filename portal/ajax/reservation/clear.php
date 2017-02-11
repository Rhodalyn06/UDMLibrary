<?php

require_once '../session.php';
require_once '../logout.php';
require_once '../connection.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$success = true;
if (!$id) {
    $result = $conn->query('
        SELECT ReservationID as id
        FROM tb_reservation
        WHERE
            Status = "Reserved" AND
            DateReserved + INTERVAL 1 DAY < NOW()
    ');

    while(($row = $result->fetch_assoc())) {
        clearReservation($row['id']);
    }
} else {
    $success = clearReservation($id);
}

function clearReservation($id) {
    global $conn;
    $success = true;
    $result = $conn->query("
        SELECT *
        FROM tb_reservation
        WHERE
            Status = 'Reserved' AND
            ReservationID = {$id}
    ");

    if (!$result || !$result->num_rows) {
        return false;
    }
    $reservation = $result->fetch_assoc();

    $result = $conn->query("
        UPDATE tb_book
        SET STATUS = 'Available'
        WHERE ID = {$reservation['BookID']}"
    );

    if (!$result) {
        return false;
    }

    $result = $conn->query("
        UPDATE tb_reservation
        SET Status = 'Cancelled'
        WHERE ReservationID = {$reservation['ReservationID']}"
    );

    if (!$result) {
        echo json_encode(array(
            'status' => 'error',
            'message' => 'Unable to cancel reservation',
        ));
        exit;
    }
    $conn->query("
        UPDATE tb_borrower
        SET BookOnHand = BookOnHand - 1
        WHERE BorrowerID = {$reservation['BorrowerID']}
    ");
    return true;
}
header('Content-type: application/json');
echo json_encode(array('status' => $success ? 'success' : 'error'));
