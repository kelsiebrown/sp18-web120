<?php
/**
 * multiple.php is a postback application designed to provide a 
 * contact form for users to email our clients.  
 * 
 * multiple.php provides a larger form with more elements to provide 
 * a richer example form.
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

#EDIT THE FOLLOWING:
$toAddress = "kelsie.brown@seattlecentral.edu";  //place your/your client's email address here
$toName = "Rachel Wells"; //place your client's name here
$website = "Rachel Wells - Berlin and Potsdam City Guide";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'config.php'; #site keys go inside your config.php file
include 'contact-lib/contact_include.php'; #complex unsightly code moved here
$response = null;
$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
        handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);             #Here we can enter the data sent into a database in a later version of this file
    ?>
    <!-- START HTML FEEDBACK -->
    <div class="contact-feedback">
        <h4>Thanks for getting in touch!</h4>
        <p>I'll be in touch as soon as possible to answer any questions or schedule a tour.</p>
    </div>    
    <!-- END HTML FEEDBACK -->        
    <?php
}else{#show form, either for first time, or if data not valid per reCAPTCHA 
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback
 
?>

<!-- START HTML FORM -->

    <h4>Fill out this form below if you're interested in setting up a tour.</h4>

	<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
	<div>
		<label>
			Name:<br /><input type="text" name="Name" required="required" placeholder="Name (required)" title="Name is required" tabindex="10" size="44" autofocus />
		</label>
	</div>
	<div>	
		<label>
			Email:<br /><input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email address is required" tabindex="20" size="44" />
		</label>
	</div>
    <div>
        <label>
            Phone Number:<br /><input type="tel" name="phone" placeholder="Phone Number (optional)" title="Enter a valid phone number" tabindex="20" size="44" /><br>
        </label>    
    </div>	
	<div>	
		<fieldset>
			<legend>What are you interested in?</legend>
			<input type="checkbox" name="Interested_In[]" value="general berlin" tabindex="40" /> General Berlin tour <br />
			<input type="checkbox" name="Interested_In[]" value="historical" /> Historical tour <br />
			<input type="checkbox" name="Interested_In[]" value="food or beer" /> Food or beer tour <br />
			<input type="checkbox" name="Interested_In[]" value="potsdam" /> Potsdam tour <br />
			<input type="checkbox" name="Interested_In[]" value="multiday" /> Multi-day tour <br />
            <input type="checkbox" name="Interested_In[]" value="other" />Other (please give details in comments below)
		</fieldset>
	</div>
	<div>	
		<label>
			Questions, comments, or other details:<br /><textarea name="Comments" cols="50" rows="8" placeholder="Your comments are important to me!" tabindex="60"></textarea><br>
		</label>
	</div>	
	<div><?=$feedback?></div>
    <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>"></div>
	<div>
		<input type="submit" value="submit" id="submit"/>
	</div>
    </form>
	<!-- END HTML FORM -->
    <script src="https://www.google.com/recaptcha/api.js?hl=en">
    </script>
<?php
}
?>
