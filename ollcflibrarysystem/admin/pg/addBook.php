<?php
$bookID = "";
$catID = "";
$catTitle = "";
$bookTitle = "";
$bookAuthor = "";
$bookSubject = "";
$bookPageCount = "";
$bookQuantity = "";
$bookLocation = "";
$bookDescription = "";
$bookPhoto = "";
$formCmd = "ADD";
$_SESSION['prevCMD'] = 'adde';
if (isset($_GET['con']) && $_GET['con'] === 'updatebook') {
    $formCmd = "UPDATE";
    $_SESSION['prevCMD'] = 'update';
    $bookID = $_GET['bookid'];
    $sql = "SELECT tblbook.*, tblcategory.*
    FROM tblbook
    JOIN tblcategory ON  tblbook.catID =  tblcategory.catID 
    WHERE bookID='$bookID'";
    $result = mysqli_query($connection, $sql);    
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($count === 1) {
        $catID = $row["catID"];
        $catTitle = $row["catTitle"];
        $bookTitle = $row["bookTitle"];
        $bookAuthor = $row["bookAuthor"];
        $bookSubject = $row["bookSubject"];
        $bookPageCount = $row["bookPageCount"];
        $bookQuantity = $row["bookQuantity"];
        $bookLocation = $row["bookLocation"];
        $bookDescription = $row["bookDescription"];
        $bookPhoto = $row["bookPhoto"];
    } else {
        //header("Location: index.php?con=home&msg=systemerror");
    }
} ?>
<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1><?php echo $formCmd; ?> BOOK</h1>
    <form class="add-book" action="db/cruds/adminAddBook.php" method="POST">
        <div class="form-row">
            <div class="form-column">
                <label for="bookID">ISBN</label>
                <input value="<?php echo $bookID; ?>" type="text" id="bookID" name="bookID" required>

                <label for="catID">Category</label>
                <select id="catID" name="catID" required> <?php
                    if (isset($_GET['con']) && $_GET['con'] === 'updatebook') { ?>
                        <option value="<?php echo $catID; ?>" selected><?php echo $catTitle; ?></option><?php
                    } else { ?>
                        <option value="" disabled selected>Select a category</option> <?php
                    } 
                    $sql = "SELECT * FROM `tblcategory`";
                    $result = mysqli_query($connection, $sql);    
                    $count = mysqli_num_rows($result);

                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            if (isset($_GET['con']) && $_GET['con'] === 'updatebook' && $catID === $row["catID"]) {
                                // do nothing
                            } else { ?>
                                <option value="<?php echo $row["catID"]; ?>"><?php echo $row["catTitle"]; ?></option> <?php
                            }
                        }
                    } else {
                        header("Location: index.php?con=category&msg=nocategory");
                    } ?>
                </select>
                <label for="bookTitle">Title</label>
                <input type="text" value="<?php echo $bookTitle; ?>" id="bookTitle" name="bookTitle" required>

                <label for="bookAuthor">Author</label>
                <input type="text" value="<?php echo $bookAuthor; ?>" id="bookAuthor" name="bookAuthor" required>
            </div>

            <div class="form-column">
                <label for="bookSubject">Subject</label>
                <input type="text" value="<?php echo $bookSubject; ?>" id="bookSubject" name="bookSubject" required>

                <label for="bookPageCount">Page Count</label>
                <input type="number" value="<?php echo $bookPageCount; ?>" id="bookPageCount" name="bookPageCount" required>

                <label for="bookQuantity">Quantity</label>
                <input type="number" value="<?php echo $bookQuantity; ?>" id="bookQuantity" name="bookQuantity" required>

                <label for="bookLocation">Location</label>
                <input type="text" value="<?php echo $bookLocation; ?>" id="bookLocation" name="bookLocation" required>
            </div>

            <div class="form-column">
                <label for="bookDescription">Description</label>
                <textarea id="bookDescription" name="bookDescription" rows="4" required><?php echo $bookDescription; ?></textarea>

                <label for="bookPhoto">Image</label>
                <input type="file" value="<?php echo $bookPhoto; ?>" id="bookPhoto" name="bookPhoto">
            </div>
        </div>
        <button type="submit"><?php echo $formCmd; ?></button>
    </form>
    <button type="submit" id="add-book-cancel" onclick="window.location='index.php?con=book'">CANCEL</button>
</div>