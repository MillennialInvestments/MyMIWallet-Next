/*
 * MyMI Secure Transfer, protocol MST1 (browser and Node).
 * Byte-for-byte the same format as app/Libraries/SecureTransfer/TransferCrypto.php.
 * Needs tweetnacl (window.nacl in the browser, require('tweetnacl') in Node).
 * File keys and plaintext never leave this code; only ciphertext and the manifest
 * are uploaded.
 */
(function (root, factory) {
  if (typeof module === 'object' && module.exports) {
    var naclLib;
    try { naclLib = require('tweetnacl'); } catch (e) { naclLib = require('../../vendor/tweetnacl/nacl-fast.min.js'); }
    module.exports = factory(naclLib, require('crypto').webcrypto);
  } else {
    root.MST1 = factory(root.nacl, root.crypto);
  }
})(typeof self !== 'undefined' ? self : this, function (nacl, webcrypto) {
  'use strict';

  var CHUNK_BYTES = 65536;
  var MAC = 16;
  var MANIFEST_PREFIX = 'MyMI Secure Transfer manifest v1\nsha256: ';
  var enc = new TextEncoder();
  var dec = new TextDecoder();

  function b64(bytes) {
    var s = '';
    for (var i = 0; i < bytes.length; i += 0x8000) {
      s += String.fromCharCode.apply(null, bytes.subarray(i, i + 0x8000));
    }
    return btoa(s);
  }

  function unb64(text) {
    var s = atob(text);
    var out = new Uint8Array(s.length);
    for (var i = 0; i < s.length; i++) out[i] = s.charCodeAt(i);
    return out;
  }

  function hex(bytes) {
    return Array.prototype.map.call(bytes, function (b) { return ('0' + b.toString(16)).slice(-2); }).join('');
  }

  function concat(parts, total) {
    var out = new Uint8Array(total);
    var at = 0;
    parts.forEach(function (p) { out.set(p, at); at += p.length; });
    return out;
  }

  /* Same rules as the PHP side: sorted keys at every level, lists keep their order. */
  function canonicalJson(value) {
    if (Array.isArray(value)) return '[' + value.map(canonicalJson).join(',') + ']';
    if (value !== null && typeof value === 'object') {
      return '{' + Object.keys(value).sort().map(function (k) {
        return JSON.stringify(k) + ':' + canonicalJson(value[k]);
      }).join(',') + '}';
    }
    return JSON.stringify(value);
  }

  async function sha256Hex(bytes) {
    return hex(new Uint8Array(await webcrypto.subtle.digest('SHA-256', bytes)));
  }

  async function manifestMessage(manifest) {
    return MANIFEST_PREFIX + (await sha256Hex(enc.encode(canonicalJson(manifest))));
  }

  function bindingMessage(domain, wallet, transferKeyB64, nonce, issuedAt) {
    return 'MyMI Secure Transfer key binding\nversion: 1\ndomain: ' + domain + '\nwallet: ' + wallet +
      '\ntransfer_key: ' + transferKeyB64 + '\nnonce: ' + nonce + '\nissued_at: ' + issuedAt;
  }

  function chunkNonce(base, index) {
    var n = new Uint8Array(24);
    n.set(base, 0);
    // uint64 big-endian; files stay far below 2^53 chunks.
    var hi = Math.floor(index / 4294967296), lo = index >>> 0;
    n[16] = hi >>> 24; n[17] = (hi >>> 16) & 255; n[18] = (hi >>> 8) & 255; n[19] = hi & 255;
    n[20] = lo >>> 24; n[21] = (lo >>> 16) & 255; n[22] = (lo >>> 8) & 255; n[23] = lo & 255;
    return n;
  }

  function wrapKey(fileKey, recipientKeyB64) {
    var recipient = unb64(recipientKeyB64);
    if (recipient.length !== 32) throw new Error('invalid_recipient_key');
    var eph = nacl.box.keyPair();
    var nonce = nacl.randomBytes(24);
    var box = nacl.box(fileKey, nonce, recipient, eph.secretKey);
    eph.secretKey.fill(0);
    return { epk: b64(eph.publicKey), nonce: b64(nonce), box: b64(box) };
  }

  /**
   * Encrypt bytes for recipients. recipients: [{wallet, transfer_key}].
   * Returns {ciphertext: Uint8Array, manifest} (manifest still unsigned).
   */
  async function seal(plain, name, mime, senderWallet, senderKeyB64, recipients, expiresAt, now) {
    if (!recipients.length) throw new Error('recipients_required');
    var key = nacl.randomBytes(32);
    var base = nacl.randomBytes(16);
    var parts = [], total = 0, chunks = 0;
    for (var off = 0; off < plain.length || chunks === 0; off += CHUNK_BYTES) {
      var box = nacl.secretbox(plain.subarray(off, off + CHUNK_BYTES), chunkNonce(base, chunks), key);
      parts.push(box); total += box.length; chunks++;
    }
    var ciphertext = concat(parts, total);
    var metaNonce = nacl.randomBytes(24);
    var meta = nacl.secretbox(enc.encode(canonicalJson({ bytes: plain.length, mime: mime, name: name })), metaNonce, key);
    var wrapped = recipients.map(function (r) {
      var w = wrapKey(key, r.transfer_key);
      return { wallet: r.wallet, transfer_key: r.transfer_key, epk: w.epk, nonce: w.nonce, box: w.box };
    });
    key.fill(0);
    now = now || Math.floor(Date.now() / 1000);
    var manifest = {
      v: 1,
      transfer_id: hex(nacl.randomBytes(16)),
      sender_wallet: senderWallet,
      sender_key: senderKeyB64,
      recipients: wrapped,
      chunk_bytes: CHUNK_BYTES,
      chunks: chunks,
      chunk_nonce_base: b64(base),
      ciphertext_bytes: ciphertext.length,
      ciphertext_sha256: await sha256Hex(ciphertext),
      meta_nonce: b64(metaNonce),
      meta: b64(meta),
      created_at: now,
      expires_at: expiresAt
    };
    return { ciphertext: ciphertext, manifest: manifest };
  }

  /** Decrypt with this device's key pair. Throws a reason code on any mismatch. */
  async function open(ciphertext, manifest, wallet, deviceKeyPair) {
    if ((await sha256Hex(ciphertext)) !== manifest.ciphertext_sha256) throw new Error('ciphertext_hash_mismatch');
    if (ciphertext.length !== manifest.ciphertext_bytes) throw new Error('ciphertext_length_mismatch');
    var entry = manifest.recipients.filter(function (r) { return r.wallet === wallet; })[0];
    if (!entry) throw new Error('not_a_recipient');
    var key = nacl.box.open(unb64(entry.box), unb64(entry.nonce), unb64(entry.epk), deviceKeyPair.secretKey);
    if (!key) throw new Error('key_unwrap_failed');
    var base = unb64(manifest.chunk_nonce_base);
    var step = manifest.chunk_bytes + MAC;
    var parts = [], total = 0;
    for (var i = 0; i < manifest.chunks; i++) {
      var part = nacl.secretbox.open(ciphertext.subarray(i * step, (i + 1) * step), chunkNonce(base, i), key);
      if (!part) throw new Error('chunk_auth_failed');
      parts.push(part); total += part.length;
    }
    var meta = nacl.secretbox.open(unb64(manifest.meta), unb64(manifest.meta_nonce), key);
    key.fill(0);
    if (!meta) throw new Error('meta_auth_failed');
    return { plain: concat(parts, total), meta: JSON.parse(dec.decode(meta)) };
  }

  /* Base58 (Solana addresses) so the browser can check signatures without the server. */
  var ALPHABET = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
  function base58Decode(text) {
    var bytes = [];
    for (var i = 0; i < text.length; i++) {
      var carry = ALPHABET.indexOf(text[i]);
      if (carry < 0) return null;
      for (var j = 0; j < bytes.length; j++) {
        carry += bytes[j] * 58;
        bytes[j] = carry & 255;
        carry >>= 8;
      }
      while (carry > 0) { bytes.push(carry & 255); carry >>= 8; }
    }
    for (var k = 0; k < text.length && text[k] === '1'; k++) bytes.push(0);
    return new Uint8Array(bytes.reverse());
  }

  function verifyWalletSignature(wallet, message, signatureB64) {
    var pk = base58Decode(wallet);
    if (!pk || pk.length !== 32) return false;
    try {
      return nacl.sign.detached.verify(enc.encode(message), unb64(signatureB64), pk);
    } catch (e) {
      return false;
    }
  }

  return {
    CHUNK_BYTES: CHUNK_BYTES,
    b64: b64, unb64: unb64, canonicalJson: canonicalJson, sha256Hex: sha256Hex,
    manifestMessage: manifestMessage, bindingMessage: bindingMessage,
    seal: seal, open: open, verifyWalletSignature: verifyWalletSignature, base58Decode: base58Decode
  };
});
