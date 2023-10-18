<?php if(!empty($this->triangle)) { ?>
	<div class="results">
	<div class="results-triangle">
	<table>
		<tr>
			<?php
		foreach($words as $word) {?>
			<th><?php echo $word; ?></th><th>&nbsp;</th>
			<?php
		}
			?>
		</tr>
	<?php
		if(isset($this->file_source) || isset($this->cipher)) {
			$this->form_action = "advanced.php";
		}
		$indent = 0;
		$alt = false;
		foreach($this->triangle as $row) {
	?>
		<tr>
			<?php
				$tmp = 0;
				while($tmp++ < $indent) {
				?>
				<td>&nbsp;</td>
				<?php
				}
				$first = true;
				foreach($row as $node) {
					if($alt and !$first) {
			?>
			<td>&nbsp;</td>
			<?php
					}
			?>
			<td><a href="<?php echo $this->form_action; ?>?search_text=<?php echo $node['text']; 
				if(isset($this->file_source) && $this->file_source != '') { 
					?>&file_source=<?php echo $this->file_source; 
				}
				if(isset($this->cipher) && $this->cipher != '') {
					?>&cipher=<?php echo $this->cipher;
				} 
				?>" title="<?php echo $node['text']; ?>"><?php echo $node['value']; ?></a></td>
			<?php
					if(!$alt) {
			?>
			<td>&nbsp;</td>
			<?php
					}
					$first = false;
				}
			?>
		</tr>
	<?php
			$indent++;
			$alt = !$alt;
		}
	?>
	</table>
	</div>
	</div>
<?php } ?>
