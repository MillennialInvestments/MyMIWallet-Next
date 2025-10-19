<?php 
namespace App\Libraries;

use App\Libraries\{BaseLoader, MyMIUser};
use App\Models\AssetsModel;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;

#[\AllowDynamicProperties]
class MyMIAssets {

    protected $bitcoinJS;
    protected $assetsModel;

    public function __construct() {
        // Initialize BitcoinJS for DigiByte
        $this->bitcoinJS = new BitcoinJS();
        $this->bitcoinJS->initializeDigiByte();

        // Load the AssetsModel
        $this->assetsModel = new AssetsModel();
    }

    public function createDigiAsset() {
        if (!$this->isDigiByteCoreAvailable()) {
            throw new Exception('DigiByte Core wallet is not available');
        }

        $issuerAddress = $this->getNewAddress();
        $transactionHex = $this->createAssetIssuanceTransaction($issuerAddress, $name, $amount, $metadata);
        $signedTransactionHex = $this->signTransaction($transactionHex);
        $transactionId = $this->sendTransaction($signedTransactionHex);
        $assetId = $this->assetsModel->addAsset($name, $issuerAddress, $amount, $metadata, $transactionId);

        return $assetId;
    }

    public function listDigiAssets() {
        $assets = $this->assetsModel->getAllAssets();
        return $assets;
    }

    public function listTradableAssets() {
        $assets = $this->assetsModel->getTradableAssets();
        return $assets;
    }

    public function getDigiAsset($assetID) {
        $asset = $this->assetsModel->getAssetById($assetID);
        if (!$asset) {
            throw new Exception('Digi Asset not found');
        }
        return $asset;
    }

    public function getAssetPrice($assetID) {
        $symbol = $this->assetsModel->getAssetSymbol($assetID);
        if ($symbol) {
            $url = "https://api.coingecko.com/api/v3/simple/price?ids={$symbol}&vs_currencies=usd";
            $response = file_get_contents($url);
            $priceData = json_decode($response, true);
            return $priceData[$symbol]['usd'] ?? null;
        }
        return null;
    }

    public function createAuction($assetID, $startPrice, $minIncrement) {
        $asset = $this->assetsModel->getAssetById($assetID);
        if (!$asset) {
            throw new Exception('Digi Asset not found');
        }
        $auctionID = $this->assetsModel->addAuction($assetID, $startPrice, $minIncrement);
        return $auctionID;
    }

    public function placeBid($auctionID, $userID, $amount) {
        $auction = $this->assetsModel->getAuctionById($auctionID);
        if (!$auction) {
            throw new Exception('Auction not found');
        }
        $highestBid = $this->assetsModel->getHighestBid($auctionID);
        if ($amount <= ($highestBid['amount'] + $auction['min_increment'])) {
            throw new Exception('Bid amount is too low');
        }
        $bidID = $this->assetsModel->addBid($auctionID, $userID, $amount);
        return $bidID;
    }

    public function endAuction($auctionID) {
        $auction = $this->assetsModel->getAuctionById($auctionID);
        if (!$auction) {
            throw new Exception('Auction not found');
        }
        $highestBid = $this->assetsModel->getHighestBid($auctionID);
        if (!$highestBid) {
            throw new Exception('No bids placed on this auction');
        }
        $this->assetsModel->endAuction($auctionID, $highestBid['user_id']);
        return $highestBid;
    }

    // Additional methods (like isDigiByteCoreAvailable, getNewAddress, etc.) go here
}
