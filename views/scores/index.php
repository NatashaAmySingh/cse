<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Scores</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Add Scores for Class</h1>

    <form action="index.php?controller=score&action=saveClassScores" method="post">
        <label for="class_id">Class:</label>
        <select name="class_id" id="class_id" required>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="term_id">Term:</label>
        <select name="term_id" id="term_id" required>
            <?php foreach ($terms as $term): ?>
                <option value="<?= $term['id'] ?>"><?= $term['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <?php foreach ($subjects as $subject): ?>
                        <th><?= $subject['name'] ?> Score</th>
                    <?php endforeach; ?>
                    <th>Total Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['name'] ?></td>
                        <?php $totalScore = 0; ?>
                        <?php foreach ($subjects as $subject): ?>
                            <td>
                                <input type="number" name="scores[<?= $student['id'] ?>][<?= $subject['id'] ?>]" 
                                       min="0" max="100" required 
                                       onchange="updateTotal(this, 'total_<?= $student['id'] ?>')">
                            </td>
                            <?php $totalScore += (isset($scores[$student['id']][$subject['id']]) ? $scores[$student['id']][$subject['id']] : 0); ?>
                        <?php endforeach; ?>
                        <td id="total_<?= $student['id'] ?>">0</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button type="submit">Save Scores</button>
    </form>

    <script>
        function updateTotal(input, totalId) {
            const row = input.closest('tr');
            const inputs = row.querySelectorAll('input[type="number"]');
            let total = 0;
            inputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById(totalId).innerText = total;
        }
    </script>
</body>
</html>
