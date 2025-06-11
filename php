---------------------------------Insert code start---------------------------------------------------------------
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $query = mysqli_query($con, "INSERT INTO faq(question,answer) values('$question', '$answer')");
    if ($query) {
        echo "<script>alert('FAQs Added Successfully');</script>";
    } else {
        echo "<script>alert('FAQs Added Failed');</script>";
    }
}

 <form class="row needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate enctype="multipart/form-data">
                                                <div class="mb-3 position-relative">
                                                    <label class="form-label" for="validationCustom01">Question</label>
                                                    <input type="text" class="form-control" required name="question" placeholder="Enter Question" />
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="mb-3 position-relative">
                                                    <label class="form-label">Answer</label>
                                                    <div>
                                                        <textarea rows="5" placeholder="Enter Answer" class="form-control" required name="answer"></textarea>
                                                    </div>
                                                </div>

                                                <div class="mb-0">
                                                    <div>
                                                        <button type="submit" name="submit" class="btn btn-pink waves-effect waves-light">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect ms-1">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

 <a href="edit_faq.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> <b>Edit</b></a>
<a href="delete.php?faq=<?php echo $row['id']; ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">&nbsp<i class="fa fa-trash"></i> Delete</button></i></a>

---------------------------------Insert code End---------------------------------------------------------------


--------------------------------update code start--------------------------------------------------------------

// =================================================================================||
// ============================= FETCH FAQs CODE STARTS HERE =======================||
// =================================================================================||
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM faq where id='" . $id . "'");
$result = mysqli_fetch_assoc($sql);
$question = $result['question'];
$answer = $result['answer'];
// =================================================================================||
// ============================= FETCH FAQs CODE ENDS HERE =========================||
// =================================================================================||

// =================================================================================||
// ============================= EDIT FAQs CODE STARTS HERE ========================||
// =================================================================================||
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $update_id = $_POST['update_id'];

    $sql = mysqli_query($con, "UPDATE faq SET question='$question', answer='$answer' WHERE id='$update_id'");

    if ($sql) {
        echo "<script>alert('FAQs Updated Successfully'); window.location.href='faq.php';</script>";
    } else {
        echo "<script>alert('Failed: " . mysqli_error($con) . "');</script>";
    }
}
// =================================================================================||
// =============================== EDIT FAQs CODE STARTS HERE ======================||
// =================================================================================||


  <form class="row needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="question" value="<?php echo $question; ?>" />
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Answer</label>
                                            <div>
                                                <textarea rows="5" placeholder="Enter Answer" class="form-control" required name="answer"><?php echo $answer; ?></textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" value="<?php echo $id; ?>" name="update_id">

                                        <div class="mb-0">
                                            <div>
                                                <button type="submit" value="update" name="submit" class="btn btn-pink waves-effect waves-light">
                                                    Update
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect ms-1">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

-----------------------------------------Update code end--------------------------------------------------------------------


-----------------------------------------Delete code start--------------------------------------------------------------------
if ($id = $_GET['faq']) {
    $query = mysqli_query($con, "DELETE from faq where id='$id'");
    if ($query) {
        echo "<script>alert('FAQs Deleted Successfully'); window.location.href='faq.php'</script>";
    } else {
        echo "<script>alert('FAQs Deleted Failed'); window.location.href='faq.php'</script>";
    }
}
-----------------------------------------Delete code end--------------------------------------------------------------------




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



// for checking error

error_reporting(E_ALL);
ini_set('display_errors', 1);



