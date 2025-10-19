<?php
namespace App\Modules\ScriptStudio\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ScriptSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $documentation = <<<MD
# Sample EMA Crossover Strategy

This sample demonstrates how Script Studio renders **Markdown** documentation for a strategy.

- 20-period exponential moving average (EMA)
- 50-period EMA
- Simple crossover logic for illustrative purposes

```pine
// Example Pine Script
//@version=5
indicator("EMA Crossover")
fast = ta.ema(close, 20)
slow = ta.ema(close, 50)
plot(fast, color=color.green)
plot(slow, color=color.red)
plotshape(ta.crossover(fast, slow), style=shape.labelup, color=color.new(color.green, 0), location=location.belowbar, text="Buy")
plotshape(ta.crossunder(fast, slow), style=shape.labeldown, color=color.new(color.red, 0), location=location.abovebar, text="Sell")
```
MD;

        $data = [
            'title'         => 'Sample EMA Crossover',
            'slug'          => 'sample-ema-crossover',
            'description'   => 'Demonstration strategy using EMA crossovers.',
            'platform'      => 'TradingView',
            'language'      => 'PineScript',
            'code_raw'      => "//@version=5\nindicator('EMA Crossover', overlay=true)\nplot(ta.ema(close, 20))\nplot(ta.ema(close, 50))",
            'code_emulated' => "// Emulated output placeholder for PineScript\n",
            'logic_type'    => 'Strategy',
            'tags'          => json_encode(['EMA', 'Crossover', 'Momentum']),
            'documentation' => $documentation,
            'price'         => 0.00,
            'is_published'  => 1,
            'created_by'    => 1,
            'created_at'    => $now,
            'updated_at'    => $now,
        ];

        $this->db->table('bf_script_studio')->insert($data);
    }
}