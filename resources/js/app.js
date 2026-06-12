const menuButton = document.getElementById('menu-button');
const aside = document.getElementById('aside');

if (menuButton && aside) {
    menuButton.addEventListener('click', () => {
        aside.classList.toggle('hidden');
    });
}

window.toggleTheme = function () {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.theme = isDark ? 'dark' : 'light';
}
