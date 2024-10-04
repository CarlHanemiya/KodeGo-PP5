<div class="sidepanel">
    <div class="search-wrapper">
        <form action="index.php?con=searchbook" method="POST">
            <h3>Search</h3>
            <select id="category" name="category"><?php
                if (isset($_GET['search']) && $_GET['category']) { ?>
                    <option value="<?php echo $_GET['category']; ?>" selected><?php echo ucfirst($_GET['category']); ?></option><?php
                } else { ?>
                    <option value="" disabled selected>All Category</option> <?php
                } 
                $sql = "SELECT * FROM `tblcategory`";
                $result = mysqli_query($connection, $sql);    
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if (isset($_GET['search']) && $_GET['category'] && ucfirst($_GET['category']) === $row["catTitle"]) {
                            // do nothing
                        } else { ?>
                            <option value="<?php echo $row["catTitle"]; ?>"><?php echo $row["catTitle"]; ?></option> <?php
                        }
                    }
                } ?>
            </select>
            <input value="<?php
            if (isset($_GET['search'])) {
                echo $_GET['author'];
            } ?>" type="text" id="author" name="author" placeholder="Author">
            <input value="<?php
            if (isset($_GET['search'])) {
                echo $_GET['title'];
            } ?>"type="text" id="title" name="title" placeholder="Title">
            <!-- <input type="date" id="dtstart" name="dtstart" placeholder="Start">
            <input type="date" id="dtend" name="dtend" placeholder="End"> !-->
            <button type="submit">Search</button>
        </form>
    </div>
    <h3>Categories</h3>
    <hr>
    <ul> <?php 
        $sql = "SELECT * FROM `tblcategory`";
        $result = mysqli_query($connection, $sql);    
        $count = mysqli_num_rows($result);

        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
                <li><a href="index.php?con=books&search=1&author=&title=&category=<?php echo strtolower($row["catTitle"]); ?>"><?php echo $row["catTitle"]; ?></a></li> <?php
            }
        } else { ?>
            <li>No Record Found!</li> <?php
        } ?>
    </ul>
</div>