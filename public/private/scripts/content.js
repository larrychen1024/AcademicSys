
/* $(document).ready(function(){
	for(var i=$(".list").length;i>0;i--){
		$(this)[i].click(function(){
		alert(i);
		//showcontent();
		});
		}
	}); */
function showcontent()
{
	
	var cunrrent_pic=$(this).attr("src");
	switch(cunrrent_pic)
	{
		case "private/images/header1.jpg": alert("1");$("div.1").show();$("div.2").hide();$("div.3").hide();$("div.4").hide();$("div.5").hide();$("div.6").hide();break;
		case "private/images/header2.jpg": alert("2");$("div.1").hide();$("div.2").show();$("div.3").hide();$("div.4").hide();$("div.5").hide();$("div.6").hide();break;
		case "private/images/header3.jpg": alert("3");$("div.1").hide();$("div.2").hide();$("div.3").show();$("div.4").hide();$("div.5").hide();$("div.6").hide();break;
		case "private/images/header4.jpg": alert("4");$("div.1").hide();$("div.2").hide();$("div.3").hide();$("div.4").show();$("div.5").hide();$("div.6").hide();break;
		case "private/images/header5.jpg": alert("5");$("div.1").hide();$("div.2").hide();$("div.3").hide();$("div.4").hide();$("div.5").show();$("div.6").hide();break;
		case "private/images/header6.jpg": alert("6");$("div.1").hide();$("div.2").hide();$("div.3").hide();$("div.4").hide();$("div.5").hide();$("div.5").show();break;
		default:break;
	}
}