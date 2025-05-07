<?php
class BmiController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function calculateBmi($name, $weight, $height) {
        $bmi = $weight / ($height * $height);
        $bmi = round($bmi, 2);
        $interpretation = $this->interpretBmi($bmi);
        $this->model->saveBmi($name, $weight, $height, $bmi, $interpretation);
        return ['bmi' => $bmi, 'interpretation' => $interpretation];
    }

    private function interpretBmi($bmi) {
        if ($bmi < 18.5) return "نقص في الوزن";
        elseif ($bmi < 25) return "وزن طبيعي";
        elseif ($bmi < 30) return "زيادة في الوزن";
        else return "سمنة";
    }

    public function history() {
        return $this->model->getHistory();
    }
}
?>