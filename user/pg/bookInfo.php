<div class="user-home-content-wrapper">
    <div>
        <h3>Book Information</h3>
        <hr class="hr-title"> <?php
        $bookid = $_GET['bookid'];
        $sql = "SELECT * FROM tblborrowed
        WHERE bookID='$bookid'";
        $result = mysqli_query($connection, $sql);
        $borrowCount = mysqli_num_rows($result);
        $sql = "SELECT tblcategory.*, tblbook.* 
        FROM tblbook
        JOIN tblcategory ON tblcategory.catID = tblbook.catID
        WHERE tblbook.bookID='$bookid'";
        $result = mysqli_query($connection, $sql);    
        $count = mysqli_num_rows($result);
        if($count === 1) {
            while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="book-info"> 
                    <div class="info-btn-img"> <?php 
                        if($row["bookPhoto"] === "") { ?>
                            <img src="img/upload/default-book-img.jpg" alt=""> <?php
                        } else { ?>
                            <img src="img/upload/<?php echo $row["bookPhoto"]?>" alt=""> <?php
                        } 
                        $available = $row["bookQuantity"];
                        $btnClass = '';
                        $btnValue = '';
                        $cantClick = '';
                        if($available > 0) {
                            $btnClass = 'available';
                            $btnValue = 'BORROW BOOK';
                        } else {
                            $cantClick = 'disabled';
                            $btnClass = 'unavailable';
                            $btnValue = 'BOOK UNAVAILABLE';
                        }
                        ?>
                        <!--<button onclick="window.location='index.php?con=userborrowbook&bookid=<?php echo $row['bookID']; ?>&userid<?php echo $_SESSION['accID']; ?>'" class="<?php echo $btnClass; ?>" <?php echo $cantClick; ?>><?php // echo $btnValue; ?></button> !-->
                        <button onclick="btnToggleBookRequestForm()">REQUEST BOOK</button>
                        <button class="favorite">ADD TO FAVORITE</button>
                    </div>
                    <div class="info-item">
                        <h5><?php echo $row["bookTitle"]; ?><span> (<?php echo $row["bookID"]; ?>)</span></h5>
                        <h5><span><?php echo $row["bookAuthor"]; ?></span></h5><br>
                        <p><?php echo $row["bookDescription"]; ?></p><br>
                        <p>Borrowed: <span><?php echo $borrowCount; ?></span> time/s</p>
                        <p>Quantity: <span><?php echo $row["bookQuantity"]; ?></span></p>
                        <p>Available: <span><?php echo $row["bookQuantity"]; ?></span></p>
                    </div>
                </div> <?php
            }
        } else { 
            header("Location: index.php?con=home&msg=systemerror"); 
        } ?>
    </div>
</div> <?php
sleep(0);
require_once("request.php");
?>