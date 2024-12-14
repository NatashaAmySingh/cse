<form action="index.php?controller=report&action=updateReportCard" method="POST">
    <input type="hidden" name="score_id" value="<?php echo $reportCard['id']; ?>">
    <input type="hidden" name="student_id" value="<?php echo $reportCard['student_id']; ?>">
    <input type="hidden" name="term_id" value="<?php echo $reportCard['term_id']; ?>">

    <label for="score">Score:</label>
    <input type="text" name="score" value="<?php echo $reportCard['score']; ?>" required><br>

    <button type="submit">Update Report Card</button>
</form>