<div class="request-box" id="toggle-book-request-form">
    <button id="request-btn-cancel-reg"  onclick="btnToggleBookRequestForm()">x</button>
    <form id="request-form" action="index.php?con=userborrowbook&bookid=<?php echo $_GET['bookid']; ?>&userid=<?php echo $_SESSION['accID']; ?>" method="post">
        <h1>Book Request</h1>
        <label for="reqBorrowDate">Date Borrow</label>
        <input type="date" value="<?php echo date("Y-m-d"); ?>" required name="reqBorrowDate" id="reqBorrowDate">
        <label for="reqBorrowQuantity">Quantity</label>
        <input type="number" value="1" required name="reqBorrowQuantity" id="reqBorrowQuantity">
        <input type="submit" value="Submit" name="profUpdate">
    </form>
</div>