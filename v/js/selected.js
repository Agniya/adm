 $(function(){
	$('body').on('click','#all',function(){
			$(".selected").each(function(indx, element){
			$(element).attr("checked","checked");
		});
	});
	$('body').on('click','.apps_select',function(){
			$('#edit_app').removeClass('dn');
			$(event.target).append($('#edit_app'));
			var id = $(event.target).parent('tr').attr('id');
			$('#upd').attr('href','/apps/'+id+'/update');
			$('#del').attr('href','/apps/'+id+'/delete');
	});
	$('body').on('dblclick','.apps_select',function(){
		$('#edit_app').addClass('dn');
	});
	
	$('body').find('#editselected,#deleteselected').on('click',function(){
		
		if($('input.selected:checked').length > 0){
			if($(event.target).attr('id') == 'editselected') var act = 'update';
			else if($(event.target).attr('id') == 'deleteselected') act = 'delete';
			for(var i=0;i<$('input.selected:checked').length;i++){
			var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no' +
				'width=100,height=100,left=100,top=100';
				window.open('/apps/'+$('input.selected:checked').eq(i).val()+'/'+act, 'application_'+$('input:checked').eq(i).val(), params);
			}
		}		
	});	
	
 });
