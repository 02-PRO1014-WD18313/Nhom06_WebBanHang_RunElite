<script>
  document.addEventListener("DOMContentLoaded", function () {
    // plain JavaScript for toggle sub menus
    var subBtns = document.querySelectorAll('.sub-btn');

    subBtns.forEach(function (subBtn) {
      subBtn.addEventListener('click', function () {
        var subMenu = this.nextElementSibling;

        if (subMenu.style.display === 'block') {
          subMenu.style.display = 'none';
        } else {
          subMenu.style.display = 'block';
        }

        var dropdownIcon = this.querySelector('.dropdown');
        dropdownIcon.classList.toggle('rotate');
      });
    });
  });
</script>