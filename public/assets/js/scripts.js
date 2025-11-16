// assets/js/scripts.js
"use strict";
// Ensure globals exist BEFORE we pass them into the IIFE
window.NioApp = window.NioApp || {};
window.jQuery = window.jQuery || window.$; // just in case

!function (NioApp, $) {
    "use strict";

    // Ensure global namespace & baseline objects exist
    window.NioApp = window.NioApp || {};
    (function (w) {
        w.NioApp.docReady = Array.isArray(w.NioApp.docReady) ? w.NioApp.docReady : [];
        w.NioApp.winLoad  = Array.isArray(w.NioApp.winLoad)  ? w.NioApp.winLoad  : [];
        w.NioApp.current  = w.NioApp.current || {};
        w.NioApp.TGL      = w.NioApp.TGL || {};
        w.NioApp.Ani      = w.NioApp.Ani || {};
        w.NioApp.BS       = w.NioApp.BS || {};
        w.NioApp.Select2  = w.NioApp.Select2 || {};
        w.NioApp.Slider   = w.NioApp.Slider || {};
        w.NioApp.Picker   = w.NioApp.Picker || {};
        w.NioApp.Addons   = w.NioApp.Addons || {};
        w.NioApp.State    = w.NioApp.State || { isRTL: false, isMobile: false };
        w.NioApp.Break    = w.NioApp.Break || {};
        if (typeof w.NioApp.hexRGB !== 'function') {
            w.NioApp.hexRGB = function (hex, alpha) {
                var h = hex.replace('#', '');
                if (h.length === 3) h = h.split('').map(function (c) { return c + c; }).join('');
                var bigint = parseInt(h, 16);
                var r = (bigint >> 16) & 255, g = (bigint >> 8) & 255, b = bigint & 255;
                return (alpha !== undefined)
                    ? 'rgba(' + r + ',' + g + ',' + b + ',' + alpha + ')'
                    : 'rgb(' + r + ',' + g + ',' + b + ')';
            };
        }
    })(window);

    // ---- COMPAT SHIMS (safe fallbacks if parts of bundle.js/plugins are missing) ----
    if ($ && !$.fn.exists) { $.fn.exists = function () { return this.length > 0; }; }

    NioApp.Break = NioApp.Break || { xs:0, sm:576, md:768, lg:992, xl:1200, xxl:1400 };
    NioApp.Win   = NioApp.Win   || { width: window.innerWidth, height: window.innerHeight };
    window.addEventListener('resize', function () {
        NioApp.Win.width = window.innerWidth; NioApp.Win.height = window.innerHeight;
    });

    if (typeof NioApp.AddInBody !== 'function') { NioApp.AddInBody = function(){}; }
    if (typeof NioApp.BreakClass !== 'function') {
        NioApp.BreakClass = function (selector, bp, opt) {
            var el = document.querySelector(selector); if (!el) return;
            var o = opt || {}, add = o.classAdd; if (!add) return;
            if (NioApp.Win.width < bp) el.classList.add(add); else el.classList.remove(add);
        };
    }
    NioApp.Toggle = NioApp.Toggle || {
        trigger: function (target, opt) {
            var o = opt || {}, cBody = o.body || '', cContent = o.content || '', active = o.active || 'active';
            var content = document.querySelector('[data-content="'+target+'"]');
            var toggle  = document.querySelector('[data-bs-target="'+target+'"]');
            if (content) content.classList.toggle(cContent || active);
            if (toggle)  toggle.classList.toggle(active);
            if (cBody) document.body.classList.toggle(cBody);
        },
        removed: function (target, opt) {
            var o = opt || {}, cBody = o.body || '', cContent = o.content || '', active = o.active || 'active';
            var content = document.querySelector('[data-content="'+target+'"]');
            var toggle  = document.querySelector('[data-bs-target="'+target+'"]');
            if (content) content.classList.remove(cContent || active);
            if (toggle)  toggle.classList.remove(active);
            if (cBody) document.body.classList.remove(cBody);
        },
        dropMenu: function (toggler, o) {
            try {
                var attr = o || { self:'nk-menu-toggle', child:'nk-menu-sub', active:'active' };
                var el = toggler;
                if (!el) return;
                if (el.jquery) {
                    el = el.get(0);
                }
                var item = el.closest ? el.closest('.nk-menu-item.has-sub') : null;
                if (!item) return;
                var parent = item.parentElement;
                if (parent) {
                    parent.querySelectorAll('.nk-menu-item.has-sub.' + attr.active).forEach(function (sib) {
                        if (sib !== item) {
                            sib.classList.remove(attr.active);
                        }
                    });
                }
                item.classList.toggle(attr.active);
            } catch(e) {}
        }
    };

    NioApp.BS = NioApp.BS || {};
    if (typeof NioApp.BS.tooltip !== 'function') {
        NioApp.BS.tooltip = function (selector, opts) {
            if (!window.bootstrap || !bootstrap.Tooltip) return;
            document.querySelectorAll(selector).forEach(function (el) {
                try { new bootstrap.Tooltip(el, opts || {}); } catch(e){}
            });
        };
    }
    if (typeof NioApp.BS.popover !== 'function') {
        NioApp.BS.popover = function (selector, opts) {
            if (!window.bootstrap || !bootstrap.Popover) return;
            document.querySelectorAll(selector).forEach(function (el) {
                try { new bootstrap.Popover(el, opts || {}); } catch(e){}
            });
        };
    }
    if (typeof NioApp.BS.progress !== 'function') {
        NioApp.BS.progress = function (selector) {
            document.querySelectorAll(selector).forEach(function (el) {
                var v = el.getAttribute('data-progress');
                if (v != null) el.style.width = String(v).replace('%','') + '%';
            });
        };
    }
    if (typeof NioApp.BS.fileinput !== 'function') {
        NioApp.BS.fileinput = function (selector) {
            $(document).on('change', selector, function(){
                var label = this.files && this.files.length ? this.files[0].name : '';
                var $lab = $(this).siblings('.form-file-label, label');
                if ($lab.length && label) $lab.text(label);
            });
        };
    }
    if (typeof NioApp.BS.menutip !== 'function') { NioApp.BS.menutip = function (selector, opts) { NioApp.BS.tooltip(selector, opts); }; }
    if (typeof NioApp.BS.modalfix !== 'function') { NioApp.BS.modalfix = function(){}; }
    if (typeof NioApp.BS.ddfix   !== 'function') { NioApp.BS.ddfix   = function(){}; }
    if (typeof NioApp.BS.tabfix  !== 'function') { NioApp.BS.tabfix  = function(){}; }

    if (typeof NioApp.LinkOff !== 'function') { NioApp.LinkOff = function (selector) { $(document).on('click', selector, function (e) { e.preventDefault(); }); }; }
    if (typeof NioApp.SetHW   !== 'function') {
        NioApp.SetHW = function (selector, prop) { $(selector).each(function(){ var v = $(this).data(prop); if (v!=null) $(this).css(prop, v); }); };
    }
    if (typeof NioApp.ColorBG !== 'function') { NioApp.ColorBG = function(){}; }
    if (typeof NioApp.ColorTXT!== 'function') { NioApp.ColorTXT= function(){}; }
    if (typeof NioApp.Passcode!== 'function') { NioApp.Passcode= function(){}; }

    NioApp.Picker = NioApp.Picker || {};
    if (typeof NioApp.Picker.date !== 'function') {
        NioApp.Picker.date = function (selector, opts) {
            if (!window.flatpickr) return;
            document.querySelectorAll(selector).forEach(function (el) {
                try { flatpickr(el, Object.assign({ dateFormat:'Y-m-d' }, opts||{})); } catch(e){}
            });
        };
    }
    if (typeof NioApp.Picker.time !== 'function') {
        NioApp.Picker.time = function (selector, opts) {
            if (!window.flatpickr) return;
            document.querySelectorAll(selector).forEach(function (el) {
                try { flatpickr(el, Object.assign({ enableTime:true, noCalendar:true, dateFormat:'H:i' }, opts||{})); } catch(e){}
            });
        };
    }
    if (typeof NioApp.Picker.dob !== 'function') {
        NioApp.Picker.dob = function (selector, opts) {
            if (!window.flatpickr) return;
            document.querySelectorAll(selector).forEach(function (el) {
                try { flatpickr(el, Object.assign({ dateFormat:'Y-m-d', maxDate:new Date() }, opts||{})); } catch(e){}
            });
        };
    }
    // ---- END COMPAT SHIMS ----

    // App identity
    NioApp.current = NioApp.current || {};
    NioApp.current.name = 'MyMI Wallet';
    NioApp.Package = NioApp.Package || {};
    NioApp.Package.name = "DashLite";
    NioApp.Package.version = "2.3";

    var $win = $(window),
        $body = $('body'),
        $doc  = $(document),
        _body_theme = 'nio-theme',
        _menu = 'nk-menu',
        _mobile_nav = 'mobile-menu',
        _header = 'nk-header',
        _header_menu = 'nk-header-menu',
        _sidebar = 'nk-sidebar',
        _sidebar_mob = 'nk-sidebar-mobile',
        _break = NioApp.Break;

    function extend(obj, ext) { Object.keys(ext).forEach(function (k) { obj[k] = ext[k]; }); return obj; }

    // ClassInit @v1.0
    NioApp.ClassBody = function () { NioApp.AddInBody(_sidebar); };

    NioApp.ClassNavMenu = function () {
        NioApp.BreakClass('.' + _header_menu, _break.lg, { timeOut: 0 });
        NioApp.BreakClass('.' + _sidebar, _break.lg, { timeOut: 0, classAdd: _sidebar_mob });
        $win.on('resize', function () {
            NioApp.BreakClass('.' + _header_menu, _break.lg);
            NioApp.BreakClass('.' + _sidebar, _break.lg, { classAdd: _sidebar_mob });
        });
    };

    NioApp.Prettify = function () { window.prettyPrint && prettyPrint(); };

    NioApp.Copied = function () {
        var clip = '.clipboard-init', target = '.clipboard-text', sclass = 'clipboard-success', eclass = 'clipboard-error';
        function feedback(el, state) {
            var $elm = $(el), $elp = $elm.parent(),
                copy = { text:'Copy', done:'Copied', fail:'Failed' },
                data = { text:$elm.data('clip-text'), done:$elm.data('clip-success'), fail:$elm.data('clip-error') };
            copy.text = data.text || copy.text; copy.done = data.done || copy.done; copy.fail = data.fail || copy.fail;
            var copytext = state === 'success' ? copy.done : copy.fail, addclass = state === 'success' ? sclass : eclass;
            $elp.addClass(addclass).find(target).html(copytext);
            setTimeout(function () { $elp.removeClass(sclass + ' ' + eclass).find(target).html(copy.text).blur(); $elp.find('input').blur(); }, 2000);
        }
        if (window.ClipboardJS && ClipboardJS.isSupported()) {
            var clipboard = new ClipboardJS(clip);
            clipboard.on('success', function (e) { feedback(e.trigger, 'success'); e.clearSelection(); })
                     .on('error',   function (e) { feedback(e.trigger, 'error'); });
        } else { $(clip).css('display', 'none'); }
    };

    NioApp.CurrentLink = function () {
        var _link = '.nk-menu-link, .menu-link, .nav-link',
            _currentURL = window.location.href,
            fileName = _currentURL.substring(0, _currentURL.indexOf("#") == -1 ? _currentURL.length : _currentURL.indexOf("#"));
        fileName = fileName.substring(0, fileName.indexOf("?") == -1 ? fileName.length : fileName.indexOf("?"));
        $(_link).each(function () {
            var self = $(this), _self_link = self.attr('href');
            if (fileName.match(_self_link)) {
                self.closest("li").addClass('active current-page').parents().closest("li").addClass("active current-page");
                self.closest("li").children('.nk-menu-sub').css('display', 'block');
                self.parents().closest("li").children('.nk-menu-sub').css('display', 'block');
            } else {
                self.closest("li").removeClass('active current-page').parents().closest("li:not(.current-page)").removeClass("active");
            }
        });
    };

    NioApp.PassSwitch = function () { NioApp.Passcode('.passcode-switch'); };

    NioApp.Toast = function (msg, ttype, opt) {
        var ttype = ttype || 'info',
            ticon = ttype === 'info' ? 'ni ni-info-fill' : ttype === 'success' ? 'ni ni-check-circle-fill' : ttype === 'error' ? 'ni ni-cross-circle-fill' : ttype === 'warning' ? 'ni ni-alert-fill' : '',
            def = { position: 'bottom-right', ui: '', icon: 'auto', clear: false },
            attr = opt ? extend(def, opt) : def;
        attr.position = attr.position ? 'toast-' + attr.position : 'toast-bottom-right';
        attr.icon = attr.icon === 'auto' ? ticon : (attr.icon || '');
        attr.ui = attr.ui ? ' ' + attr.ui : '';
        var msi = attr.icon ? '<span class="toastr-icon"><em class="icon ' + attr.icon + '"></em></span>' : '';
        msg = msg ? msi + '<div class="toastr-text">' + msg + '</div>' : '';
        if (!msg) return;
        if (attr.clear === true) { toastr.clear(); }
        var option = {
            closeButton:true, debug:false, newestOnTop:false, progressBar:false,
            positionClass: attr.position + attr.ui, closeHtml:'<span class="btn-trigger">Close</span>',
            preventDuplicates:true, showDuration:"1500", hideDuration:"1500", timeOut:"2000",
            toastClass:"toastr", extendedTimeOut:"3000"
        };
        toastr.options = extend(option, attr);
        toastr[ttype](msg);
    };

    NioApp.TGL.screen = function (elm) {
        if ($(elm).exists()) {
            $(elm).each(function () {
                var ssize = $(this).data('toggle-screen');
                if (ssize) $(this).addClass('toggle-screen-' + ssize);
            });
        }
    };

    NioApp.TGL.content = function (elm, opt) {
        var toggle = elm || '.toggle', $toggle = $(toggle), $contentD = $('[data-content]'), toggleCurrent = false,
            def = { active:'active', content:'content-active', "break": true }, attr = opt ? extend(def, opt) : def;
        NioApp.TGL.screen($contentD);
        $toggle.on('click', function (e) { toggleCurrent = this; NioApp.Toggle.trigger($(this).data('target'), attr); e.preventDefault(); });
        $doc.on('mouseup', function (e) {
            if (!toggleCurrent) return;
            var $toggleCurrent = $(toggleCurrent), currentTarget = $toggleCurrent.data('target'),
                $contentCurrent = $("[data-content=\""+currentTarget+"\"]"),
                $s2c = $('.select2-container'), $dpd = $('.datepicker-dropdown'),
                $tpc = $('.ui-timepicker-container'), $mdl = $('.modal');
            if (!$toggleCurrent.is(e.target) && $toggleCurrent.has(e.target).length === 0 &&
                !$contentCurrent.is(e.target) && $contentCurrent.has(e.target).length === 0 &&
                !$s2c.is(e.target) && $s2c.has(e.target).length === 0 &&
                !$dpd.is(e.target) && $dpd.has(e.target).length === 0 &&
                !$tpc.is(e.target) && $tpc.has(e.target).length === 0 &&
                !$mdl.is(e.target) && $mdl.has(e.target).length === 0) {
                NioApp.Toggle.removed($toggleCurrent.data('target'), attr); toggleCurrent = false;
            }
        });
        $win.on('resize', function () {
            $contentD.each(function () {
                var content = $(this).data('content'), ssize = $(this).data('toggle-screen'), toggleBreak = _break[ssize];
                if (NioApp.Win.width > toggleBreak) { NioApp.Toggle.removed(content, attr); }
            });
        });
    };

    NioApp.TGL.expand = function (elm, opt) {
        var toggle = elm || '.expand', def = { toggle: true }, attr = opt ? extend(def, opt) : def;
        $(toggle).on('click', function (e) { NioApp.Toggle.trigger($(this).data('target'), attr); e.preventDefault(); });
    };

    NioApp.TGL.ddmenu = function (elm, opt) {
        var selector = elm || '.nk-menu-toggle', def = { active:'active', self:'nk-menu-toggle', child:'nk-menu-sub' },
            attr = opt ? extend(def, opt) : def;
        NioApp.TGL._ddmenuConfigs = NioApp.TGL._ddmenuConfigs || [];
        NioApp.TGL._ddmenuConfigs.push({ selector: selector, attr: attr });
        if (!NioApp.TGL._ddmenuInitialized) {
            NioApp.TGL._ddmenuInitialized = true;
            document.addEventListener('click', function (event) {
                var configs = NioApp.TGL._ddmenuConfigs || [];
                var match = null;
                var toggle = null;
                configs.some(function (cfg) {
                    var candidate = event.target.closest(cfg.selector);
                    if (candidate) {
                        match = cfg;
                        toggle = candidate;
                        return true;
                    }
                    return false;
                });
                if (!toggle) {
                    if (!event.target.closest('.nk-menu-item.has-sub')) {
                        configs.forEach(function (cfg) {
                            document.querySelectorAll('.nk-menu-item.has-sub.' + cfg.attr.active).forEach(function (item) {
                                item.classList.remove(cfg.attr.active);
                            });
                        });
                    }
                    return;
                }
                if (!(NioApp.Win.width < _break.lg || (toggle.closest && toggle.closest('.' + _sidebar)))) {
                    return;
                }
                event.preventDefault();
                NioApp.Toggle.dropMenu(toggle, match.attr);
            });
        }
    };

    NioApp.TGL.showmenu = function (elm, opt) {
        var toggle = elm || '.nk-nav-toggle', $toggle = $(toggle), $contentD = $('[data-content]'),
            toggleBreak = $contentD.hasClass(_header_menu) ? _break.lg : _break.xl,
            toggleOlay = _sidebar + '-overlay',
            def = { active:'toggle-active', content:_sidebar + '-active', body:'nav-shown', overlay:toggleOlay, "break":toggleBreak, close:{ profile:true, menu:false } },
            attr = opt ? extend(def, opt) : def;
        $toggle.on('click', function (e) { NioApp.Toggle.trigger($(this).data('target'), attr); e.preventDefault(); });
        $doc.on('mouseup', function (e) {
            if (!$toggle.is(e.target) && $toggle.has(e.target).length === 0 && !$contentD.is(e.target) && $contentD.has(e.target).length === 0 && NioApp.Win.width < toggleBreak) {
                NioApp.Toggle.removed($toggle.data('target'), attr);
            }
        });
        $win.on('resize', function () {
            if ((NioApp.Win.width < _break.xl || NioApp.Win.width < toggleBreak) && !NioApp.State.isMobile) {
                NioApp.Toggle.removed($toggle.data('target'), attr);
            }
        });
    };

    NioApp.sbCompact = function () {
        var $toggle = $('.nk-nav-compact'), $content = $('[data-content]'), $sidebar = $('.' + _sidebar), $sidebar_body = $('.' + _sidebar + '-body');
        $toggle.on('click', function (e) {
            e.preventDefault();
            var $self = $(this), get_target = $self.data('target'), $self_content = $('[data-content=' + get_target + ']');
            $self.toggleClass('compact-active'); $self_content.toggleClass('is-compact');
            if (!$self_content.hasClass('is-compact')) { $self_content.removeClass('has-hover'); }
        });
        $sidebar_body.on('mouseenter', function () { if ($sidebar.hasClass('is-compact')) { $sidebar.addClass('has-hover'); } });
        $sidebar_body.on('mouseleave', function () { if ($sidebar.hasClass('is-compact')) { $sidebar.removeClass('has-hover'); } });
    };

    NioApp.Ani.formSearch = function (elm, opt) {
        var def = { active:'active', timeout:400, target:'[data-search]' }, attr = opt ? extend(def, opt) : def,
            $elem = $(elm), $target = $(attr.target);
        if (!$elem.exists()) return;
        $elem.on('click', function (e) {
            e.preventDefault();
            var $self = $(this), the_target = $self.data('target'),
                $self_st = $('[data-search=' + the_target + ']'),
                $self_tg = $('[data-bs-target=' + the_target + ']');
            if (!$self_st.hasClass(attr.active)) {
                $self_tg.add($self_st).addClass(attr.active); $self_st.find('input').focus();
            } else {
                $self_tg.add($self_st).removeClass(attr.active);
                setTimeout(function () { $self_st.find('input').val(''); }, attr.timeout);
            }
        });
        $doc.on({
            keyup: function(e){ if (e.key === "Escape") { $elem.add($target).removeClass(attr.active); } },
            mouseup: function(e){
                if (!$target.find('input').val() && !$target.is(e.target) && $target.has(e.target).length === 0 && !$elem.is(e.target) && $elem.has(e.target).length === 0) {
                    $elem.add($target).removeClass(attr.active);
                }
            }
        });
    };

    NioApp.Ani.formElm = function (elm, opt) {
        var def = { focus:'focused' }, attr = opt ? extend(def, opt) : def;
        if (!$(elm).exists()) return;
        $(elm).each(function () {
            var $self = $(this);
            if ($self.val()) { $self.parent().addClass(attr.focus); }
            $self.on({
                focus: function(){ $self.parent().addClass(attr.focus); },
                blur:  function(){ if (!$self.val()) { $self.parent().removeClass(attr.focus); } }
            });
        });
    };

    NioApp.Validate = function (elm, opt) {
        if (!$(elm).exists() || !$.fn.validate) return;
        $(elm).each(function () {
            var def = { errorElement:"span" }, attr = opt ? extend(def, opt) : def;
            $(this).validate(attr);
        });
    };
    NioApp.Validate.init = function () {
        if (!$.fn.validate) return;
        NioApp.Validate('.form-validate', {
            errorElement:"span", errorClass:"invalid",
            errorPlacement: function (error, element) {
                if (element.parents().hasClass('input-group')) { error.appendTo(element.parent().parent()); }
                else { error.appendTo(element.parent()); }
            }
        });
    };

    NioApp.Dropzone = function (elm, opt) {
        if (!$(elm).exists()) return;
        if (typeof $.fn.dropzone !== 'function' && typeof window.Dropzone === 'undefined') return;
        $(elm).each(function () {
            var maxFiles    = $(elm).data('max-files')      || null;
            var maxFileSize = $(elm).data('max-file-size')  || 256;
            var accepted    = $(elm).data('accepted-files') || null;
            var def = { autoDiscover:false, maxFiles:maxFiles, maxFilesize:maxFileSize, acceptedFiles:accepted },
                attr = opt ? extend(def, opt) : def;
            $(this).addClass('dropzone').dropzone(attr);
        });
    };
    NioApp.Dropzone.init = function () { NioApp.Dropzone('.upload-zone', { url: "/images" }); };

    NioApp.Wizard = function () {
        var $wizard = $(".nk-wizard");
        if (!$wizard.exists()) return;
        if (typeof $.fn.steps !== 'function') return;
        $wizard.each(function () {
            var $self = $(this), _self_id = $self.attr('id'), $self_id = $('#' + _self_id).show();
            $self_id.steps({
                headerTag: ".nk-wizard-head",
                bodyTag: ".nk-wizard-content",
                labels: { finish:"Submit", next:"Next", previous:"Prev", loading:"Loading ..." },
                titleTemplate: '<span class="number">0#index#</span> #title#',
                onStepChanging: function (event, currentIndex, newIndex) {
                    if (currentIndex > newIndex) return true;
                    if (currentIndex < newIndex) {
                        $self_id.find(".body:eq(" + newIndex + ") label.error").remove();
                        $self_id.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                    }
                    $self_id.validate().settings.ignore = ":disabled,:hidden"; return $self_id.valid();
                },
                onFinishing: function () { $self_id.validate().settings.ignore = ":disabled"; return $self_id.valid(); },
                onFinished:  function () { window.location.href = "#"; }
            }).validate({ errorElement:"span", errorClass:"invalid", errorPlacement: function (e, el) { e.appendTo(el.parent()); } });
        });
    };

    // DataTable @1.1
    NioApp.DataTable = function (elm, opt) {
        if (!$.fn.DataTable) return;
        if ($(elm).exists()) {
            $(elm).each(function () {
                var auto_responsive = $(this).data('auto-responsive'),
                    has_export = typeof opt !== 'undefined' && typeof opt.buttons !== 'undefined' && !!opt.buttons;
                var export_title = $(this).data('export-title') || 'Export';
                var btn = has_export ? '<"dt-export-buttons d-flex align-center"<"dt-export-title d-none d-md-inline-block">B>' : '',
                    btn_cls = has_export ? ' with-export' : '';
                var dom_normal   = '<"row justify-between g-2' + btn_cls + '"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"' + btn + 'l>>>><"datatable-wrap my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-start text-md-end"i>>';
                var dom_separate = '<"row justify-between g-2' + btn_cls + '"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"' + btn + 'l>>>><"my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-start text-md-end"i>>';
                var dom = $(this).hasClass('is-separate') ? dom_separate : dom_normal;
                var def = {
                    responsive: true, autoWidth:false, dom: dom,
                    language: {
                        search:"", searchPlaceholder:"Type in to Search",
                        lengthMenu:"<span class='d-none d-sm-inline-block'>Show</span><div class='form-control-select'> _MENU_ </div>",
                        info:"_START_ -_END_ of _TOTAL_", infoEmpty:"0", infoFiltered:"( Total _MAX_  )",
                        paginate:{ first:"First", last:"Last", next:"Next", previous:"Prev" }
                    }
                }, attr = opt ? extend(def, opt) : def;
                attr = (auto_responsive === false) ? extend(attr, { responsive:false }) : attr;
                $(this).DataTable(attr);
                $('.dt-export-title').text(export_title);
            });
        }
    };
    NioApp.DataTable.init = function () {
        if (!$.fn.DataTable) return;
        NioApp.DataTable('.datatable-init', { responsive: { details:true } });
        NioApp.DataTable('.datatable-init-export', { responsive:{ details:true }, buttons:['copy','excel','csv','pdf','colvis'] });
        if ($.fn.DataTable && $.fn.DataTable.ext && $.fn.DataTable.ext.pager) {
            $.fn.DataTable.ext.pager.numbers_length = 7;
        }
    };

    NioApp.BS.ddfix = function (elm, exc) {
        var dd = elm || '.dropdown-menu', ex = exc || 'a:not(.clickable), button:not(.clickable), a:not(.clickable) *, button:not(.clickable) *';
        $(dd).on('click', function (e) { if (!$(e.target).is(ex)) { e.stopPropagation(); return; } });
        if (NioApp.State.isRTL) {
            var $dMenu = $('.dropdown-menu');
            $dMenu.each(function () {
                var $self = $(this);
                if ($self.hasClass('dropdown-menu-right') && !$self.hasClass('dropdown-menu-center')) {
                    $self.prev('[data-bs-toggle="dropdown"]').dropdown({ popperConfig: { placement:'bottom-start' } });
                } else if (!$self.hasClass('dropdown-menu-right') && !$self.hasClass('dropdown-menu-center')) {
                    $self.prev('[data-bs-toggle="dropdown"]').dropdown({ popperConfig: { placement:'bottom-end' } });
                }
            });
        }
    };
    NioApp.BS.tabfix = function (elm) {
        var tab = elm || '[data-bs-toggle="modal"]';
        $(tab).on('click', function () {
            var _this = $(this), target = _this.data('target'), target_href = _this.attr('href'), tg_tab = _this.data('tab-target'),
                modal = target ? $body.find(target) : $body.find(target_href);
            if (tg_tab && tg_tab !== '#' && modal) { modal.find('[href="' + tg_tab + '"]').tab('show'); }
            else if (modal) {
                var tabdef = modal.find('.nk-nav.nav-tabs');
                var link = $(tabdef[0]).find('[data-bs-toggle="tab"]');
                $(link[0]).tab('show');
            }
        });
    };

    NioApp.ModeSwitch = function () {
        var toggle = $('.dark-switch');
        if ($body.hasClass('dark-mode')) toggle.addClass('active'); else toggle.removeClass('active');
        toggle.on('click', function (e) { e.preventDefault(); $(this).toggleClass('active'); $body.toggleClass('dark-mode'); });
    };

    NioApp.Knob = function (elm, opt) {
        if ($(elm).exists() && typeof $.fn.knob === 'function') {
            var def = { min:0 }, attr = opt ? extend(def, opt) : def;
            $(elm).each(function () { $(this).knob(attr); });
        }
    };
    NioApp.Knob.init = function () {
        var knob = { "default": { readOnly:true, lineCap:"round" }, half: { angleOffset:-90, angleArc:180, readOnly:true, lineCap:"round" } };
        NioApp.Knob('.knob', knob["default"]); NioApp.Knob('.knob-half', knob.half);
    };

    NioApp.Range = function (elm, opt) {
        if (!$(elm).exists() || typeof noUiSlider === 'undefined') return;
        $(elm).each(function () {
            var $self = $(this), self_id = $self.attr('id');
            var _start = $self.data('start'); _start = /\s/g.test(_start) ? _start.split(' ') : (_start || 0);
            var _connect = $self.data('connect'); _connect = /\s/g.test(_connect) ? _connect.split(' ') : (typeof _connect == 'undefined' ? 'lower' : _connect);
            var _min = $self.data('min') || 0, _max = $self.data('max') || 100;
            var _min_distance = $self.data('min-distance') || null, _max_distance = $self.data('max-distance') || null;
            var _step = $self.data('step') || 1, _orientation = $self.data('orientation') || 'horizontal', _tooltip = $self.data('tooltip') || false;
            var target = document.getElementById(self_id);
            var def = { start:_start, connect:_connect, direction: NioApp.State.isRTL ? "rtl" : "ltr",
                        range:{ 'min':_min, 'max':_max }, margin:_min_distance, limit:_max_distance, step:_step, orientation:_orientation, tooltips:_tooltip },
                attr = opt ? extend(def, opt) : def;
            noUiSlider.create(target, attr);
        });
    };
    NioApp.Range.init = function () { NioApp.Range('.form-control-slider'); NioApp.Range('.form-range-slider'); };

    NioApp.Select2.init = function () {
        if (!$.fn.select2) return;
        $('.js-select2').each(function () { $(this).select2(); });
    };

    NioApp.Slick = function (elm, opt) {
        if ($(elm).exists() && typeof $.fn.slick === 'function') {
            $(elm).each(function () {
                var def = {
                    'prevArrow':'<div class="slick-arrow-prev"><a href="javascript:void(0);" class="slick-prev"><em class="icon ni ni-chevron-left"></em></a></div>',
                    'nextArrow':'<div class="slick-arrow-next"><a href="javascript:void(0);" class="slick-next"><em class="icon ni ni-chevron-right"></em></a></div>',
                    rtl: NioApp.State.isRTL
                }, attr = opt ? extend(def, opt) : def;
                $(this).slick(attr);
            });
        }
    };
    NioApp.Slider.init = function () { NioApp.Slick('.slider-init'); };

    NioApp.Lightbox = function (elm, type, opt) {
        if (!$(elm).exists() || !$.fn.magnificPopup) return;
        $(elm).each(function () {
            var def = {};
            if (type == 'video' || type == 'iframe') {
                def = { type:'iframe', removalDelay:160, preloader:true, fixedContentPos:false,
                        callbacks:{ beforeOpen:function(){ this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim'); this.st.mainClass = this.st.el.attr('data-effect'); } } };
            } else if (type == 'content') {
                def = { type:'inline', preloader:true, removalDelay:400, mainClass:'mfp-fade content-popup' };
            } else {
                def = { type:'image', mainClass:'mfp-fade image-popup' };
            }
            var attr = opt ? extend(def, opt) : def; $(this).magnificPopup(attr);
        });
    };

    NioApp.Control = function (elm) {
        var control = document.querySelectorAll(elm);
        control.forEach(function (item) {
            item.checked ? item.parentNode.classList.add('checked') : null;
            item.addEventListener("change", function () {
                if (item.type == "checkbox") {
                    item.checked ? item.parentNode.classList.add('checked') : item.parentNode.classList.remove('checked');
                }
                if (item.type == "radio") {
                    document.querySelectorAll('input[name="' + item.name + '"]').forEach(function (it) { it.parentNode.classList.remove('checked'); });
                    item.checked ? item.parentNode.classList.add('checked') : null;
                }
            });
        });
    };

    NioApp.NumberSpinner = function () {
        var plus = document.querySelectorAll("[data-number='plus']"), minus = document.querySelectorAll("[data-number='minus']");
        plus.forEach(function (btn) {
            btn.addEventListener("click", function () {
                var child = btn.parentNode.children;
                child.forEach(function (ch) {
                    if (ch.classList && ch.classList.contains("number-spinner")) {
                        var value = ch.value !== "" ? parseInt(ch.value) : 0;
                        var step  = ch.step  !== "" ? parseInt(ch.step)  : 1;
                        var max   = ch.max   !== "" ? parseInt(ch.max)   : Infinity;
                        ch.value = (max + 1 > value + step) ? (value + step) : value;
                    }
                });
            });
        });
        minus.forEach(function (btn) {
            btn.addEventListener("click", function () {
                var child = btn.parentNode.children;
                child.forEach(function (ch) {
                    if (ch.classList && ch.classList.contains("number-spinner")) {
                        var value = ch.value !== "" ? parseInt(ch.value) : 0;
                        var step  = ch.step  !== "" ? parseInt(ch.step)  : 1;
                        var min   = ch.min   !== "" ? parseInt(ch.min)   : 0;
                        ch.value = (min - 1 < value - step) ? (value - step) : value;
                    }
                });
            });
        });
    };

    NioApp.OtherInit = function () {
        NioApp.ClassBody();
        NioApp.PassSwitch();
        NioApp.CurrentLink();
        NioApp.LinkOff('.is-disable');
        NioApp.ClassNavMenu();
        NioApp.SetHW('[data-height]', 'height');
        NioApp.SetHW('[data-width]', 'width');
        NioApp.NumberSpinner();
        NioApp.Lightbox('.popup-video', 'video');
        NioApp.Lightbox('.popup-iframe', 'iframe');
        NioApp.Lightbox('.popup-image', 'image');
        NioApp.Lightbox('.popup-content', 'content');
        NioApp.Control('.custom-control-input');
    };

    NioApp.Ani.init = function () { NioApp.Ani.formElm('.form-control-outlined'); NioApp.Ani.formSearch('.toggle-search'); };

    NioApp.BS.init = function () {
        NioApp.BS.menutip('a.nk-menu-link');
        NioApp.BS.tooltip('.nk-tooltip');
        NioApp.BS.tooltip('.btn-tooltip', { placement: 'top' });
        NioApp.BS.tooltip('[data-bs-toggle="tooltip"]');
        NioApp.BS.tooltip('[data-bs-toggle="tooltip"]');
        NioApp.BS.tooltip('.tipinfo,.nk-menu-tooltip', { placement: 'right' });
        NioApp.BS.popover('[data-bs-toggle="popover"]');
        NioApp.BS.popover('[data-bs-toggle="popover"]');
        NioApp.BS.progress('[data-progress]');
        NioApp.BS.fileinput('.form-file-input');
        NioApp.BS.modalfix();
        NioApp.BS.ddfix();
        NioApp.BS.tabfix();
    };

    NioApp.Picker.init = function () {
        NioApp.Picker.date('.date-picker');
        NioApp.Picker.dob('.date-picker-alt');
        NioApp.Picker.time('.time-picker');
        NioApp.Picker.date('.date-picker-range', { todayHighlight:false, autoclose:false });
    };

    NioApp.Addons.Init = function () {
        NioApp.Knob.init();
        NioApp.Range.init();
        NioApp.Select2.init();
        NioApp.Dropzone.init();
        NioApp.Slider.init();
        NioApp.DataTable.init();
    };

    NioApp.TGL.init = function () {
        NioApp.TGL.content('.toggle');
        NioApp.TGL.expand('.toggle-expand');
        NioApp.TGL.expand('.toggle-opt', { toggle:false });
        NioApp.TGL.showmenu('.nk-nav-toggle');
        NioApp.TGL.ddmenu('.' + _menu + '-toggle', { self:_menu + '-toggle', child:_menu + '-sub' });
    };

    NioApp.BS.modalOnInit = function () {
        $('.modal').on('shown.bs.modal', function () {
            NioApp.Select2.init();
            NioApp.Validate.init();
        });
    };

    // Queue default initializers
    NioApp.init = function () {
        NioApp.docReady.push(NioApp.OtherInit);
        NioApp.docReady.push(NioApp.Prettify);
        NioApp.docReady.push(NioApp.ColorBG);
        NioApp.docReady.push(NioApp.ColorTXT);
        NioApp.docReady.push(NioApp.Copied);
        NioApp.docReady.push(NioApp.Ani.init);
        NioApp.docReady.push(NioApp.TGL.init);
        NioApp.docReady.push(NioApp.BS.init);
        NioApp.docReady.push(NioApp.Validate.init);
        NioApp.docReady.push(NioApp.Picker.init);
        NioApp.docReady.push(NioApp.Addons.Init);
        NioApp.docReady.push(NioApp.Wizard);
        NioApp.docReady.push(NioApp.sbCompact);
        NioApp.winLoad.push(NioApp.ModeSwitch);
    };

    NioApp.init();
    return NioApp;

}(NioApp, jQuery);

// Execute queued functions on DOM ready and window load
document.addEventListener('DOMContentLoaded', function () {
  try { (window.NioApp.docReady || []).forEach(function (fn) { try { fn(); } catch (e) { console.error(e); } }); }
  catch (e) { console.error('docReady runner failed', e); }
});
window.addEventListener('load', function () {
  try { (window.NioApp.winLoad || []).forEach(function (fn) { try { fn(); } catch (e) { console.error(e); } }); }
  catch (e) { console.error('winLoad runner failed', e); }
});

