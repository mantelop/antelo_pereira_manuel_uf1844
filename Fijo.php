<?php
class Fijo extends Plantilla {
  public function calcularSalario() {
      $salario_base = 1200;
      $anho_actual = date('Y');
      $anios_antiguedad = $anho_actual - $this->anho_ingreso;

      if ($anios_antiguedad < 2) {
          return $salario_base;
      } else if ($anios_antiguedad >= 2 && $anios_antiguedad <= 7) {
          return $salario_base * 1.15;
      } else {
          return $salario_base * 1.25;
      }
  }
}
?>