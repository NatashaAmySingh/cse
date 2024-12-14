<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/report.css" />
    <title>Average Performance Report</title>
    <style>
        .average-performance {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .average-performance th, .average-performance td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .average-performance th {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Average Performance Report (Term: <?php echo htmlspecialchars($termName); ?>)</h3>

    <?php if ($averagePerformance): ?>
        <table class="average-performance">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Average Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($averagePerformance as $report): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($report['subject']); ?></td>
                        <td><?php echo number_format($report['average_score'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data available for the selected term.</p>
    <?php endif; ?>

</div>

</body>
</html>