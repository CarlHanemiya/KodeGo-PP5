<div class="user-home-content-wrapper">
    <h3>Top borrowed books</h3>
    <hr class="hr-title">
    <div class="user-home-top-borrow"> <?php 
        $sql = "SELECT DISTINCT tblbook.*, COUNT(tblborrowed.bookID) AS borrowCount 
        FROM tblbook
        JOIN tblborrowed ON tblbook.bookID = tblborrowed.bookID LIMIT 10";
        $result = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
                <div onclick='window.location="index.php?con=bookinfo&bookid=<?php echo $row["bookID"]; ?>"' class="book-item"> 
                    <p title="Number of times borrowed"><?php echo $row["borrowCount"]?></p> <?php 
                    if($row["bookPhoto"] === "") { ?>
                        <img src="img/upload/default-book-img.jpg" alt=""> <?php
                    } else { ?>
                        <img src="img/upload/<?php echo $row["bookPhoto"]?>" alt=""> <?php
                    } ?>
                    <h5><?php echo $row["bookTitle"]; ?></h5>
                </div> <?php
            }
        } else { ?>
            <p>No Record Found!</p> <?php
        } ?>
    </div>
    <hr>
    <h3>Latest arrivals</h3>
    <hr class="hr-title">
    <div class="user-home-latest-arrival">  <?php 
        $sql = "SELECT * FROM tblbook LIMIT 10 ";
        $result = mysqli_query($connection, $sql);    
        $count = mysqli_num_rows($result);

        if($count > 0) {
            $bookArray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $bookArray[] = $row;
            }

            $bookArray = array_reverse($bookArray);
            foreach ($bookArray as $row) { ?>
                <div onclick='window.location="index.php?con=bookinfo&bookid=<?php echo $row["bookID"]; ?>"' class="book-item"> 
                    <?php 
                    if ($row["bookPhoto"] === "") { ?>
                        <img src="img/upload/default-book-img.jpg" alt=""> 
                    <?php 
                    } else { ?>
                        <img src="img/upload/<?php echo $row["bookPhoto"]?>" alt=""> 
                    <?php 
                    } ?>
                    <h5><?php echo $row["bookTitle"]; ?></h5>
                </div> <?php
            }
        } else { ?>
            <p>No Record Found!</p> <?php
        } ?>
    </div>
</div>
