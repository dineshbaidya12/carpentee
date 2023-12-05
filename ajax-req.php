<?php
include 'configuration.php';
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$message = $data['message'];

if ($name == "" || $email == "" || $phone == ""  || $message == "") {
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Please fill mendetory feild.', 'data' => []]);
    return;
}
$email = mysqli_real_escape_string($con, $email);
$sevenDaysAgo = date("Y-m-d", strtotime("-7 days"));
$sqlCheck = "SELECT COUNT(*) AS count FROM contact WHERE email='$email' AND `date` >= '$sevenDaysAgo'";
$result = mysqli_query($con, $sqlCheck);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    if ($count > 7) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => "You have already send 8 mails in last 7 days please send after some days", 'data' => []]);
        return;
    }
}


$sql = "INSERT INTO contact (`name`, email, phone, `message`, `date`) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $message = $data['message'];
    $today = date("Y-m-d");
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $message, $today);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(['status' => true, 'message' => 'Thank you for your message we will contact you soon.', 'data' => []]);
        return;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Something went wrong', 'data' => []]);
        return;
    }
    mysqli_stmt_close($stmt);
} else {
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Something went wrong', 'data' => []]);
    return;
}

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode(['status' => false, 'message' => 'Something went wrong', 'data' => []]);
return;
