function validatefirstname(){
    var firstName=document.forms["registrationForm"]["fname"].value;
    var firstNamePattern=/[a-zA-Z]+$/;
    var firstNameTest=firstName.match(firstNamePattern);
    
    if(firstName.trim()==""){
        document.getElementById("firstNameErr").innerHTML="This filed must be entered";
    }
    else if(!firstNameTest){
        document.getElementById("firstNameErr").innerHTML="Please enter a valid  first name";
    }else{
        document.getElementById("firstNameErr").innerHTML="";
        console.log("hello");
    }
}
function validatelastname(){
    var lastName=document.forms["registrationForm"]["lname"].value;
    var lastNamePattern=/[a-zA-Z]+$/;
    var lastNameTest=lastName.match(lastNamePattern);
    
    if(lastName.trim()==""){
        document.getElementById("lastNameErr").innerHTML="This filed must be entered";
    }
    else if(!lastNameTest){
        document.getElementById("lastNameErr").innerHTML="Please enter a valid  first name";
    }else{
        document.getElementById("lastNameErr").innerHTML="";
        console.log("hello");
    }
}
function valideAccountBS(){
    if(document.getElementById("buyer").checked == true){
        document.getElementById("selectErr").innerHTML="";
        console.log("hello");
    } else if(document.getElementById("seller").checked == true){
        document.getElementById("selectErr").innerHTML="";
        console.log("hello");
    }else{
        document.getElementById("selectErr").innerHTML="Select one";
    }
}
function check () {
    if (document.getElementById('password').value ==
      document.getElementById('confirmpassword').value) {
     
      document.getElementById('confirmpasswordErr').innerHTML ='matched';
      
    } else {
      
      document.getElementById('confirmpasswordErr').innerHTML ='not matched';
    }
  }