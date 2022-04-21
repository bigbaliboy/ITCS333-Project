const email = document.querySelector('#email');
const password = document.querySelector('#password');
const form = document.querySelector('form');
const submit = document.querySelector('input[type="submit"]');
const btn = document.querySelector('button');

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


form.addEventListener('submit', function(e) {
    e.preventDefault();
    let count = 0;
    count += checkEmail(email)
    count += checkPassword(password)
    console.log(count);
    if (count == 0) {
        form.submit();
    }
})