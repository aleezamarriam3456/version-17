<?php
// Read tasks from the queue file
$tasks = file('task_queue.txt');

// Loop through each task and process it
foreach ($tasks as $task) {
    echo "Processing task: $task<br>";
    // Simulate task completion (e.g., processing data, sending email)
    file_put_contents('log.txt', "Processed task: $task at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
}

// Optionally, clear the queue after processing
file_put_contents('task_queue.txt', '');  // Clear the queue file

echo "Queue processing complete!<br>";
?>
