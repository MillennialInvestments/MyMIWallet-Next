(function () {
  function onReady(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn, { once: true });
    } else {
      fn();
    }
  }

  function initDropdowns() {
    if (!window.bootstrap) {
      return;
    }

    document.querySelectorAll('.dropdown-toggle').forEach(function (el) {
      try {
        window.bootstrap.Dropdown.getOrCreateInstance(el);
      } catch (error) {
        // No-op: keep failures silent so CSP logs stay clean
      }
    });
  }

  function initAOS() {
    if (typeof window.AOS === 'undefined') {
      return;
    }

    try {
      window.AOS.init({ duration: 800, easing: 'slide', once: true });
    } catch (error) {
      // Ignore animation initialisation failures silently
    }
  }

  function initNavbarScroll() {
    var introNav = document.querySelector('.intro-navbar');
    if (!introNav) {
      return;
    }

    var toggleFixed = function () {
      if (window.scrollY > 0) {
        introNav.classList.add('navbar-fixed');
      } else {
        introNav.classList.remove('navbar-fixed');
      }
    };

    toggleFixed();
    window.addEventListener('scroll', toggleFixed, { passive: true });
  }

  function initSmoothAnchors() {
    var links = document.querySelectorAll('.link-to');
    if (!links.length) {
      return;
    }

    var computeOffset = function () {
      var nav = document.querySelector('.intro-navbar');
      return nav ? nav.getBoundingClientRect().height : 0;
    };

    links.forEach(function (link) {
      link.addEventListener('click', function (event) {
        var href = link.getAttribute('href');
        if (!href) {
          return;
        }

        var hash = '';
        try {
          var url = new URL(href, window.location.origin);
          hash = url.hash;
        } catch (error) {
          if (href.charAt(0) === '#') {
            hash = href;
          }
        }

        if (!hash || hash.length <= 1) {
          return;
        }

        var target = document.querySelector(hash);
        if (!target) {
          return;
        }

        event.preventDefault();
        var offset = computeOffset();
        var position = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: Math.max(position, 0), behavior: 'smooth' });
      });
    });
  }

  function initCollapseAutoHide() {
    var navRoot = document.querySelector('.navbar-collapse');
    if (!navRoot || !window.bootstrap) {
      return;
    }

    navRoot.querySelectorAll('a.nav-link, .dropdown-item').forEach(function (anchor) {
      anchor.addEventListener('click', function () {
        var openNav = document.querySelector('.navbar-collapse.show');
        if (!openNav) {
          return;
        }

        try {
          window.bootstrap.Collapse.getOrCreateInstance(openNav, { toggle: false }).hide();
        } catch (error) {
          // Ignore bootstrap errors silently
        }
      });
    });
  }

  onReady(function () {
    initDropdowns();
    initNavbarScroll();
    initSmoothAnchors();
    initCollapseAutoHide();
    initAOS();
  });
})();