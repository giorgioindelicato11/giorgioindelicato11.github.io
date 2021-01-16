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
	<p>Galleria d'arte di Isola di Ischia, raccoglie pellegrini da tutta Italia, per poter ammirare le opere ivi custodite</p>

<?php
// recupero delle variabili
$nome = $_GET['nome'];
$cognome = $_GET['cognome'];
$email= $_GET['email'];
if (strpos($cognome, "'") !== false ){
  $cognome= str_replace("'", "''", $cognome);
}
else{
  echo "ok";
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
//inserimento dei dati nella tabella clienti
if($connessione->query("INSERT INTO clienti (nome_cliente, cognome_cliente, email) VALUES
('$nome', '$cognome', '$email')")
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
<th></th>
<th> <br><br><br><br> </th>

<table border align="bottom" id=tablelast>
<tr><td></td></tr></table>
</body>
<!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</html>