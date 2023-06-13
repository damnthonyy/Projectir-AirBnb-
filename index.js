const $OpenBtn = document.querySelector('.menu-search .menu .icn');
const $CloseBtn = document.querySelector('.menu-items .icon .icn');
const $menuItems = document.querySelector('.menu-items');

$OpenBtn.addEventListener('click', function () {
  $menuItems.style.left = 0;
});
$CloseBtn.addEventListener('click', function () {
  $menuItems.style.left = "-100%";
});
