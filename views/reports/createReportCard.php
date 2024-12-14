<form action="index.php?controller=report&action=createReportCard" method="POST">
    <label for="student_id">Student:</label>
    <input type="number" name="student_id" id="student_id" required><br>

    <label for="subject_id">Subject:</label>
    <input type="number" name="subject_id" id="subject_id" required><br>

    <label for="score">Score:</label>
    <input type="text" name="score" id="score" required><br>

    <label for="term_id">Term:</label>
    <input type="number" name="term_id" id="term_id" required><br>

    <button type="submit">Create Report Card</button>
</form>