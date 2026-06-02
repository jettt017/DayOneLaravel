const menuButton = document.getElementById('menu-button');
const aside = document.getElementById('aside');

if (menuButton && aside) {
    menuButton.addEventListener('click', () => {
        aside.classList.toggle('hidden');
    });
}

// Dark Mode Toggle Logic
const themeToggleBtn = document.getElementById('theme-toggle');
const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Sync icons based on the current active theme
if (themeToggleDarkIcon && themeToggleLightIcon) {
    if (document.documentElement.classList.contains('dark')) {
        themeToggleLightIcon.classList.remove('hidden');
        themeToggleDarkIcon.classList.add('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
        themeToggleLightIcon.classList.add('hidden');
    }
}

if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', function () {
        // Toggle the dark class on root html element
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            if (themeToggleDarkIcon && themeToggleLightIcon) {
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
            }
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            if (themeToggleDarkIcon && themeToggleLightIcon) {
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
            }
        }
    });
}
