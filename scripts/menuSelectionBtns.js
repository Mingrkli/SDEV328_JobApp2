const menuSelectionBtns = document.querySelectorAll('#menu-selection button');

menuSelectionBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Reset
        menuSelectionBtns.forEach(btns => {
            btns.classList.remove('show');
            document.querySelector(`#${btns.value}`).classList.remove('show');
        })

        btn.classList.add('show');
        document.querySelector(`#${btn.value}`).classList.add('show');
    })
});