<?php
$catTitle = "";
$catDescription = "";
$formCmd = "ADD";
$_SESSION['prevCMD'] = 'adde';
$_SESSION['prevID'] = '';
if (isset($_GET['con']) && $_GET['con'] === 'updatecategory') {    
    $formCmd = "UPDATE";
    $_SESSION['prevCMD'] = 'update';
    $_SESSION['prevID'] = $_GET['catid'];
    $catID = $_GET['catid'];
    $sql = "SELECT * FROM `tblcategory` WHERE catID='$catID'";
    $result = mysqli_query($connection, $sql);    
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($count === 1) {
        $catTitle = $row["catTitle"]; 
        $catDescription = $row["catDescription"];
    } else {
        header("Location: index.php?con=home&msg=systemerror");
    }
} ?>
<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1><?php echo $formCmd; ?> CATEGORY</h1>
    <form class="add-book" action="db/cruds/adminAddCategory.php" method="POST">
        <div class="form-row">
            <div class="form-column">
                <label for="catTitle">Title</label>
                <input value="<?php echo $catTitle; ?>" type="text" id="catTitle" name="catTitle" required>
                <label for="catDescription">Description</label>
                <textarea id="catDescription" name="catDescription" rows="4" required><?php echo $catDescription; ?></textarea>
            </div>
            <div class="form-column">
            </div>
            <div class="form-column">
            </div>
        </div>
        <button type="submit"><?php echo $formCmd; ?></button>
    </form>
    <button type="submit" id="add-book-cancel" onclick="window.location='index.php?con=category'">CANCEL</button>
</div>