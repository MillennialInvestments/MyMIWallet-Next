// public/assets/js/login-init.js
(function(){
  // If you had code that depended on jQuery before, remove it or rewrite to vanilla.
  // Since we standardized on Bootstrap 5 (no jQuery), here is a vanilla equivalent:

  var introNav = document.querySelector('.intro-navbar');
  var linkEls  = document.querySelectorAll('.link-to');

  if (linkEls && linkEls.length) {
    linkEls.forEach(function(a){
      a.addEventListener('click', function(e){
        var href   = a.getAttribute('href');
        var target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          var y = target.getBoundingClientRect().top + window.pageYOffset - (introNav ? introNav.clientHeight : 0);
          window.scrollTo({ top: y, behavior: 'instant' });
        }
      });
    });
  }

  window.addEventListener('scroll', function(){
    if (!introNav) return;
    var fixedClass = 'navbar-fixed';
    if (window.pageYOffset > 0) {
      if (!introNav.classList.contains(fixedClass)) introNav.classList.add(fixedClass);
    } else {
      introNav.classList.remove(fixedClass);
    }
  });

  var authForms = document.querySelectorAll('form[data-auth-form]');
  authForms.forEach(function(form){
    form.addEventListener('submit', function(){
      if (window.console && typeof window.console.debug === 'function') {
        window.console.debug('[AUTH_FORM_SUBMIT]', {
          kind: form.getAttribute('data-auth-form') || 'unknown',
          action: form.getAttribute('action') || '',
          resolvedAction: form.action || '',
          method: (form.getAttribute('method') || 'get').toUpperCase(),
          trigger: (document.activeElement && document.activeElement.type) ? document.activeElement.type : 'enter_or_programmatic'
        });
      }
    });
  });
})();
