const $OpenBtn = document.querySelector('.menu-search .menu .icn');
const $CloseBtn = document.querySelector('.menu-items .icon .icn');
const $menuItems = document.querySelector('.menu-items');

$OpenBtn.addEventListener('click', function () {
  $menuItems.style.left = 0;
});
$CloseBtn.addEventListener('click', function () {
  $menuItems.style.left = "-100%";
});

const $reservInfo = document.querySelector('.reserv_info');

window.addEventListener('scroll', function() {
   const $imagesContainer = document.querySelector('.reserv_img');
   const $scrollPosition = window.scrollY + window.innerHeight;
   const $imagesContainerBottom = $imagesContainer.offsetTop + $imagesContainer.offsetHeight;

   if ($scrollPosition >= $imagesContainerBottom) {
      $reservInfo.classList.remove('fixed');
   } else {
      $reservInfo.classList.add('fixed');
   }
});
