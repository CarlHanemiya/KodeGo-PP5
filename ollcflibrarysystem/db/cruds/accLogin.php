<?php
    include '../connection.php';
    session_start();
    // LOGIN ACCOUNT
    if(isset($_POST["logUsername"])){ 
        $username = $_POST["logUsername"];
        $pass = $_POST["logPass"];
        $sql = "SELECT tblaccount.*, tblprofile.* 
        FROM tblaccount
        JOIN tblprofile ON tblaccount.accID = tblprofile.accID 
        WHERE tblaccount.accUsername='$username' AND tblaccount.accPassword='$pass'";
        $result = mysqli_query($connection, $sql);      
        $row = mysqli_fetch_assoc($result);   
        $count = mysqli_num_rows($result);

        if($count == 1) {
            sleep(2); 
            $_SESSION['logStatus'] = "true";
            $_SESSION['accType'] = $row['accType'];
            $_SESSION['accFullname'] = $row['profFullname'];
            $_SESSION['accAddress'] = $row['profAddress'];
            $_SESSION['accDepartment'] = $row['deptID'];
            $_SESSION['accGender'] = $row['profGender'];
            $_SESSION['accNumber'] = $row['profNumber'];
            $_SESSION['accAddress'] = $row['profAddress'];
            $_SESSION['accID'] = $row['accID'];
            $_SESSION['accEmail'] = $row['accUsername'];
            $_SESSION['accpass'] = $row['accPassword'];  
            header("Location: ../../index.php?con=home"); 
        } else {
            header("Location: ../../index.php?con=home&msg=logfailed");
        }
    } else {
        header("Location: ../../index.php?con=home&cmd=unknown"); 
    }
?>