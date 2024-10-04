<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1>RETURNED BOOKS</h1>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Borrower</th>
                    <th>Date Returned</th>
                    <th>Received by</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> <?php 
                $sql = "SELECT tblborrowed.*, tblprofile.*, tblbook.* 
                FROM tblborrowed
                JOIN tblprofile ON tblborrowed.accID = tblprofile.accID
                JOIN tblbook ON tblborrowed.bookID = tblbook.bookID
                WHERE tblborrowed.borrStatus='Returned'";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["borrID"]; ?></td>
                            <td><?php echo $row["bookTitle"]; ?></td>
                            <td><?php echo $row["profFullname"]; ?></td>
                            <td><?php echo $row["borrDateReturn"]; ?></td>
                            <td><?php echo $row["receivedBy"]; ?></td>
                            <td><?php echo $row["borrStatus"]; ?></td>
                        </tr> <?php
                    }
                } else { ?>
                    <tr>
                        <td>No Record Found!</td> 
                    </tr> <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>