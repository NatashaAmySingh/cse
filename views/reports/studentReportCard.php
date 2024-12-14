<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/report.css" />
    <title>Student Report Card</title>
    <style>
        .report-card {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .report-card th, .report-card td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .report-card th {
            background-color: #f2f2f2;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
    <script>
        // Function to print the report card
        function printReportCard() {
            var printContents = document.getElementById('report-card-content').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</head>
<body>

<div class="container">
    <h3>Select Term to View Report Card</h3>
    
    <form action="index.php" method="get">
        <input type="hidden" name="controller" value="report">
        <input type="hidden" name="action" value="studentReportCard">
        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($studentId); ?>">

        <!-- Dropdown to select term -->
        <label for="term">Select Term:</label>
        <select name="term" id="term">
            <option value="1" <?php echo ($termId == 1) ? 'selected' : ''; ?>>Term 1</option>
            <option value="2" <?php echo ($termId == 2) ? 'selected' : ''; ?>>Term 2</option>
            <option value="3" <?php echo ($termId == 3) ? 'selected' : ''; ?>>Term 3</option>
        </select>
        <button type="submit">View Report Card</button>
    </form>

    <!-- Create Report Card Form -->
    <h3>Add New Report Card Entry</h3>
    
    <form action="index.php?controller=report&action=createReportCard" method="POST">
    <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($studentId); ?>">

    <!-- Correctly passing the term_id -->
    <label for="term_id">Select Term:</label>
    <select name="term_id" id="term_id" required>
        <option value="1" <?php echo ($termId == 1) ? 'selected' : ''; ?>>Term 1</option>
        <option value="2" <?php echo ($termId == 2) ? 'selected' : ''; ?>>Term 2</option>
        <option value="3" <?php echo ($termId == 3) ? 'selected' : ''; ?>>Term 3</option>
    </select><br>

    <label for="subject_id">Subject:</label>
    <select name="subject_id" required>
        <?php foreach ($subjects as $subject): ?>
            <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="score">Score:</label>
    <input type="text" name="score" required><br>

    <button type="submit">Add Report Card Entry</button>
</form>

    <hr>

    <!-- Display Existing Report Cards -->
    <?php if ($studentReportCard): ?>
        <div id="report-card-content">
            <h3>Report Card for <?php echo htmlspecialchars($studentReportCard[0]['student_name']); ?> (Term: <?php echo htmlspecialchars($termName); ?>)</h3>
            <table class="report-card">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studentReportCard as $report): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($report['subject']); ?></td>
                            <td><?php echo htmlspecialchars($report['score']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Print Button -->
            <button onclick="printReportCard()">Print Report Card</button>
            <a href="index.php?controller=report&action=averagePerformanceReport&term=<?php echo $termId; ?>">View Average Performance Report</a>
        </div>
    <?php else: ?>
        <p>No report card data found for student ID <?php echo htmlspecialchars($studentId); ?> and term ID <?php echo htmlspecialchars($termId); ?>.</p>
    <?php endif; ?>
</div>

</body>
</html>