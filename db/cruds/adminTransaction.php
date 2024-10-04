<?php
    $_SESSION['prevCMD'] = strtolower($_GET['action']);
    $adminName = $_SESSION['accFullname'];
    $action = $_GET['action'];
    $borrid = $_GET['borrid'];
    $return = $_GET['return'];
    $sql = "UPDATE tblborrowed SET borrStatus='$action', processBy='$adminName' 
    WHERE borrID=$borrid";
    if(mysqli_query($connection, $sql)) {
        header("Location: index.php?con=$return&msg=success");
    } else {
        header("Location: index.php?con=$return&msg=failed");
    }
?>