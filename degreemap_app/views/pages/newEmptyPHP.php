<?php
$features = array(0=>array(
	'title'		 => "Wireless Presentation",
	'description'=> "Instructors can sync their iOS devices, such as Phones and iPads, to wirelessly present content in the classroom.",
	'image'		 => "/files/image/DigitalTransition/14100084Ap2-Wireless-Presentation-Drupal.png",
	'link' 	 	 => "http://acadtech.gwu.edu/node/649"
	),
1=>array(
	'title'=> 'Web Conferencing',
	'description'=> 'Web conferencing tools enable instructors to teach from anywhere and invite guest lecturers into the classroom from around the corner or around the world.',
	'image'=>"/files/image/DigitalTransition/14100084Bp1-Web-Conferencing-Drupal.png",
	'link' 	 	 => "http://acadtech.gwu.edu/node/650"
	),
2=>array(
	'title'=> 'Video Conferencing',
	'description'=> 'Cisco systems at GW enable video conferencing in spaces ranging from small conference room facilities, to 50-seat classrooms, and to even larger, configurable rooms.',
	'image'=>"/files/image/DigitalTransition/14100084Cp1-Video-Conferencing-Drupal.png",
	'link' 	 	 => "http://acadtech.gwu.edu/node/651"
	),
3=>array(
	'title'=> 'Copyright-Protected Media',
	'description'=> 'Digital display connections support embedded security protocols in distributed content, meaning you can display your high-quality video content worry-free.',
	'image'=>"/files/image/DigitalTransition/14100084Dp1-Copyright.png",
	'link' 	 	 => "http://acadtech.gwu.edu/node/652"
	),
4=>array(
	'title'=> 'Interface Design',
	'description'=> 'A unified user interface makes the experience easier for both you and us. You’ll go into any classroom and know that the experience will be the same. And it’s easier for us to support.',
	'image'=>"/files/image/DigitalTransition/14100084Ep6-Interface-Design-Drupal.png",
	'link' 	 	 => "http://acadtech.gwu.edu/node/653"
	),
5=>array(
	'title'=> 'Progress',
	'description'=> 'Stay up-to-date on which classrooms have been completed and expected completed dates for other learning spaces.',
	'image'=>"/files/image/DigitalTransition/14100084Fp3-Progress-Drupal.png",
	'link' 	 	 => "http://acadtech.gwu.edu/node/654"
	),
);
?>
<!--STYLE AND HTML FROM http://tympanus.net/codrops/2012/08/08/circle-hover-effects-with-css-transitions/ -->
<style type="text/css">
	.ch-grid {
		margin: 20px 0 0 0;
		padding: 0;
		list-style: none;
		display: block;
		text-align: center;
		width: 100%;
	}
	.ch-grid:after,
	.ch-item:before {
		content: '';
		display: table;
	}
	.ch-grid:after {
		clear: both;
	}
	.ch-grid li {
		width: 300px;
		height: 170px;
		display: inline-block;
		margin: 20px;
	}
	.ch-item {
		width: 100%;
		height: 100%;
		/*border-radius: 50%;*/
		position: relative;
		cursor: pointer;
		box-shadow:
		inset 0 0 0 0 rgba(0,64,101, 0.7),
		inset 0 0 0 16px rgba(255,255,255,0.6),
		-webkit-transition: all 0.4s ease-in-out;
		-moz-transition: all 0.4s ease-in-out;
		-o-transition: all 0.4s ease-in-out;
		-ms-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		background-position: center;
	}
	<?php foreach ($features as $key =>$feature): ?>
	.ch-img-<?php echo $key+1; ?> {
		background-image: url(<?php echo $feature['image']; ?>);
	} <?php endforeach;?>
	.ch-info {
		position: absolute;
		width: 100%;
		height: 100%;
		/*border-radius: 50%;*/
		opacity: 0;
		-webkit-transition: all 0.4s ease-in-out;
		-moz-transition: all 0.4s ease-in-out;
		-o-transition: all 0.4s ease-in-out;
		-ms-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		-webkit-transform: scale(0);
		-moz-transform: scale(0);
		-o-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
		-webkit-backface-visibility: hidden; /*for a smooth font */
	}
	.ch-info h3 {
		color: #fff;
		text-transform: uppercase;
		position: relative;
		letter-spacing: 2px;
		font-size: 18px;
		margin: 0 30px;
		padding: 10px 0 0 0;
		font-family: 'Open Sans', Arial, sans-serif;
		text-shadow:
		0 0 1px #fff,
		0 1px 2px rgba(0,0,0,0.3);
	}
	.ch-info p {
		color: #fff;
		padding: 10px 5px;
		margin: 0 20px;
		font-size: 14px;
		border-top: 1px solid rgba(255,255,255,0.5);
	}
	.ch-info p a {
		display: block;
		color: #fff;
		color: rgba(255,255,255,0.7);
		font-style: normal;
		font-weight: 700;
		text-transform: uppercase;
		font-size: 14px;
		letter-spacing: 1px;
		padding-top: 4px;
		font-family: 'Open Sans', Arial, sans-serif;
	}
	.ch-info p a:hover {
		color: #fff222;
		color: rgba(255,242,34, 0.8);
	}
	.ch-item:hover {
		box-shadow:
		inset 0 0 0 110px rgba(0,64,101, 0.7),
		0 1px 2px rgba(0,0,0,0.1);
	}
	.ch-item:hover .ch-info {
		opacity: 1;
		-webkit-transform: scale(1);
		-moz-transform: scale(1);
		-o-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}
	.feature-title{
		padding:10px 0 0 0;
	}
	.feature-title h3{
		font-weight: bold;
	}

	.hoverlink{
		cursor:pointer;
	}
</style>
<ul class="ch-grid">
	<?php foreach ($features as $key =>$feature): ?>
		<a class="hoverlink" href="<?php echo $feature['link']?>">
			<li>
				<div class="ch-item ch-img-<?php echo $key+1?>">
					<div class="ch-info">
						<h3><?php echo $feature['title']?></h3>
						<p><?php echo $feature['description']?></p>
					</div>
				</div>
				<div class="feature-title">
					<h3><?php echo $feature['title']?></h3>
				</div>
			</li>
		</a>
	<?php endforeach;?>
</ul>