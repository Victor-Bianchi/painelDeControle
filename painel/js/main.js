var open = true;
var windowSize = window.innerWidth;
var menuBtn = document.getElementById('menu-btn');
var aside = document.getElementById('aside');
var header = document.getElementsByTagName('header')[0];
var content = document.getElementById('content');

if(windowSize <= 1000) {
    closeMenu();
} else {
    openMenu();
}

function closeMenu() {
    aside.style.display = 'none';
    header.style.width = '100%';
    header.style.position = 'static';
    content.style.width = '100%';
    content.style.position = 'static';
    open = false;
}

function openMenu() {
    aside.style.display = 'inline-block';
        header.style.width = '85%';
        header.style.position = 'relative';
        content.style.width = '85%';
        content.style.position = 'relative';
        open = true;
}

menuBtn.addEventListener('click', () => {
    if(open)
        closeMenu();
    else 
        openMenu();
})