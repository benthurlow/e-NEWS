<link rel="stylesheet" href="CSS/main.css" type="text/css">

<head>
</head>

<!-- 

eNEWSObsChart.php - php file which handles the front end (the observation chart) of the
application.

TO DO! - values for some categories should be on the line - some not. look at them.
	
-->

<?php
// declaration of constants
define("CELL_HEIGHT", 25);
define("NUMBER_OF_CELL_COLUMNS", 12);

// colour constants -- CHANGE NAME TO COLOUR_X etc.
define("BG_RED", "ff9999");
define("BG_ORANGE", "ffbb99");
define("BG_GREEN", "ccffcc");
define("BG_GREY", "bfbfbf");
define("BG_WHITE", "ffffff");
define("BG_BLUE", "ccddff");
define("BG_DARK_BLUE", "3385ff");
?>


<body style="padding-bottom:10px">


	<div id="title">
		Observation chart for the National Early Warning Score (NEWS)
	</div>

	<?php echo '<div class="headerContainer" style="height:'.(CELL_HEIGHT*2).'px">';?>
	 	<table>
	 		<?php echo '<td class="keyContainer" bgcolor="'.BG_WHITE.'">';?>
				<!-- either table or an image here, whichever is worth the effort for! -->
	 	 	</td>
	 	 	<td>
	 	 		<table>
	 	 			<td class="headerTitle">
	 	 				NAME:
	 	 			</td>	
	 	 			<td>
	 	 				
	 	 			</td>
	 	 		</table>
	 	 	</td>
	 	 	<td>
				<table>
	 	 			<td class="headerTitle">
	 	 				D.O.B:
	 	 			</td>
	 	 			<td>
	 	 				
	 	 			</td>	
	 	 		</table>
	 	 	</td>
	 	 	<td>
				<table>
	 	 			<td class="headerTitle">
	 	 				ADMISSION DATE:
	 	 			</td>
	 	 			<td>
	 	 				
	 	 			</td>	
	 	 		</table>
	 	 	</td>

	 	 	</td>
	 	</table>
	</div>

	<?php echo '<div class="category" style="height:'.(CELL_HEIGHT*2).'px;padding-top:0">';?>
	 	<table>
	 		<?php echo '<td class="titleContainer" bgcolor="'.BG_WHITE.'">';?>
	 			<table>
	 				<td class="bigTitle" style="color:ffffff">
	 					<table>
	 	 					<?php addSmallTitlesLeft(array("DATE","TIME")) ?>
	 	 				</table>
	 				</td>
	 			</table>	
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php addSeverityRows(array(0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<?php echo '<td class="values" bgcolor="'.BG_WHITE.'">';?>
	 			<table>
	 	 			<?php addSmallTitlesRight(array("DATE","TIME")) ?>
	 	 		</table>
	 	 	</td>
	 	</table>
	</div>

	<?php
	// CATEGORIES
	// potentially rework this into an associative array: value -> severity, type deal.

	// declare values and severities for the category // RESP. RATE //
	$name = "RESP. RATE";
	$values = array("&ge;25","21-24","12-20","9-11","&le;8");
	$severities = array(3,2,0,1,3);
	$height = sizeof($severities)*CELL_HEIGHT;
	addCategory($name, $values, $severities, $height);

	// declare values and severities for the category // SpO2 //
	$name = "Sp0<sub>2</sub>";
	$values = array("&ge;96","94-95","92-93","&le;91","%");
	$severities = array(0,1,2,3,2);
	$height = sizeof($severities)*CELL_HEIGHT;

	addCategory($name, $values, $severities, $height);

	// declare values and severities for the category // TEMP //
	$name = "TEMP";
	$values = array("","&ge;39&deg;","38&deg;","37&deg;","36&deg;","&le;35&deg;","");
	$severities = array(2,1,0,0,1,3);
	$height = sizeof($severities)*CELL_HEIGHT;
	addCategory($name, $values, $severities, $height);

	// declare values and severities for the category // BLOOD PRESSURE //
	$name = "BLOOD PRESSURE";
	$values = array("230","220","210","200","190","180","170","160","150","140","130","120","110","100","90","80","70","60","50");
	$severities = array(3,0,0,0,0,0,0,0,0,0,0,0,1,2,3,3,3,3,3);
	$height = sizeof($severities)*CELL_HEIGHT;
	addCategory($name, $values, $severities, $height);

	// declare values and severities for the category // HEART RATE //
	$name = "HEART RATE";
	$values = array(">140","130","120","110","100","90","80","70","60","50","40","30");
	$severities = array(3,2,2,1,1,0,0,0,0,1,3,3);
	$height = sizeof($severities)*CELL_HEIGHT;
	addCategory($name, $values, $severities, $height);

	// declare values and severities for the category // CONSCIOUSNESS //
	$name = "Level of Consciousness";
	$values = array("Alert","V/P/U");
	$severities = array(0,3);
	$height = sizeof($severities)*CELL_HEIGHT;
	addCategory($name, $values, $severities, $height);

	?>

	<!-- BLOOD SUGAR -->

	<?php echo '<div class="category" style="height:'.CELL_HEIGHT.'px">';?>
	 	<table>
	 		<?php echo '<td class="titleContainer" bgcolor="'.BG_BLUE.'">';?>
	 			<table>
	 				<td class="bigTitle">BLOOD SUGAR</td>
	 			</table>	
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php addSeverityRows(array(0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<?php echo '<td class="values" bgcolor="'.BG_BLUE.'">';?>
	 	 		<table>
	 				<td class="smallTitleRight">Bl'd Sugar</td>
	 			</table>
	 	 	</td>
	 	</table>
	</div>

	<?php echo '<div class="category" style="height:'.(CELL_HEIGHT*2).'px">';?>
	 	<table>
	 		<?php echo '<td class="titleContainer" bgcolor="'.BG_DARK_BLUE.'">';?>
	 			<table>
	 				<td class="bigTitle" style="color:ffffff">TOTAL NEW SCORE</td>
	 			</table>	
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php echo '<tr bgcolor="'.BG_DARK_BLUE.'" height="100%"><td class="severitytd"></td></tr>'; ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<?php echo '<td class="values" bgcolor="'.BG_DARK_BLUE.'">';?>
	 	 		<table>
	 				<td class="smallTitleRight" style="color:ffffff">TOTAL SCORE</td>
	 			</table>
	 	 	</td>
	 	</table>
	</div>

	<?php echo '<div class="category" style="height:'.(CELL_HEIGHT*3).'px">';?>
	 	<table>
	 		<?php echo '<td class="titleContainer" bgcolor="'.BG_BLUE.'">';?>
	 			<table>
	 				<?php echo '<td class="verticalTitle" bgcolor="'.BG_DARK_BLUE.'" style="color:'.BG_WHITE.'">';?>
	 					<div class="leftVerticalText">Additional Parameters</div>
	 				</td>
	 				<td class="bigTitle" style="color:ffffff">
	 					<table>
	 	 					<tr>
								<td class="smallTitleLeft" > </td>
	 	 					</tr>
	 	 					<tr>
								<td class="smallTitleLeft" style="height:34%">Pain Score</td>
	 	 					</tr>
	 	 					<tr>
								<td class="smallTitleLeft"> </td>
	 	 					</tr>
	 	 				</table>
	 				</td>
	 			</table>	
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0,0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php addSeverityRows(array(0,0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0,0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<?php echo '<td class="values" bgcolor="'.BG_BLUE.'">';?>
	 			<table>
	 	 			<tr>
						<td class="smallTitleRight"></td>
	 	 			</tr>
	 	 			<tr>
						<td class="smallTitleRight" style="height:34%">Pain Score</td>
	 	 			</tr>
	 	 			<tr>
						<td class="smallTitleRight"></td>
	 	 			</tr>
	 	 		</table>
	 	 	</td>
	 	</table>
	</div>

	<?php echo '<div class="category" style="height:'.(CELL_HEIGHT*4).'px">';?>
	 	<table>
	 		<?php echo '<td class="titleContainer" bgcolor="'.BG_BLUE.'">';?>
	 			<table>
	 				<td class="bigTitle" style="color:ffffff">
	 					<table>
	 	 					<?php addSmallTitlesLeft(array("Urine Output","Monitoring Frequency","Escalation Plan Y/N n/a","Initials")) ?>
	 	 				</table>
	 				</td>
	 			</table>	
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0,0,0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php addSeverityRows(array(0,0,0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php addCellRows(array(0,0,0,0)) ?>
	 	 		</table>
	 	 	</td>
	 	 	<?php echo '<td class="values" bgcolor="'.BG_BLUE.'">';?>
	 			<table>
	 	 			<?php addSmallTitlesRight(array("Urine Output","Monitor Freq","Escal Plan","Initials")) ?>
	 	 		</table>
	 	 	</td>
	 	</table>
	</div>

</body>



<?php


// functions to create the rows of each table automatically.
function addSeverityRows(array $severities) {
	$height = 1;
	for ($i=0; $i < sizeof($severities); $i++) { 
		// check if the next severity is the same as the previous one. The last element cant check last+1 - not there
		if($i != sizeof($severities)-1 && $severities[$i] == $severities[$i+1]) {
			// skip - dont add, make height larger for current severity.
			$height++;
		}
		else {
			// add row now, reset height for next severity. Heights based on consecutive same severity, based as percentage.
			switch ($severities[$i]) {
				case 3:
					echo '<tr bgcolor="'.BG_RED.'" height="'.(($height/sizeof($severities))*100).'%"><td class="severitytd">'.$severities[$i].'</td></tr>';
				break;
				case 2:
					echo '<tr bgcolor="'.BG_ORANGE.'" height="'.(($height/sizeof($severities))*100).'%"><td class="severitytd">'.$severities[$i].'</td></tr>';
				break;
				case 1:
					echo '<tr bgcolor="'.BG_GREEN.'" height="'.(($height/sizeof($severities))*100).'%"><td class="severitytd">'.$severities[$i].'</td></tr>';
				break;
				default:
					echo '<tr style="color:'.BG_GREY.'" bgcolor="'.BG_GREY.'" height="'.(($height/sizeof($severities))*100).'%"><td class="severitytd">'.$severities[$i].'</td></tr>';
				break;
			}
			$height = 1;
		}
	}	
}

function addCellRows(array $severities) {
	foreach ($severities as $sev) {
		switch ($sev) {
			case 3: // bg red ff9999
				echo '<tr bgcolor="'.BG_RED.'">'; 
			break;
			case 2: // bg orange ffbb99
				echo '<tr bgcolor="'.BG_ORANGE.'">'; 
			break;
			case 1: // bg light green ccffcc
				echo '<tr bgcolor="'.BG_GREEN.'">'; 
			break;
			default: // bg white ffffff
				echo '<tr bgcolor="'.BG_WHITE.'">'; 
			break;
		}
		for ($i=0; $i < NUMBER_OF_CELL_COLUMNS; $i++) {echo '<td class="cell"></td>';}
		echo '</tr>';
	}	
}

function addLeftValueRows(array $values) {
	foreach ($values as $val) {
		echo '<tr>';
		echo '<td class="valuestdLeft">'.$val.'</td>';
		echo '</tr>';
	}	
}

function addRightValueRows(array $values) {
	foreach ($values as $val) {
		echo '<tr>';
		echo '<td class="valuestdRight">'.$val.'</td>';
		echo '</tr>';
	}	
}

function addSmallTitlesLeft(array $values) {
	foreach ($values as $val) {
		echo '<tr>';
		echo '<td class="smallTitleLeft">'.$val.'</td>';
		echo '</tr>';
	}	
}

function addSmallTitlesRight(array $values) {
	foreach ($values as $val) {
		echo '<tr>';
		echo '<td class="smallTitleRight">'.$val.'</td>';
		echo '</tr>';
	}	
}

function addCategory($name, $values, $severities, $height) {
	echo '<div class="category" style="height:'.($height).'px">';
	 	echo '<table>';
			echo '<td class="titleContainer">';
				echo '<table>';
					echo '<tr>';
						echo '<td class="title" bgcolor="'.BG_BLUE.'">';
							echo $name;
						echo '</td>';
						echo '<td class="values">';
							echo '<table>';
								addLeftValueRows($values);
							echo '</table>';
						echo '</td>';
					echo '</tr>';
				echo '</table>';
			echo '</td>';
	 	 	echo '<td class="cells">';
	 	 		echo '<table>';
	 	 			addCellRows($severities);
	 	 		echo '</table>';
	 	 	echo '</td>';
	 	 	echo '<td class="severity">';
	 	 		echo '<table>';
	 	 			addSeverityRows($severities);
	 	 		echo '</table>';
	 	 	echo '</td>';
	 	 	echo '<td class="cells">';
	 	 		echo '<table>';
	 	 			addCellRows($severities);
	 	 		echo '</table>';
	 	 	echo '</td>';
	 	 	echo '<td class="values">';
	 	 		echo '<table>';
	 	 			addRightValueRows($values);
	 	 		echo '</table>';
	 	 	echo '</td>';
	 	echo '</table>';
	echo '</div>';
}


?>