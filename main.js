// Handle form submission
document.getElementById("questionForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // Get the question from the input field
    const question = document.getElementById("question").value;

    // Create an AJAX request to send the question
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/server.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.status === 200) {
            // Add the server's response to the response list
            const responseList = document.getElementById("responseList");
            const newResponse = document.createElement("li");
            newResponse.textContent = `Q: ${question} | A: ${this.responseText}`;
            responseList.appendChild(newResponse);

            // Clear the input field
            document.getElementById("question").value = "";
        }
    };

    xhr.onerror = function () {
        console.error("Error sending the question.");
    };

    // Send the question to the server
    xhr.send(`question=${encodeURIComponent(question)}`);
});
