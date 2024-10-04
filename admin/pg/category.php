<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1>BOOK CATEGORIES</h1>
    <button class="btn-add-new-book" onclick="window.location='index.php?con=addcategory'">ADD NEW CATEGORY</button>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody> <?php 
                $sql = "SELECT * FROM `tblcategory`";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["catID"]; ?></td>
                            <td><?php echo $row["catTitle"]; ?></td>
                            <td><?php echo $row["catDescription"]; ?></td>
                            <td>
                                <button onclick="window.location='index.php?con=updatecategory&catid=<?php echo $row['catID']; ?>'">Update</button>
                                <button onclick="window.location='index.php?con=deleterecord&return=category&table=tblcategory&idname=catID&id=<?php echo $row['catID']; ?>'">Delete</button>
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