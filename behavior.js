function validate_reg(){
var flag=true;

  //var email = document.getElementById("email").value;
  var email= document.forms["regForm"]["email"].value;
  if(email== ""){
  document.getElementById("errorEmail").innerHTML= "Please enter your email";
  flag=false;
  }else if(!email.includes('@') && !email.includes(".com") ){
  document.getElementById("errorEmail").innerHTML="Please enter a valid email";
  flag=false;
  }

  //The Name field should not be empty
  var name = document.forms["regForm"]["name"].value;
  if (name == "") {
  document.getElementById("errorName").innerHTML= "Please enter your name";
  flag=false;
  }

  //The pass and confirm pass fields should not be empty
  //pass must == pass conf
  var pass = document.forms["regForm"]["pass"].value;
  var passCon = document.forms["regForm"]["passCon"].value;

  if (passCon == "") {
  document.getElementById("errorPassCon").innerHTML= "Please confirm your password";
  flag=false;
}else if (pass != passCon) {
  document.getElementById("errorPassCon").innerHTML= "The two passwords doesn't match!";
  flag=false;
  }


  return flag;

}

function check(){
  var validate = validate_reg();
  if(validate == false){ // if there is some error in validation , change the action to be the same register page
    document.getElementById("regForm").action="register.html";
  }


return validate;
}
