
const $mute = document.querySelector('.mute');
const $high = document.querySelector('.high');
const $pause =  document.querySelector('.pause');
const $play = document.querySelector('.play');
const $player = document.querySelector('.video-background');





$mute.addEventListener('click', function () {
    $player.muted = false;
    $mute.style.display = 'none';
    $high.style.display = 'flex';
});

$high.addEventListener('click', function () {
    $player.muted = true;
    $mute.style.display = 'flex';
    $high.style.display = 'none';
});

$pause.addEventListener('click', function () {
    $player.pause();
    $pause.style.display = 'none';
    $play.style.display = 'flex';
});

$play.addEventListener('click', function () {
    $player.play();
    $pause.style.display = 'flex';
    $play.style.display = 'none';
});

$(document).ready(function () {
  var minDate = new Date();
  $("#arrival").datepicker({
    showAnim: 'drop',
    numberOfMonths: 1,
    minDate: minDate,
    dateFormat: 'dd/mm/yy',
    onClose: function(selectedDate) {
      $("#depature").datepicker("option", "minDate", selectedDate);
    }
  });

  $("#depature").datepicker({
    showAnim: 'drop',
    numberOfMonths: 1,
    minDate: minDate,
    dateFormat: 'dd/mm/yy',
    onClose: function(selectedDate) {
      $("#arrival").datepicker("option", "maxDate", selectedDate);
    }
  });
});

window.addEventListener('DOMContentLoaded', function() {
  var elements = document.querySelectorAll('body *');
  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    var classNames = element.className.split(' ');

    if (
      classNames.indexOf('search-bar') === -1 &&
      classNames.indexOf('container') === -1 &&
      classNames.indexOf('input') === -1 &&
      classNames.indexOf('reservations') === -1 &&
      classNames.indexOf('cart-icon') === -1 &&
      !element.classList.contains('search-bar') &&
      !element.classList.contains('container') &&
      !element.classList.contains('input') &&
      !element.classList.contains('reservations') &&
      !element.classList.contains('cart-icon')
    ) {
      element.classList.add('no-overflow');
    }
  }
});
