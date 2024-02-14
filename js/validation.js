document.addEventListener("DOMContentLoaded", function() {

    function validateForm() {
        const usernameAlert    = document.getElementById("nameError");
        const passwordAlert    = document.getElementById("passError");

        const userField = document.getElementById('inputUserName');
        const passField = document.getElementById('inputPassword');

      
          // Basic validation
        if (userField.value.trim() === '') {
            usernameAlert.style.display = 'block';
            userField.addEventListener("blur", () => {
                userField.style.display = 'unset';
                userField.style.borderColor = 'red';
                userField.required = true;
            });
        }
        else {
            usernameAlert.style.display = 'none';
            userField.addEventListener("blur", () => {
                userField.style.display = 'unset';
                userField.style.borderColor = '#ced4da';
                userField.required = true;
            });
        }


        if(passField.value.trim() === ''){
            passwordAlert.style.display = 'block';
            passField.addEventListener("blur", () => {
                passField.style.display = 'unset';
                passField.style.borderColor = 'red';
                passField.required = true;
            });
        }
        else
        {  
            passwordAlert.style.display = 'none';

            passField.addEventListener("focus", () => {
                passField.style.display = 'unset';
                passField.style.borderColor = 'black';
                passField.required = true;
            });

            passField.addEventListener("blur", () => {
                passField.style.display = 'unset';
                passField.style.borderColor = '#ced4da';
                passField.required = true;
            });
          
        }
    }
    
    const formLogin = document.getElementById('form-login');

    if(formLogin != null && formLogin != undefined){

        formLogin.addEventListener('change', function(event){
            validateForm();
        });

        formLogin.addEventListener('keydown', function(event){
            if(event.keyCode == 9 || event.key == "Tab"){
                validateForm();
            }
        });

    }


    function validation_email(){
        var email = document.getElementById('email').value;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(emailReg.test(email)){
            return true;
        }else{
            return false;
        }
    }
});
