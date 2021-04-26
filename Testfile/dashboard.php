<?php
include("auth_session.php");
include("db.php");


if(isset($_POST['send'])) {
    $name = $_POST['course'];
    $sql = "INSERT INTO courses (course) VALUES ('$name')";
    $val = $con->query($sql);

    if($val) {
        header('location: dashboard.php');
    }
}


$sql = "SELECT * FROM courses";
$rows = $con->query($sql);
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

    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>Welcome to your dashboard.</p>
        <p><a href="logout.php">Logout</a></p>
        <p><a href="pwreset.php">Reset Password</a></p>
    </div>

    <div class="container">
        <center><h1>Courses</h1></center>
            <div class="row" style="margin-top: 30px;">
            <div class="col-md-10 col-md-offset-1">
        <table class="table">
            <button type="button" data-target="#myModal" data-toggle="modal"
            class="btn btn-success "><a href="add.php?id=<?php echo $name['id'];?>">Add course</a></button>

                <hr><br>

            <div id="myModal" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">
                 &times;</button>
                             <h4 class="modal-title">Add Course</h4>
                         </div>

                 <div class="modal-body">
                    <form method="POST" action="add.php">
                        <div class="form-group">
                            <label>Course Name</label>
                                <input type="text" required name="course" class="form-control">
                        </div>
                                <input type="submit" name="send" value="Add Course <?php echo $name['course'];?>" class="btn btn-success">
                     </form>
                             </div>

                             <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                     </div>
                 </div>

                 <table class="table">
                     <thead>
                         <tr>
                            <th>ID.</th>
                            <th>Course</th>
                        </tr>
                     </thead>
                             <tbody>
                                <tr>
                                <?php while($row = $rows->fetch_assoc()): ?>
                                 <th><?php echo $row['id'] ?></th>
                                     <td class="col-md-10"><?php echo $row['course'] ?></td>
                                         <td><a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                                         <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                                 </tr>
                                 <?php endwhile; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

    <script src="https:http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
