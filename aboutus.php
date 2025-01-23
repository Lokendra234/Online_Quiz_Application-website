<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Brainiac Lokendra Quizzes</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: auto;
            max-width: 1200px;
            margin: auto;
        }
        .left-section {
            flex: 1;
            background-color: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .left-section img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .right-section {
            flex: 1;
            padding: 5%;
            background-color: #f8f5f2;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            font-weight: bold;
            color: black;
        }
        nav {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        nav a {
            color: #333;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .highlight {
            font-weight: 500;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .left-section {
                height: 200px; /* Adjust height for smaller screens */
            }
            h1 {
                font-size: 1.5rem;
            }
            nav {
                top: 10px;
                right: 10px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 18px;
            }
            nav a {
                margin-left: 10px;
                font-size: 12px;
            }
            h1 {
                font-size: 1.2rem;
                margin-bottom: 1.5rem;
            }
            p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="logo">Brainiac Quizzes</div>
    <nav>
        <a href="aboutus.php">ABOUT US</a>
        <a href="contact.php">CONTACT</a>
        <a href="#" style="border: 1px solid #333; padding: 5px 10px; border-radius: 20px;">OUR WORK</a>
    </nav>
    <div class="container">
        <div class="left-section">
            <img src="img/about.jpg" alt="Decorative image representing quiz concepts">
        </div>
        <div class="right-section">
            <h1>About us.</h1>
            <p class="highlight">Focused on excellence for our quiz takers, we are well established, with a reputation for great educational experiences and high-quality content.</p>
            <p>With our roots in educational technology, Brainiac Lokendra Quizzes works on a wide spectrum of topics, with engaging and challenging questions designed by top educators and subject matter experts. We delight in diversity, from general knowledge quizzes to specialized academic subjects.</p>
            <p>The magic happens at our digital HQ - a virtual space that's reconfigured for every quiz, creating the optimum learning environment with plenty of interactivity to test and build your knowledge prior to completion.</p>
        </div>
    </div>
</body>
</html>
