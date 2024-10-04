<?php
$category = "";
if(isset($_POST["category"])) {
    $category = $_POST["category"];
}
$author = $_POST["author"];
$title = $_POST["title"];
header("Location: index.php?con=books&search=1&author=$author&title=$title&category=$category");
?>