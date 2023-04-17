<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header');

?>
<!-- Content Header (Page header) -->

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="main-content">
<h3> Application Instructions:</h3>

<div id="notes2"><p >
    1. Agree to comply with the instructions below to proceed with your application.<br/>
    2. From the Vacanicies Section select the position you wish to apply for and click the "Apply" button.<br/>
	3. Upon completion of each section ensure you click the "Save" button to save your entries before moving to the "Next" section.<br>
	4. Upon completion of your application ensure you click the "Submit my Application" to complete your application for the selected vacancy.<br>
	5. You will be notified through SMS on each successful job application you submit.<br/>
    6. You can monitor the status of your job application from "My Applications" section<br/>
    <br/></p>
</div>
<div id="heading2"> 
    NOTES FOR APPLICANTS </div>
<div id="notes2"> 
    1. It is a serious offence to willfully give false information to the Teachers Service Commission.<br/>
    2. All parts of this form must be completed by all applicants.<br/>
    3. Do not apply for any post unless you possess all the qualifications given in the advertisement.<br/>
    4. If you are invited for an interview by the Commission, bring your original certificates and testimonials<br/> 
        &nbsp;&nbsp; but make sure that they are returned to you before you leave.
    <br/>
    5. Canvassing in any form will lead to automatic disqualification.<br/> 
    <br/></div>
    <div id="heading2">
        REQUIREMENTS </div>
    
    <div id="notes2"> <b>NB:</b> Refer to the requirements as stated under the job you wish to apply. </div>

	<div>
	
<input type="submit" class="btn btn-success " style="background-color:#314C95;margin-left:10%;" name="btnSubmitProfile" value="Agree to the above Instructions" onclick="window.location.href='secOne.php'">

</div>
</div>

    
</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url->assets ?>js/pages/dashboard.js"></script>