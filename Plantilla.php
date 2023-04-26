<?php
abstract class Plantilla {
  protected $dni;
  protected $nombre;
  protected $apellidos;
  protected $anho_ingreso;

  public function __construct($dni, $nombre, $apellidos, $anho_ingreso) {
      $this->setDni($dni);
      $this->nombre = $nombre;
      $this->apellidos = $apellidos;
      $this->setAnhoIngreso($anho_ingreso);
  }

  public function getDni() {
      return $this->dni;
  }

  public function setDni($dni) {
      if (!$this->validarDni($dni)) {
          throw new Exception('El DNI es inválido');
      }
      $this->dni = $dni;
  }

  public function getNombre() {
      return $this->nombre;
  }

  public function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  public function getApellidos() {
      return $this->apellidos;
  }

  public function setApellidos($apellidos) {
      $this->apellidos = $apellidos;
  }

  public function getAnhoIngreso() {
      return $this->anho_ingreso;
  }

  public function setAnhoIngreso($anho_ingreso) {
      if (!is_numeric($anho_ingreso)) {
          throw new Exception('El año de ingreso debe ser numérico');
      }
      $this->anho_ingreso = $anho_ingreso;
  }

  protected function validarDni($dni) {
    // Comprobar longitud
    if (strlen($dni) != 9) {
      return false;
  }

  // Extraer números y letra
  $letra = substr($dni, -1);
  $numeros = substr($dni, 0, -1);

  // Comprobar que los números sean válidos
  if (!is_numeric($numeros)) {
      return false;
  }

  // Comprobar letra
  $letras_validas = 'TRWAGMYFPDXBNJZSQVHLCKE';
  $indice_letra = $numeros % 23;
  $letra_calculada = $letras_validas[$indice_letra];
  if (strtoupper($letra) != $letra_calculada) {
      return false;
  }

  return true;
  }

  // Método abstracto que se implementará en las subclases
  abstract public function calcularSalario();
}
?>