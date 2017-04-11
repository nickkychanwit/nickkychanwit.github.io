var address = {houseNumber:"xx",street:"",city:"", province:"", zipcode:00000};
var phoneNumber = "+6612-123-1234" ;
var cellPhoneNumber= "+6612-123-1234";  
var birthday = "DD/MM/YY";
var citizenshipNumber="0123456789012";
var zodiacSign = "";
var zodiacYear = "";
var birthDayOfWeek = "moday";
var person={firstName:"",lastName:""};
function loadpage(){
	document.getElementById("fname").value = person.firstName;
	document.getElementById("lname").value = person.lastName;
	document.getElementById("hNumber").value = address.houseNumber;
	document.getElementById("street").value = address.street;
	document.getElementById("city").value = address.city;
	document.getElementById("province").value = address.province;
	document.getElementById("zipcode").value = address.zipcode;
	document.getElementById("p1number").value = phoneNumber.substr(1,4);
	document.getElementById("p2number").value = phoneNumber.substr(6,3);
	document.getElementById("p3number").value = phoneNumber.substr(10,4);
	document.getElementById("c1number").value = cellPhoneNumber.substr(1,4);
	document.getElementById("c2number").value = cellPhoneNumber.substr(6,3);
	document.getElementById("c3number").value = cellPhoneNumber.substr(10,4);
	document.getElementById("day").value = birthday.substr(0,2);
	document.getElementById("mount").value = birthday.substr(3,2);
	document.getElementById("year").value = birthday.substr(6,4);
	document.getElementById("citizenshipnumber").value=citizenshipNumber;
	document.getElementById("zodiacsign").value = zodiacSign;
	document.getElementById("zodiacyear").value = zodiacYear;
	document.getElementById("bdofweek").value = birthDayOfWeek;
	if (typeof(Storage) !== "undefined" ) {
	if(localStorage.length!=0){
	document.getElementById("fname").value =  localStorage.getItem("fname");
	document.getElementById("lname").value =  localStorage.getItem("lname");
	document.getElementById("hNumber").value =  localStorage.getItem("hNumber");
	document.getElementById("street").value =  localStorage.getItem("street");
	document.getElementById("city").value = localStorage.getItem("city");
	document.getElementById("province").value =  localStorage.getItem("province");
	document.getElementById("zipcode").value =  localStorage.getItem("zipcode");
	document.getElementById("p1number").value =  localStorage.getItem("p1number");
	document.getElementById("p2number").value =  localStorage.getItem("p2number");
	document.getElementById("p3number").value =  localStorage.getItem("p3number");
	document.getElementById("c1number").value =  localStorage.getItem("c1number");
	document.getElementById("c2number").value =  localStorage.getItem("c2number");
	document.getElementById("c3number").value = localStorage.getItem("c3number");
	document.getElementById("day").value =  localStorage.getItem("day");
	document.getElementById("mount").value =  localStorage.getItem("mount");
	document.getElementById("year").value = localStorage.getItem("year");
	document.getElementById("citizenshipnumber").value= localStorage.getItem("citizenshipnumber");
	document.getElementById("zodiacsign").value =  localStorage.getItem("zodiacsign");
	document.getElementById("zodiacyear").value =  localStorage.getItem("zodiacyear");
	document.getElementById("bdofweek").value =  localStorage.getItem("bdofweek");
	}
	}
} 
function cancel(){
	document.getElementById("fname").value = "";
	document.getElementById("lname").value = "";
	document.getElementById("hNumber").value = "";
	document.getElementById("street").value = "";
	document.getElementById("city").value = "";
	document.getElementById("province").value = "";
	document.getElementById("zipcode").value = "";
	document.getElementById("p1number").value = "";
	document.getElementById("p2number").value = "";
	document.getElementById("p3number").value = "";
	document.getElementById("c1number").value = "";
	document.getElementById("c2number").value = "";
	document.getElementById("c3number").value = "";
	document.getElementById("day").value = "";
	document.getElementById("mount").value = "";
	document.getElementById("year").value = "";
	document.getElementById("citizenshipnumber").value="";
	document.getElementById("zodiacsign").value = "";
	document.getElementById("zodiacyear").value = "";
	document.getElementById("bdofweek").value = "";	
}
function setCookie() {

	person.firstName =document.getElementById("fname").value;
	 person.lastName =document.getElementById("lname").value ;
	 address.houseNumber = document.getElementById("hNumber").value ;
	 address.street =document.getElementById("street").value ;
	  address.city = document.getElementById("city").value;
	 address.province = document.getElementById("province").value;
	address.zipcode =document.getElementById("zipcode").value ;
	phoneNumber = "+"+document.getElementById("p1number").value+"-"+
	document.getElementById("p2number").value+"-"+
	document.getElementById("p3number").value;
	cellPhoneNumber ="+"+document.getElementById("c1number").value+"-"+
	document.getElementById("c2number").value+"-"+
	document.getElementById("c3number").value;
	birthday = document.getElementById("day").value+"/"+
	document.getElementById("mount").value+"/"+
	document.getElementById("year").value;
	citizenshipNumber=document.getElementById("citizenshipnumber").value;
	zodiacSign=document.getElementById("zodiacsign").value ;
	zodiacYear=document.getElementById("zodiacyear").value ;
	birthDayOfWeek=document.getElementById("bdofweek").value ;
	

    var d = new Date();
    d.setTime(d.getTime() + (30*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
	document.cookie="firstname=" + person.firstName+ ";" + expires + ";path=/";
	document.cookie="lastname=" + person.lastName+ ";" + expires + ";path=/";
	document.cookie="housenumber=" + address.houseNumber+ ";" + expires + ";path=/";
	document.cookie="street=" + address.street+ ";" + expires + ";path=/";
	document.cookie="city=" + address.city+ ";" + expires + ";path=/";
	document.cookie="province=" + address.province+ ";"  + expires + ";path=/";
	document.cookie="zipcode=" + address.zipcode+ ";" + expires + ";path=/";
	document.cookie="phoneNumber=" + phoneNumber+ ";" + expires + ";path=/";
	document.cookie="cellPhoneNumber=" + cellPhoneNumber+ ";"   + expires + ";path=/";
	document.cookie="birthDay=" + birthday+ ";" + expires + ";path=/";
	document.cookie="citizenshipNumber=" + citizenshipNumber+ ";"  + expires + ";path=/";
	document.cookie="zodiacsign=" + zodiacSign+ ";" + expires + ";path=/";
	document.cookie="zodiacyear=" + zodiacYear+ ";" + expires + ";path=/";
	document.cookie="bdOfWeek=" + birthDayOfWeek+ ";" + expires + ";path=/";
	 alert(person.firstName+" "+ person.lastName+"\n"+citizenshipNumber);
}

function getCookie() {
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for(var i = 0; i < ca.length; i++){
        var c = ca[i];
		while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
		if(c.search("firstname=") != -1){
					person.firstName = c.substr("firstname=".length,c.lenght);
					}
		else if(c.search("lastname=")!= -1){
			person.lastName = c.substr("lastname=".length,c.lenght);
			}
		else if(c.search("housenumber=")!= -1){
			address.houseNumber = c.substr("housenumber=".length,c.lenght);
			}
		else if(c.search("street=") != -1){
			address.street = c.substr("street=".length,c.lenght);
			}
		else if(c.search("city=") != -1){
			address.city = c.substr("city=".length,c.lenght);
			}
		else if(c.search("province=") != -1){
			address.province = c.substr("province=".length,c.lenght);
		}
		else if(c.search("zipcode=") != -1){
			address.zipcode = c.substr("zipcode=".length,c.lenght);
			}
		else if(c.search("phoneNumber=") != -1){
			phoneNumber = c.substr("phoneNumber=".length,c.lenght);}
		else if(c.search("cellPhoneNumber=") != -1){
			cellPhoneNumber = c.substr("cellPhoneNumber=".length,c.lenght);}
		else if(c.search("birthDay=") != -1){
			birthday = c.substr("birthDay=".length,c.lenght);}
		else if(c.search("citizenshipNumber=") != -1){
			citizenshipNumber = c.substr("citizenshipNumber=".length,c.lenght);}
		else if(c.search("zodiacsign=")!= -1){
			zodiacSign = c.substr("zodiacsign=".length,c.lenght);}
		else if(c.search("zodiacyear=") != -1){
			zodiacYear = c.substr("zodiacyear=".length,c.lenght);}
		else if(c.search("bdOfWeek=") != -1){
			birthDayOfWeek = c.substr("bdOfWeek=".length,c.lenght);}
	}
	return person.firstName;
}
function checkCookie() {
	if(getCookie()!=""){}
	else{};
	loadpage();
}
function submitdata() {
	setCookie();
	getCookie();
	location.href = "Untitled-2.HTML";
}
function save() {
	 
	if (typeof(Storage) !== "undefined") {
		

    // Store
    localStorage.setItem("fname", document.getElementById("fname").value);
	localStorage.setItem("lname", document.getElementById("lname").value);
	localStorage.setItem("hNumber", document.getElementById("hNumber").value);
	localStorage.setItem("city", document.getElementById("city").value);
	localStorage.setItem("province", document.getElementById("province").value);
	localStorage.setItem("zipcode", document.getElementById("zipcode").value);
	localStorage.setItem("p1number", document.getElementById("p1number").value);
	localStorage.setItem("p2number", document.getElementById("p2number").value);
	localStorage.setItem("p3number", document.getElementById("p3number").value);
	localStorage.setItem("c1number", document.getElementById("c1number").value);
	localStorage.setItem("c2number", document.getElementById("c2number").value);
	localStorage.setItem("c3number", document.getElementById("c3number").value);
	localStorage.setItem("day", document.getElementById("day").value);
	localStorage.setItem("mount", document.getElementById("mount").value);
	localStorage.setItem("citizenshipnumber", document.getElementById("citizenshipnumber").value);
	localStorage.setItem("zodiacsign", document.getElementById("zodiacsign").value);
	localStorage.setItem("zodiacyear", document.getElementById("zodiacyear").value);
	localStorage.setItem("bdofweek", document.getElementById("bdofweek").value);
    // Retrieve
	} 
}
function loadtablecookie(){
	getCookie();
	document.getElementById("fname1").innerHTML = person.firstName;
	document.getElementById("lname1").innerHTML = person.lastName;
	document.getElementById("hNumber1").innerHTML = address.houseNumber;
	document.getElementById("street1").innerHTML = address.street;
	document.getElementById("city1").innerHTML = address.city;
	document.getElementById("province1").innerHTML = address.province;
	document.getElementById("zipcode1").innerHTML = address.zipcode;
	document.getElementById("phonenumber1").innerHTML = phoneNumber;
	document.getElementById("cellphonenumber1").innerHTML = cellPhoneNumber;
	document.getElementById("birthday1").innerHTML = birthday;
	document.getElementById("citizenshipnumber1").innerHTML=citizenshipNumber;
	document.getElementById("zodiacsign1").innerHTML = zodiacSign;
	document.getElementById("zodiacyear1").innerHTML = zodiacYear;
	document.getElementById("bdofweek1").innerHTML = birthDayOfWeek;
	
	}