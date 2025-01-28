<?php
// Task to be added to the queue
$task = "task1:process_file";

// Add task to the queue (file-based approach)
file_put_contents('task_queue.txt', $task . PHP_EOL, FILE_APPEND);

echo "Task has been added to the queue!";
?>
