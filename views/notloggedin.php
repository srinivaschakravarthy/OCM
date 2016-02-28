<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center black-text ">Assignment-3</h1>
      <div class="row center ">
    <!--    <a href="#" id="download-button" class="btn-large waves-effect waves-light indigo lighten-1">Get Started</a>-->

    <form>
        <div class=" col s6 offset-s3">
          <input id="search"  placeholder="Search among Courses,Lecturers.."type="search" class="black-text" required >
        </div>
      </form>


      </div>
      <br><br>

    </div>
  </div>
  <div class="parallax"><img src="<?php echo $g_url.'images/';?>background12.jpg" alt="Unsplashed background img 1"></div>
</div>


<div class="container" style="color:grey;">
  <div class="section">
    <div class="row">
      <h3 class="header center black-text">Language Skills</h3>
       <p class="center black-text">Learn core programming concepts and syntax for the world's most popular languages.</p>
    </div>
    <div class="row">
      <div id="lecturers-carousel" class="owl-carousel owl-theme play">
        <?php
        coursecard(1);
        coursecard(1);
        coursecard(1);
        coursecard(1);
        coursecard(1);
        coursecard(1);
          coursecard(1);
         ?>
      </div>
    </div>
  </div>
</div>



<div class="parallax-container valign-wrapper">
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">

      </div>
    </div>
  </div>
  <div class="parallax"><img src="<?php echo $g_url.'images/';?>background2.jpg" alt="Unsplashed background img 2"></div>
</div>

<div class="container" style="color:grey;">
  <div class="section">

  <div class="row">
  <h3 class="header center black-text">Our Faculty</h3>
   <p class="center black-text">Learn the best from the very best lecturers in the field</p>
</div>
<div class="row">

  <div id="courses-carousel" class="owl-carousel owl-theme play">
     <div class="card z-depth-3">
       <div class="card-image circle responsive-img"><img src="<?php echo $g_url.'images/';?>course.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Learn Java</p></div>
            <div class="card-action"><a href="#">Learn Java</a></div>
     </div>
     <div class="card z-depth-3">
       <div class="card-image"><img src="<?php echo $g_url.'images/';?>course1.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Learn Ruby</p></div>
            <div class="card-action"><a href="#">Learn Ruby</a></div>
     </div>
     <div class="card z-depth-3">
       <div class="card-image"><img src="<?php echo $g_url.'images/';?>course2.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Learn Angular JS</p></div>
            <div class="card-action"><a href="#">Learn Angular JS</a></div>
     </div>
     <div class="card z-depth-3">
       <div class="card-image"><img src="<?php echo $g_url.'images/';?>course3.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Learn Python</p></div>
            <div class="card-action"><a href="#">Learn Python</a></div>
     </div>
     <div class="card z-depth-3">
       <div class="card-image"><img src="<?php echo $g_url.'images/';?>course4.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Learn SQL</p></div>
            <div class="card-action"><a href="#">Learn SQL</a></div>
     </div>
     <div class="card z-depth-3">
       <div class="card-image"><img src="<?php echo $g_url.'images/';?>course5.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Learn GIT</p></div>
            <div class="card-action"><a href="#">Learn GIT</a></div>
     </div>
     <div class="card z-depth-3">
       <div class="card-image"><img src="<?php echo $g_url.'images/';?>course6.svg" alt="Unsplashed background img "></div>
         <div class="card-content black-text"><p>Make a Webpage</p></div>
            <div class="card-action"><a href="#">Make a Webpage</a></div>
     </div>
     </div>
  </div>

</div>

  </div>
