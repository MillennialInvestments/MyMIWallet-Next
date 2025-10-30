<!DOCTYPE html>
<html>
<head>
    <title>TF-IDF Edge Case Debug</title>
    <style <?= $nonce['style'] ?? '' ?>>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 2rem; }
        th, td { border: 1px solid #ccc; padding: 0.75rem; vertical-align: top; }
        th { background: #f4f4f4; }
        pre { white-space: pre-wrap; word-break: break-word; }
    </style>
</head>
<body>
    <h1>🧪 TF-IDF Edge Case Debug Results</h1>
    <table>
        <thead>
            <tr>
                <th>Test Case</th>
                <th>Input</th>
                <th>Extracted Keywords</th>
                <th>Generated Summary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><strong><?= esc($row['label']) ?></strong></td>
                    <td><pre><?= esc($row['input']) ?></pre></td>
                    <td><pre><?= json_encode($row['keywords'], JSON_PRETTY_PRINT) ?></pre></td>
                    <td><pre><?= esc($row['summary']) ?></pre></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
