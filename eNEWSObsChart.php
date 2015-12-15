<link rel="stylesheet" href="CSS/main.css" type="text/css">

<head>
</head>

<!-- INITIAL DRAFT OF E-NEWS CHART TABLES IN HTML 

	NOTES:
	Planning on getting this to be generated via php to be less verbose
	make the colour codes variables, not magic numbers! 

	ALSO! find a way to display the severity rows like it is shown on the form. Currently 3's for each row,
	not combined rows.
-->

<body>
	<div class="category">
	<!-- columns: title, values, 12 cells, severity, 12 cells, values 
	 	heights: resp. rate 5, Sp02 5, temp 5, Systolic BP 19,
	 	Heart rate 12, level of consciousness 2 --> 
	 	<table>
	 	 	<td class="title">
	 	 		<div>RESP. RATE</div>
	 	 	</td>
	 	 	<td class="values">
	 	 		<table>
	 	 			<?php
	 	 			$values = array("&ge;25", "21-24", "12-20", "9-11", "&le;8");
	 	 			addLeftValueRows($values);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	 	<td class="cells">
	 	 		<table>
	 	 			<?php
	 	 			$severities = array(3,2,0,1,3);
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
	 	 			$values = array("&ge;25", "21-24", "12-20", "9-11", "&le;8");
	 	 			addRightValueRows($values);
	 	 			?>
	 	 		</table>
	 	 	</td>
	 	</table>

	</body>




<?php

function addSeverityRows(array $severities) {
	foreach ($severities as $sev) {
		switch ($sev) {
			case 3: // bg red ff9999
			echo "<tr bgcolor=\"ff9999\"><td class=\"severitytd\">".$sev."</td></tr>";
			break;
			case 2: // bg orange ffbb99
			echo "<tr bgcolor=\"ffbb99\"><td class=\"severitytd\">".$sev."</td></tr>";
			break;
			case 1: // bg light green ccffcc
			echo "<tr bgcolor=\"ccffcc\"><td class=\"severitytd\">".$sev."</td></tr>";
			break;
			default: // bg grey bfbfbf
			echo "<tr bgcolor=\"bfbfbf\"><td class=\"severitytd\" style=\"color:#bfbfbf\">".$sev."</td></tr>";
			break;
		}
	}	
}

function addCellRows(array $severities) {
	foreach ($severities as $sev) {
		switch ($sev) {
			case 3: // bg red ff9999
				echo "<tr bgcolor=\"ff9999\">";
			break;
			case 2: // bg orange ffbb99
				echo "<tr bgcolor=\"ffbb99\">";
			break;
			case 1: // bg light green ccffcc
				echo "<tr bgcolor=\"ccffcc\">";
			break;
			default: // bg grey bfbfbf
				echo "<tr bgcolor=\"ffffff\">";
			break;

		}
		for ($i=0; $i < 12 ; $i++) {echo "<td></td>";} //remove magic number
		echo "</tr>";
	}	
}

function addLeftValueRows(array $values) {
	foreach ($values as $val) {
		echo "<tr>";
		echo "<td class=\"valuestdLeft\">".$val."</td>";
		echo "</tr>";
	}	
}

function addRightValueRows(array $values) {
	foreach ($values as $val) {
		echo "<tr>";
		echo "<td class=\"valuestdRight\">".$val."</td>";
		echo "</tr>";
	}	
}

?>