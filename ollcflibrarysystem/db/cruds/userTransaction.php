<?php
    $_SESSION['prevCMD'] = strtolower($_GET['action']);
    $action = $_GET['action'];
    $borrid = $_GET['borrid'];
    $return = $_GET['return'];
    $DateToday = date('Y-m-d');
    $sql = "UPDATE tblborrowed SET borrStatus='$action', borrDateReturn='$DateToday'
    WHERE borrID=$borrid";
    if(mysqli_query($connection, $sql)) {
        header("Location: index.php?con=$return&msg=success");
    } else {
        header("Location: index.php?con=$return&msg=failed");
    }
?>