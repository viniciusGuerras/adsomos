const mainImage = document.getElementById('main-image');
const colorOptionsDiv = document.querySelector('.color-options');

const colors = [
    ["Bege estranho", "#B0A18F"],
    ["Titânio", "#FFFFFF"],
    ["outro1", "#784242"],
    ["outro2", "#2e2e36"],
    ["terceiro", "#8d4050ff"]
];

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
    if (idx == 0) {
        tab.classList.add('active');
        contents[0].classList.remove('toggled-hidden');
    };
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        contents.forEach(c => c.classList.add('toggled-hidden'));

        const targetId = tab.dataset.target;
        const targetContent = document.getElementById(targetId);
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

colors.forEach(([name, hex], idx) => {
    const label = document.createElement('label');
    label.classList.add('color-swatch');
    label.dataset.color = name;
    label.style.backgroundColor = hex;

    const input = document.createElement('input');
    input.type = 'radio';
    input.name = 'color';
    input.value = name;
    input.style.display = 'none';

    label.appendChild(input);
    colorOptionsDiv.appendChild(label);

    if (idx === 0) {
        selectedColor.innerHTML = name;
        label.classList.add('selected');
        input.checked = true;
    }
});

colorOptionsDiv.addEventListener('click', (e) => {
    const label = e.target.closest('label');
    if (!label) return;
    selectedColor.innerHTML = label.dataset.color;
    colorOptionsDiv.querySelectorAll('label').forEach(l => l.classList.remove('selected'));
    label.classList.add('selected');
    console.log("Selected color:", label.dataset.color);
});