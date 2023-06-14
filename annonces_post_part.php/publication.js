var currentPage = localStorage.getItem('currentPage') || 1;
var formValues = JSON.parse(localStorage.getItem('formValues')) || {};

window.addEventListener('DOMContentLoaded', function() {
    restoreFormValues();
    updatePageDisplay();
});

function nextPage() {
    if (currentPage < document.querySelectorAll('.page.fade-in').length) {
        saveFormValues();
        currentPage++;
        localStorage.setItem('currentPage', currentPage);
        updatePageDisplay();
        backButton.style.display = '';
    }
}

function previousPage() {
    if (currentPage > 1) {
        saveFormValues();
        currentPage--;
        localStorage.setItem('currentPage', currentPage);
        updatePageDisplay();
    }
}

function saveFormValues() {
    var inputs = document.querySelectorAll('.page.active input');
    inputs.forEach(function(input) {
        formValues[input.name] = input.value;
    });
    localStorage.setItem('formValues', JSON.stringify(formValues));
}

function restoreFormValues() {
    var inputs = document.querySelectorAll('.page input');
    inputs.forEach(function(input) {
        if (formValues.hasOwnProperty(input.name)) {
            input.value = formValues[input.name];
        }
    });
}

function updatePageDisplay() {
    var pages = document.querySelectorAll('.page.fade-in');
    for (var i = 0; i < pages.length; i++) {
        if (i + 1 == currentPage) {
            pages[i].classList.add('active');
        } else {
            pages[i].classList.remove('active');
        }
    }
}

function updateFileName(input) {
    const file = input.files[0];
    const label = input.nextElementSibling;

    if (file) {
        label.setAttribute('data-file-name', file.name);
    } else {
        label.setAttribute('data-file-name', 'Choisir un fichier');
    }
}

const selectImage = document.querySelectorAll('.select-image');
const inputs = document.querySelectorAll('input[type="file"]');
const imgAreas = document.querySelectorAll('.img-area');

selectImage.forEach(function(select, index) {
    select.addEventListener('click', function() {
        inputs[index].click();
    });

    inputs[index].addEventListener('change', function() {
        const image = this.files[0];
        const reader = new FileReader();
        reader.onload = () => {
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            imgAreas[index].innerHTML = '';
            imgAreas[index].appendChild(img);
            imgAreas[index].classList.add('active');
            imgAreas[index].dataset.img = image.name;
        };
        reader.readAsDataURL(image);
    });
});

var backButton = document.querySelector('.back-button');
