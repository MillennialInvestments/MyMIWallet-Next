(function (window, document) {
    'use strict';

    function getJQuery() {
        return window.jQuery || window.$ || null;
    }

    function resolveCollection(target) {
        var $ = getJQuery();

        if (!$ || !target) {
            return null;
        }

        if (target.jquery) {
            return target;
        }

        if (target.nodeType || target === window || target === document) {
            return $(target);
        }

        return $(target);
    }

    function cloneSections($table) {
        return {
            thead: $table.children('thead').length ? $table.children('thead').first().clone(true, true) : null,
            tfoot: $table.children('tfoot').length ? $table.children('tfoot').first().clone(true, true) : null
        };
    }

    function restoreSections($table, sections) {
        if (!$table || !sections) {
            return;
        }

        if (sections.thead) {
            $table.append(sections.thead);
        }

        if (sections.tfoot) {
            $table.append(sections.tfoot);
        }
    }

    function parseOptions(raw) {
        if (!raw) {
            return {};
        }

        if (typeof raw === 'object') {
            return raw;
        }

        try {
            return JSON.parse(raw);
        } catch (error) {
            console.warn('Unable to parse datatable options from data attribute.', error);
            return {};
        }
    }

    function triggerContentLoaded(context) {
        var $ = getJQuery();
        if (!$) {
            return;
        }

        $(document).trigger('content:loaded', [context || document]);
    }

    function patchDomInjectionHooks() {
        var $ = getJQuery();

        if (!$ || !$.fn || $.fn.__mymiDataTablesPatched) {
            return;
        }

        $.fn.__mymiDataTablesPatched = true;

        var originalHtml = $.fn.html;
        var originalAppend = $.fn.append;
        var originalLoad = $.fn.load;

        $.fn.html = function () {
            var result = originalHtml.apply(this, arguments);

            if (arguments.length > 0) {
                triggerContentLoaded(this);
            }

            return result;
        };

        $.fn.append = function () {
            var result = originalAppend.apply(this, arguments);

            if (arguments.length > 0) {
                triggerContentLoaded(this);
            }

            return result;
        };

        if (typeof originalLoad === 'function') {
            $.fn.load = function () {
                var args = Array.prototype.slice.call(arguments);
                var lastArg = args[args.length - 1];
                var callback = typeof lastArg === 'function' ? lastArg : null;

                if (callback) {
                    args[args.length - 1] = function () {
                        callback.apply(this, arguments);
                        triggerContentLoaded(this);
                    };
                } else {
                    args.push(function () {
                        triggerContentLoaded(this);
                    });
                }

                return originalLoad.apply(this, args);
            };
        }
    }

    window.getOrCreateDataTable = function (selector, options) {
        var $ = getJQuery();
        var settings = options || {};

        if (!$ || !$.fn || typeof $.fn.DataTable !== 'function') {
            return null;
        }

        var $table = resolveCollection(selector);
        if (!$table || !$table.length) {
            return null;
        }

        $table = $table.first();

        if ($.fn.DataTable.isDataTable($table)) {
            return $table.DataTable();
        }

        return $table.DataTable(settings);
    };

    window.rebuildDataTableSafe = function (selector, options) {
        var $ = getJQuery();
        var settings = options || {};

        if (!$ || !$.fn || typeof $.fn.DataTable !== 'function') {
            return null;
        }

        var $table = resolveCollection(selector);
        if (!$table || !$table.length) {
            return null;
        }

        $table = $table.first();

        if ($.fn.DataTable.isDataTable($table)) {
            var preservedSections = cloneSections($table);
            $table.DataTable().clear().destroy();
            $table.empty();
            restoreSections($table, preservedSections);
        }

        return $table.DataTable(settings);
    };

    window.initDataTableSafe = function (selector, options) {
        var settings = options || {};
        if (settings.forceRebuild === true) {
            var rebuildOptions = Object.assign({}, settings);
            delete rebuildOptions.forceRebuild;
            return window.rebuildDataTableSafe(selector, rebuildOptions);
        }
        return window.getOrCreateDataTable(selector, settings);
    };

    window.reloadDataTableSafe = function (selector, resetPaging) {
        var $ = getJQuery();
        if (!$ || !$.fn || typeof $.fn.DataTable !== 'function') {
            return;
        }

        var $table = resolveCollection(selector);
        if (!$table || !$table.length) {
            return;
        }

        $table = $table.first();

        if ($.fn.DataTable.isDataTable($table)) {
            $table.DataTable().ajax.reload(null, resetPaging === true);
        }
    };

    window.reinitializeDataTablesIn = function (context) {
        var $ = getJQuery();
        if (!$ || !$.fn || typeof $.fn.DataTable !== 'function') {
            return;
        }

        var $context = context ? resolveCollection(context) : $(document);
        var selector = 'table.datatable, table.datatable-init, table.datatable-safe';

        if (!$context || !$context.length) {
            $context = $(document);
        }

        $context.find(selector).addBack(selector).each(function () {
            var $table = $(this);
            var options = parseOptions($table.attr('data-datatable-options'));
            window.getOrCreateDataTable($table, options);
        });
    };

    window.createDataTableAjaxConfig = function (config) {
        var options = config || {};
        var endpoint = options.url || '';
        var requestData = typeof options.data === 'function' ? options.data : function () {};
        var statusTarget = options.statusTarget || null;
        var dataSrc = typeof options.dataSrc === 'function'
            ? options.dataSrc
            : function (json) {
                return json && Array.isArray(json.data) ? json.data : [];
            };

        function writeStatus(message, level) {
            if (!statusTarget) {
                return;
            }

            var $ = getJQuery();
            if (!$) {
                return;
            }

            var $target = resolveCollection(statusTarget);
            if (!$target || !$target.length) {
                return;
            }

            var type = level || 'warning';
            var cssClass = type === 'danger'
                ? 'alert-danger'
                : (type === 'success' ? 'alert-success' : 'alert-warning');
            $target.html('<div class="alert ' + cssClass + ' py-2 px-3 mb-0">' + message + '</div>');
        }

        return {
            url: endpoint,
            type: options.type || 'POST',
            data: function (d) {
                requestData(d);
            },
            dataSrc: function (json) {
                if (!json || !Array.isArray(json.data)) {
                    console.error('Invalid DataTables JSON response.', {
                        endpoint: endpoint,
                        payload: json
                    });
                    writeStatus('Received an invalid table payload from the server.', 'danger');
                }
                return dataSrc(json);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('DataTables AJAX request failed.', {
                    endpoint: endpoint,
                    status: xhr && xhr.status,
                    statusText: xhr && xhr.statusText,
                    textStatus: textStatus,
                    errorThrown: errorThrown,
                    responseText: xhr && xhr.responseText
                });
                writeStatus('Unable to load table data. Please refresh and try again.', 'danger');
            }
        };
    };

    window.MyMIDataTables = window.MyMIDataTables || {};
    window.MyMIDataTables.getOrCreate = window.getOrCreateDataTable;
    window.MyMIDataTables.rebuild = window.rebuildDataTableSafe;
    window.MyMIDataTables.init = window.initDataTableSafe;
    window.MyMIDataTables.reload = window.reloadDataTableSafe;
    window.MyMIDataTables.reinitializeIn = window.reinitializeDataTablesIn;
    window.MyMIDataTables.ajaxConfig = window.createDataTableAjaxConfig;

    function boot() {
        var $ = getJQuery();
        if (!$) {
            return;
        }

        patchDomInjectionHooks();

        $(document)
            .off('content:loaded.datatablesHelper')
            .on('content:loaded.datatablesHelper', function (_event, context) {
                window.reinitializeDataTablesIn(context || document);
            })
            .off('shown.bs.modal.datatablesHelper')
            .on('shown.bs.modal.datatablesHelper', '.modal', function () {
                window.reinitializeDataTablesIn(this);
            });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})(window, document);
