const mainImage = document.getElementById('main-image');
const colorOptionsDiv = document.querySelector('.color-options');
const thumbs = document.querySelectorAll('.thumb');
const tabs = document.querySelectorAll('.tab-title');
const contents = document.querySelectorAll('.tab-content');

const selectedColor = document.getElementById('selected-color');

const maxQuantity = 20;
const quantityCounter = document.getElementById('quantity');

for(let i = 0; i < maxQuantity; i++){
    const opt = document.createElement('option');
    opt.value = i;
    opt.textContent = i
    quantityCounter.appendChild(opt);
}

tabs.forEach((tab, idx) => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        contents.forEach(c => c.classList.add('toggled-hidden'));

        const targetId = tab.dataset.target;
        const targetContent = document.getElementById(targetId);
        if (targetContent) targetContent.classList.remove('toggled-hidden');
    });
    if (idx == 0) {
        tab.classList.add('active');
        contents[0].classList.remove('toggled-hidden');
    };
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