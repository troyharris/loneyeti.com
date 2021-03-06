<!DOCTYPE html>
<?php 
  
  $support_message = "";
  $support_display = "none";
  
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }
  
  if (isset($_POST['submit'])) {
    $okayToSend = 1;
    $support_display = "block";
    if (!isset($_POST['email']) || !isset($_POST['name']) || !isset($_POST['reason']) || !isset($_POST['description'])) {
      $support_message = "There was an error submitting your form";
      $okayToSend = 0;
    } else {   
      $email_from = $_POST['email'];
      $email_to = "support@loneyeti.com";
      $email_subject = "Songsmith Support: ".$_POST['reason'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $email_message = "Name: ".clean_string($name)."\n";
      $email_message .= "Email Address: ".clean_string($email_from)."\n\n-------------\n\n";
      $email_message .= clean_string($description);
    
      $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
      if(!preg_match($email_exp,$email_from)) {
            $support_message .= 'The Email Address you entered does not appear to be valid.<br />';
	    $okayToSend = 0;
      }
      if(strlen($description) < 2) {
        $support_message .= 'The description you entered does appear to be valid.<br />';
        $okayToSend = 0;
      }
 
    
      if ($okayToSend == 1) {
        // create email headers
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
        $support_message = "Support request sent. Thank you!";
        $support_display = "block";
      }
    }
  }  
?>      
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="apple-itunes-app" content="app-id=548961573" />
    <link rel="stylesheet" href="css/songsmith.css" type="text/css" />
    <title>
      Songsmith - iPhone Songwriting App
    </title>
<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("support");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
} 
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33863649-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>
  <body>
   <div id="container">
    <section>
      <header>
        <div id="appstore">
          <a href="http://itunes.apple.com/us/app/songsmith/id548961573?mt=8"><img src="images/appstore.png"/></a>
        </div>
      </header>
    </section>
   </div>
    <section>
    	<nav>
    	 <div id="navContainer">
	  <ul>
	    <li><a href="/songsmith">Home</a></li>
	    <li><a href="javascript:toggle();">Support</a></li>
	    <li><a target="_blank" href="http://itunes.apple.com/us/app/songsmith/id548961573?mt=8">Buy Now</a></li>
	  </ul>
	 </div>    	    
    	</nav>
    </section>
   <div id="container">
    <section>
    	<article>
          <!-- Place this tag where you want the +1 button to render. -->
          <div class="g-plusone" data-annotation="inline" data-width="300"></div>
          
          <!-- Place this tag after the last +1 button tag. -->
          <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                          </script>
	  <div id="support" style="display:<?php echo $support_display; ?>;">
	    <div id="close-button">
	      <a href="javascript:toggle();"><img src="images/delete_24.png" /></a>
            </div>
<?php
  if (strlen($support_message) > 0) {
?>
          <div id="support-banner">
            <?php echo $support_message; ?>
          </div>
<?php
  }
?>
            <h1>Support Request</h1>
            <form action="mail.php" method="post">
              <table>
                <tr>
                  <th>Name</th><td><input type="text" name="name" id="name"/></td>
                </tr>
                <tr>
                  <th>E-Mail</th><td><input type="text" name="email" id="email"/></td>
                </tr>
                <tr>
                  <th>Reason</th>
                  <td>
                  	<select name="reason">
                  		<option value="bug">Bug Report</option>
                  		<option value="feature">Feature Request</option>
                  		<option value="general">General Comment</option>
                  	</select>
                  </td>
                </tr>
                <tr>
                  <th>Description</th><td><textarea name="description"></textarea></td>
                </tr>
		<tr>
		  <th>&nbsp;</th><td><input type="submit" name="submit" value="Submit" />
		</tr>
              </table>
            </form>
          </div>
    	  <img src="images/iphone-triple-small.png" id="screenshots"/>
    	  <h1>A Simple, Elegant Songwriting Tool</h1>
    	  <p>Songsmith is a beautiful songwriting journal designed for songwriters who need a place to save their ideas and lyrics anywhere they are.</p>
    	  <h2>Never forget an idea again</h2>
    	  <p>With Songsmith, you have the ability to quickly jot down ideas and lyrics whenever they come to you. Did you overhear a great quip while standing in line at the market?
    	    Use the <span class="feature">Quick Lyric</span> feature to save it for later.</p>
    	  <p>Did you hear your dog barking and think it would sound great piped into a vocoder? Throw that idea into <span class="feature">Quick Ideas</span> so you won't forget it.</p>
    	  <h2>Build complete songs</h2>
    	  <p>The true power of Songsmith comes when you put together <span class="feature">Songs</span>. Keep track of chords, lyrics, tempo information, time signature, key and notes/ideas.
    	    Pipe in <span class="feature">Quick Lyrics</span> and </span class="feature">Quick Ideas</span> when you find the perfect spot for them.</p>
    	  <p>You can also use the <span class="feature">Songsmith Recorder</span> to record any vocals, melodies, instrumentation, demos, etc. As many recordings per song as you'd like!</p>
    	  <h2>Get inspired!</h2>
    	  <p>Songsmith's simple <span class="feature">Inspiration</span> feature can help you get out of songwriting jams. It provides you with a random tip, a random saying and a random picture.
    	    Keep refreshing until something jars your imagination</p>

    	</article>
    </section>
    <section>
      <footer>
        &nbsp;
      </footer>
   </div>

  </body>
</html>