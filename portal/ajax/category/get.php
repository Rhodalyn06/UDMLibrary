<?php
    include_once '../session.php';
    include_once '../logout.php';
    include_once '../connection.php';

    $q = mysqli_prepare(
        $conn,
        'SELECT * FROM tb_categoryy WHERE type = ? AND parent_id = ?'
    );
    $type = $_GET['type'] ?: 'DDC';
    $parent_id = $_GET['parent_id'] ?: 0;

    $q->bind_param("si", $type, $parent_id);

    $categories = [];
    if (!$q->execute()) {
        $data = [
            'status' => 'error',
            'data' => 'Unable to fetch categories'
        ];
    }
    $result = $q->get_result();
    $categories = $result->fetch_all(MYSQLI_ASSOC);

    $data = [
        'status' => 'success',
        'data' => $categories
    ];

    header('Content-type: application/json');
    echo json_encode($data);
