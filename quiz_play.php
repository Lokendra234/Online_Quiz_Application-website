<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainiac Lokendra Quizzes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --primary-bg-color: #001f3f;
            --card-bg-color: white;
            --btn-primary-bg: #007bff;
            --btn-primary-hover-bg: #0056b3;
            --btn-success-bg: #28a745;
            --btn-success-hover-bg: #218838;
            --btn-danger-bg: #dc3545;
            --btn-danger-hover-bg: #c82333;
            --timer-color: #ffd700;
            --text-color: #fff;
            --kbc-glow-color: #ffd700;
        }

        html {
            font-size: 10px;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-image: url(img/background.jpg);
            background-size: cover;
            background-attachment: fixed;
            color: var(--text-color);
            overflow-x: hidden;
            user-select: none;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
            text-align: center;
        }

        #welcome-section {
            margin-bottom: 40px;
        }

        .timer {
            font-size: 26px;
            font-weight: bold;
            color: white;
            text-shadow: 0 0 5px var(--kbc-glow-color);
        }

        .card {
            background-color: var(--card-bg-color);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 0px 15px var(--kbc-glow-color);
            margin-bottom: 30px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .options .btn {
            font-size: 18px;
            padding: 15px;
            background-color: var(--btn-primary-bg);
            color: var(--text-color);
            transition: background-color 0.3s, box-shadow 0.1s, transform 0.2s;
            margin-bottom: 15px;
        }

        .options .btn:hover {
            background-color: #e80f96;
            box-shadow: 0 0 5px var(--kbc-glow-color);
            transform: scale(1.05);
        }

        #result-container {
            background-color: #f8f9fa; 
            padding: 20px;
            border-radius: 8px; 
        }

        h3 {
            color: black;
            margin-bottom: 20px;
        }

        .percentage-container {
            font-weight: bold; 
            font-size: 24px;  
            color: black;     
        }

        #result-details {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        #result-details td, #result-details th {
            border: 1px solid black; 
            padding: 8px;
            text-align: left;
            color: black;
            font-weight: bold;
        }

        .table {
            background-color: var(--card-bg-color);
        }

        thead {
            display: none;
        }

        .table th, .table td {
            color: black;
            border-color: #333;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .btn-success, .btn-danger {
            font-size: 18px;
            padding: 10px 20px;
        }

        .btn-success {
            background-color: var(--btn-success-bg);
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: var(--btn-success-hover-bg);
        }

        .btn-danger {
            background-color: var(--btn-danger-bg);
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: var(--btn-danger-hover-bg);
        }

        .feedback-section {
            background-color: #e9ecef; 
            padding: 15px;
            border-radius: 5px;
        }

        .feedback-section h4 {
            font-family: 'Arial', sans-serif; 
            color: #343a40; 
            margin-bottom: 15px; 
        }

        .feedback-section .form-control {
            border: 1px solid #ced4da; 
            border-radius: 4px; 
            padding: 10px; 
            width: 100%; 
            resize: none; 
        }

        .feedback-section .form-control::placeholder {
            color: #6c757d; 
        }

        .feedback-section .btn {
            background-color: #007bff; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            padding: 10px 15px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }

        .feedback-section .btn:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
<div class="container">
    <div id="welcome-section">
        <button class="btn btn-danger" id="logout-button" onclick="logout()">Logout</button>
    </div>
    <div id="quiz-container">
        <div class="timer" id="timer">Time left: 1:00</div>
        <div id="question-number" class="timer" style="font-size: 20px; color: white; margin-bottom: 15px;">Question: 1</div>
        <div class="question-card card">
            <div class="card-body">
                <h5 class="card-title" id="question-text"></h5>
                <div class="options">
                    <button class="btn w-100 mb-2 option" id="option1"></button>
                    <button class="btn w-100 mb-2 option" id="option2"></button>
                    <button class="btn w-100 mb-2 option" id="option3"></button>
                    <button class="btn w-100 mb-2 option" id="option4"></button>
                    <button class="btn btn-warning w-100 mb-2" id="skip-button">Skip</button>
                </div>
            </div>
        </div>
    </div>
    <div id="result-container" class="container text-center my-5" style="display: none;">
        <h3>Your Results</h3>
        <div class="percentage-container mb-4">
            <span class="percentage-text">Percentage: <span id="percentage"></span>%</span>
        </div>
        <div class="table-responsive" style="max-width: 800px; margin: auto;">
            <table class="table table-striped table-bordered" id="result-details">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Your Answer</th>
                        <th>Correct Answer</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody id="result-details-body">
                    <!-- Results will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <button class="btn btn-success me-2" onclick="saveResults()">Save Results</button>
            <button class="btn btn-danger me-2" onclick="window.location.reload()">Play Again</button>
            <button class="btn btn-primary" onclick="takeAnotherExam()">Take Another Exam</button> 
        </div>
        <div class="feedback-section mt-4">
            <h4>We value your feedback!</h4>
            <textarea id="feedback" class="form-control" rows="4" placeholder="Share your thoughts about the quiz..."></textarea>
            <button class="btn btn-primary mt-2" onclick="submitFeedback()">Submit Feedback</button>
        </div>
    </div>
</div>
<script>
        document.addEventListener('contextmenu', (e) => e.preventDefault()); // Disable right-click menu

        let currentQuestion = 0;
        const category = <?php echo json_encode($_REQUEST["exam_id"]); ?>;
        const difficulty = <?php echo json_encode($_REQUEST["b"]); ?>;
        let timeLeft = 60;
        let timer;
        let score = 0;
        let correctAnswer = '';
        let questions = [];
        let totalQuestions = 40;
        
        function loadQuestion() {
            clearInterval(timer);
            timeLeft = 30;
            updateTimerDisplay();

             // Update the question number display
            document.getElementById('question-number').innerText = `Question: ${currentQuestion + 1}`;
            
            if (currentQuestion >= totalQuestions) {
                showResult();
                return;
            }

            const fetchUrl = `fetch_question.php?category_id=${category}&difficulty=${difficulty}&current_question=${currentQuestion}`;
            fetch(fetchUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "no_more_questions") {
                        showResult();
                    } else {
                        document.getElementById('question-text').innerText = data.question;
                        document.getElementById('option1').innerText = data.opt1;
                        document.getElementById('option2').innerText = data.opt2;
                        document.getElementById('option3').innerText = data.opt3;
                        document.getElementById('option4').innerText = data.opt4;
                        correctAnswer = data.correct_answer;

                        questions.push({
                            question: data.question,
                            correctAnswer: data.correct_answer,
                            userAnswer: null
                        });

                        document.querySelectorAll('.option').forEach(button => {
                            button.onclick = () => {
                                const userAnswer = button.innerText;
                                questions[currentQuestion].userAnswer = userAnswer;

                                if (userAnswer === correctAnswer) {
                                    score += 5; 
                                }

                                currentQuestion++;
                                loadQuestion();
                            };
                        });
                         // Add event listener for Skip button
                document.getElementById('skip-button').onclick = () => {
                    questions[currentQuestion].userAnswer = 'Skipped'; // Optional: Track skipped questions
                    currentQuestion++;
                    loadQuestion();
                };
                        timer = setInterval(() => {
                            timeLeft--;
                            updateTimerDisplay();
                            if (timeLeft <= 0) {
                                currentQuestion++;
                                loadQuestion();
                            }
                        }, 1000);
                    }
                })
                .catch(error => {
                    document.getElementById('quiz-container').innerHTML = "<h3>Error loading questions. Please try again later.</h3>";
                });
        }

        function updateTimerDisplay() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('timer').innerText = `Time left: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        function showResult() {
            clearInterval(timer);
            document.getElementById('quiz-container').style.display = 'none';
            document.getElementById('result-container').style.display = 'block';
            
          // Calculate the percentage score
            if (totalQuestions > 0) {
            const percentage = (score /200) * 100;
            document.getElementById('percentage').innerText = percentage.toFixed(5) + '';
            } else {
                        document.getElementById('percentage').innerText = 'Total questions must be greater than zero.';
                    }
            // Generate the result details
            let resultDetails = '';
            questions.forEach((q, index) => {
                let question = q.question.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                let correctAnswer = q.correctAnswer.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                let userAnswer = (q.userAnswer || 'No Answer').replace(/</g, "&lt;").replace(/>/g, "&gt;");
                
                // Determine the points for the answer
                let points = userAnswer.trim().toLowerCase() === correctAnswer.trim().toLowerCase() ? 5 : 0;

                resultDetails += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${question}</td>
                        <td>${userAnswer}</td>
                        <td>${correctAnswer}</td>
                        <td>${points}</td>
                    </tr>`;
            });
            
            // Update the result details in the HTML
            document.getElementById('result-details').innerHTML = resultDetails;
        }

        function saveResults() {
            const resultData = {
                score: score,
                percentage: (score / 200) * 100,
                questions: questions,
                category: category,
                difficulty: difficulty
            };

            fetch('result.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(resultData)
            })
            .then(response => response.text())
            .then(text => {
                console.log('Response:', text);
                try {
                    const data = JSON.parse(text);
                    if (data.status === 'success') {
                        alert('Results saved successfully!');
                    } else {
                        alert('Failed to save results. Please try again.');
                    }
                } catch (error) {
                    console.error('JSON parse error:', error, 'Response:', text);
                    alert('Error saving results. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error details:', error);
                alert('Error saving results. Please try again.');
            });
        }
    function submitFeedback() {
    const feedbackText = document.getElementById('feedback').value;

    if (!feedbackText) {
        alert('Please provide your feedback before submitting.');
        return;
    }

    const feedbackData = {
        score: score,
        percentage: (score / 200) * 100,
        feedback: feedbackText,
        category: category,
        difficulty: difficulty
    };

    fetch('feedback.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(feedbackData)
    })
    .then(response => response.text())
    .then(text => {
        console.log('Feedback Response:', text);
        try {
            const data = JSON.parse(text);
            if (data.status === 'success') {
                alert('Thank you for your feedback!');
            } else {
                alert('Failed to submit feedback. Please try again.');
            }
        } catch (error) {
            console.error('JSON parse error:', error, 'Response:', text);
            alert('Error submitting feedback. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error details:', error);
        alert('Error submitting feedback. Please try again.');
    });
}
function logout() {
        // Redirect to home page
        window.location.href = 'index.php'; // Replace with your actual home page URL
    }
    function takeAnotherExam() {
        // Redirect to the quiz selection page
        window.location.href = 'select_exam.php'; // Replace with your actual quiz selection URL
    }
        document.addEventListener('DOMContentLoaded', () => {
            loadQuestion();
        });
    </script>
</body>
</html>
