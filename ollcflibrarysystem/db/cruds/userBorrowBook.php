<?php
    if(isset($_GET['bookid'])) {
        $borrowDate = $_POST["reqBorrowDate"];
        $borrowDateDue = new DateTime($borrowDate);
        $borrowDateDue->modify('+7 days');
        $borrowDateDue = $borrowDateDue->format('Y-m-d');
        $borrowQuantity = $_POST["reqBorrowQuantity"];
        $_SESSION['prevCMD'] = 'submitte';
        $bookID = $_GET['bookid'];
        $userID = $_GET['userid'];

        $sql = "INSERT INTO tblborrowed (accID, bookID, borrDate, borrDateDue, borrQuantity, processBy, borrDateReturn, receivedBy, borrStatus) 
                    VALUES ('$userID', '$bookID', '$borrowDate', '$borrowDateDue', '$borrowQuantity', '', '', '', 'Pending')";
        
        if (mysqli_query($connection, $sql)) {
            header("Location: index.php?con=books&msg=success");
        } else {
            header("Location: index.php?con=books&msg=failed");
        }
    }
?>