<html>
    <head></head>
    <title></title>
    <body>
    <a href="internship.php?internship=2" class="btn btn-success btn-black waves-effect z-depth-0" name="apply">BACK</a>

</html>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$tenthmarks = $_POST['tenthmarks'];
$twelfthmarks = $_POST['twelfthmarks'];
$currentStudying = $_POST['currentStudying'];
$currentMarks = $_POST['currentMarks'];
$why = $_POST['why'];

//Database connection
$conn = new mysqli('localhost', 'root', '', 'internship');
if ($conn->connect_errno) {
    die('Connection Failed: ' . $conn->connect_errno);
} else {
    $stmt = $conn->prepare("insert into application_form(name, email, tenthmarks, twelfthmarks, currentStudying, currentMarks, why) values(?,?,?,?,?,?,?)");
    $stmt->bind_param('ssiisis', $name, $email, $tenthmarks, $twelfthmarks, $currentStudying, $currentMarks, $why);
    $stmt->execute();
    echo "Application successful";
    $stmt->close();
    $conn->close();
}


