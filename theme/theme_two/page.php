<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $this->title.': '.$this->site_title; ?></title>
	<?php foreach($css_file as $css) { ?>
	<link rel="stylesheet" href="<?php echo BASE_URL.$css; ?>" type="text/css" media='all' />
	<?php } ?>
</head>
<body>
	<h1><?php echo $this->site_title ?></h1>
	<div class="page">
		<div class="header">
			<?php
				$this->renderHeaderContent();
			?>
		</div>

		<h2><?php echo $this->title ?></h2>

		<?php
			$this->renderContent();
		?>

		<div class="footer">
			<?php
				$this->renderFooterContent();
			?>
		</div>
	</div>
</body>
</html>
