<?php
    include '../connection.php';
    session_start();
    // ADD CATEGORY
    if(isset($_POST['bookTitle'])) {
        $bookID = mysqli_real_escape_string($connection, $_POST['bookID']);
        $catID = mysqli_real_escape_string($connection, $_POST['catID']);
        $bookTitle = mysqli_real_escape_string($connection, $_POST['bookTitle']);
        $bookAuthor = mysqli_real_escape_string($connection, $_POST['bookAuthor']);
        $bookSubject = mysqli_real_escape_string($connection, $_POST['bookSubject']);
        $bookPageCount = mysqli_real_escape_string($connection, $_POST['bookPageCount']);
        $bookQuantity = mysqli_real_escape_string($connection, $_POST['bookQuantity']);
        $bookLocation = mysqli_real_escape_string($connection, $_POST['bookLocation']);
        $bookDescription = mysqli_real_escape_string($connection, $_POST['bookDescription']);
        $bookPhoto = mysqli_real_escape_string($connection, $_POST['bookPhoto']);
        $sql = "REPLACE INTO tblbook (bookID, catID, bookTitle, bookAuthor, bookSubject, bookPageCount, bookQuantity, bookLocation, bookDescription, bookPhoto) 
                    VALUES ('$bookID', '$catID', '$bookTitle', '$bookAuthor', '$bookSubject', '$bookPageCount', '$bookQuantity', '$bookLocation', '$bookDescription', '$bookPhoto')";
        
        if (mysqli_query($connection, $sql)) {
            header("Location: ../../index.php?con=book&msg=success");
        } else {
            header("Location: ../../index.php?con=addbook&msg=failed");
        }
    }
?>