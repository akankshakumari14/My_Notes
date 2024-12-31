----------------------------------fetch without loop ------------------------------------------------------
    <?php
        $query = mysqli_query($con , "select * from slider ");
        $row = mysqli_fetch_assoc($query);
        $img1 = $row['img1'];
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $description = $row['description'];
    ?>


---------------------------------- fetch code with loop  ------------------------------------------------------
<div class="owl-carousel owl-theme">
                        <?php 
                            $query = mysqli_query($con, "SELECT * FROM product_detail");
                            while($rows = mysqli_fetch_assoc($query)){
                        ?>
                        <div class="item">
                            <div class="classic-box">
                                <div class="classic_image_box box1">
                                    <figure class="mb-0">
                                        <img src="login/admin/postimages/product/<?php echo $rows['postimage']; ?>" alt="image" class="img-fluid">
                                    </figure>
                                </div>
                                <div class="classic_box_content">
                                    <div class="text_wrapper position-relative">
                                        <h6 style="text-align:center;"><?php echo $rows['product_name']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

---------------------------------- delete code ------------------------------------------------------
if ($id = $_GET['course']) {
    $query = mysqli_query($con, "DELETE from course where id='$id'");
    if ($query) {
        echo "<script>alert('Course Deleted Successfully'); window.location.href='manage_course.php'</script>";
    } else {
        echo "<script>alert('Course Deleted Failed'); window.location.href='manage_course.php'</script>";
    }
}



---------------------------------- img code ------------------------------------------------------
//insert
// postimage
$imgfile = uniqid() . '_' . $_FILES['postimage']['name'];
$imgtmp = $_FILES['postimage']['tmp_name'];

$imgnewfile = "postimages/franchise/" . $imgfile; // New image path
move_uploaded_file($imgtmp, $imgnewfile); // Move the new image to the destination

// postimage2
$imgfile2 = uniqid() . '_' . $_FILES['postimage2']['name'];
$imgtmp2 = $_FILES['postimage2']['tmp_name'];

$imgnewfile2 = "postimages/franchise/" . $imgfile2; // New image path
move_uploaded_file($imgtmp2, $imgnewfile2); // Move the new image to the destination

 $query = mysqli_query($con, "INSERT INTO franchise(name,location,postimage,postimage2) values('$name', '$location', '$imgfile','$imgfile2')");
<script>
function readURL(input, imgID) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                
                                reader.onload = function(e) {
                                    document.getElementById(imgID).src = e.target.result;
                                };
                                
                                reader.readAsDataURL(input.files[0]); // Convert the image to a base64 URL
                            }
                        }
</script>



//update
// Image file handling for postimage
$imgfile = $_FILES['postimage']['name'];
$imgtmp = $_FILES['postimage']['tmp_name'];

if (!empty($imgfile)) {
    $imgnewfile = "postimages/franchise/" . $imgfile; // New image path
    move_uploaded_file($imgtmp, $imgnewfile); // Move the new image to the destination

    // Delete the old image if necessary
    $old_image = "path_to_old_image"; // Define the path to the old image file
    if (file_exists($old_image)) {
        unlink($old_image); // Deletes the old image
    }
} else {
    $imgnewfile = "path_to_old_image"; // If no new image uploaded, retain the old image path
}

// Image file handling for postimage2
$imgfile2 = $_FILES['postimage2']['name'];
$imgtmp2 = $_FILES['postimage2']['tmp_name'];

if (!empty($imgfile2)) {
    $imgnewfile2 = "postimages/franchise/" . $imgfile2; // New image path for postimage2
    move_uploaded_file($imgtmp2, $imgnewfile2); // Move the new image to the destination

    // Delete the old image for postimage2 if necessary
    $old_image2 = "path_to_old_image2"; // Define the path to the old image file for postimage2
    if (file_exists($old_image2)) {
        unlink($old_image2); // Deletes the old image
    }
} else {
    $imgnewfile2 = "path_to_old_image2"; // If no new image uploaded, retain the old image path for postimage2
}

// Update query with postimage and postimage2
$sql = mysqli_query($con, "
    UPDATE franchise SET  
        name = '$name', 
        location = '$location', 
        postimage = IF('$imgnewfile' = 'path_to_old_image', postimage, '$imgfile'),
        postimage2 = IF('$imgnewfile2' = 'path_to_old_image2', postimage2, '$imgfile2') 
    WHERE id = '$id'
");







                                        <div class="mb-3 position-relative">
    <!-- Postimage1 -->
    <label for="postimage1">Upload Image 1:</label>
    <input type="file" onchange="readURL1(this);" class="form-control" name="postimage1" id="postimage1" />
    <input type="hidden" name="old_image1" value="<?php echo $old_image1; ?>">
    <br>
    <div style="height: 210px; width: 210px; overflow: hidden;" class="form-control">
        <img id="preview1" src="postimages/franchise/<?php echo $postimage1; ?>" alt="Image 1" style="max-width: 100%; max-height: 100%;">
    </div>
</div>

<div class="mb-3 position-relative">
    <!-- Postimage2 -->
    <label for="postimage2">Upload Image 2:</label>
    <input type="file" onchange="readURL2(this);" class="form-control" name="postimage2" id="postimage2" />
    <input type="hidden" name="old_image2" value="<?php echo $old_image2; ?>">
    <br>
    <div style="height: 210px; width: 210px; overflow: hidden;" class="form-control">
        <img id="preview2" src="postimages/franchise/<?php echo $postimage2; ?>" alt="Image 2" style="max-width: 100%; max-height: 100%;">
    </div>
</div>

function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview1').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview2').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}





for id pass in url
Here’s the explanation rewritten in points:

1. **Fetch Data in `file1.php`:**  
   Retrieve user data from the database.  
   Example: `$sql = "SELECT id, name FROM users";`

2. **Display Data as Links:**  
   Show each user as a clickable link, with their `id` passed in the URL.  
   Example: `<a href='file2.php?id=".$row['id']."'>`

3. **Retrieve `id` in `file2.php`:**  
   Get the `id` from the URL using the `$_GET` superglobal in PHP.  
   Example: `$id = $_GET['id'];`

4. **Query Database with Retrieved `id`:**  
   Use the retrieved `id` to fetch detailed information for the specific user.  
   Example: `$sql = "SELECT * FROM users WHERE id = $id";`



// for slug url pass in a url

Here’s the process for passing data using a **slug URL** in points:

1. **Add a `slug` Field to Your Table:**
   - Ensure the database includes a `slug` column (e.g., in the `users` table).
   - Example table structure:
     ```
     id | name    | slug
     --------------------
     1  | John    | john-doe
     2  | Jane    | jane-doe
     ```

2. **Fetch Data in `file1.php`:**
   - Retrieve user data, including the `slug`, from the database.
   - Example query:  
     ```php
     $sql = "SELECT name, slug FROM users";
     ```

3. **Display Data as Links with Slugs:**
   - Show each user as a clickable link, passing the `slug` in the URL.
   - Example:  
     ```php
     <a href='file2.php?slug=<?php echo $row["slug"]; ?>'>
         <?php echo $row["name"]; ?>
     </a>
     ```

4. **Retrieve `slug` in `file2.php`:**
   - Get the `slug` from the URL using the `$_GET` superglobal.
   - Example:  
     ```php
     $slug = $_GET['slug'];
     ```

5. **Query Database Using the `slug`:**
   - Fetch detailed information for the specific user by matching the `slug`.
   - Example query:  
     ```php
     $sql = "SELECT * FROM users WHERE slug = '$slug'";
     ```

---




       // for checking error

       error_reporting(E_ALL);
ini_set('display_errors', 1);



