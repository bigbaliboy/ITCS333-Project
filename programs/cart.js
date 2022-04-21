const searchBar = document.querySelector('input[type="search"]');
const nav = document.querySelector('ul[class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center"]');
var remove = document.getElementsByClassName("bx bx-cart-alt");
const quant = document.querySelectorAll('input[type="number"]');
var span = document.getElementsByTagName('span');
totalPrice = span[span.length - 1];

const xhttp = new XMLHttpRequest();
searchBar.addEventListener('keyup', function() {
    var search = searchBar.value;
    xhttp.onload = function() {
        navLoad();
        // menu.innerHTML = this.responseText;
    }
    xhttp.open("GET", 'menu.php?search=' + search);
    xhttp.send();
});

window.addEventListener('load', function() {
    xhttp.onload = function() {
        
        Array.from(remove).forEach(function(element) {
            const xHttp = new XMLHttpRequest();
            element.addEventListener('click', () => {
                xHttp.onload = function() {
                    alert(this.responseText);
                    window.location.reload();
                }
                xHttp.open("GET", `showCart.php?remove=${element.parentElement.firstChild.innerText.split('\n')[0]}`);
                xHttp.send();
            });
        });
        price();
        Array.from(quant).forEach(function(element) {
            element.addEventListener('change', () => {
                const xht = new XMLHttpRequest();
                xht.onload = function() {
                    price();
                }
                xht.open('GET', 'cart.php?quantity=' + element.value + '&key=' + element.parentElement.parentElement.firstChild.innerText.split('\n')[0]);
                xht.send();
            })
        });
    }
    xhttp.open("GET", 'showCart.php');
    xhttp.send();
});

const price = function() {
    var price = 0.0;
    Array.from(quant).forEach(function(element) {
        var elementPrice = element.parentElement.parentElement.firstChild.innerText.split('\n')[1].split(" ")[1];

        price += +element.value * elementPrice;
    });
    totalPrice.innerText = "Total price = BD " + price.toFixed(3);
}


const navLoad = function() {
    search = searchBar.value;
    const XHttp = new XMLHttpRequest();
    XHttp.onload = function() {
        nav.innerHTML = this.responseText;
    }
    XHttp.open("POST", 'menu.php');
    XHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    XHttp.send('nav=' + search);
}