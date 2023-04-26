<?php
class Eventual extends Plantilla {
  private $webs_realizadas;

  public function __construct($dni, $nombre, $apellidos, $anho_ingreso, $webs_realizadas) {
      parent::__construct($dni, $nombre, $apellidos, $anho_ingreso);
      $this->webs_realizadas = $webs_realizadas;
  }

  public function getWebsRealizadas() {
      return $this->webs_realizadas;
  }

  public function setWebsRealizadas($webs_realizadas) {
      $this->webs_realizadas = $webs_realizadas;
  }

  public function calcularSalario() {
      $salario_base = 0;
      $multilenguaje = false;

      foreach ($this->webs_realizadas as $web) {
          $salario_base += 800;
          if ($web['multilenguaje']) {
              $multilenguaje = true;
          }
      }

      if ($multilenguaje) {
          return $salario_base + (300 * count($this->webs_realizadas));
      } else {
          return $salario_base;
      }
  }
}
?>