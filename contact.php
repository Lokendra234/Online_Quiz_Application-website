<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Brainiac Lokendra Quizzes</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f8ff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 3rem;
            color: #ffa500;
            text-align: center;
            margin-bottom: 30px;
        }
        .ocean-waves {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2387CEEB" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,181.3C384,181,480,139,576,138.7C672,139,768,181,864,186.7C960,192,1056,160,1152,138.7C1248,117,1344,107,1392,101.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: 100% 150px;
            padding-bottom: 150px;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            height: 100px;
        }
        button {
            background-color: #ffa500;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #ff8c00;
        }
        .fish {
            position: absolute;
            font-size: 20px;
            animation: swim 15s linear infinite;
        }
        @keyframes swim {
            from { left: -50px; }
            to { left: 100%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact us</h1>
        <div class="ocean-waves">
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Your name*</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your e-mail*</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Your subject*</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Your message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
    <div class="fish" style="top: 20%;">🐟</div>
    <div class="fish" style="top: 40%;">🐠</div>
    <div class="fish" style="top: 60%;">🐡</div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('contactForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                // Log the form data to the console
                console.log('Form submitted');
                console.log('Name:', this.name.value);
                console.log('Email:', this.email.value);
                console.log('Subject:', this.subject.value);
                console.log('Message:', this.message.value);
                // You can add your own logic for what to do with the data here
            });
        });
    </script>
</body>
</html>
