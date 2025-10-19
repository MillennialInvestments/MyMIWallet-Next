<?php // app/Views/themes/dashboard/partials/custom-js/tradingview.php ?>
<?php
$nonce = $nonce ?? ['script' => '', 'style' => ''];

$currentUserType = isset($current_user->type) && ! empty($current_user->type)
    ? $current_user->type
    : '';
$database = 'bf_investment_trade_alerts';
$pageURIA = $this->uri->segment(1);

$dbType = match ($pageURIA) {
    'Breakout-Stocks'  => 'Breakout Stock',
    'Liquidity-Stock'  => 'Liquidity Stock',
    'Morning-Movers'   => 'Morning Mover',
    'Penny-Stocks'     => 'Penny Stock',
    'Weekly-Options'   => 'Weekly Option',
    default            => null,
};

if ($dbType !== null) {
    $this->db->from($database);
    $this->db->where('category', $dbType);
    $this->db->where('status', 'Opened');
    if ($currentUserType !== '') {
        $this->db->where($currentUserType, 'Yes');
    }
    $this->db->order_by('id', 'DESC');
    $getAlert = $this->db->get();

    foreach ($getAlert->result_array() as $alertInfo) {
        $symbol       = $alertInfo['stock'] ?? '';
        $exchangeName = $alertInfo['exchange'] ?? '';
        if ($symbol === '' || $exchangeName === '') {
            continue;
        }

        $config = [
            'symbol'         => $exchangeName . ':' . $symbol,
            'width'          => '100%',
            'height'         => '100%',
            'locale'         => 'en',
            'dateRange'      => '1d',
            'colorTheme'     => 'light',
            'trendLineColor' => '#37a6ef',
            'underLineColor' => '#E3F2FD',
            'isTransparent'  => false,
            'autosize'       => true,
            'largeChartUrl'  => site_url('Stock/' . $exchangeName . '/' . $symbol),
        ];
        ?>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async <?= $nonce['script'] ?? '' ?>>
        <?= json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
        </script>
        <?php
    }
}