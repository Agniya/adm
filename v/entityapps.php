<div class="application">
<div class="headline"><?=$headline?></div>
	<form method="POST" enctype="multipart/form-data">
		<input name="uid" type="hidden" value="<?=$uid?>"></br>
		<div class="form_block">
			<label for="title">Title</label></br>
			<textarea class="middle_input" id="title" name="title"><?=$vars['title']?></textarea>
		</div>
		<div class="form_block">
			<label for="System Requirements">System Requirements</label></br>
			<div>
				<?if(isset($vars['OS'])&&isset($vars['CPU'])):?>
					<?foreach($vars['OS'] as $k=>$v):?>
						<?if($v==1):?>
						<input type="radio" name="OS" value="<?=$k?>" checked/><?=$k?><br />
						<?else:?>
						<input type="radio" name="OS" value="<?=$k?>"><?=$k?><br />	
						<?endif?>
					<?endforeach?>
					</div>
					<div class="block40 padL">
						<?foreach($vars['CPU'] as $k=>$v):?>
						<?if($v==1):?>
						<input type="radio" name="CPU[]" value="<?=$k?>" checked/><?=$k?><br />
						<?else:?>
						<input type="radio" name="CPU[]" value="<?=$k?>"><?=$k?><br />	
						<?endif?>
						<?endforeach?>
					</div>	
				<?else:?>
				<div class="block40">
					<input type="radio" name="OS" value="10.6"/>10.6 Snow Leopard<br />
					<input type="radio" name="OS" value="10.7"/>10.7 Lion<br />
					<input type="radio" name="OS" value="10.8"/>10.8 Mountain Lion<br />
				</div>
				<div class="block40 padL">
					<input type="checkbox" name="CPU[]" value="32"/>32-bit CPU support<br />
					<input type="checkbox" name="CPU[]" value="64"/>64-bit CPU support<br />
				</div>	
				<?endif?>
				<div class="clear"></div>				
			</div>
		</div>
		<div class="form_block">
			<div class="block40">
				<label for="version">Version</label></br>
				<textarea class="middle_input" id="version" name="version"><?=$vars['version']?></textarea></br>
				<label for="bundle_id">Bundle ID</label></br>
				<textarea class="middle_input" id="bundle_id" name="bundle_id"><?=$vars['bundle_id']?></textarea></br>
			</div>
			<div class="block40 padL">
				<label for="renovation">Date of renovation</label></br>
				<textarea class="middle_input" id="renovation" name="renovation"><?=$vars['renovation']?></textarea>
			</div>
			<div class="clear"></div>	
		</div>
		<div class="form_block">
			<div class="block40">
				<label for="price">Price</label></br>
				<textarea class="middle_input" id="price" name="price"><?=$vars['price']?></textarea></br>
			</div>
			<div class="block40 padL">
				<label for="license">License</label></br>
				<textarea class="middle_input" id="license" name="license"><?=$vars['license']?></textarea>
			</div>
			<div class="clear"></div>	
		</div>
		<div class="form_block">
			<div class="block40">
				<label for="author">Author</label></br>
				<textarea class="middle_input" id="author" name="author"><?=$vars['author']?></textarea></br>
			</div>
			<div class="block40 padL">
				<label for="site">Site</label></br>
				<textarea class="middle_input" id="site" name="site"><?=$vars['site']?></textarea>
			</div>
			<div class="clear"></div>	
		</div>
		<div class="form_block">
			<label for="file">File</label></br>
			<input type="file" class="small_input" id="file" name="file">
			<!--<input type="submit" name="upload" value="UPLOAD">-->
			</br>
			<label for="link">Link to download</label></br>
			<textarea class="middle_input" id="link" name="link"><?=$vars['link']?></textarea></br>
			<label for="description">Description</label></br>
			<textarea class="middle_input max_input" id="description" name="description"><?=$vars['description']?></textarea>
			<label for="novelty">What's new in this version</label></br>
			<textarea class="middle_input max_input" id="novelty" name="novelty"><?=$vars['novelty']?></textarea><br>
			<label for="release_notes">Release notes</label></br>
			<textarea class="middle_input" id="release_notes" name="release_notes"><?=$vars['release_notes']?></textarea></br>
			<label for="sys_notes">System requirements: Notes</label></br>
			<textarea class="middle_input max_input" id="sys_notes" name="sys_notes"><?=$vars['sys_notes']?></textarea>
		</div>
		<div class="form_block">
			<label for="Discussion">Discussion</label></br>
			<?if($vars['comments']!=''):?>
				<input type="checkbox" name="comments" value="true" checked/>Allow comments<br />
			<?else:?>
				<input type="checkbox" name="comments" value="true"/>Allow comments<br />
			<?endif?>
		<input type="submit" name="submit" value="submit">
	</form>
</div>