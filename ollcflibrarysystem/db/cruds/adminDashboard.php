<?php
    // ADMIN DASHBOARD
    // TOTAL ACCOUNTS
    $sql = "SELECT * FROM tblaccount";
    $result = mysqli_query($connection, $sql);
    $_SESSION['totalUsers'] = mysqli_num_rows($result);
    // TOTAL BOOKS
    $sql = "SELECT * FROM tblbook";
    $result = mysqli_query($connection, $sql);
    $_SESSION['totalBooks'] = mysqli_num_rows($result);
    $DateToday = date('m-d-Y');
    // TOTAL BORROWED TODAY
    $sql = "SELECT * FROM tblborrowed
    WHERE borrStatus='Borrowed' AND borrDate='$DateToday'";
    $result = mysqli_query($connection, $sql);
    $_SESSION['borrowedToday'] = mysqli_num_rows($result);
    // TOTAL RETURNED TODAY
    $sql = "SELECT * FROM tblborrowed
    WHERE borrStatus='Returned' AND borrDateReturn='$DateToday'";
    $result = mysqli_query($connection, $sql);
    $_SESSION['borrowedToday'] = mysqli_num_rows($result);
?>