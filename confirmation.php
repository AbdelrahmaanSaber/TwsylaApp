<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الطلب</title>
    <style>
        body {
            font-family: "Tajawal", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            direction: rtl;
            text-align: center;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container h2 {
            color: #333;
        }
        .container p {
            font-size: 18px;
            margin: 20px 0;
        }
        .container button {
            padding: 10px 20px;
            background-color: #2c3e50;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #1a252f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>تم إرسال طلبك بنجاح</h2>
        <p>سوف يصلك الأوردر في خلال نصف ساعة</p>
        <p>رسوم الخدمة 10 جنيهات</p>
        <button onclick="window.location.href='order.html'">العودة إلى صفحة الطلب</button>
    </div>
</body>
</html>