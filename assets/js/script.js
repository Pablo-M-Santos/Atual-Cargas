function setupMenuAndNavigation() {
    console.log("Função setupMenuAndNavigation chamada."); // Adicione isso para verificar se a função é chamada

    let menu = document.querySelector('#menu-icon');
    let navbar = document.querySelector('.navbar');

    if (menu && navbar) {
        menu.onclick = () => {
            console.log("Clique no ícone de menu."); // Adicione isso para verificar se o clique está sendo capturado
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('open');
        };
    }
}


// Chame as funções para configurar os diferentes elementos do DOM
document.addEventListener("DOMContentLoaded", function() {
    setupMenuAndNavigation();
    setupLoginButtons();
});

const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });