<div class="results">
<div class="matches">
	<?php if($this->search_value > 0) { ?>
		Matches from <?php echo $this->source_name; ?>:

		<?php if(empty($this->matches)) { ?>
			<em>None</em>
		<?php } else { ?>
			<ol>
			<?php
				foreach($this->matches as $match) {
					echo '<li><a href="'.$this->form_action.'?search_text='.$match;
					if(isset($this->file_source)) { echo '&file_source='.$this->file_source; } 
					echo '">'.$match.'</a></li>';
				}
			?>
			</ol>
		<?php } ?>
	<?php } ?>
</div>
</div>
