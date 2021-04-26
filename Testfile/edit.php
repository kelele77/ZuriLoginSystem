<?php
include("db.php");


$id = $_GET['id'];
$sql = "SELECT * FROM courses WHERE id = '$id'";
$rows = $con->query($sql);
$row = $rows->fetch_assoc();
if (isset($_POST['send'])) {
    $course = $_POST['course'];
    $sql2 = "UPDATE courses SET NAME = '$course' WHERE id = '$id'";
    $con-> query($sql2);
    header('location: dashboard.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css" />
</head>
<body>
        <center><h1>Edit Course</h1></center>
            <div class="row" style="margin-top: 30px;">
              <div class="col-md-10 col-md-offset-1">

                    <form method="POST" action="dashboard.php">
                        <div class="form-group">
                            <label>Course Name</label>
                                <input type="text" required name="course" value="<?php echo $row['course']; ?>" class="form-control">
                        </div>
                                <input type="submit" name="send" value="Edit Course" class="btn btn-success">
                     </form>
                     </div>
                 </div>
            </div>
      </div>


    <script src="https:http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
