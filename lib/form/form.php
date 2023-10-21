
<div class="search-form">
	<form method='post' action="<?php echo $this->form_action; ?>">
	<p>Search: <input type='text' name="search_text" value="<?php echo $this->search; ?>" /></p>

	<?php if($this->show_custom_text == 'custom') { ?><p>Custom Text: <textarea name="text_source"><?php echo $this->text_source; ?></textarea></p><?php } ?>
	<?php if($this->show_files) { ?>
		<select name="file_source">
			<?php foreach($source_files as $source_file => $text_title) { ?>
				<option value="<?php echo $source_file; ?>" <?php if($source_file == $this->file_source) { ?>selected="selected"<?php } ?>><?php echo $text_title; ?></option>
			<?php } ?>
		</select>
	<?php } ?>

	<select name="cipher">
		<option value="">English Qaballa</option>
		<option value="GoN" <?php if($this->cipher == 'GoN') { ?>selected<?php } ?>>Gematria of Nothing</option>
	</select>
	<p><input type="submit" value="Apply Cipher" />
	</form>
</div>
