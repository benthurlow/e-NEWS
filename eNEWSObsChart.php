<link rel="stylesheet" href="CSS/main.css" type="text/css">

<head>
</head>

<!-- INITIAL DRAFT OF E-NEWS CHART TABLES IN HTML 

	NOTES:
	Planning on getting this to be generated via php to be less verbose
	make the colour codes variables, not magic numbers! 

	
-->

<?php
// declaration of constants
define("CELL_HEIGHT", 25);
define("NUMBER_OF_CELL_COLUMNS", 12);

// colour constants
define("BG_RED", "ff9999");
define("BG_ORANGE", "ffbb99");
define("BG_GREEN", "ccffcc");
define("BG_GREY", "bfbfbf");
define("BG_WHITE", "ffffff");
?>


<body>
	<?php
	// declare values and severities for the category // RESP. RATE //

	// potentially rework this into an associative array: value -> severity, type deal.
	$name = "RESP. RATE";
	$values = array("&ge;25","21-24","12-20","9-11","&le;8");
	$severities = array(3,2,0,1,3);

	$height = sizeof($severities)*CELL_HEIGHT;

	echo '<div class="category" style="height:'.($height).'px">';
	?>
	<!-- columns: title, values, 12 cells, severity, 12 cells, values 
	 	heights: resp. rate 5, Sp02 5, temp 5, Systolic BP 19,
	 	Heart rate 12, level of consciousness 2 --> 
	 	<table>
	 	 	<td class="title">
	 	 		<div><?php echo $name ?></div>
	 	 	</td>
	 	 	<td class="values">
	 	 		<table>
	 	 			<?php
	 	 			addLeftValueRows($values);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php
	 	 			addCellRows($severities);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php
	 	 			addSeverityRows($severities);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php
	 	 			addCellRows($severities);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="values">
	 	 		<table>
					<?php
	 	 			addRightValueRows($values);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	</table>
	</div>

	<?php
	// declare values and severities for the category // BLOOD PRESSURE //
	$name = "BLOOD PRESSURE";
	$values = array("230","220","210","200","190","180","170","160","150","140","130","120","110","100","90","80","70","60","50");
	$severities = array(3,0,0,0,0,0,0,0,0,0,0,0,1,2,3,3,3,3,3);

	$height = sizeof($severities)*CELL_HEIGHT;

	echo '<div class="category" style="height:'.($height).'px">';
	?>
	<!-- columns: title, values, 12 cells, severity, 12 cells, values 
	 	heights: resp. rate 5, Sp02 5, temp 5, Systolic BP 19,
	 	Heart rate 12, level of consciousness 2 --> 
	 	<table>
	 	 	<td class="title">
	 	 		<div><?php echo $name ?></div>
	 	 	</td>
	 	 	<td class="values">
	 	 		<table>
	 	 			<?php
	 	 			addLeftValueRows($values);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php
	 	 			addCellRows($severities);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="severity">
	 	 		<table>
	 	 			<?php
	 	 			addSeverityRows($severities);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php
	 	 			addCellRows($severities);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="values">
	 	 		<table>
					<?php
	 	 			addRightValueRows($values);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	</table>
	</div>

</body>

<?php

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
				echo '<tr bgcolor="'.BG_GREY.'" height="'.(($height/sizeof($severities))*100).'%"><td class="severitytd">'.$severities[$i].'</td></tr>';
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
		for ($i=0; $i < NUMBER_OF_CELL_COLUMNS; $i++) {echo '<td></td>';}
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

?>