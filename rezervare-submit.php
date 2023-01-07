<?php
session_start();
require_once 'settings.php';

// set this as default
$hOptFilmLang = '';
$hOptFilmOra = '';
$arrFilmLimba = [];
$arrFilmOra = [];
$id_film = 0;
$is_request = false;
$arrFilmLimba = $_SESSION["arrFilmLimba"];
$arrFilmOra = $_SESSION["arrFilmOra"];
$arrFilme = $_SESSION["arrFilme"];
$select_film = $_SESSION["id_film"];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "movienight";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['film_lang'])) {
    $select_limba = $_REQUEST['film_lang'];
    // echo "post data: $id_film";
    $id_film=$_REQUEST['id_film'];
}

$mysqli = dbConnect();
$sql = "SELECT * FROM atfilm WHERE id_film = $select_film";
$result = $mysqli->query($sql);
$selected_film=[];
$cnt=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $selected_film[$cnt]['nume_film'] = $row['nume_film'];
      $cnt++;
  }
}
$nume_film = $selected_film[0]['nume_film'];

$increment = 0;
foreach ($arrFilmLimba as $k => $v) {
    if ($increment == $select_limba) {
        $id_limba = $v['limba'];
        
    }
    $increment++;
}

$select_ora = isset($_POST['ora_film']) ? $_POST['ora_film'] : '';

$increment = 0;
foreach ($arrFilmOra as $k => $v) {
    if ($increment == $select_ora) {
        $id_ora = $v['ora'];
        
    }
    $increment++;
}

if(isset($_POST['datafilm'])){
  $data = date('Y-m-d', strtotime($_POST['datafilm']));
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nume=isset($_POST['nume']) ? $_POST['nume'] : '';
$telefon=isset($_POST['telefon']) ? $_POST['telefon'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : '';
$nr_locuri = isset($_POST['nr_locuri']) ? $_POST['nr_locuri'] : '';

if (!empty($nume_film) && !empty($id_limba) && !empty($id_ora) && !empty($data) && !empty($nume) && !empty($telefon) && !empty($email) && !empty($nr_locuri))
$sql="INSERT INTO atrezervare (id,id_film,id_limba,id_ora,data,nume,telefon,email,nr_locuri) values('$id','$nume_film','$id_limba','$id_ora','$data','$nume','$telefon','$email','$nr_locuri')";
$result = $conn->query($sql);
if ($result == TRUE)
{     echo $conn->error;  }

$conn->close();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html>
    <link rel="icon" href="poze/pozafilm.jpg" type="image/jpg">
    <head>
        <title>MovieNight | Book now</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script src="../js/cufon-yui.js" type="text/javascript"></script>
        <script src="../js/cufon-replace.js" type="text/javascript"></script>
        <script src="../js/Gill_Sans_400.font.js" type="text/javascript"></script>
    </head>
    <body id="page6">
        <div class="tail-top">
          <div class="tail-bottom">
            <div id="main">
              <div id="header">
                <div class="row-1">
                  <div class="fleft"><a href="acasa.html">Movie<span>Night</span></a></div>
                  <ul>
                    <li><a href="acasa.html"><img src="poze/icon1.gif" alt="" /></a></li>
                    <li><a href="contact.php"><img src="poze/icon2.gif" alt="" /></a></li>
                  </ul>
                </div>
                <div class="row-2">
                 <ul>
                     <li><a href="acasa.html">Home</a></li>
                     <li><a href="program.html">Schedule</a></li>
                     <li><a href="filme.html">Movies</a></li>
                     <li><a href="rezervare.php" class="active">Book now</a></li>
                     <li class="last"><a href="contact.php">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div id="content">
               <div id="slogan">
                  <div class="image png"><img src="poze/banner-img.png" /></div>
                  <div class="inside">
                    <h2 style="margin-top: 100px"><span>See you soon!</span></h2>
                  </div>
                </div>

        <div class="box" style="margin-bottom: -40px">
          <div class="border-right">
            <div class="border-left">
              <div class="inner">
              <p></p>
              <p>The reservation was saved successfully!</p>
             </div>
            </div>
          </div>
        </div>

        <div class="content"><br /><br /></div>

         <div id="footer">
                <div class="left">
                  <div class="right">
                    <div class="footerlink">
                      <p class="lf">Chirteș Cătălina-Adela</p>
                      <p class="rf">2022</p>
                      <div style="clear:both;"></div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        <script type="text/javascript"> Cufon.now(); </script>
    </body>
</html>


<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "movienight";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>

