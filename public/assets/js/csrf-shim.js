/*
 * GT-FORM-ROUTES-001: attach the CSRF token to same-origin state-changing requests.
 *
 * Global CSRF protection covers every non-API route, but many pages call fetch()
 * or $.ajax() without the token, so those calls were rejected with 403. This adds
 * the X-CSRF-TOKEN header (read from <meta name="csrf-token">) when a request
 * - is not GET/HEAD/OPTIONS,
 * - goes to this site, and
 * - does not already carry a CSRF header.
 * Cross-origin requests never get the token.
 */
(function () {
  'use strict';

  function meta(name) {
    var el = document.querySelector('meta[name="' + name + '"]');
    return el ? el.getAttribute('content') : '';
  }
  function headerName() { return meta('csrf-header') || 'X-CSRF-TOKEN'; }
  function token() { return meta('csrf-token') || ((window.CSRF && window.CSRF.token) || ''); }
  function unsafe(method) { return !/^(GET|HEAD|OPTIONS|TRACE)$/i.test(method || 'GET'); }
  function sameOrigin(url) {
    try { return new URL(url, window.location.href).origin === window.location.origin; }
    catch (e) { return false; }
  }

  if (window.fetch && !window.fetch.__mymiCsrf) {
    var nativeFetch = window.fetch;
    var wrapped = function (input, init) {
      init = init || {};
      var isRequest = typeof Request !== 'undefined' && input instanceof Request;
      var url = isRequest ? input.url : String(input);
      var method = init.method || (isRequest ? input.method : 'GET');
      var t = token();
      if (t && unsafe(method) && sameOrigin(url)) {
        var headers = new Headers(init.headers || (isRequest ? input.headers : undefined));
        if (!headers.has(headerName()) && !headers.has('X-CSRF-TOKEN')) {
          headers.set(headerName(), t);
          init = Object.assign({}, init, { headers: headers });
          if (!init.credentials) { init.credentials = 'same-origin'; }
        }
      }
      return nativeFetch.call(this, input, init);
    };
    wrapped.__mymiCsrf = true;
    window.fetch = wrapped;
  }

  function hookJQuery() {
    var $ = window.jQuery;
    if (!$ || !$.ajaxPrefilter || $.__mymiCsrf) { return; }
    $.__mymiCsrf = true;
    $.ajaxPrefilter(function (options, original, xhr) {
      var t = token();
      if (t && unsafe(options.type || options.method) && sameOrigin(options.url || window.location.href)) {
        var h = (options.headers = options.headers || {});
        if (!h[headerName()] && !h['X-CSRF-TOKEN']) {
          xhr.setRequestHeader(headerName(), t);
        }
      }
    });
  }
  hookJQuery();
  document.addEventListener('DOMContentLoaded', hookJQuery);
  window.addEventListener('load', hookJQuery);
})();
