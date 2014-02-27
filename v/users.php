<a href="/users/new/create">create</a>
<?if(isset($vars)&&!empty($vars)):?>
<table>
<tr>
	<td><input id="all_users" type="checkbox" name="selected[]" value="all"/> Select all</td>
	<td><div id="editselected">Edit selected</div></td>
	<td><div id="deleteselected">Delete selected</div></td>
</tr>
</table>
	<table>
		<tr>
			<td></td>
			<td></td>
			<td>Name</td>
			<td>Mail</td>
			<td>Type</td>
			<td>Apps</td>
		</tr>
		<?for($i=0;$i<count($vars);$i++):?>
			<tr id="<?=$vars[$i]['id']?>" class="users_select">
				<td><input class="selected users_select" type="checkbox" name="selected[]" value="<?=$vars[$i]['id']?>"/></td>
				<td><img src="<?=BASE_URL?><?=$vars[$i]['icon']?>"></td>
				<td><?=$vars[$i]['username']?></td>
				<td><?=$vars[$i]['email']?></td>
				<td><?=$vars[$i]['type_name']?></td>
				<td><?=$vars[$i]['apps']?></td>
			</tr>
		<?endfor?>
	</table>
	<?endif;?>
<div id="edit_block" class="dn"><td><a id="upd" href="#">update</a></td>
				<td><a id="del" href="#">delete</a></td></div>