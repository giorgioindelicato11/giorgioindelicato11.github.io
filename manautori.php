<html>   
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Galleria d'arte del Pellegrino</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--Google fonts link-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<!--NAVBAR ADAPTIVE-->
     <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
        <a href="home.html" class="brand-logo">Galleria del Pellegrino</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="home.html">Home</a></li>
          <li><a href="home.html#registrazione">Login</a></li>
        </ul>
      </div>
    </nav>
  </div> 
  <body>  
  <br /><br />  
  <?php  
$id_autore = $_GET['id_autore']; 
$nome_autore = $_GET['nome_autore'];
$nome_darte = $_GET['nome_darte'];
$nascita_morte= $_GET['nascita_morte'];
if (strpos($nome_autore, "'") !== false ){
  $nome_autore= str_replace("'", "''", $nome_autore);
}
else{
}
if (strpos($nome_darte, "'") !== false ){
  $nome_darte= str_replace("'", "''", $nome_darte);
}
else{
}
// creazione di un oggetto della classe mysqli (connessione al server MSDB)
$connessione = new mysqli('localhost', 'root');
// verifica su eventuali errori di connessione
if ($connessione->connect_errno)
{
echo "Connessione fallita: ";
echo $connessione->connect_error;
exit();
}
else
{
//echo "<BR>"."Connessione avvenuta correttamente ";
}
//connessione al database
if ($connessione->query("USE galleria"))
{
//echo "<BR>"."Uso database galleria ";
}
else
{
echo $connessione->error;
exit();
}
//inserimento dei dati nella tabella autori
if($connessione->query("INSERT INTO `autori`(`id_autore`, `nome_autore`, `nome_darte`, `nascita_morte`) VALUES
('$id_autore','$nome_autore', '$nome_darte', '$nascita_morte')")
)
{
echo "<BR>"."<p style='color:black;'>"."complimenti, la sua registrazione è stata effettuata con successo " ."</p>";
}
else
{
echo $connessione->error;
exit();
}
// chiusura della connessione
$connessione->close();
?>
<?php
// creazione di un oggetto della classe mysqli (connessione al server MSDB)
$connessione = new mysqli('localhost', 'root');
// verifica su eventuali errori di connessione
if ($connessione->connect_errno)
{
echo "Connessione fallita: ";
echo $connessione->connect_error;
exit();
}
else
{
//echo "<BR>"."Connessione avvenuta correttamente ";
}
//connessione al database
if ($connessione->query("USE galleria"))
{
//echo "<BR>"."Uso database galleria ";
}
else
{
echo $connessione->error;
exit();
}
  $sql = "SELECT * FROM autori";
$result = $connessione->query($sql);
echo "<table>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  "<tr>
    <td>".$row["id_autore"]."</td>
    <td>".$row["nome_autore"]. "</td>
    <td>". $row["nome_darte"]. "</td>
    <td>".$row["nascita_morte"]."</td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>
<br />  
  <br />  
  <table class="table table-bordered">  
  <tr>  
  </tr>
  
  </table>  
  </div>  
  </body>  
  </html> 
    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>