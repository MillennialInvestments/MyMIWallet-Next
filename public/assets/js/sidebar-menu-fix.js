(function () {
  // prevent double-binding
  if (window.__MYMI_SIDEBAR_MENU_FIX__) return;
  window.__MYMI_SIDEBAR_MENU_FIX__ = true;

  function log() {
    if (!window.MYMI_DEBUG_SIDEBAR) return;
    // eslint-disable-next-line prefer-rest-params
    console.log.apply(console, arguments);
  }

  // Delegate click so it works after AJAX/partial updates too
  document.addEventListener(
    'click',
    function (e) {
      var toggle = e.target.closest('.nk-menu-toggle');
      if (!toggle) return;

      // If toggle is inside a bootstrap collapse trigger etc, prevent it from collapsing sidebar
      e.preventDefault();
      e.stopPropagation();

      var item = toggle.closest('.nk-menu-item.has-sub');
      if (!item) return;

      var sub = item.querySelector('.nk-menu-sub');
      if (!sub) return;

      var isOpen = item.classList.contains('active');

      // Optional: close other open submenus at same level
      var parentUl = item.parentElement;
      if (parentUl) {
        parentUl.querySelectorAll(':scope > .nk-menu-item.has-sub.active').forEach(function (sib) {
          if (sib !== item) sib.classList.remove('active', 'current-page');
        });
      }

      // Toggle this one
      if (isOpen) {
        item.classList.remove('active', 'current-page');
        log('[sidebar] close', item);
      } else {
        item.classList.add('active');
        log('[sidebar] open', item);
      }
    },
    true // capture=true helps beat other bubbling handlers
  );
})();
