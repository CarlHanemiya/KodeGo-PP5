<h5 class="main-content-title">OLMS/<span> Book Management</span></h5>
<div class="form-container">
    <h1>LIST OF BOOK</h1>
    <button class="btn-add-new-book" onclick="window.location='index.php?con=user'">ADD NEW BOOK</button>
    <div class="table-container">
        <table class="book-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody> <?php 
                $sql = "SELECT tblaccount.*, tblprofile.* 
                FROM tblaccount 
                JOIN tblprofile ON tblaccount.accID = tblprofile.accID";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["accID"]; ?></td>
                            <td><?php echo $row["profFullname"]; ?></td>
                            <td><?php echo $row["deptID"]; ?></td>
                            <td><?php echo $row["profGender"]; ?></td>
                            <td><?php echo $row["profNumber"]; ?></td>
                            <td><?php echo $row["accUsername"]; ?></td>
                            <td><?php echo $row["accPassword"]; ?></td>
                            <td>
                                <button onclick="window.location='index.php?con=user&accid=<?php echo $row['accID']; ?>'">Update</button>
                                <button onclick="window.location='index.php?con=deleterecord&return=user&table=tblaccount&idname=accID&id=<?php echo $row['accID']; ?>'">Delete</button>
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