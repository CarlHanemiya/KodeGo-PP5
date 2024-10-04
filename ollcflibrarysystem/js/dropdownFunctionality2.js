document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.querySelector('.dropdown');
    var dropdownBtn = dropdown.querySelector('.dropdown-btn');
    var dropdownContent = dropdown.querySelector('.dropdown-content');

    dropdownBtn.addEventListener('click', function () {
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        dropdown.classList.toggle('active-dropdown');
    });

    var dropdown2 = document.querySelector('.dropdown-BM');
    var dropdownBtn2 = dropdown2.querySelector('.dropdown-btn-BM');
    var dropdownContent2 = dropdown2.querySelector('.dropdown-content-BM');

    dropdownBtn2.addEventListener('click', function () {
        dropdownContent2.style.display = dropdownContent2.style.display === 'block' ? 'none' : 'block';
        dropdown2.classList.toggle('active-dropdown-BM');
    });
});