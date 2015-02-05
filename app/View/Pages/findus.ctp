<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="index.html">Home</a></li>
            
            <li><a href="contact.html">Contact</a></li>
            
            <li class="active">Find Us</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="container  push-down-30">
  <div class="row">
    <div class="col-xs-12">
	  
	  
	  
	  <div class="row centerall">
<div class="col-xs-12">
 <div style="transform:skew(-20deg); background:#007FC5;padding:15px 45px;display: inline-block;">
      <h1 class="center" style="color:white;margin:0px;transform:skew(20deg); " ><span class="light">Find</span>  Charlie's Chopsticks</h1>
</div>
</div>
</div>



      <hr class="divider">
      <div class="text-shrink">
        <p class="text-highlight">More Locations Coming Soon.</p>
		
		
		
      </div>
      <hr class="divider  divider-about">
      <div class="push-down-30"></div>
      <div class="row">
        <div class="col-xs-12  col-sm-4  push-down-30">
        <h2  class="no-margin"><span class="light">Charlie's Chopsticks</span></h2><br/>
        <p>Unit 3, 970 Upper James Street<br>
        Hamilton, ON<br>
        L9Cn 3A5</p>
        <span class="glyphicon  glyphicon-earphone"></span> <span class="text-dark">905-388-9888</span><br>
        <span class="glyphicon  glyphicon-envelope"></span> <a class="secondary-link" href="mailto:contact@charlieschopstics.com"><strong>contact@charlieschopstics.com</strong></a>
		
		
		        <h2  class=""><span class="light">Hours</span></h2>
 <?php
              $hours = $this->requestAction('/pages/getHours');
              ?>
					<p>Sunday : <strong><?php get_formated_date2($hours['Restaurant']['sunday_from']);?> to <?php get_formated_date2($hours['Restaurant']['sunday_to']);?></strong></p>
			


            <p>Monday : <strong><?php get_formated_date2($hours['Restaurant']['monday_from']);?> to <?php get_formated_date2($hours['Restaurant']['monday_to']);?></strong></p>
			
            
            <p>Tuesday : <strong><?php get_formated_date2($hours['Restaurant']['tuesday_from']);?> to <?php get_formated_date2($hours['Restaurant']['tuesday_to']);?></strong></p>
			
            
            <p>Wednesday : <strong><?php get_formated_date2($hours['Restaurant']['wednesday_from']);?> to <?php get_formated_date2($hours['Restaurant']['wednesday_to']);?></strong></p>
			
            <p>Thursday : <strong><?php get_formated_date2($hours['Restaurant']['thursday_from']);?> to <?php get_formated_date2($hours['Restaurant']['thursday_to']);?></strong></p>
			
            <p>Friday : <strong><?php get_formated_date2($hours['Restaurant']['friday_from']);?> to <?php get_formated_date2($hours['Restaurant']['friday_to']);?></strong></p>
			
            <p>Saturday : <strong><?php get_formated_date2($hours['Restaurant']['saturday_from']);?> to <?php get_formated_date2($hours['Restaurant']['saturday_to']);?></strong></p>
			

			
			
			
			
        </div>
        <div class="col-xs-12  col-sm-8" style="margin-bottom:20px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2907.324799416611!2d-79.8838397!3d43.223649400000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882c9afc9113aa47%3A0xb155b54bab6e44be!2s970+Upper+James+St%2C+Hamilton%2C+ON+L9C+3A6!5e0!3m2!1sen!2sca!4v1414366075691" width="100%" height="400" frameborder="0" style=" border:2px solid #dadada;"></iframe>
        </div>
      </div>
      

    </div>
  </div>
</div>
<?php
function get_formated_date2($to_format)
{
    $arr_hours = explode(':',$to_format);
    if($arr_hours[0]>11)
    {
        if($arr_hours[0]==12)
        {
            echo $arr_hours[0].':'.$arr_hours[1].' PM';
        }
        else
        echo ($arr_hours[0]-12).':'.$arr_hours[1].' PM';
    }
    else
    {
        if($arr_hours[0]==00)
        {
            echo '12'.':'.$arr_hours[1].' AM';
        }
        else
        echo $arr_hours[0].':'.$arr_hours[1].' AM';
    }
}
?>
