<?php
include("connect.inc.php");
$user_handle = "";
$global_uid = 0;
$global_usertype = "";
session_start();
if(isset($_SESSION["email"]))
{
  $email = $_SESSION["email"];
  $query = "SELECT user_id,fname,type FROM users where email='$email'";
  $result = mysqli_query($con,$query);
  $numResults = mysqli_num_rows($result);
  if($numResults)
  {
    $userdata = mysqli_fetch_array($result);
    $user_handle = $userdata['fname'];
    $global_uid = $userdata['user_id'];
    $global_usertype = $userdata['type'];
  }
  else
  {
    $user_handle = "Me";
  }
}
else
{
  $user_handle = "";
}

function global_stylesheets()
{
  global $g_url;
  global $global_uid;
  ?>
  <!--global  CSS  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo $g_url;?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $g_url;?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $g_url;?>css/owl.carousel.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $g_url;?>css/owl.theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $g_url;?>css/owl.transitions.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" type="image/png" href="<?php echo $g_url;?>images/favicon.png"/>
  <?php
}

function global_js($active = "")
{
  global $g_url;
  global $global_uid;
  ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php echo $g_url;?>js/materialize.js"></script>
  <script src="<?php echo $g_url;?>js/init.js"></script>
  <script src="<?php echo $g_url;?>js/common.js"></script>
  <script src="<?php echo $g_url;?>js/owl.carousel.js"></script>
  <script src="<?php echo $g_url;?>js/owl.carousel.min.js"></script>
<?php
}

function global_modals()
{
  global $global_uid;
  global $g_url;
  if(!$global_uid)
  {
  ?>
  <!-- Modal Structure of login modal -->
  <div id="login-modal" class="modal">
    <div class="modal-content">
      <h4 class="center">Login</h4>
      <hr class="darken-2"><br>
      <div class="row">
        <form class="col m12" id="login-form">
          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">email</i>
              <input id="lemail" type="text" class="validate">
              <label for="lemail">Email</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">vpn_key</i>
              <input id="lpassword" type="password" class="validate">
              <label for="lpassword">Password</label>
            </div>
            <p class="login-form-message invalid indigo-text center"></p>
          </div>
          <p class="left">Don't have an account? <a href="#signup-modal" class="modal-trigger">Sign Up</a></p>
          <button class="indigo waves-effect waves-light btn right" type="submit" onclick="verifyLogin()">Login</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Structure of sign up modal -->
  <div id="signup-modal" class="modal">
    <div class="modal-content">
      <h4 class="center">Sign Up</h4>
      <hr class="darken-2">
      <div class="row">
        <div class="row" id="common-signup">
          <form class="col m12" id="signup-form">
            <div class="row">
              <div class="input-field col s12 m6">
                <i class="material-icons prefix">account_circle</i>
                <input id="sfname" type="text" class="validate" required="" aria-required="true">
                <label for="sfname" class="sfname_label" data-error="invalid" data-success="">First Name</label>
              </div>
              <div class="input-field col s12 m6">
                <i class="material-icons prefix">account_circle</i>
                <input id="slname" type="text" class="validate" required="" aria-required="true">
                <label for="slname" class="slname_label" data-error="invalid" data-success="">Last Name</label>
              </div>
              <div class="input-field col s12 m6">
                <i class="material-icons prefix">email</i>
                <input id="semail" type="email" class="validate" required="" aria-required="true">
                <label for="semail" class="semail_label" data-error="invalid" data-success="">Email</label>
              </div>
              <div class="input-field col s12 m6">
                <select id="susertype" class="validate" required="" aria-required="true">
                  <option value="1" selected>Student</option>
                  <option value="2">Parent</option>
                  <option value="3">Faculty</option>
                </select>
                <label for="susertype" class="susertype_label" data-error="invalid" data-success="">Account Type</label>
              </div>
              <div class="input-field col s12 m6">
                <i class="material-icons prefix">vpn_key</i>
                <input id="spassword" type="password" class="validate" required="" aria-required="true">
                <label for="spassword" class="spassword_label" data-error="invalid" data-success="">Password</label>
              </div>
              <div class="input-field col s12 m6">
                <i class="material-icons prefix">vpn_key</i>
                <input id="srepassword" type="password" class="validate" required="" aria-required="true">
                <label for="srepassword" class="srepassword_label" data-error="invalid" data-success="">Re-enter Password</label>
              </div>
              <p class="signup-form-message"></p>
            </div>
            <p class="left">Already have an account? <a href="#login-modal" class="modal-trigger">Login</a></p>
            <button class="indigo waves-effect waves-light btn right signup-btn" type="submit" onclick="validateEmail()">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Structure of anonymous user modal -->
  <div id="anonuser-modal" class="modal">
    <div class="modal-content">
      <div class="row">
        <center>
          <h5>You are not logged in. Please login to continue</h5><br>
           <a href="#login-modal" class="modal-trigger btn btn-large indigo">Login</a>
          <p>Don't have an account? <a href="#signup-modal" class="modal-trigger">Sign Up</a></p>
        </center>
      </div>
    </div>
  </div>
   <?php
  }//End if
  ?>
  <?php
}

function top_banner($active = "")
{
  global $global_uid;
  global $g_url;
  global $user_handle;
?>
<div class="navbar-fixed z-depth-1">
  <nav class="white navbar-fixed dbms3-navbar" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo $g_url;?>" class="brand-logo indigo-text"><b>DBMS 3</b></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo $g_url;?>" class="<?php echo $active=='home' ? 'indigo-text active':'' ?>">Home</a></li>
        <?php
        if(!$global_uid)
        {
        ?>
          <li class="waves-effect waves-dark"><a href="#signup-modal" class="modal-trigger">Sign Up</a></li>
          <li class="waves-effect waves-dark"><a href="#login-modal" class="modal-trigger">Login</a></li>
        <?php
        }
        else
        {
        ?>
          <li class="waves-effect waves-dark"><a href="<?php echo $g_url; ?>profile/" class="<?php if($active == 'profile'){echo 'indigo-text active';} ?>"><?php echo $user_handle; ?></a></li>
          <li class=""><a class='dropdown-button grey-text' href='#' data-activates='dropdown-user' data-hover="false" data-constrainwidth="false"><i class="material-icons">arrow_drop_down</i></a></li>
          <!-- Dropdown Structure -->
          <ul id='dropdown-user' class='dropdown-content'>
            <li class="divider"></li>
            <li><a href="<?php echo $g_url;?>accounts/logout.php" class="grey-text">Logout</a></li>
          </ul>
        <?php
        }
        ?>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
        <li class="waves-effect waves-dark"><a href="#signup-modal" class="modal-trigger">Sign Up</a></li>
        <li class="waves-effect waves-dark"><a href="#login-modal" class="modal-trigger">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>
<?php
}


/* ------------- Utility functions -------------------- */
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'Just now';
}

function generateRandomString($length = 10,$lettersonly = 0) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($lettersonly)
      $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function coursecard($courseid)
{
  global $s3bucketurl;
  global $g_url;
  global $con;
  //Query to get the details of the course
  $query = "SELECT * FROM courses WHERE course_id = $courseid";
  $result = mysqli_query($con, $query);
  $numResults = mysqli_num_rows($result);
  if($numResults)
  {
    $coursedata = mysqli_fetch_assoc($result);
  }
  //Query to get the course instructor data
  /*$query = "SELECT * FROM courses WHERE course_id = $courseid";
  $result = mysqli_query($con, $query);
  $numResults = mysqli_num_rows($result);
  if($numResults)
  {
    while($instructordata = mysqli_fetch_assoc($result))
    {

    }
  }*/
  //we have all the data of the course table here
?>
  <div class="col s12 m12">
    <div class="card medium">
      <div class="card-image">
        <img src="<?php echo $g_url; ?>images/background8.jpg">
        <span class="card-title"><h5><a href="<?php echo $g_url; ?>course/?c=<?php echo $courseid; ?>" class="white-text"><?php echo $coursedata['course_name']; ?></a></h5><small>by me</small></span>
        <span class="price-tag indigo-text z-depth-1"><i class="fa fa-inr"></i>&nbsp;<?php echo $coursedata['fees']; ?></span>

      </div>
      <div class="card-content black-text">
        <p><?php echo $coursedata['course_description']?></p>
      </div>
      <div class="card-action">
        <a href="<?php echo $g_url; ?>course/?c=<?php echo $courseid; ?>" class="btn btn-small indigo white-text waves-effect waves-light">View</a>
        <span class="right indigo-text"><i class="fa fa-user"></i>&nbsp;50</span>
      </div>
    </div>
  </div>
<?php
}

?>
