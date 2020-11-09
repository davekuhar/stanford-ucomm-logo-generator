<?php
function stanford_logo_generator_callback ( $atts ) {

	global $horizontal_layout_options, $vertical_layout_options;

	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );

	ob_start();
	wp_enqueue_script( 'sf-public-script' );
	?> 
	<div id="loader" class="center"></div> 
	<?php
	if(isset($_POST['generate-logo-package']) && (!empty($_POST['unit-1-line']) || !empty($_POST['unit-2-line']) || !empty($_POST['level']))){

			$zipFile = "stanford-".rand().".zip";

		  	$zip_resource = fopen(SF_PLUGIN_PATH.$zipFile, "w");

		  	$curl = curl_init();

		  	$p1 				= isset($_POST['unit-1-line']) ? $_POST['unit-1-line'] : '';
			$p2 				= isset($_POST['unit-2-line']) ? $_POST['unit-2-line'] : '';
			$p3 				= isset($_POST['level']) ? $_POST['level'] : '';
			$logo_number 		= $_POST['logo_number'];
			$line_number 		= $_POST['line_number'];
			
			
			if($line_number == 1 && $logo_number == 1){
				$p1 = strtoupper($p1);
			}

			if($line_number == 2 && $logo_number == 6){
				$p1 = ucwords($p1);
				$p2 = ucwords($p2);
			}

			if($line_number == 2 && $logo_number == 10){
				$p2 = ucwords($p2);
			}

			if($line_number == 2 && $logo_number == 8){
				$p2 = ucwords($p2);
				$p3 = ucwords($p3);
			}

			if($line_number == 3 && $logo_number == 2){
				$p2 = ucwords($p2);
				$p3 = ucwords($p3);
			}

			if($line_number == 2 && $logo_number == 1){
				$p1 = strtoupper($p1);
				$p2 = ucwords($p2);
			}

			if($line_number == 2 && $logo_number == 4){
				$p1 = strtoupper($p1);
				$p2 = ucwords($p2);
			}

			if($line_number == 2 && $logo_number == 5){
				$p1 = strtoupper($p1);
				$p2 = ucwords($p2);
			}

			if($line_number == 2 && $logo_number == 2){
				$p1 = strtoupper($p1);
				$p2 = ucwords($p2);
			}

			if($line_number == 1 && $logo_number == 5){
				$p2 = ucwords($p2);
			}

			if($line_number == 1 && $logo_number == 2){
				$p1 = strtoupper($p1);
			}

			if($line_number == 2 && $logo_number == 3){
				$p1 = strtoupper($p1);
				$p2 = ucwords($p2);
			}

			if($line_number == 3 && $logo_number == 1){
				$p1 = strtoupper($p1);
				$p2 = ucwords($p2);
				$p3 = ucwords($p3);
			}


			if($line_number == 1 && $logo_number == 3){
				$p1 = $p2;
				$p2 = $p3 = "";
			}else if($line_number == 1 && $logo_number == 5){
				$p1 = $p2;
				$p2 = $p3 = "";
			}else if($line_number == 2 && $logo_number == 8){
				$p1 = $p2;
				$p2 = $p3;
				$p3 = "";
			}

			$array_with_parameters 	= array(
											'p1' => $p1,
											'p2' => $p2,
											'p3' => $p3,
											'logo_number' => $logo_number,
											'line_number' => $line_number,
										);
			
				// echo "<pre>";
				// print_r($array_with_parameters);
				// echo "</pre>";
			
				
			curl_setopt_array($curl, array(
				// URL must be changed if generator scripts are moved to different server
			    CURLOPT_URL 				=> "http://44.229.49.144/api/v1/",
			    CURLOPT_RETURNTRANSFER 		=> true,
			    CURLOPT_ENCODING 			=> "",
			    CURLOPT_MAXREDIRS 			=> 10,
			    CURLOPT_TIMEOUT 			=> 0,
			    CURLOPT_FOLLOWLOCATION 		=> true,
			    CURLOPT_HTTP_VERSION 		=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 		=> "POST",
			    CURLOPT_POSTFIELDS 			=> json_encode($array_with_parameters),
			    CURLOPT_HTTPHEADER 			=> array(
			      										"Content-Type: application/json"
			    								),
			    CURLOPT_FILE 				=> $zip_resource,
			  ));

			  $response = curl_exec($curl);
	}

	if(isset($_GET['layout']) && isset($_GET['type']) ){
		$disabled_1 = $disabled_2 = $disabled_3 = 'disabled="disabled"';
		if( isset($_GET['p1']) && !empty($_GET['p1'])){
			$disabled_1 = "";
		}
		if( isset($_GET['p2']) && !empty($_GET['p2'])){
			$disabled_2 = "";
		}
		if( isset($_GET['p3']) && !empty($_GET['p3'])){
			$disabled_3 = "";
		}
		/*
			if($_GET['line_number'] == 1){
				$disabled_2 = $disabled_3 = 'disabled="disabled"';
			}elseif($_GET['line_number'] == 2){
				$disabled_3 = 'disabled="disabled"';
			}
		*/
	?>
	
		<div class="generator-wrapper">
			<p>Type your final logo copy into the text fields below. Your set of logos will be generated automatically and packaged as a zip file containing PNG, JPG, and EPS files.</p>
			<p class="tip"><strong>Please be patient</strong>—it can take up to 30 seconds to generate the full logo package. When everything's ready the resulting zip file will download direct to your hard drive.</p>
			<div class="logo-display <?php echo $_GET['layout']; ?>">
				<div class="logo-content">
					<div class="main-logo-div"><span class="stf-logo"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>assets/images/stanford-wordmark.svg"></span></div>
					<div class="unit-1-line-text"><?php echo $_GET['p1'];?></div>
					<div class="unit-2-line-text"><?php echo $_GET['p2'];?></div>
					<div class="level-text"><?php echo $_GET['p3'];?></div>
				</div>
			</div>
		</div>
	
		<div class="generator-wrapper" id="download-btn">
			<div class="logo-form">
				<form method="post" class="<?php echo $_GET['layout']; ?>" action="#download-btn">
					<div class="input-wrapper">
						<input type="text" <?php echo $disabled_1; ?> name="unit-1-line" class="unit-1-line" placeholder="School Name" onkeyup="textCounter(this,'counter-unit1',32);" maxlength="32">
						<span id="counter-unit1">Characters left: 32</span>
					</div>
					<div class="input-wrapper">
						<input type="text" <?php echo $disabled_2; ?> name="unit-2-line" class="unit-2-line" placeholder="Department Name" onkeyup="textCounter(this,'counter-unit2',45);" maxlength="45">
						<span id="counter-unit2">Characters left: 45</span>
					</div>
					<div class="input-wrapper">
						<input type="text" <?php echo $disabled_3; ?> name="level" class="level" placeholder="Unit Level" onkeyup="textCounter(this,'counter-level',45);" maxlength="45">
						<span id="counter-level">Characters left: 45</span>
					</div>
 					<input type="hidden" name="logo_number" value="<?php echo $_GET['logo_number']; ?>">
					<input type="hidden" name="line_number" value="<?php echo $_GET['line_number']; ?>">

					<button class="logo-generate-btn btn" type="submit" name="generate-logo-package">Generate Logo Package</button>
					<a class="cancel-btn btn" href="<?php echo get_the_permalink(); ?>">Cancel and Select a new layout</a>

					<div class="row stanford-message" id="stanford-message" style="display: none; margin: 15px -15px;font-size: 16px;">
						<div class="col-md-12">
							<div class="alert alert-info position-relative" role="alert">
							  Please wait while we process your request.
							  <div class="loader-submit">Loading...</div>
							</div>
						</div>
					</div>

				</form>

				<script type="text/javascript">
					
					jQuery(document).ready(function(){
						jQuery('.logo-generate-btn').click(function(){
							jQuery('#stanford-message').show();
						});
					});

					function textCounter(field,field2,maxlimit){
					 	var countfield = document.getElementById(field2);
					 	if ( field.value.length > maxlimit ) {
					  		field.value = field.value.substring( 0, maxlimit );
					  		return false;
					 	} else {
					  		jQuery('#'+field2).html("Characters left: " + (maxlimit - field.value.length));
					 	}
					}

				</script>
				
				<?php if($zipFile != "" ){?>
					<div class="download-btn"><a class="btn-link" href="<?php echo SF_PLUGIN_URL.$zipFile; ?>">Click here to download your custom logo package</a></div>
				<?php } ?>
			</div>

		</div>


	<?php	
	}else{
		?>
<p>Using this tool, you can generate and download a Stanford department signature package for your school, department, unit, institute center, or lab.</p>
<p>Simply choose the logo format below which matches your needs and click on the “Generate logo package” button. Enter the text to describe your group. <strong>You’ll receive a folder direct to your desktop which contains all file formats and colors you should need for your communications.</strong></p>

<h3 class="has-text-align-center">Generate horizontal logos</h3>
		<?php
		foreach ($horizontal_layout_options as $key => $value) {
			?> 
				<div class="layout-wrapper">
					<div class="horizontal_layout_options_single">

						<span class="title"><?php echo $value['title']; ?></span>
						
						<div class="wp-block-columns are-vertically-aligned-center has-2-columns">
							<div class="wp-block-column is-vertically-aligned-center">
								<figure class="logo-sample"><img src="<?php echo $value['image']; ?>"></figure>
							</div>
						<?php if(is_user_logged_in()){ ?>	
							<div class="wp-block-column is-vertically-aligned-center generate-btn-container">
							<form method="get" class="generate-logo-package-button" action="<?php echo get_the_permalink(); ?>">
								<input type="hidden" name="layout" value="<?php echo $value['id']; ?>">
								<input type="hidden" name="type" value="<?php echo $value['type']; ?>">
								<input type="hidden" name="logo_number" value="<?php echo $value['logo_number']; ?>">
								<input type="hidden" name="line_number" value="<?php echo $value['line_number']; ?>">

								<input type="hidden" name="p1" value="<?php echo $value['p1']; ?>">
								<input type="hidden" name="p2" value="<?php echo $value['p2']; ?>">
								<input type="hidden" name="p3" value="<?php echo $value['p3']; ?>">
					
								<button class="submit-btn" type="submit">Generate logo package</button>
							</form>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
			<?php
		}
		?>
		
		<h3 class="has-text-align-center">Generate vertical (stacked) logos</h3>
		<?php
		foreach ($vertical_layout_options as $key => $value) {
			?>  <div class="layout-wrapper">
					<div class="vertical_layout_options_single">

						<span class="title"><?php echo $value['title']; ?></span>

						<div class="wp-block-columns are-vertically-aligned-center has-2-columns">
							<div class="wp-block-column is-vertically-aligned-center">
								<figure class="logo-sample"><img src="<?php echo $value['image']; ?>"></figure>
							</div>
						<?php if(is_user_logged_in()){ ?>
							<div class="wp-block-column is-vertically-aligned-center generate-btn-container">
							<form method="get" class="generate-logo-package-button" action="<?php echo get_the_permalink(); ?>">
								<input type="hidden" name="layout" value="<?php echo $value['id']; ?>">
								<input type="hidden" name="type" value="<?php echo $value['type']; ?>">
								<input type="hidden" name="logo_number" value="<?php echo $value['logo_number']; ?>">
								<input type="hidden" name="line_number" value="<?php echo $value['line_number']; ?>">

								<input type="hidden" name="p1" value="<?php echo $value['p1']; ?>">
								<input type="hidden" name="p2" value="<?php echo $value['p2']; ?>">
								<input type="hidden" name="p3" value="<?php echo $value['p3']; ?>">
								
								<button class="submit-btn" type="submit">Generate logo package</button>
							</form>
							</div>
						<?php } ?>
						
					</div>
				</div>
			<?php
		}
	}
	
	return ob_get_clean();
}
add_shortcode( 'stanford_logo_generator', 'stanford_logo_generator_callback' );
?>
