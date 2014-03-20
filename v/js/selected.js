 $(function(){
	var cntrl;
	$('body').find('#all_apps,#all_users').on('click',function(){
		if($(event.target).attr("id")=='all_apps') cntrl= 'apps';
		else if($(event.target).attr("id")=='all_users') cntrl= 'users';
			$(".selected").each(function(indx, element){
			if($(element).attr("checked")=="checked"){
				$(element).removeAttr("checked");			
			}	
			else {
				$(element).attr("checked", true);
			}
		});
	});
	
	$('body').find('.apps_select,.users_select').on('click',function(){
		if($(event.target).closest('#strmenublock').hasClass("apps_select")) cntrl= 'apps';
		else if($(event.target).closest('#strmenublock').hasClass("users_select")) cntrl= 'users';
			var id = $(event.target).closest('#strmenublock').data('item');
			$('.upd').attr('href','/'+cntrl+'/'+id+'/update');
			$('.del').attr('href','/'+cntrl+'/'+id+'/delete');
			
	});

	$('body').find('.editselected,.deleteselected').on('click',function(){
		if($('input.selected:checked').length > 0){
			if($('input.selected:checked').hasClass("apps_select")) var cntrl= 'apps';
			else if($('input.selected:checked').hasClass("users_select")) cntrl= 'users';
			if($(event.target).hasClass('editselected')) var act = 'update';
			else if($(event.target).hasClass('deleteselected')) act = 'delete';
			for(var i=0;i<$('input.selected:checked').length;i++){
			var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no' +
				'width=100,height=100,left=100,top=100';
				window.open('/'+cntrl+'/'+$('input.selected:checked').eq(i).val()+'/'+act,$('input:checked').eq(i).val(), params);
			}
		}
	});	
	
 });
