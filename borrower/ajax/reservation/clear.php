<?php

require_once '../session.php';
require_once '../logout.php';
require_once '../connection.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
header('Content-type: application/json');

if ($id) {
    $result = $conn->query("
        SELECT r.*, b.UserID
        FROM tb_reservation r
        INNER JOIN tb_borrower b ON r.BorrowerID = b.BorrowerID
        WHERE
            Status = 'Reserved' AND
            ReservationID = {$id}
    ");

    if (!$result || !$result->num_rows) {
        echo json_encode(array(
            'status' => 'error',
            'message' => 'Reservation not found',
        ));
        exit;
    }

    $reservation = $result->fetch_assoc();

    if ($reservation['UserID'] != $_SESSION['id']) {
        echo json_encode(array(
            'status' => 'error',
            'message' => 'You may not cancel reservations you do not own.',
        ));
        exit;
    }
    $result = $conn->query("
        UPDATE tb_book
        SET STATUS = 'Available'
        WHERE ID = {$reservation['BookID']}"
    );

    if (!$result) {
        echo json_encode(array(
            'status' => 'error',
            'message' => 'Unable to cancel reservation',
        ));
        exit;
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
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Please indicate the reservation you wish to cancel.',
    ));
}
