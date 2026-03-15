<?php

declare(strict_types=1);

namespace App\Controllers;

class PreviewController extends BaseController
{
    public function index()
    {
        return $this->renderTheme('preview/index', [
            'layout' => 'public',
            'pageName' => 'Market Preview',
            'pageTitle' => 'Free Market Chart Preview | MyMI Wallet',
            'meta' => [
                'description' => 'Explore free stock, crypto, and ETF chart previews from MyMI Wallet.',
            ],
        ]);
    }

    public function stock(?string $symbol = null)
    {
        $safeSymbol = strtoupper((string) preg_replace('/[^A-Za-z0-9\.\-]/', '', $symbol ?? 'AAPL'));
        if ($safeSymbol === '') {
            $safeSymbol = 'AAPL';
        }

        return $this->renderTheme('preview/chart', [
            'layout' => 'public',
            'pageName' => 'Preview Stock Chart - ' . $safeSymbol,
            'pageTitle' => 'Free Stock Chart Preview - ' . $safeSymbol,
            'meta' => [
                'description' => 'View a free public real-time stock chart preview for ' . $safeSymbol . ' on MyMI Wallet.',
            ],
            'metaDescription' => 'View a free public real-time stock chart preview for ' . $safeSymbol . ' on MyMI Wallet.',
            'assetType' => 'stock',
            'symbol' => $safeSymbol,
            'apiUrl' => site_url('api/public/market/stock/' . rawurlencode($safeSymbol)),
        ]);
    }

    public function crypto(?string $symbol = null)
    {
        $safeSymbol = strtolower((string) preg_replace('/[^a-z0-9\-]/', '', strtolower($symbol ?? 'bitcoin')));
        if ($safeSymbol === '') {
            $safeSymbol = 'bitcoin';
        }

        return $this->renderTheme('preview/chart', [
            'layout' => 'public',
            'pageName' => 'Preview Crypto Chart - ' . ucfirst($safeSymbol),
            'pageTitle' => 'Free Crypto Chart Preview - ' . ucfirst($safeSymbol),
            'meta' => [
                'description' => 'View a free public real-time crypto chart preview for ' . ucfirst($safeSymbol) . ' on MyMI Wallet.',
            ],
            'metaDescription' => 'View a free public real-time crypto chart preview for ' . ucfirst($safeSymbol) . ' on MyMI Wallet.',
            'assetType' => 'crypto',
            'symbol' => $safeSymbol,
            'apiUrl' => site_url('api/public/market/crypto/' . rawurlencode($safeSymbol)),
        ]);
    }

    public function etf(?string $symbol = null)
    {
        $safeSymbol = strtoupper((string) preg_replace('/[^A-Za-z0-9\.\-]/', '', $symbol ?? 'SPY'));
        if ($safeSymbol === '') {
            $safeSymbol = 'SPY';
        }

        return $this->renderTheme('preview/chart', [
            'layout' => 'public',
            'pageName' => 'Preview ETF Chart - ' . $safeSymbol,
            'pageTitle' => 'Free ETF Chart Preview - ' . $safeSymbol,
            'meta' => [
                'description' => 'View a free public real-time ETF chart preview for ' . $safeSymbol . ' on MyMI Wallet.',
            ],
            'metaDescription' => 'View a free public real-time ETF chart preview for ' . $safeSymbol . ' on MyMI Wallet.',
            'assetType' => 'etf',
            'symbol' => $safeSymbol,
            'apiUrl' => site_url('api/public/market/etf/' . rawurlencode($safeSymbol)),
        ]);
    }
}
