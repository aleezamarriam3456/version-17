// Trigger AJAX request from the frontend
function sendRequest(url, data) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: url,
        method: 'POST',
        data: data,
        success: resolve,
        error: reject
      });
    });
  }
  
  // Call backend PHP script asynchronously
  sendRequest('add_task_to_queue.php', { task: 'process_data' })
    .then(response => {
      console.log('Task added to queue:', response);
    })
    .catch(error => {
      console.error('Error adding task:', error);
    });
    
  