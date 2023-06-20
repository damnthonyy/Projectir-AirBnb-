const radioButtons = document.querySelectorAll('input[type="radio"][name="gender"]');
let previousChecked = null;

radioButtons.forEach(radioButton => {
    radioButton.addEventListener('click', function() {
        if (this !== previousChecked) {
            previousChecked = this;
        } else {
            this.checked = false; 
            previousChecked = null;
        }
    });
});