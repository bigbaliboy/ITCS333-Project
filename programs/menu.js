const searchBar = document.querySelector('input[type="search"]');
const menu = document.querySelector('.menu');
const nav = document.querySelector('ul[class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center"]');
// var remove = document.getElementsByClassName("fas fa-cart-plus bx");
var remove = document.getElementsByClassName("bx bx-cart-alt");

const xhttp = new XMLHttpRequest();
searchBar.addEventListener('keyup', function () {
    var search = searchBar.value;
    xhttp.onload = function () {
        navLoad();
        menu.innerHTML = this.responseText;
        loadThings();
    }
    xhttp.open("GET", 'menu.php?search=' + search);
    xhttp.send();
});

window.addEventListener('load', function () {
    xhttp.onload = function () {
        menu.innerHTML = xhttp.responseText;
        addToCart();
        }
    xhttp.open("GET", 'menu.php');
    xhttp.send();
});

const addToCart = function () {
        Array.from(remove).forEach(function (element) {
            // console.log(element);
            const xHttp = new XMLHttpRequest();
            element.addEventListener('click', () => {
                xHttp.onload = function () {
                    if (this.responseText == "Already in cart")
                        alert(this.responseText);
                    // console.log(this.responseText);
                }
                xHttp.open("GET", `cart.php?item=${element.parentElement.firstChild.innerText.split('\n')[0]}&quantity=${element.parentElement.children[2].value}`);
                // xHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xHttp.send();
            });
        });
    
}



const navLoad = function () {
    search = searchBar.value;
    const XHttp = new XMLHttpRequest();
    XHttp.onload = function () {
        nav.innerHTML = this.responseText;
        // console.log(this.responseText);
    }
    XHttp.open("POST", 'menu.php');
    XHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    XHttp.send('nav=' + search);
}
