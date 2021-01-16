  <?php  
 $connect = mysqli_connect("localhost", "root", "", "galleria");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>  
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
          <li><a href="login.html">Login</a></li>
        </ul>
      </div>
    </nav>
  </div> 
  <body>  
  <br /><br />  
  <div class="container" style="width:500px;">  
  <h3 align="center">Pagina riservata al Developer</h3>  
  <br />  
  <form method="post" enctype="multipart/form-data"> 
  <label for="nome">Nome</label>
  <input type="text" name="nome_quadro">
  <label for="anno_di_realizzazione">anno di realizzazione</label>
  <input type="text" name="anno_di_realizzazione">
  <label for="dimensioni">dimensioni</label>
  <input type="text" name="dimensioni">
  <label for="tecnica_di_realizzazione">tecnica di realizzazione</label>
  <input type="text" name="tecnica_di_realizzazione">
  <label for="prezzo">prezzo</label>
  <input type="text" name="prezzo">
  <label for="id_autore">id_autore</label>
  <input type="number" name="id_autore">
  <input type="file" name="image" id="image" />  
  <br />  
  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
  </form>  
  <br />  
  <br />  
  <table class="table table-bordered">  
  <tr>  
  <th>Image</th>  
  </tr>
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
  $query = "SELECT * FROM tbl_images ORDER BY id DESC";  
  $result = mysqli_query($connessione, $query);  
  while($row = mysqli_fetch_array($result))  
  {  
  echo '  
  <tr>  	
  <td>  
  <img class="displayed" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
  </td>  
  </tr>  
  ';  
  }  
  ?>  
  </table>  
  </div>  
  </body>  
  </html> 
  <script>  
  $(document).ready(function(){  
  $('#insert').click(function(){  
  var image_name = $('#image').val();  
  if(image_name == '')  
  {  
  alert("Please Select Image");  
  return false;  
  }  
  else  
  {  
  var extension = $('#image').val().split('.').pop().toLowerCase();  
  if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
  {  
  alert('Invalid Image File');  
  $('#image').val('');  
  return false;  
  }  
  }  
  });  
  });  
  </script>  
    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>