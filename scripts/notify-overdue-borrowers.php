<?php

require_once __DIR__.'/../connection.php';

$result = $conn->query('
    SELECT br.*, u.FirstName, u.LastName, u.email, a.Title, a.Lastname
    FROM tb_borrowandreturn br
    INNER JOIN tb_borrower u ON u.BorrowerID = br.BorrowerID
    INNER JOIN tb_book b ON br.AccessionID = b.ID
    INNER JOIN tb_acquisition a ON b.AcquisitionID = a.AcquisitionID
    WHERE
        br.DateToReturn < NOW() AND
        (br.ActualDateReturned = "0000-00-00" OR br.ActualDateReturned IS NULL)
');
if (!$result) {
    echo mysqli_error($conn);
}

$message = <<<EOT
<p>Good day %s!</p>

<p>We would like to remind you that the book <i>"%s" by %s</i> you borrowed from the UDM Library is %s overdue.</p>

<p>To avoid larger penalties for late returns, please return the book as soon as possible.</p>

<p>Thank you!</p>
EOT;

$headers = "From: UDM Library <no-reply@udmlibrary.com>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\n\n";
while (($row = $result->fetch_assoc())) {
    if (!$row['email']) {
        continue;
    }

    $date_to_return = strtotime($row['DateToReturn']);

    $send_email = false;

    // var_dump($row);
    if (!$row['OverdueNotificationCount']) {
        // Send an email the first time
        $send_email = true;
    } else if (
        $row['OverdueNotificationCount'] < 2 &&
        time() > $date_to_return + (24 * 60 * 60)
    ) {
        $send_email = true;
    } else if (
        $row['OverdueNotificationCount'] < 3 &&
        time() > $date_to_return + (7 * 24 * 60 * 60)
    ) {
        $send_email = true;
    } else if (
        $row['OverdueNotificationCount'] < 4 &&
        time() > $date_to_return + (30 * 24 * 60 * 60)
    ) {
        $send_email = true;
    }

    if ($send_email) {
        echo "Sending email to {$row['email']}\n";
        $conn->query('
            UPDATE tb_borrowandreturn
            SET OverdueNotificationCount = OverdueNotificationCount + 1
            WHERE BorrowingReturningID = ' . intval($row['BorrowingReturningID'])
        );
        $overdue_days = (time() - $date_to_return) / (24 * 60 * 60);
        mail(
            $row['email'],
            'Overdue Book',
            sprintf(
                $message,
                $row['FirstName'],
                $row['Title'],
                $row['Lastname'],
                ($overdue_days < 1) ? '' : intval($overdue_days) . ' day(s)'
            ),
            $headers
        );
    }
}
