<p>Are you sure you want to delete this report card?</p>
<a href="index.php?controller=report&action=deleteReportCard&score_id=<?php echo $reportCard['id']; ?>&student_id=<?php echo $reportCard['student_id']; ?>&term=<?php echo $reportCard['term_id']; ?>">Yes, Delete</a>
<a href="index.php?controller=report&action=studentReportCard&student_id=<?php echo $reportCard['student_id']; ?>&term=<?php echo $reportCard['term_id']; ?>">Cancel</a>