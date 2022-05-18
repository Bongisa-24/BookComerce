<h1> Books:</h1>


<?php
$category = $_GET["category"];
$max = (int) $_GET["max"];
$prime = isset($_GET["prime"]);
$fname = strtolower($category) . ".txt";

if (file_exists($fname)) {
	$lines = file($fname);
	?>
	
	<ul>
		<?php
		$i= 0;
		foreach ($lines as $line) {
			list($title, $price) = explode(":", $line);
			if ($prime) 
			{
				$price = ($price * (50/100));
			}
			if (!$max || $price <= $max)
			{
				$i = $i + 1;
				?>
				<li> <?= $price ?> - <?= $title ?>
				<?php
			}
		}
		?>
	</ul>
	
	<?= $i ?> found
	<?php

} 
else 
	{
		?>
		<p>Category not found.</p>
		<?php
	}
?>