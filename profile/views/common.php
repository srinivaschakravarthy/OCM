<?php
function profileheader(){
  global $editable;
  global $profilepicurl;
  global $fname;
  global $lname;
  global $g_url;
?>
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row" style="margin-top:190px">
        <div class="col m2">
      		<?php if($editable)
      		{
      			?>
      			<input type='file' id="upload_dp" name='upload_dp' hidden/>
      		<a class="waves-effect waves-dark" onclick="upload_dp();" id="upload_dp_link"><img id="profilepicimg" src="<?php echo $profilepicurl;?>" alt="" class="responsive-img">
      			<!--<div id='picloading'>
      				<div class="progress grey">
      			  	<div class="indeterminate grey darken-1"></div>
      				</div>
      			</div>-->
      			<p class="uploadins">Change profile pic</p></a>
      		<?php
      		}
      		else
      		{
      			?>
      		<img src="<?php echo $profilepicurl;?>" alt="" class="responsive-img">
      		<?php
      		}
      			?>
      	</div>
        <div class="col m6">
          <h4><?php echo $fname." ".$lname; ?></h4>
        </div>
      </div>
    </div>
  </div>
  <div class="parallax"><img src="<?php echo $g_url.'images/';?>background8.jpg" alt="Unsplashed background img 1"></div>
</div>
<?php
}//End of profileheader function
?>
