<h5 class="main-content-title">OLMS/<span> Dashboard</span></h5>
<?php
    include_once("././db/cruds/adminDashboard.php");
    $bookCount = (isset($_SESSION['totalBooks'])) ? $_SESSION['totalBooks'] : '0';
    $userCount = (isset($_SESSION['totalUsers'])) ? $_SESSION['totalUsers'] : '0';
    $borrowedToday = (isset($_SESSION['borrowedToday'])) ? $_SESSION['borrowedToday'] : '0';
    $returnedToday = (isset($_SESSION['returnedToday'])) ? $_SESSION['returnedToday'] : '0';
?>
<div class="total-item-wrapper">
    <div class="total-item" id="total-book">
        <h5>Total Books</h5>
        <p><?php echo $bookCount ?></p>
    </div>
    <div class="total-item" id="total-user">
        <h5>Total Users</h5>
        <p><?php echo $userCount ?></p>
    </div>
    <div class="total-item" id="borrow-today">
        <h5>Borrowed Today</h5>
        <p><?php echo $borrowedToday ?></p>
    </div>
    <div class="total-item" id="returned-today">
        <h5>Returned Today</h5>
        <p><?php echo $returnedToday ?></p>
    </div>
</div>

<div class="total-item-wrapper">
    <div class="report-summary">

    </div>
    <div class="dashboard-carousel">
    
    </div>
</div>