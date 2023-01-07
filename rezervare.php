<?php
session_start();
require_once 'settings.php';

// print_r($arrFilme);

$arrFilme = getFilme(); // array with all the movies in the db
$_SESSION["arrFilme"] = $arrFilme;
// set this as default
$hOptFilmLang = '';
$hOptFilmOra = '';
$arrFilmLimba = [];
$arrFilmOra = [];
$id_film = 0;
$is_request = false;


if (isset($_REQUEST['id_film'])) {
    $id_film = $_REQUEST['id_film'];
    // echo "post data: $id_film";
    $_SESSION["id_film"] = $id_film;
    
    $arrFilmLimba = getFilmLangById($id=$id_film);
    foreach ($arrFilmLimba as $k => $v) {
        $hOptFilmLang .= '<option value="'.$k.'"   >'.$v['limba'].'</option>';
    }

    $arrFilmOra = getFilmOraById($id=$id_film);
    foreach ($arrFilmOra as $k => $v) {
        $hOptFilmOra .= '<option value="'.$k.'"   >'.$v['ora'].'</option>';
    }
    
    $_SESSION["arrFilmLimba"] = $arrFilmLimba;
    $_SESSION["arrFilmOra"] = $arrFilmOra;
    $is_request = true;
}

$weHaveLang = ( count($arrFilmLimba) > 0 ) ? true : false;

// build dropdown filme
// $hOptFilme = '<option value="0">Selectați un film</option>';
$hOptFilme='';
foreach ($arrFilme as $k => $v) {
    $selected = ( $id_film == $v['id_film'] ) ? 'selected' : '';
    $hOptFilme .= '<option value="'.$v['id_film'].'"  '.$selected.'  >'.$v['nume_film'].'</option>';
}
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
                    <h2 style="margin-bottom: 20px; margin-top: 20px"><span>Book a movie</span></h2>
                     <p>Only with us you can enjoy a good movie with your loved ones. Come to out cinema and you will have an amazing time!</p>
                     <p>Pick a movie and call your friends, it's the perfect way to have a fun together!</p>
                  </div>
                </div>

        <div class="box">
          <div class="border-right">
            <div class="border-left">
              <div class="inner">
              <p></p>
              <form   action="rezervare.php" method="get"  >
              <table border="0" align="center">
                <tr>
                <th scope="col" align="left">
                  <div class="form-group">
                    <label for="id_film">Movie:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </th>
                <th scope="col" align="right">
                  <select class="form-control" id="id_film" name="id_film" style="margin-left: 61px">
                    <?php echo $hOptFilme; ?>
                  </select>
                </th>
                  </div>
                <th scope="col" align="left">
                  <button type="submit" class="btn btn-primary" style="width: 60px">Select</button>
                </th>
                </tr>
              </table>
              </form>

              <form method="post" action="rezervare-submit.php">

              <table border="0"  align="center">
                <tr>
                <?php  if ($weHaveLang) { ?>
                <th scope="col" align="left">
                  <div class="form-group">
                    <label for="film_lang">Language:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </th>
                <th scope="col" align="right">
                  <select class="form-control" id="film_lang" name="film_lang" style="width: 307px; margin-left: 34px">
                      <?php echo $hOptFilmLang; ?>
                  </select>
                <?php  } elseif ($is_request) { ?>s
                    There is no information regarding the language for this movie.
                <?php  } ?>
                <br/>
                </th>
                  </div>
                </tr>
                </table>

                <table border="0"  align="center">

                <input type="hidden" id="id_film" name="id_film" value="<?php echo $id_film; ?>">
                <tr>
                <?php  if ($weHaveLang) { ?>
                <th scope="col" align="left">
                  <div class="form-group">
                    <label for="ora_film">Time:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </th>
                <th scope="col" align="right">
                    <select class="form-control" id="ora_film" name="ora_film" style="width: 307px; margin-left: 52px">
                      <?php echo $hOptFilmOra; ?>
                    </select>
                <?php  } elseif ($is_request) { ?>
                    There is no information regarding the time for this movie.
                <?php  } ?>
                <br/>
                </th>
                  </div>
                </tr>
                </table>
                <table border="0"  align="center">
                  <tr>
                      <th scope="col" align="left">
                        <div class="form-group">
                          <label for="">Date:</label>
                      </th>
                      <th scope="col" align="left">
                        <input type="date" name="datafilm" class="form-control" style="margin-left: 16px; width: 307px"/>
                      <br/>
                      </th>
                  </tr>

                  <tr>
                      <th scope="col" align="left"> </th>
                      <th scope="col" align="left">  </th>
                  </tr>


                  <tr>
                        <th scope="col" align="left">First & Last Name:</th>
                        <th scope="col" align="left"> <input type="text" name="nume" style="margin-left: 16px; width: 307px" required>  </th>
                  </tr>
                  <tr>
                      <th scope="col" align="left" >Phone number:</th>
                      <th scope="col" align="left"><input type="text" name="telefon" style="margin-left: 16px; width: 307px" required> <br/></th>
                  </tr>
                  <tr>
                      <th scope="col" align="left">E-mail address:</th>
                      <th scope="col" align="left"><input type="text" name="email" style="margin-left: 16px; width: 307px" required> <br/></th>
                  </tr>
                  <tr>
                      <th scope="col" align="left">Number of seats:</th>
                      <th scope="col" align="left"><input type="text" name="nr_locuri" style="margin-left: 16px; width: 307px" required> <br/></th>
                  </tr>


                  </table>
        <p>
                <div class="wrapper" style="margin-left: 0px">
                <input class="button" type="submit" name="insert" value="Submit" style="margin-right: 8px; width: 150px; margin-left: 143px"/>
                <input class="button" type="reset" value="Reset" style="width: 150px"/></div>
        </form>
             </div>
            </div>
          </div>
        </div>

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

