<?php
include 'configuration.php';
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
$email = $data['email'];

if ($email == "") {
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Please fill mendetory feild.', 'data' => []]);
    return;
}

$email = mysqli_real_escape_string($con, $email);
$sevenDaysAgo = date("Y-m-d", strtotime("-7 days"));
$sqlCheck = "SELECT id FROM subscriberss WHERE email = '$email'";
$result = mysqli_query($con, $sqlCheck);

if (mysqli_num_rows($result) > 0) {
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => "You already subscribed", 'data' => []]);
    return;
}


$sql = "INSERT INTO subscriberss (`email`, `date`) VALUES (?, ?)";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    $email = $data['email'];
    $today = date("Y-m-d");
    mysqli_stmt_bind_param($stmt, "ss", $email, $today);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(['status' => true, 'message' => 'Thank you for subscribed.', 'data' => []]);
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
