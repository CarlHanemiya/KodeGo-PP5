<?php
    $_SESSION['prevCMD'] = 'delete';
    $id = $_GET['id'];
    $idName = $_GET['idname'];
    $tbl = $_GET['table'];
    $return = $_GET['return'];
    $sql = "DELETE FROM `$tbl` WHERE `$idName`='$id'";
    if(mysqli_query($connection, $sql)) {
        header("Location: index.php?con=$return&msg=success");
    } else {
        header("Location: index.php?con=$return&msg=failed");
    }
?>