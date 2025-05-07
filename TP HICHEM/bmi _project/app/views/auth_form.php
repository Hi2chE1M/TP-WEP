<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول / إنشاء حساب</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>تسجيل الدخول</h2>
    <form method="POST">
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">دخول</button>
    </form>

    <hr>

    <h2>إنشاء حساب</h2>
    <form method="POST">
        <input type="hidden" name="action" value="register">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">تسجيل</button>
    </form>
</body>
</html>