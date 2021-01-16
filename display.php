  <html lang="it">
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
          <li><a href="login.html">Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
<body>
<p>Galleria d'arte dell'Isola d'Ischia, raccoglie pellegrini da tutta Italia, per poter ammirare le opere ivi custodite</p>
</body>
</html>
<?php
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
//query
   $sql = "SELECT name,nome_quadro,anno_di_realizzazione, dimensioni, tecnica_di_realizzazione,prezzo,id_autore FROM tbl_images DISC";
$result = $connessione->query($sql);
echo "<table>";
if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
       echo    '<tr><td><img src="data:image/jpeg;base64,'.base64_encode($row['name']).'" height="auto" width="auto" class="img-thumnail"/></tr></td>'
       ."<tr><td>".$row["nome_quadro"]."</td></tr>"
    ."<tr><td>".$row["anno_di_realizzazione"]."</td></tr>"
    ."<tr><td>".$row["dimensioni"]." cm"."</td></tr>"
    ."<tr><td>".$row["tecnica_di_realizzazione"]."</td></tr>"
    ."<tr><td>".$row["prezzo"]." €"."</td></tr>"
    ."<tr><td>".$row["id_autore"]."</td></tr>";
    }
  echo "</table>";
}

?>