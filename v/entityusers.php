<div id="mainblock">
<div class="headline"><?=$headline?></div>
	<form method="POST" enctype="multipart/form-data">
		<input name="uid" type="hidden" value="<?=$uid?>"></br>
		<div class="form_block">
		<div class="form_block">
			<div class="block40">
				<label for="username">Name</label></br>
				<textarea class="middle_input" id="username" name="username"><?=$vars['username']?></textarea></br>
			</div>
			<div class="block40 padL">
				<label for="site">Email</label></br>
				<textarea class="middle_input" id="email" name="email"><?=$vars['email']?></textarea>
			</div>
			<div class="clear"></div>	
		</div>
		<div class="form_block">
			<div class="block40">
			<label for="username">Type</label></br>
				<select id="type" name="type_id"></br>
					<?for($i=0;$i<count($vars['type']);$i++):?>
						<?if(isset($vars['user_type'])&&$vars['user_type']==$vars['type'][$i]['id']):?>
						<option selected value="<?=$vars['type'][$i]['id']?>"><?=$vars['type'][$i]['type_name']?></option>
						<?else:?>
						<option value="<?=$vars['type'][$i]['id']?>"><?=$vars['type'][$i]['type_name']?></option>
						<?endif;?>
					<?endfor;?>
				</select>
			</div>
			<div class="block40 padL">
				<label for="site">Apps</label></br>
				<textarea class="middle_input" id="apps" name="apps"><?=$vars['apps']?></textarea>
			</div>
			<div class="clear"></div>	
		</div>
		<div class="form_block">
			<label for="file">Ico</label></br>
			<input type="file" class="small_input" name="file[]">
		</div>
		<input type="submit" name="submit" value="submit">
	</form>
</div>