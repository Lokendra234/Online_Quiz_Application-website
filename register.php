<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(img/login.jpg);
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }
        .signup-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
        }
        .signup-container h1 {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #343a40;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 0.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.5rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .signup-container p {
            margin-top: 20px;
            text-align: center;
        }
        .signup-container a {
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
        }
        .signup-container a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <small class="form-text text-muted">Use at least 8 characters, including letters and numbers.</small>
            </div>
            <div class="mb-3">
                <label for="college" class="form-label">College Name</label>
                <input type="text" id="college" name="college" class="form-control" placeholder="College Name" required>
            </div>
            <input type="submit" name="submit1" class="btn btn-primary w-100" value="Sign Up">
        </form>
        <p class="mt-3">Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>
