<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホーム</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
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