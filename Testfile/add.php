<?php 
include('db.php');
 include("auth_session.php");

if(isset($_POST['send'])) {
    $name = $_POST['course'];
    $sql = "INSERT INTO courses (course) VALUES ('$name')";
    $val = $con->query($sql);

    if($val) {
        header('location: dashboard.php');
    }
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

        <center><h1>Add Course</h1></center>
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-10 col-md-offset-1">

                    <form method="POST" action="dashboard.php">
                        <div class="form-group">
                            <label>Course Name</label>
                                 <input type="text" required name="course"   class="form-control">
                        </div>
                                <input type="submit" name="send" value="Add Course" class="btn btn-success">
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
