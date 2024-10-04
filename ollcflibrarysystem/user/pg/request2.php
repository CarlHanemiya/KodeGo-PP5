<div class="form-container">
    <h1>REQUEST</h1>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Due</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> <?php
                $userID = $_SESSION['accID'];
                $sql = "SELECT tblborrowed.*, tblprofile.*, tblbook.* 
                FROM tblborrowed
                JOIN tblprofile ON tblborrowed.accID = tblprofile.accID
                JOIN tblbook ON tblborrowed.bookID = tblbook.bookID
                WHERE (tblborrowed.borrStatus='Pending' OR tblborrowed.borrStatus='Declined') AND tblborrowed.accID='$userID'";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["bookTitle"]; ?></td>
                            <td><?php echo $row["borrQuantity"]; ?></td>
                            <td><?php echo $row["borrDate"]; ?></td>
                            <td><?php echo $row["borrDateDue"]; ?></td>
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