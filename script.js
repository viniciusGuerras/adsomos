const mainImage = document.getElementById('main-image');
const colorOptionsDiv = document.querySelector('.color-options');
const thumbs = document.querySelectorAll('.thumb');
const tabs = document.querySelectorAll('.tab-title');
const contents = document.querySelectorAll('.tab-content');
const selectedColor = document.getElementById('selected-color');
const hamburguerMenu = document.querySelector('.navbar-hamburger');
const drawerMenu = document.querySelector('.drawer-menu');
const quantityCounter = document.getElementById('quantity');

const maxQuantity = 20;
const desktopBreakpoint = 768;

window.addEventListener('resize', () => {
    if (window.innerWidth > desktopBreakpoint) {
        drawerMenu.classList.add('toggled-hidden');
    }
});
hamburguerMenu.addEventListener('click', () => {
    const sets = new Set(drawerMenu.classList);
    if (sets.has("toggled-hidden")) {
        drawerMenu.classList.remove("toggled-hidden");
    }
    else {
        drawerMenu.classList.add("toggled-hidden");
    }
})

for (let i = 0; i < maxQuantity; i++) {
    const opt = document.createElement('option');
    opt.value = i;
    opt.textContent = i
    quantityCounter.appendChild(opt);
}

tabs.forEach((tab, idx) => {
    tab.addEventListener('click', () => {
        const wasActive = tab.classList.contains('active');

        tabs.forEach(t => {
            t.classList.remove('active');
            const existingIcon = t.querySelector('i');
            if (existingIcon) existingIcon.remove();

            const rightIcon = document.createElement('i');
            rightIcon.classList.add('fa-solid', 'fa-angle-right');
            t.appendChild(rightIcon);
        });

        if (wasActive){
            contents.forEach(c => c.classList.add('toggled-hidden'));
            return;
        }

        tab.classList.add('active');

        const existingIcon = tab.querySelector('i');
        if (existingIcon) existingIcon.remove();

        const downIcon = document.createElement('i');
        downIcon.classList.add('fa-solid', 'fa-chevron-down');
        tab.appendChild(downIcon);

        contents.forEach(c => c.classList.add('toggled-hidden'));
        const targetContent = document.getElementById(tab.dataset.target);
        if (targetContent) targetContent.classList.remove('toggled-hidden');

    });
});

thumbs.forEach(thumb => {
    thumb.addEventListener('click', () => {
        mainImage.src = thumb.src;
        thumbs.forEach(t => t.classList.remove('active-thumb'));
        thumb.classList.add('active-thumb');
    });
});

colorOptionsDiv.addEventListener('click', (e) => {
    const label = e.target.closest('label');
    if (!label) return;
    selectedColor.innerHTML = label.dataset.color;
    colorOptionsDiv.querySelectorAll('label').forEach(l => l.classList.remove('selected'));
    label.classList.add('selected');
    console.log("Selected color:", label.dataset.color);
});