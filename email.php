<!DOCTYPE html>
<html lang="en">
  <title>Help Desk</title>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/glyphicons.css" >
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/styles.css" >
    <link rel="stylesheet" href="assets/css/responsive.css" >
    <style type="text/css">
    	.email_section{
    		min-height: 84vh;
    		width: 100%;
    	}
    	.email_send_wrapper{
    		width: 100%;
    		height: 100%;
    		background-color: #fff;
    	}
    </style>
  </head>

  <body>
    <?php
      define('MAILGUN_URL', 'https://api.mailgun.net/v3/mailgun.dinocommerce.com');
      define('MAILGUN_KEY', 'key-b6eb0992ce81b0a303876f39a7b3a41c');
      define('MAILGUN_POST_ADDRESS', 'postmaster@mailgun.dinocommerce.com');

      if(isset($_POST['SubmitButton'])){
        $to = $_POST['to'];
        $toName = $_POST['to_name'];
        $fromName = $_POST['email_from_name'];
        $sbj = $_POST['subject'];
        $msg = $_POST['message'];
        $txt = "Demo";
        $tag = "tag";
        $replyTo = "sayeedhasan47@gmail.com";
      
        echo "<pre>";
        print_r( send_mail($to,$toName,$fromName,$from,$sbj,$msg,$txt,$tag,$replyTo) );
        echo "<br>";
        // print_r( get_query_response('complaints') );
        echo "</pre>";
      }
      /**
      *
      */
      function send_mail($to,$toname,$mailfromname,$mailfrom,$subject,$html,$text,$tag,$replyto){
        $array_data = array(
        'from'=> $mailfromname .'<'.MAILGUN_POST_ADDRESS.'>',
        'to'=>$toname.'<'.$to.'>',
        'subject'=>$subject,
        'html'=>$html,
        'text'=>$text,
        'o:tracking'=>'yes',
        'o:tracking-clicks'=>'yes',
        'o:tracking-opens'=>'yes',
        '0:tracking-rejected'=>'yes',
        '0:tracking-complaints'=>'yes',
        'o:tag'=>$tag,
        'h:Reply-To'=>$replyto
        );

        $session = curl_init(MAILGUN_URL.'/messages');
        curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($session, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($session);
        curl_close($session);
        $results = json_decode($response, true);
        return $results;
      }
    ?>
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-xs-12 col-md-4 col-xl-4">
            <div class="logo_area text-left">
              <button id="mymenubarbtn" class="btn"><span>Help Desk</span><i class="fa fa-caret-down"></i></button>
            </div>
          </div>
          <div class="col-sm-9 col-xs-12 col-md-8 col-xl-8">
            <div class="top_navbar">
              <nav>
                <div class="top_navbar_wrapper">
                  <ul class="list-inline">
                    <li class="list-inline-item active"><a href=""><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                    <li class="list-inline-item"><a href="common_page.html">
                      <span class="glyphicon glyphicon-envelope"></span>Messages</a></li>
                    <li class="list-inline-item"><a href="">
                      <span class="glyphicon glyphicon-share-alt"></span>Logout</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section class="responsive_navbar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-5 col-xs-12 col-md-5 col-xl-5">
            <div id="myRmenubar" class="navbar-collapse">
                <ul class="list-group navbar-nav">
                  <li class="nav-item list-inline-item"><a class="active" href="index.html">
                    <span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                  <li class="nav-item list-inline-item"><a href="common_page.html">
                    <span class="fa fa-ticket"></span>Tickets</a></li>
                  <li class="nav-item list-inline-item"><a href="users.html">
                    <span class="fa fa-users"></span>User</a></li>
                  <li class="list-inline-item"><a href="integrations.html">
                    <span class="fa fa-download"></span>Integrations</a></li>
                  <li class="list-inline-item"><a href="chat.html">
                    <span class="fa fa-download"></span>Chat</a></li>
                  <li class="nav-item list-inline-item"><a href="settings.html">
                    <span class="fa fa-cogs"></span>Settings</a></li>
                  <li class="list-inline-item"><a href="reporting.html">
                    <span class="fa fa-bar-chart"></span>Reporting</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="email_section">
    	<div class="container-fluid">
        	<div class="row">
          		<div class="col-4 col-xl-4">
          		
          		</div>
          		<div class="col-8 col-xl-8">
          			<div class="email_send_wrapper">
          				<form action="#" method="post">
          					<div class="form-group row">
      							  <label for="example-text-input" class="col-2 col-form-label">To</label>
      							  <div class="col-10">
      							    <input class="form-control" type="text" name="to" id="example-text-input">
      							  </div>
      							</div>
          					<div class="form-group row">
      							  <label for="example-text-input" class="col-2 col-form-label">To name</label>
      							  <div class="col-10">
      							    <input class="form-control" type="text" name="to_name" id="example-text-input">
      							  </div>
      							</div>
          					<div class="form-group row">
      							  <label for="example-text-input" class="col-2 col-form-label">Email from name</label>
      							  <div class="col-10">
      							    <input class="form-control" type="text" name="email_from_name" id="example-text-input">
      							  </div>
      							</div>
          					<div class="form-group row">
      							  <label for="example-text-input" class="col-2 col-form-label">Subject </label>
      							  <div class="col-10">
      							    <input class="form-control" type="text" name="subject" id="example-text-input">
      							  </div>
      							</div>
          					<div class="form-group row">
      							  <label for="example-text-input" class="col-2 col-form-label">Message </label>
      							  <div class="col-10">
      							    <textarea class="form-control" name="message" rows="3"></textarea>
      							  </div>
      							</div>
          					<div class="form-group row">
      							  <label for="example-text-input" class="col-2 col-form-label">Replay to </label>
      							  <div class="col-10">
      							    <input class="form-control" type="email" value="" id="example-text-input">
      							  </div>
      							</div>
							      <label class="col-2"></label>
							      <button type="submit" name="SubmitButton" class="btn btn-primary">Submit</button>
          				</form>
          			</div>
          		</div>
          	</div>
        </div>
    </section>
    <section class="footer_area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-xl-12">
            <div class="footer_wrapper">
              <p>powered by Ecomisoft</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- start chat box -->
    <div class="chatbox chatbox--tray chatbox--empty">
      <div class="chatbox__title">
        <h5><a href="#">Chat</a></h5>
        <button class="chatbox__title__tray">
          <span></span>
        </button>
        <button class="chatbox__title__close">
          <span>
            <svg viewBox="0 0 12 12" width="12px" height="12px">
              <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
              <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
            </svg>
          </span>
        </button>
      </div>
      <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--left">
          <img src="assets/img/128.jpg" alt="Picture">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--right">
          <img src="assets/img/129.jpg" alt="Picture">
          <p>Nulla vel turpis vulputate, tincidunt lectus sed, porta arcu.</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
          <img src="assets/img/128.jpg" alt="Picture">
          <p>Curabitur consequat nisl suscipit odio porta, ornare blandit ante maximus.</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--right">
          <img src="assets/img/129.jpg" alt="Picture">
          <p>Cras dui massa, placerat vel sapien sed, fringilla molestie justo.</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--right">
          <img src="assets/img/129.jpg" alt="Picture">
          <p>Praesent a gravida urna. Mauris eleifend, tellus ac fringilla imperdiet, odio dolor sodales libero, vel mattis elit mauris id erat. Phasellus leo nisi, convallis in euismod at, consectetur commodo urna.</p>
        </div>
      </div>
      <textarea class="chatbox__message" placeholder="Write something interesting"></textarea>
    </div>
    
    <!-- end chat box -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
