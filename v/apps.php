<a href="/apps/new/create">create</a>
<?if(isset($vars)&&!empty($vars)):?>
<table>
<tr>
	<td><input id="all_apps" type="checkbox" name="selected[]" value="all"/> Select all</td>
	<td><div id="editselected">Edit selected</div></td>
	<td><div id="deleteselected">Delete selected</div></td>
</tr>
</table>
	<table>
		<tr>
			<td></td>
			<td></td>
			<td>Title</td>
			<td>Author</td>
			<td>OS</td>
			<td>Date</td>
		</tr>
		<?for($i=0;$i<count($vars);$i++):?>
			<tr id="<?=$vars[$i]['id']?>" class="apps_select">
				<td><input class="selected apps_select" type="checkbox" name="selected[]" value="<?=$vars[$i]['id']?>"/></td>
				<td><img src="<?=BASE_URL?><?=$vars[$i]['icon']?>"></td>
				<td><?=$vars[$i]['title']?></td>
				<td><?=$vars[$i]['author']?></td>
				<td><?=$vars[$i]['OS']?></td>
				<td><?=$vars[$i]['renovation']?></td>
			</tr>
		<?endfor?>
	</table>
	<?endif;?>
<div id="edit_block" class="dn"><td><a id="upd" href="#">update</a></td>
				<td><a id="del" href="#">delete</a></td></div>