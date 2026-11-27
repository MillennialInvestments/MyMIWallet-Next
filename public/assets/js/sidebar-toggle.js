/*
 * Dashboard sidebar show/hide.
 * The arrow in the sidebar head hid nothing: it pointed a Bootstrap collapse
 * at a sidebar that never had the "collapse show" classes, and once hidden
 * there was no way to bring the sidebar back. This toggles a body class
 * instead, remembers the choice, and shows a menu button to reopen it.
 */
(function () {
  'use strict';

  var KEY = 'mymi.sidebarCollapsed';
  var CLS = 'mymi-sidebar-collapsed';
  var DESKTOP = window.matchMedia ? window.matchMedia('(min-width: 992px)') : null;

  function read() {
    try { return window.localStorage.getItem(KEY) === '1'; } catch (e) { return false; }
  }

  function write(collapsed) {
    try { window.localStorage.setItem(KEY, collapsed ? '1' : '0'); } catch (e) { /* storage blocked */ }
  }

  function apply(collapsed) {
    document.body.classList.toggle(CLS, collapsed);
    var toggle = document.getElementById('mymiSidebarToggle');
    if (toggle) {
      toggle.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
    }
    var open = document.getElementById('mymiSidebarOpen');
    if (open) {
      open.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
    }
  }

  function isDesktop() {
    return !DESKTOP || DESKTOP.matches;
  }

  function hideMobileMenu() {
    var mobile = document.getElementById('sidebarMenu');
    if (mobile && window.bootstrap && window.bootstrap.Collapse) {
      window.bootstrap.Collapse.getOrCreateInstance(mobile, { toggle: false }).hide();
      return true;
    }
    return false;
  }

  // The desktop sidebar is a slide-over drawer below 992px (inline-fixes.css).
  function isDrawer() {
    return !isDesktop() && !!document.getElementById('collapseSidebar');
  }

  function onClick(event) {
    var trigger = event.target.closest('[data-mymi-sidebar-toggle]');
    if (!trigger) {
      // Tapping the page outside an open drawer closes it.
      var drawer = document.getElementById('collapseSidebar');
      if (isDrawer() && drawer && !document.body.classList.contains(CLS) && !drawer.contains(event.target)) {
        apply(true);
      }
      return;
    }
    event.preventDefault();

    if (!isDesktop() && trigger.id === 'mymiSidebarToggle' && hideMobileMenu()) {
      return;
    }

    var collapsed = !document.body.classList.contains(CLS);
    apply(collapsed);
    // Only the wide-screen choice is remembered; the drawer always starts closed.
    if (!isDrawer()) {
      write(collapsed);
    }
  }

  function onResize() {
    apply(isDrawer() ? true : read());
  }

  function init() {
    onResize();
    document.body.classList.add('mymi-sidebar-ready');
    document.addEventListener('click', onClick);
    if (DESKTOP) {
      if (DESKTOP.addEventListener) {
        DESKTOP.addEventListener('change', onResize);
      } else if (DESKTOP.addListener) {
        DESKTOP.addListener(onResize);
      }
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
