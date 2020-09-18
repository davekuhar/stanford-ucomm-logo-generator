<?php 
global $vertical_layout_options;
$vertical_layout_options = array(
								array(
									'id' 		=> "vertical-unit",
									'image'		=> SF_PLUGIN_URL."/assets/images/unit.svg",
									'type'  	=> "vertical",
									'title' 	=> "<h4 class='demo'>Unit</h4>",
									'line_number'  	=> "1",
									'logo_number'  	=> "5",
									'p2'			=> "Department Name",
								),
								
								array(
									'id' 		=> "vertical-school",
									'image'		=> SF_PLUGIN_URL."/assets/images/school.svg",
									'type'  	=> "vertical",
									'title' 	=> "<h4 class='demo'>School</h4>",
									'line_number'  	=> "1",
									'logo_number'  	=> "2",
									'p1'			=> "SCHOOLNAME",
								),
								
								array(
									'id' 		=> "vertical-school-unit",
									'image'		=> SF_PLUGIN_URL."/assets/images/school-unit.svg",
									'type'  	=> "vertical",
									'title' 	=> "<h4 class='demo'>School + Unit</h4>",
									'line_number'  	=> "2",
									'logo_number'  	=> "3",
									'p1'			=> "SCHOOLNAME",
									'p2'			=> "Department Name on One or Two Lines",
								),
								
								array(
									'id' 		=> "vertical-school-unit-level",
									'image'		=> SF_PLUGIN_URL."/assets/images/school-unit-level.svg",
									'type'  	=> "vertical",
									'title' 	=> "<h4 class='demo'>School + Unit + Level</h4>",
									'line_number'  	=> "3",
									'logo_number'  	=> "1",
									'p1'			=> "SCHOOLNAME",
									'p2'			=> "Department Name on One or Two Lines",
									'p3'			=> "Parent Unit Level",

								),

							);
?>