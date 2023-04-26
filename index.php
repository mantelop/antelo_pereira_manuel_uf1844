<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
  <title>Examen UF1844 - Manuel Antelo</title>
  
</head>

<body>
  <h1>Formulario de datos</h1>
  <form action="/assets/procesar.php" method="POST" class="flex-center">
    <label for="dni">DNI:</label>
    <input type="text" name="dni" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" required><br>

    <label for="anho_ingreso">Año de ingreso:</label>
    <input type="number" name="anho_ingreso" required><br>

    <label for="tipo">Tipo de empleado:</label>
    <select name="tipo" id="tipo-select">
      <option value="fijo">Empleado fijo</option>
      <option value="eventual">Empleado eventual</option>
    </select><br>

    <div id="webs-container">
      <!-- Solo se muestra si se ha seleccionado "Empleado eventual" -->
      <label for="webs">Webs realizadas (una por línea):</label>
      <textarea id="webs" name="webs"></textarea><br>
    </div>

    <input type="submit" value="Calcular salario">


  </form>

 <script>
    let tipoSelect = document.querySelector('#tipo-select');
    let websContainer = document.querySelector('#webs-container');
    let tipoEmpleado = document.querySelector('#tipo-empleado');

    websContainer.style.display = 'none';

    tipoSelect.addEventListener('change', function() {
      if (tipoSelect.value == 'eventual') {
        websContainer.style.display = 'block';
      } else {
        websContainer.style.display = 'none';
      }
    });

    resultadosDiv.addEventListener('submit', function(event) {
      event.preventDefault();
      resultadosDiv.style.display = 'block';

      tipoEmpleado.textContent = tipoSelect.value;
    });
  </script>
</body>

</html>