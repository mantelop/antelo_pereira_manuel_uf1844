<?php
require_once '../Plantilla.php';
require_once '../Fijo.php';
require_once '../Eventual.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $anho_ingreso = $_POST['anho_ingreso'];
  $tipo = $_POST['tipo'];

  if ($tipo == 'fijo') {
    $empleado = new Fijo($dni, $nombre, $apellidos, $anho_ingreso);
  } else if ($tipo == 'eventual') {
    $webs = explode("\n", $_POST['webs']);
    $webs_info = array();
    foreach ($webs as $web) {
      $web = trim($web);
      if (!empty($web)) {
        $multilenguaje = (bool) preg_match('/\bmul($|\s|ti)/i', $web);
        $webs_info[] = array('web' => $web, 'multilenguaje' => $multilenguaje);
      }
    }
    $empleado = new Eventual($dni, $nombre, $apellidos, $anho_ingreso, $webs_info);
  }

  $salario = $empleado->calcularSalario();

  $fecha_actual = date('Y'); // Obtenemos la fecha actual en el mismo formato que $anhio_ingreso
  $antiguedad = ((int) $fecha_actual) - ((int) $anho_ingreso); // Restamos 


  // Verificar el tipo de empleado seleccionado
  if ($tipo === "fijo") {
    $salario_base = 1200;

    // Construir el mensaje para el empleado fijo
    $mensaje = "<p>Empleado: Fijo</p>";
    $mensaje .= "<p>Nombre y Apellidos: " . $nombre . ' ' . $apellidos . "</p>";
    $mensaje .= "<p>DNI: " . $dni . "</p>";
    $mensaje .= "<p>Año de Ingreso: " . $anho_ingreso . "</p>";
    $mensaje .= "<p>Salario Base: " . $salario_base . "€</p>";
    $mensaje .= "<p>Antigüedad: " . $antiguedad . " años</p>";
    $mensaje .= "<p>Sueldo: " . $salario . "€</p>";

  } else if ($tipo === "eventual") {
    // Construir el mensaje para el empleado eventual
    $mensaje = "<p>Empleado: Eventual</p>";
    $mensaje .= "<p>Nombre y Apellidos: " . $nombre . ' ' . $apellidos . "</p>";
    $mensaje .= "<p>DNI: " . $dni . "</p>";
    $mensaje .= "<p>Año de Ingreso: " . $anho_ingreso . "</p>";
    $mensaje .= "<p>Sueldo: " . $salario . "€</p>";
  }

  // Mostrar el resultado en un div con id "resultado"
  echo "<div id='resultado'>" . $mensaje . "</div>";
}
?>