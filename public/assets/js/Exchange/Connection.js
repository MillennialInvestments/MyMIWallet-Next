var Connection = (function(){

	function Connection(url) {

    	this.open = false;

    	this.socket = new WebSocket("ws://" + url);
    	this.setupConnectionEvents();
  	}

	Connection.prototype = {
		setupConnectionEvents : function () {
      		var self = this;

      		self.socket.onopen = function(evt) { self.connectionOpen(evt); };
      		self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
      		self.socket.onclose = function(evt) { self.connectionClose(evt); };
    	},

    	connectionOpen : function(evt){
      		this.open = true;
      		this.addSystemMessage("Connected");
		},
    	connectionMessage : function(evt){
      		var data = JSON.parse(evt.data);
      					
        	this.addChatMessage(data.msg);
    	},
    	connectionClose : function(evt){
      		this.open = false;
      		this.addSystemMessage("Disconnected");
    	},

    	sendMsg : function(message){
    		
        	this.socket.send(JSON.stringify({
          		msg : message
        	}));
		},

    	addChatMessage : function(data){
    		
			console.log(data);
			
    		switch(data.broadType){
    			case Broadcast.POST : this.addNewPost(data); break;
    			default : console.log("nothing to do");
    		}
		},
		
		addNewPost : function(data){
			
			var newPost = data.data;
			
			var appElement = document.querySelector('[ng-app=myApp]');
	      	var $rootScope = angular.element(appElement).scope();
	
	      	$rootScope.$apply(function() {
	          	$rootScope.posts.unshift(newPost);
	      	});
		},
		
    	addSystemMessage : function(msg){
      		// this.chatwindow.innerHTML += "<p>" + msg + "</p>";
    	}
  	};

  	return Connection;

})();

// Solana Phase 03 shared frontend helpers. Keeps Bootstrap 4.6/jQuery flows intact.
(function (window, document, $) {
    'use strict';

    var state = window.MyMISolanaState = window.MyMISolanaState || {
        wallet: null,
        connected: false,
        networkStatus: 'checking_wallet',
        locks: {},
        pollTimer: null,
        lastFrontendData: null,
        csrfName: null,
        csrfHash: null
    };

    function readCsrf() {
        var metaName = document.querySelector('meta[name="csrf-token-name"]');
        var metaHash = document.querySelector('meta[name="csrf-token"]');
        var input = document.querySelector('input[name][value][type="hidden"]');
        state.csrfName = (metaName && metaName.content) || (input && input.name) || state.csrfName;
        state.csrfHash = (metaHash && metaHash.content) || (input && input.value) || state.csrfHash;
    }

    function setStatus(status, message, level) {
        state.networkStatus = status;
        var text = message || status.replace(/_/g, ' ');
        var css = level || (status.indexOf('failed') >= 0 ? 'danger' : (status.indexOf('confirmed') >= 0 || status === 'connected' ? 'success' : 'info'));
        $('[data-solana-status]').removeClass('alert-info alert-success alert-warning alert-danger d-none')
            .addClass('alert-' + css).text(text);
        $('[data-solana-status-badge]').removeClass('badge-info badge-success badge-warning badge-danger')
            .addClass('badge-' + css).text(text);
    }

    function csrfFetch(url, options) {
        readCsrf();
        options = options || {};
        var headers = options.headers || {};
        headers['X-Requested-With'] = 'XMLHttpRequest';
        if (state.csrfName && state.csrfHash) {
            headers['X-CSRF-TOKEN'] = state.csrfHash;
        }
        options.headers = headers;
        return fetch(url, options).then(function (response) {
            if (response.status === 419 || response.status === 403) {
                setStatus('failed_transaction', 'Your session expired. Please refresh and try again.', 'danger');
            }
            return response;
        }).then(function (response) { return response.json(); });
    }

    function withLock(name, callback) {
        if (state.locks[name]) {
            return Promise.resolve({ skipped: true });
        }
        state.locks[name] = true;
        $('[data-solana-lock="' + name + '"]').prop('disabled', true).addClass('disabled');
        return Promise.resolve(callback()).finally(function () {
            state.locks[name] = false;
            $('[data-solana-lock="' + name + '"]').prop('disabled', false).removeClass('disabled');
        });
    }

    function detectProvider() {
        if (window.solana && window.solana.isPhantom) return window.solana;
        if (window.solflare) return window.solflare;
        return null;
    }

    var api = window.MyMISolanaUX = {
        state: state,
        setStatus: setStatus,
        csrfFetch: csrfFetch,
        withLock: withLock,
        connectWallet: function () {
            return withLock('wallet', function () {
                setStatus('checking_wallet', 'Checking Solana wallet extension...', 'info');
                var provider = detectProvider();
                if (!provider || !provider.connect) {
                    setStatus('disconnected', 'Wallet extension missing. Install Phantom or Solflare to continue.', 'warning');
                    return Promise.reject(new Error('wallet_extension_missing'));
                }
                return provider.connect().then(function (resp) {
                    state.wallet = (resp && resp.publicKey ? resp.publicKey.toString() : null);
                    state.connected = !!state.wallet;
                    setStatus('connected', 'Wallet connected' + (state.wallet ? ': ' + state.wallet.slice(0, 4) + '...' + state.wallet.slice(-4) : ''), 'success');
                    return state.wallet;
                }).catch(function (error) {
                    setStatus('disconnected', 'Failed wallet refresh/connect. Please retry.', 'danger');
                    throw error;
                });
            });
        },
        disconnectWallet: function () {
            var provider = detectProvider();
            if (provider && provider.disconnect) provider.disconnect();
            state.wallet = null;
            state.connected = false;
            setStatus('disconnected', 'Wallet disconnected.', 'warning');
        },
        refreshWallet: function () {
            return api.connectWallet();
        },
        pollFrontendData: function () {
            if (document.hidden) return Promise.resolve();
            var base = window.MyMISolanaConfig && window.MyMISolanaConfig.frontendDataUrl;
            if (!base) return Promise.resolve();
            return csrfFetch(base, { method: 'POST' }).then(function (json) {
                state.lastFrontendData = json;
                if (json && json.csrfHash) state.csrfHash = json.csrfHash;
                if (json && json.success === false) {
                    setStatus('failed_transaction', json.message || 'Failed wallet refresh.', 'danger');
                    return json;
                }
                setStatus(state.connected ? 'connected' : 'disconnected', state.connected ? 'Wallet data refreshed.' : 'Live exchange data refreshed.', 'success');
                if ($.fn.DataTable) {
                    $('.dataTable, #cuSolanaOrdersTable').each(function () {
                        if ($.fn.DataTable.isDataTable(this)) $(this).DataTable().ajax.reload(null, false);
                    });
                }
                $(document).trigger('mymi:solana:frontend-data', [json]);
                return json;
            }).catch(function (error) {
                setStatus('failed_transaction', 'RPC degraded or failed wallet refresh. Please retry shortly.', 'warning');
                return { success: false, error: error.message };
            });
        },
        startPolling: function () {
            if (state.pollTimer) clearInterval(state.pollTimer);
            state.pollTimer = setInterval(api.pollFrontendData, 20000);
            api.pollFrontendData();
        }
    };

    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) api.pollFrontendData();
    });

    $(function () {
        readCsrf();
        setStatus('checking_wallet', 'Checking wallet and Solana RPC status...', 'info');
        api.startPolling();
        $(document).on('click', '[data-solana-wallet-connect], #createSolanaWallet', function (event) {
            event.preventDefault();
            api.connectWallet().catch(function () {});
        });
        $(document).on('click', '[data-solana-wallet-disconnect]', function (event) {
            event.preventDefault();
            api.disconnectWallet();
        });
        $(document).on('submit', '#solanaCoinSwapForm, #createTokenForm, #buyForm, #sellForm', function (event) {
            var form = this;
            var lockName = form.id === 'createTokenForm' ? 'mint' : (form.id === 'solanaCoinSwapForm' ? 'swap' : 'order');
            if (state.locks[lockName]) {
                event.preventDefault();
                return false;
            }
            state.locks[lockName] = true;
            setStatus('pending_transaction', 'Submitting transaction request...', 'info');
            $(form).find(':submit').prop('disabled', true).addClass('disabled').text('Submitting...');
        });
    });
})(window, document, window.jQuery || window.$);
