const firstName = document.querySelector('#firstName')
const lastName = document.querySelector('#lastName')
const email = document.querySelector('#email')
const password = document.querySelector('#password')
const confirmPassword = document.querySelector('#confirmPassword')
const mobilePhone = document.querySelector('#mobilePhone')
const form = document.querySelector('form')
    // const btn = document.querySelector('button');


function showError(input, msg) {
    // const formControl = input.parentElement;
    // formControl.className = 'form-control error';
    input.setAttribute("style", "border-width: 3px; border-color: red");
    const small = input.nextElementSibling
    small.innerText = msg
}


function showSuccess(input) {
    input.setAttribute("style", "border-width: 3px; border-color: green");
    const small = input.nextElementSibling
    small.innerText = ""
        // const formControl = input.parentElement;
        // formControl.className = 'form-control success';
}

function checkNames(input) {
    let wrongInput = 0;
    const pattern = /^[a-zA-Z]{3,20}$/
    if (pattern.test(input.value.trim())) {
        showSuccess(input)
    } else {
        showError(input, "Invalid Name Input (3-20 characters)")
        wrongInput++
    }

    return wrongInput
}

function checkEmail(input) {
    let wrongInput = 0;
    const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if (pattern.test(input.value.trim())) {
        showSuccess(input)
    } else {
        showError(input, "Invalid Email Input (should contain @ and . )")
        wrongInput++
    }

    return wrongInput
}


function checkPassword(input) {
    let wrongInput = 0;
    const pattern = /^(?=.*\d)(?=.*[!@#$%^&*]*)(?=.*[a-z]+)(?=.*[A-Z]+).{5,}$/
    if (pattern.test(input.value.trim())) {
        showSuccess(input)
    } else {
        showError(input, "Invalid Password Input (atleast 5 character 1 capital letter, 1 small letter, 1 number)")
        wrongInput++
    }

    return wrongInput
}

function checkNumber(input) {
    let wrongInput = 0;
    const pattern = /^[3]{1}[0-9]{7}$/
    if (pattern.test(input.value.trim())) {
        showSuccess(input)
    } else {
        showError(input, "Invalid Mobile Number Input (should be 8 number digits)")
        wrongInput++
    }

    return wrongInput
}

function samePasswords(passwordOne, passwordTwo) {
    if (passwordOne.value !== passwordTwo.value) {
        showError(passwordTwo, "Password Don't Match")
        return 1;
    } else if (passwordOne.value === passwordTwo.value) {
        showSuccess(passwordTwo);
        return 0;
    }

}

form.addEventListener('submit', function(e) {
    e.preventDefault();
    let count = 0;
    count += checkNames(firstName)
    count += checkNames(lastName)
    count += checkEmail(email)
    count += checkPassword(password)
    count += samePasswords(password, confirmPassword)
    count += checkNumber(mobilePhone)

    console.log(count)
    if (count == 0) {
        form.submit()
    }
})