<?php require('degreedata.php'); ?>


<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $student_fname;?>'s DegreeMap | Welcome</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/foundation-icons.css" />
	<script src="js/vendor/modernizr.js"></script>

	<style>
		.icon-bar.three-up{
			margin:0 auto;
		}
		.icon-bar.three-up .item{
			margin-right:12px;
			width:32%;
		}

		.label h4{
			font-size:1.5em;
			color:#fefefe;
		}
		table{
			border-collapse: collapse;
		}	

		table thead tr th, table tbody tr td{
			text-align:center; 
			vertical-align:bottom;
		}

		table, th, td {
			border: 1px solid #999;
		}

		.cell_head{
			height:30px;
		}
		.cell_body{
			height:100px;
		}

		h3 small a{
			line-height: 60%;
		}

		footer{
			padding-bottom:30px;
		}


	</style>
</head>
<body>

	<div class="row">
		<div class="medium-12 columns">
			<h1>Welcome to <?php echo $student_fname;?>'s Degreemap</h1>
			<h3 class="subheader">Updated up to SP 2015</h3>
		</div>
	</div>

	<div class="row">
		<div class="medium-12 columns">
			<div class="icon-bar three-up" style="background:transparent;">
				<div class="item success label">
					<i class="fi-checkbox" ><p>Completed and accepted</p></i>

				</div>
				<div class="item warning label">
					<i class="fi-clipboard-pencil" ><p>In progress/registered or needs docs</p></i>
				</div>
				<div class="item alert label">
					<i class="fi-prohibited" ><p>Not Completed/Registered</p></i>

				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="medium-12 columns">

			<table role="grid">
				<thead>
					<tr>
						<th WIDTH=28>
							<div align="center">SEM</div>
						</th>
						<?php for($i = 0; $i< $max_courses; $i++): ?>
							<th >Course</th>
						<?php endfor; ?>
						<th>
							<div align="center">
								Total Credit<br /><?php echo $total_credits;?>
							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($degreedata as $key=>$value): ?>
						<?php 
						$semester_credits = 0; 
						$num_cols = 0;
						?>
						<tr>
							<td >
								<p align="center"><?php echo $key; ?></p>
							</td>
							<?php foreach($value as $innerkey => $innervalue): ?>
								<td align="center">
									<h5>
										<a class="cell_head" target="blank" href="<?php echo $innervalue['link']; ?>">
											<?php echo $innerkey; ?>
										</a> 
										(<?php echo $innervalue['credits']; ?>)
									</h5>
									<h5 class="subheader cell_body">
										<small>
											<?php echo $innervalue['description']; ?>
										</small>
									</h5>
									<div class="cell_footer <?php echo $innervalue['label-color']; ?> label " >
										<h4>
											<?php echo $innervalue['label-message']; ?>
										</h4>
									</div>
								</td>

								<?php 
								$semester_credits += $innervalue['credits']; 
								$num_cols += 1;
								?>
							<?php endforeach;?>
							<?php 
							while($num_cols < $max_courses){
								echo "<td></td>";
								$num_cols+=1;
							}
							?>
							<td>
								<p align="center"><?php echo $semester_credits;?></p>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<script src="js/vendor/jquery.js"></script>
		<script src="js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
		<hr/>
		<footer>
			<h3 class="subheader text-center">
				<small>
					Created By: <span><?php echo $student_fname. " " . $student_lname; ?></span>
				</small>
			</h3>
		</footer>

	</body>
	</html>
