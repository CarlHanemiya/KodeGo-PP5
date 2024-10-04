<?php
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        switch ($msg) {
            case 'nocategory' :
                echo "<script> alert('No category has been found, please add category first!'); </script>";
                break;

            case 'logfailed' : 
                echo "<script> alert('Invalid username or password!'); </script>";
                break;

            case 'regsuccess' : 
                echo "<script> alert('Registration successful!'); </script>";
                break;

            case 'regfailed' : 
                echo "<script> alert('Failed to register!'); </script>";
                break;

            case 'usernametaken' :
                echo "<script>alert('Username is taken!')</script>";
                break;

            case 'passwordmismatch' :
                echo "<script>alert('Password not match!')</script>";
                break;

            case 'success' : 
                echo "<script>alert('Record " . $_SESSION['prevCMD']  . "d successfully!')</script>";
                break;

            case 'failed' : 
                echo "<script>alert('Failed to " . $_SESSION['prevCMD'] . " the record!')</script>";
                break;
            
            case 'systemerror' : 
                echo "<script>alert('Something went wrong!')</script>";
                break;
                    
        }
    }
?>