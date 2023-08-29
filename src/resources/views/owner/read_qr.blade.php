<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- CSS -->
		<link rel="stylesheet" href="./style.css"/>
		<!-- JavaScript -->
		<script src="{{ asset('js/main.js')}}" defer></script>
		<script src="{{ asset('js/jsQR.js')}}" defer></script>
	</head>
	<body>
		<h1>jsQR</h1>
		<div id="wrapper">
			<div id="msg">Unable to access video stream.</div>
			<canvas id="canvas"></canvas>
		</div>
	</body>
</html>
