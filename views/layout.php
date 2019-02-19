<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../styleCurl.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>REST with CURL</title>
</head>
<body>
<header></header>
<div class='main-block'>
	<div class='sideBar'></div>
	<div class='articleList'>
		<?php foreach ($newArr as $item): ?>
			<h1>
				<?php echo $item['title']; ?>
			</h1>
			<div class="articleContainer">
				<?php echo $item['article']; ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<footer></footer>
</body>
</html>