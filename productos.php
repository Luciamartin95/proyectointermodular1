<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BitMarket Productos</title>
    <link rel="stylesheet" href="productos.css">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/67384fbf93/UntitledProject/style.css">
</head>
<body>
   <!-- DATABASE CONFIG -->
   <?php
   // Mostrar todos los errores (útil para debugging)
   ini_set('display_errors', 1);
   error_reporting(E_ALL);

   // Conectar a la base de datos
   // Cambiar el servername por el que proceda: localhost, mysql (docker), dirección IP, cadena de Azure Mysql
   $servername = "localhost:3306";
   $username = "root";
   $password = "postgres";
   $dbname = "luciamartinparejo";

   $conn = new mysqli($servername, $username, $password, $dbname);

   // Verificar la conexión
   if ($conn->connect_error) {
       die("Conexión fallida: " . $conn->connect_error);
   }

?>
  <header>
      <div class="logo">
          <img src="C:/Users/lucia/OneDrive/Desktop/ASIR/Proyecto intermodular 1/Lenguaje de marcas/images/logo.jpg" alt="Logo de BitMarket">
      </div>
      <nav>
        <ul>
          <li class="dropdown">
            <a href="categorias.html" class="menuprincipal">&#9776 CATEGORÍAS</a>
            <ul class="dropdown-contenido">
              <li class="ordenadores"><a href="productos.html">Ordenadores</a></li>
              <li class="componentes"><a href="productos.html">Componentes</a></li>
              <li class="perifericos"><a href="productos.html">Periféricos</a></li>
              <li class="software"><a href="productos.html">Software</a></li>
            </ul>
          <li><a href="contacto.html" class="menuprincipal">CONTACTO</a></li>
        </ul>
      </nav>
      <div class="busqueda">
        <input type="text" placeholder="Buscar productos, marcas y más..." id="textobusqueda">
      </div>
      <div class="botonesusuarios">
        <button class="botonusuario">
        <span class="icon-user"></span><a href="login.html">Iniciar sesión</a></button>
        <button class="botonusuario">
        <span class="icon-cart"></span> Mi cesta</button>
      </div>
    </header>
    <main>
        <div class="container">
            <h3>Productos</h3>
            <hr>
            <div
                class="table-responsive"
            >
                <table
                    class="table table-secondary"
                >
                    <thead>
                        <tr>
                            <th class="subtitle">Descripción</th>
                            <th class="subtitle">Stock</th>
                            <th class="subtitle">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                          // Consultar los datos
                          $sql = "SELECT * FROM articulo";
                          $result = $conn->query($sql);
                          if ($result === false) {
                              die("Error en la consulta: " . $conn->error);
                          }
                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  echo "  <tr>
                                              <td>{$row['descripcion']}</td>
                                              <td>{$row['stock']}</td>
                                              <td>{$row['precio_venta']}</td>
                                          </tr>";
                              }
                          }            
                      ?>
                  </tbody>
              </table>
          </div>
    </main>
    <footer>
        <div class="copyright">
            <p>&copy; 2025 BitMarket Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>