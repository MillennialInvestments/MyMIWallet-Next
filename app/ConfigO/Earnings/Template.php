<?php
namespace Config\Earnings;

class Template
{
    public string $imagePath = 'assets/images/Earnings/';
    public string $earningsDate = 'YYYYMMDD'; // Placeholder for the earnings date
    public $companies = [];

    public function __construct()
    {
        $this->companies = [
            [
                'name' => '', // Company name
                'symbol' => '', // Stock symbol
                'description' => '', // Company overview
                'image' => '', // Company logo filename
                'chart_image' => $this->imagePath . $this->earningsDate . '/IMAGE_NAME.png', // Placeholder for chart image
                'review' => '', // Summary of earnings report
                'market_reaction' => '', // Market response summary
                'reaction_review' => '', // In-depth reaction review
                'sector' => '', // Sector
                'up_down' => '', // Arrow indication for stock movement (up/down/flat)
                'market_reaction_chart' => $this->imagePath . $this->earningsDate . '/MR/IMAGE_NAME-MR.png', // Placeholder for market reaction chart
                'percent_gain_loss' => '', // Percentage gain/loss
                'open_price' => '', // Opening price
                'close_price' => '', // Closing price
                'earnings_date' => '', // Actual earnings date
            ],
            // Add more companies in a similar fashion
        ];
    }
}
