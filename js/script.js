(function($){$(function(){

$.fn.try_press=function(arr){//функция проверки отправки формы
var butt=this;
	butt.click(function(){
		var f=true;
		var pass_err=false;
		var pass='';
		for (var i = arr.length - 1; i >= 0; i--){
			test=$("#"+arr[i][0]);
			if (test.val().length>0) test.val(test.val().trim());
			var reg=0;
			if (arr[i][1]=='login') reg=test.val().search(/\w{2,}/);
			if (arr[i][1]=='text') reg=test.val().search(/\w{1,}/);
			if (arr[i][1]=='email') reg=test.val().search(/\w+@+\w+\.\w{2,5}/i);
			if (arr[i][1]=='pass'){
				reg=test.val().search(/\w{3,}/);
				if (pass=='') pass=test.val();
					else{
						if (pass!=test.val()){
							pass_err=true;
						}
					}
				}
			if (arr[i][1]=='email') reg=test.val().search(/\w{3,}/);
			if (test.val().length<1 || test.val()=="0" || reg==-1 || pass_err==true){
				test.css({"border":"1px red solid"})
				f=false;
			}
			else test.css({"border":"1px #ccc solid"});
		}
	if (f==true) return true;
	return false;
	});
}

//проверка регистрации
$('#adduser').try_press([['uname',"login"],['usubname',"login"],['uemail',"email"],['pass1',"pass"],['pass2',"pass"]]);
//проверка входа
$('#enter_but').try_press([['eemail',"email"],['epass',"pass"]]);
$('#addfeed').try_press([['femail',"email"],['fname',"login"],['feed',"text"]]);

})})(jQuery)