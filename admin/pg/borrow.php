<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1>BORROWED BOOKS</h1>
    <button class="btn-add-new-book">ADD BORROWED BOOK</button>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Borrower</th>
                    <th>Date Borrowed</th>
                    <th>Date Due</th>
                    <th>Process By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> <?php 
                $sql = "SELECT tblborrowed.*, tblprofile.*, tblbook.* 
                FROM tblborrowed
                JOIN tblprofile ON tblborrowed.accID = tblprofile.accID
                JOIN tblbook ON tblborrowed.bookID = tblbook.bookID
                WHERE tblborrowed.borrStatus='Approved'";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["borrID"]; ?></td>
                            <td><?php echo $row["bookTitle"]; ?></td>
                            <td><?php echo $row["profFullname"]; ?></td>
                            <td><?php echo $row["borrDate"]; ?></td>
                            <td><?php echo $row["borrDateDue"]; ?></td>
                            <td><?php echo $row["processBy"]; ?></td>
                            <td>
                                <!-- <button onclick="window.location='index.php?con=updatebook&bookid=<?php echo $row['bookID']; ?>'">Update</button> !-->
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