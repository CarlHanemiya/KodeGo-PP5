<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1>LIST OF BOOK</h1>
    <button class="btn-add-new-book" onclick="window.location='index.php?con=addbook'">ADD NEW BOOK</button>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Subject</th>
                    <th>Page Count</th>
                    <th>Quantity</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody> <?php
                $sql = "SELECT tblbook.*, tblcategory.* 
                FROM tblbook 
                JOIN tblcategory ON tblbook.catID = tblcategory.catID";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["bookID"]; ?></td>
                            <td><?php echo $row["bookTitle"]; ?></td>
                            <td><?php echo $row["catTitle"]; ?></td>
                            <td><?php echo $row["bookAuthor"]; ?></td>
                            <td><?php echo $row["bookSubject"]; ?></td>
                            <td><?php echo $row["bookPageCount"]; ?></td>
                            <td><?php echo $row["bookQuantity"]; ?></td>
                            <td>
                                <button onclick="window.location='index.php?con=updatebook&bookid=<?php echo $row['bookID']; ?>'">Update</button>
                                <button onclick="window.location='index.php?con=deleterecord&return=book&table=tblbook&idname=bookID&id=<?php echo $row['bookID']; ?>'">Delete</button>
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