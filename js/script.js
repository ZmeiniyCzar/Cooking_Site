let counter = 0;

function valid(){
    let form = document.querySelector('.formRegistration')
    let search = form.querySelectorAll('.search')
    let errors = form.querySelectorAll('.error');
    let password = form.querySelector('.search--password')
    let passwordConfirmation= form.querySelector('.search--password-confirmation')
    let flag =true

    if(errors){
        for(let i=0; i<errors.length; i++){
            errors[i].remove()
            flag = false
        }
    }

    for(let i=0;i<search.length;i++){
        if(!search[i].value)
        {
            let error = document.createElement('div')
            error.className = 'error'
            error.style.color = 'red'
            error.innerHTML = 'Заполните поле'
            form[i].parentElement.insertBefore(error, search[i])
            flag = false
        }
    }

    if(password.value != passwordConfirmation.value){
        let error = document.createElement('div')
        error.className = 'error'
        error.style.color = 'red'
        error.innerHTML = 'Пароль не совпадает'
        password.parentElement.insertBefore(error, password)
        flag =false
    }
    if(flag){
        alert("Регистрация прошла успешна")
        // let error = document.createElement('div')
        // error.className = 'error'
        // error.style.color = 'red'
        // error.innerHTML = 'Регистрация прошла успешна '
        // password.parentElement.insertBefore(error, form.querySelector('.button--addrecipe'))
    }
}

function updateLike(val) {
    document.getElementById("label").innerHTML = val;
}
function incrementClick() {
    updateLike(++counter);
}
function closeSection(){
    let content;
    content = document.getElementsByClassName("content");
    for (i = 0; i < content.length; i++) {
        content[i].style.display = "none";
    }
    document.body.style.position = '';
    document.body.style.top = '';
}
function openSection(idSection) {
    closeSection();
    document.getElementById(idSection).style.display = "block";
    document.body.style.position = 'fixed';
    document.body.style.top = `-${window.scrollY}px`;
}

