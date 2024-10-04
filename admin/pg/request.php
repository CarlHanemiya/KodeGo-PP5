<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1>REQUEST</h1>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Borrower</th>
                    <th>Date Borrowed</th>
                    <th>Date Due</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> <?php 
                $sql = "SELECT tblborrowed.*, tblprofile.*, tblbook.* 
                FROM tblborrowed
                JOIN tblprofile ON tblborrowed.accID = tblprofile.accID
                JOIN tblbook ON tblborrowed.bookID = tblbook.bookID
                WHERE tblborrowed.borrStatus='Pending'";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["borrID"]; ?></td>
                            <td><?php echo $row["bookTitle"]; ?></td>
                            <td><?php echo $row["borrQuantity"]; ?></td>
                            <td><?php echo $row["profFullname"]; ?></td>
                            <td><?php echo $row["borrDate"]; ?></td>
                            <td><?php echo $row["borrDateDue"]; ?></td>
                            <td>
                            <button onclick="window.location='index.php?con=transaction&return=request&action=Approved&borrid=<?php echo $row['borrID']; ?>'">Approve</button>
                            <button onclick="window.location='index.php?con=transaction&return=request&action=Declined&borrid=<?php echo $row['borrID']; ?>'">Declined</button>
                            </td>
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