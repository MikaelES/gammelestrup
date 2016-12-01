// menu toggle

$(document).ready(function() {
  $('body').addClass('js');
  var $menu = $('#menu'),
    $menulink = $('.menu-link');
  
$menulink.click(function() {
  $menulink.toggleClass('active');
  $menu.toggleClass('active');
  return false;
});});


// isotope

// Unloaded images can throw off Isotope layouts and cause item elements to overlap. 
// imagesLoaded resolves this issue.

// http://isotope.metafizzy.co/layout.html#imagesloaded

// var $grid = $('.grid').imagesLoaded( function() {
//   $grid.isotope({
//     itemSelector: '.grid-item',
//     percentPosition: true,
//     masonry: {
//       columnWidth: '.grid-sizer'
//     }
//   });
// });

// Select dropdowns
// http://codetheory.in/strategies-for-select-dropdown-lists-placeholder/



$('select').on('change', function() {
var el = $(this);
el.toggleClass('unselected', !el.val());
}).change();


// tooltip
  var showingTooltip;

    document.onmouseover = function(e) {
      var target = e.target;

      var tooltip = target.getAttribute('data-tooltip');
      if (!tooltip) return;

      var tooltipElem = document.createElement('div');
      tooltipElem.className = 'tooltip';
      tooltipElem.innerHTML = tooltip;
      document.body.appendChild(tooltipElem);

      var coords = target.getBoundingClientRect();

      var left = coords.left + (target.offsetWidth - tooltipElem.offsetWidth) / 2;
      if (left < 0) left = 0; // не вылезать за левую границу окна

      var top = coords.top - tooltipElem.offsetHeight - 5;
      if (top < 0) { // не вылезать за верхнюю границу окна
        top = coords.top + target.offsetHeight + 5;
      }

      tooltipElem.style.left = left + 'px';
      tooltipElem.style.top = top + 'px';

      showingTooltip = tooltipElem;
    };

    document.onmouseout = function(e) {

      if (showingTooltip) {
        document.body.removeChild(showingTooltip);
        showingTooltip = null;
      }

    };



