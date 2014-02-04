<a href="/apps/new/create">create</a>
<?if(isset($vars)&&!empty($vars)):?>
<table>
	<?for($i=0;$i<count($vars);$i++):?>
		<tr>
			<td><?=$vars[$i]['title']?></td>
			<td><a href="/apps/<?=$vars[$i]['id']?>/update">update</a></td>
			<td><a href="/apps/<?=$vars[$i]['id']?>/delete">delete</a></td>
		</tr>
	<?endfor?>
</table>
<?endif;?>