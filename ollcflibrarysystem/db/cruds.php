<?php
    include 'connection.php';
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
            echo "<script>alert('Username is taken!')</script>";
        } elseif ($mypassword !== $confirmpassword) {
            echo "<script>alert('Passwords do not match!')</script>";
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
                    // Redirect if successful
                    header("Location: ../index.php?con=home&msg=regsuccess");
                } else {
                    // Handle failure of inserting into tblprofile
                    header("Location: ../index.php?con=home&msg=regfailed");
                }
            } else {
                // Handle failure of inserting into tblaccount
                header("Location: ../index.php?con=home&msg=regfailed_account");
            }
        }
    }

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
            $_SESSION['accID'] = $row['accID'];
            $_SESSION['accEmail'] = $row['accUsername'];
            $_SESSION['accpass'] = $row['accPassword'];  
            header("Location: ../index.php?con=home"); 
        } else {
            header("Location: ../index.php?con=home&msg=logfailed");
        }
    } else {
        header("Location: ../index.php?con=home&cmd=unknown"); 
    }
?>