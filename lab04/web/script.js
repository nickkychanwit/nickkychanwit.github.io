
$(document).ready(function(){
	$("div").hide();
    $("#submit").click(function(){
		var motto = "motto/"+$("#province").val()+".txt";
		var sign = "sign/"+$("#province").val()+".png";
	$("#city").text($("#province").val()); 
	alert("Wellcome to mysite \n"+$("#fname").val()+" "+ $("#lname").val());	
	$("div").slideDown();
	$.get(motto,function(data){ 
      	$("#motto").attr("src",motto);
	});
	$.get(sign,function(data){ 
		$("#sign").attr("src",data);});
		if(2017-parseInt($("#year").val()) <= 13){
			 $("body").addClass("child");
			  $("h1").addClass("child");

		}
		else {if($("#male").prop("checked")==true){
			$("body").addClass("man");
			$("h1").addClass("man");

			}else{$("body").addClass("woman");
				 $("h1").addClass("woman");}
		}
    });
	 $("#cancelbt").click(function(){
		 $("#fname").val("");
		 $("#lname").val("");
		 $("#day").val("1");
		 $("#month").val("January");
		 $("#year").val("0000");
		 		$("div").slideUp();

    });
});