// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}

function like(id){
    $.post('./api/like.php', {news_id: id}, () => location.reload());
}

// function like(id){
//     $.post('./api/like.php', {news_id: id}, () => {
// 		let id = $(this).data('id');
// 		let count = Number($(`#count${id}`).text());
// 		let str = $(`#like${id}`).text();
		
// 		if(str === '讚'){
// 			$(`#like${id}`).text('收回讚');
// 			$(`#count${id}`).text(count+1);
// 		}
// 		else if(str === '收回讚'){
// 			$(`#like${id}`).text('讚');
// 			$(`#count${id}`).text(count-1);
// 		}
// 	});
// }
// function good(id,type,user)
// {
// 	$.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
// 	{
// 		if(type=="1")
// 		{
// 			$("#vie"+id).text($("#vie"+id).text()*1+1)
// 			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
// 		}
// 		else
// 		{
// 			$("#vie"+id).text($("#vie"+id).text()*1-1)
// 			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
// 		}
// 	})
// }