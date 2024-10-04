<div class="user-home-content-wrapper">
    <div>
        <h3>List of book</h3>
        <hr class="hr-title"> <?php 
        $sql = "SELECT tblbook.*, tblcategory.* 
        FROM tblbook 
        JOIN tblcategory ON tblbook.catID = tblcategory.catID";
        $result = mysqli_query($connection, $sql);    
        $count = mysqli_num_rows($result);

        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if(isset($_GET['search'])) {
                    $categoryValue = $_GET['category'];
                    $authorValue = $_GET['author'];
                    $titleValue = $_GET['title'];
                    if(stripos(strtolower($row["catTitle"]), $categoryValue) !== false && stripos(strtolower($row["bookTitle"]), $titleValue) !== false && stripos(strtolower($row["bookAuthor"]), $authorValue) !== false) { ?>
                        <div onclick='window.location="index.php?con=bookinfo&bookid=<?php echo $row["bookID"]; ?>"' class="book-item"> <?php 
                            if($row["bookPhoto"] === "") { ?>
                                <img src="img/upload/default-book-img.jpg" alt=""> <?php
                            } else { ?>
                                <img src="img/upload/<?php echo $row["bookPhoto"]?>" alt=""> <?php
                            } ?>
                            <h5><?php echo $row["bookTitle"]; ?></h5>
                        </div> <?php
                    }
                } else { ?>
                    <div onclick='window.location="index.php?con=bookinfo&bookid=<?php echo $row["bookID"]; ?>"' class="book-item"> <?php 
                        if($row["bookPhoto"] === "") { ?>
                            <img src="img/upload/default-book-img.jpg" alt=""> <?php
                        } else { ?>
                            <img src="img/upload/<?php echo $row["bookPhoto"]?>" alt=""> <?php
                        } ?>
                        <h5><?php echo $row["bookTitle"]; ?></h5>
                    </div> <?php
                }
            }
        } else { ?>
            <p>No Record Found!</p> <?php
        } ?>
    </div>
</div>
