<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = mysqli_real_escape_string($con, $_POST['cat_title']);

    // Select data from the database
    $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_title'";
    $result_select = mysqli_query($con, $select_query);

    if (!$result_select) {
        die("Error in select query: " . mysqli_error($con));
    }

    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Category already exists')</script>";
    } else {
        // Insert into the database
        $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);

        if (!$result) {
            die("Error in insert query: " . mysqli_error($con));
        }

        echo "<script>alert('New category has been inserted successfully')</script>";
    }
}
?>

<h2 class="text-center">Insert category</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert category"> 
    </div>
</form>
