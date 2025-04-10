<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - The Bouquet Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 400px;
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        header {
            background-color: #A8D5BA;
            color: #F8D7D2;
            padding: 20px 0;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        header h1 {
            font-size: 36px;
            margin: 0;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #F8D7D2;
            color: #4C6A4F;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #E8B0A4;
        }
        .link {
            display: block;
            margin-top: 15px;
            color: #4C6A4F;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Sign Up</h1>
        </header>
        <form action="#" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <a href="/login" class="link">Already have an account? Login here.</a>
    </div>
</body>
</html>
