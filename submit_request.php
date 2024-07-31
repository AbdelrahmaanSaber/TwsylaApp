<?php
$servername = "localhost";
$username = "root"; // قم بتعديل اسم المستخدم إذا كان مختلفًا
$password = ""; // قم بتعديل كلمة المرور إذا كانت موجودة
$dbname = "customer_requests";

// Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Verification
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// Get Data from order form
$name = $_POST['name'];
$request = $_POST['order'];
$city_code = $_POST['cityCode'];
$city = $_POST['city'];
$phone_code = $_POST['phoneCode'];
$phone_number = $_POST['phone'];

//  SQL Query insert data
$sql = "INSERT INTO requests (name, request,city_code, city, phone_code, phone_number)
VALUES ('$name', '$request', '$city_code' , '$city', '$phone_code', '$phone_number')";

//check
if ($conn->query($sql) === TRUE) {
       header("Location: confirmation.php");
    exit();
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

// إغلاق الاتصال
$conn->close();
?>