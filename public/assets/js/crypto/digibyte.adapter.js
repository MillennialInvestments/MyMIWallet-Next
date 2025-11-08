// public/assets/js/crypto/digibyte-adapter.js
// Safe stub to avoid 404 + dev guard HTML-instead-of-JS warnings.
(function (w) {
  if (!w.MyMICrypto) w.MyMICrypto = {};
  if (!w.MyMICrypto.adapters) w.MyMICrypto.adapters = {};
  w.MyMICrypto.adapters.digibyte = w.MyMICrypto.adapters.digibyte || {
    ready: true,
    getAddress: () => null,
    getBalance: () => Promise.resolve(null),
  };
})(window);