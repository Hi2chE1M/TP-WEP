<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حاسبة BMI</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>حساب مؤشر كتلة الجسم</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="الاسم" required>
        <input type="number" name="weight" placeholder="الوزن (كغ)" step="0.01" required>
        <input type="number" name="height" placeholder="الطول (متر)" step="0.01" required>
        <button type="submit">احسب</button>
    </form>
    <?php if (isset($result)): ?>
        <p>مؤشر الكتلة: <strong><?= $result['bmi'] ?></strong></p>
        <p>التفسير: <strong><?= $result['interpretation'] ?></strong></p>
    <?php endif; ?>

    <h3>سجل الحسابات السابقة:</h3>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الوزن</th>
                <th>الطول</th>
                <th>BMI</th>
                <th>التفسير</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $entry): ?>
            <tr>
                <td><?= $entry['name'] ?></td>
                <td><?= $entry['weight'] ?></td>
                <td><?= $entry['height'] ?></td>
                <td><?= $entry['bmi'] ?></td>
                <td><?= $entry['interpretation'] ?></td>
                <td><?= $entry['date'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>