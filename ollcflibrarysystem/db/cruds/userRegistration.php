<?php
    include '../connection.php';
    session_start();
    // SIGN UP USER ACCOUNT
    if(isset($_POST['regFullname'])) {
        $myfullname = mysqli_real_escape_string($connection, $_POST['regFullname']);
        $myusername = mysqli_real_escape_string($connection, $_POST['regUsername']);
        $mypassword = mysqli_real_escape_string($connection, $_POST['regPass']);
        $confirmpassword = mysqli_real_escape_string($connection, $_POST['regConfirmPass']);
        
        // Validate username and check password
        $sql = "SELECT * FROM `tblaccount` WHERE `accUsername`='$myusername'";
        $result = mysqli_query($connection, $sql);  
        $count = mysqli_num_rows($result);
        
        if($count >= 1) {
            header("Location: ../../index.php?con=home&msg=usernametaken");
        } elseif ($mypassword !== $confirmpassword) {
            header("Location: ../../index.php?con=home&msg=passwordmismatch");
        } else {
            // Insert into tblaccount
            $sql = "INSERT INTO tblaccount (accUsername, accPassword, accType, accToken) 
                    VALUES ('$myusername', '$mypassword', 'User', '')";
            
            if (mysqli_query($connection, $sql)) {
                // Get the last inserted accID
                $accID = mysqli_insert_id($connection);
                
                // Insert into tblprofile using the retrieved accID
                $sql_profile = "INSERT INTO tblprofile (accID, deptID, profFullname, profGender, profNumber, profAddress) 
                                VALUES ('$accID', '', '$myfullname', '', '', '')";
                
                if (mysqli_query($connection, $sql_profile)) {
                    header("Location: ../../index.php?con=home&msg=regsuccess");
                } else {
                    header("Location: ../../index.php?con=home&msg=regfailed");
                }
            } else {
                header("Location: ../index.php?con=home&msg=regfailed");
            }
        }
    }
?>