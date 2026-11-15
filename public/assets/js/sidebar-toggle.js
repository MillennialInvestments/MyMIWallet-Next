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

  function onClick(event) {
    var trigger = event.target.closest('[data-mymi-sidebar-toggle]');
    if (!trigger) {
      return;
    }
    event.preventDefault();

    if (!isDesktop() && trigger.id === 'mymiSidebarToggle' && hideMobileMenu()) {
      return;
    }

    var collapsed = !document.body.classList.contains(CLS);
    apply(collapsed);
    write(collapsed);
  }

  function init() {
    apply(read());
    document.addEventListener('click', onClick);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
