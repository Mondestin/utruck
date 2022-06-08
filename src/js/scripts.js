function checkPasswords() {
    var pass= $("#passA").val();
    var passR= $("#passR").val();
    if (pass==passR) {
    	alert("Les mots de pass ne correspondent pas");
    }
}