<link rel="stylesheet" href="CSS/obsEntry.css" type="text/css">

<head>
</head>

<body>

	<!-- Title -->
	

	<!-- Data Entry -->
	<div>
		<table>
			<td class="margin"></td>
			<td class="dataForm" >
				<div id="title">
					Enter Obs
				</div>
				<form action="addObsData.php"> <!-- whichever file recieves the data should go here. -->
					<div><label for="bloodPressure">Blood Pressure: </label><input class="dataEntryHalfLeft" type="text" name="bloodPressure"/><b>/</b><input class="dataEntryHalfRight" type="text" name="bloodPressure"/> mm/Hg</div>
					<div><label for="spO2">Sp0<sub>2</sub>: </label><input class="dataEntry" type="text" name="spO2"/> %</div>
					<div><label for="o2Flow">Oxygen Flow Rate: </label><input class="dataEntry" type="text" name="o2Flow"/> L</div>
					<div><label for="o2Percent">Oxygen %: </label><input class="dataEntry" type="text" name="o2Percent"/> </div>
					<div><label for="heartRate">Heart Rate: </label><input class="dataEntry" type="text" name="heartRate"/> bpm</div>
					<div><label for="respiratoryRate">Respiratory Rate: </label><input class="dataEntry" type="text" name="respiratoryRate"/> /min</div>
					<div><label for="temperature">Temperature: </label><input class="dataEntry" type="text" name="temperature"/> &degC</div>
					<div><label for="urineOutput">Urine Output: </label>
						<select class="dataEntry">
							<option value="over30">&gt30 mls/hr OR PU'd in last 5 minutes</option>
							<option value="20to30">&lt30, but &gt20 mls/hr</option>
							<option value="10to20">&lt20, but &gt10 mls/hr</option>
							<option value="under20">&lt10 mls/hr</option>
							<option value="nonein8">not PU'd in last 6&deg</option>
							<option value="nonein12">not PU'd in last 12&deg</option>
						</select>
					</div>
					<div class="buttons">
						<button class="submitButton" type="submit">Submit</button>
						<a href="http://localhost/e-NEWS/eNEWSObsChart.php">
  							<input class="cancelButton" type="button" value="Cancel" />
						</a>
					</div>
				</form>
			</td>
			<td class="margin"></td>
		</table>
	</div>

</body>