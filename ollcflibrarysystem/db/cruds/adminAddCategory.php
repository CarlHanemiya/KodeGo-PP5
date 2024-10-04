<?php
    include '../connection.php';
    session_start();
    // ADD CATEGORY
    if(isset($_POST['catTitle'])) {
        $catID = $_SESSION['prevID'];
        $categoryTitle = mysqli_real_escape_string($connection, $_POST['catTitle']);
        $categoryDescription = mysqli_real_escape_string($connection, $_POST['catDescription']);
        $sql = "REPLACE INTO tblcategory (catID, catTitle, catDescription) 
                    VALUES ('$catID', '$categoryTitle', '$categoryDescription')";
        
        if (mysqli_query($connection, $sql)) {
            header("Location: ../../index.php?con=category&msg=success");
        } else {
            header("Location: ../../index.php?con=addcategory&msg=failed");
        }
    }
?>