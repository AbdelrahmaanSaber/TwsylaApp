<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer_requests";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// معالجة طلب الحذف
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delete_stmt = $conn->prepare("DELETE FROM requests WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();
    $delete_stmt->close();
    header("Location: requests.php");
    exit();
}

// الحصول على جميع الطلبات
$sql = "SELECT id, name, request,city_code, city, phone_code, phone_number FROM requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الطلبات</title>
    <link rel="stylesheet" href="styles.css"> <!-- تأكد من وجود ملف CSS -->
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.html">الصفحة الرئيسية</a></li>
            <li><a href="order.html">اطلب الآن</a></li>
            <li><a href="requests.php">عرض الطلبات</a></li>
        </ul>
    </nav>

    <h1>عرض الطلبات</h1>
    
    <table>
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الطلب</th>
				<th> رمز المدينة </th>
                <th>المدينة</th>
                <th>رمز الهاتف</th>
                <th>رقم الهاتف</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['request']) . "</td>
							 <td>" . htmlspecialchars($row['city_code']) . "</td>
                            <td>" . htmlspecialchars($row['city']) . "</td>
                            <td>" . htmlspecialchars($row['phone_code']) . "</td>
                            <td>" . htmlspecialchars($row['phone_number']) . "</td>
                            <td>
                                <a href='edit.php?id=" . $row['id'] . "'>تعديل</a> |
                                <a href='requests.php?delete=" . $row['id'] . "' onclick='return confirm(\"هل أنت متأكد من الحذف؟\");'>حذف</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>لا توجد طلبات لعرضها</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// إغلاق الاتصال
$conn->close();
?>