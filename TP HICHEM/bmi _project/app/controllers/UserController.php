<?php
class UserController {
    private $model;

    public function __construct($userModel) {
        $this->model = $userModel;
    }

    public function handleRegister($username, $password) {
        if ($this->model->register($username, $password)) {
            echo "تم إنشاء الحساب بنجاح.";
        } else {
            echo "حدث خطأ أثناء إنشاء الحساب.";
        }
    }

    public function handleLogin($username, $password) {
        $user = $this->model->login($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: bmi.php");
        } else {
            echo "اسم المستخدم أو كلمة المرور خاطئة.";
        }
    }
}
?>