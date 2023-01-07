<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html>
    <link rel="icon" href="poze/pozafilm.jpg" type="image/jpg">
    <head>
        <title>MovieNight | Contact Us</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script src="../js/cufon-yui.js" type="text/javascript"></script>
        <script src="../js/cufon-replace.js" type="text/javascript"></script>
        <script src="../js/Gill_Sans_400.font.js" type="text/javascript"></script>
    </head>
    <body id="page5">
        <div class="tail-top">
          <div class="tail-bottom">
            <div id="main">
              <div id="header">
                <div class="row-1">
                  <div class="fleft"><a href="acasa.html">Movie<span>Night</span></a></div>
                  <ul>
                    <li><a href="acasa.html"><img src="poze/icon1.gif" alt="" /></a></li>
                    <li><a href="contact.php"><img src="poze/icon2-act.gif" alt="" /></a></li>
                  </ul>
                </div>
                <div class="row-2" style="width: 940px">
                  <ul>
                    <li><a href="acasa.html">Home</a></li>
                    <li><a href="program.html">Schedule</a></li>
                    <li><a href="filme.html">Movies</a></li>
                    <li><a href="rezervare.php">Book now</a></li>
                    <li class="last"><a href="contact.php" class="active">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div id="content">
                <div id="slogan" style="left: 0px; top: 0px">
                  <div class="image png">
                      <img src="poze/banner-img.png" height="348" width="572" /></div>
                  <div class="inside">
                    <h2 style="margin-bottom: 20px; margin-top: 20px"><span>Contact Us</span></h2>
                      <p>On this page you can see information about when and where you can find us.</p>
                      <p>Can't wait to meet you at the cinema!</p>
                      <h3 style="color: #d72a18"> Let's watch a movie!</h3>
                  </div>
                </div>
                <div class="box">
                  <div class="border-right">
                    <div class="border-left">
                      <div class="inner">
                         <div class="address">
                          <div class="fleft">
                            <span>Country:</span>Romania<br />
                            <span>City:</span>Timișoara, Timiș<br />
                            <span>Phone number:</span>0726 140 403<br />
                            <span>Address:</span>Iulius Town Timișoara<br />
                                                Street Piața Consiliul Europei, Nr. 2</div>
                          <div class="extra-wrap" style="left: 532px">
                            <p><span>Working hours:</span><br/> Monday-Sunday: 08:00-23:00
                                <a href="https://www.facebook.com/catalina.chirtes.5/" target="_blank"><img src="poze/facebook.png" alt="" width="50" height="50" align="right" style="margin-top: 35px;"/></a></p>
                            <p><span>For more information you can contact us here, in the "Messages" section, or on our Facebook page.</span></p>
                          </div>
                        <br /><br /><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9361.846752884197!2d21.226352056029846!3d45.76530410592118!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdad4d0d2dc253876!2sIulius%20Town%20Timi%C8%99oara!5e0!3m2!1sen!2sro!4v1614239488193!5m2!1sen!2sro" width=100% height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>              </div>
                    </div>
                  </div>
                </div>
                <div class="content" style="padding: 0px 0px 20px 50px;">
                  <h3><span>Messages</span></h3>
                  <form id="contacts-form" action="" method="post">
                    <fieldset>
                      <div class="field">
                        <label>Name:</label>
                        <input type="text" name="nume" required/>
                      </div>
                      <div class="field">
                        <label>E-mail:</label>
                        <input type="text" name="email" required/>
                      </div>
                      <div class="field">
                        <label>Message:</label>
                        <textarea cols="1" rows="1" name="mesaj" required ></textarea>
                      </div>
                      <div class="wrapper"> <input class="button" type="submit" value="Submit" style="margin-right: 20px; width: 330px"/>
                <input class="button" type="reset" value="Reset" style="width: 330px" /></div>
                    </fieldset>
                  </form>
                </div>
              </div>
    
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "movienight";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$nume=isset($_POST['nume']) ? $_POST['nume'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : '';
$mesaj=isset($_POST['mesaj']) ? $_POST['mesaj'] : '';
$nr_de_ordine = isset($_POST['nr_de_ordine']) ? $_POST['nr_de_ordine'] : ''; 
if (!empty($nume) || !empty($email) || !empty($mesaj)) 
{$sql="INSERT INTO atcontact (nume,email,mesaj,nr_de_ordine) values('$nume','$email','$mesaj','$nr_de_ordine')";
$result = $conn->query($sql);
if ($result == TRUE)
{     echo $conn->error;  }
}
$conn->close();
?>

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
          </div>
        </div>
        <script type="text/javascript"> Cufon.now(); </script>
    </body>
</html>
