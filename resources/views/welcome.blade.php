<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquet Shop - Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f4f4f4; /* Soft background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        header {
            background-color: #A8D5BA; /* Sage green */
            color: #F8D7D2; /* Baby pink */
            padding: 40px 20px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
            border-bottom: 5px solid #F8D7D2;
        }
        header h1 {
            font-size: 40px;
            margin: 0;
        }
        .hero {
            max-width: 800px;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        .hero img {
            width: 100%;
            border-radius: 10px;
            max-height: 400px;
            object-fit: cover;
        }
        .hero h2 {
            font-size: 32px;
            color: #4C6A4F; /* Dark Sage */
            margin-top: 20px;
        }
        .hero p {
            font-size: 18px;
            color: #777;
            line-height: 1.6;
            margin-top: 10px;
        }
        .button {
            display: inline-block;
            background-color: #F8D7D2; /* Baby pink */
            color: #4C6A4F; /* Dark sage */
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #E8B0A4; /* Lighter baby pink */
        }
        .auth-buttons {
            margin-top: 30px;
        }
        .auth-buttons a {
            margin: 0 15px;
        }
        footer {
            margin-top: 50px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <h1>Welcome to The Bouquet Shop</h1>
        </header>
        <div class="hero">
            <img src="https://via.placeholder.com/800x500?text=Beautiful+Bouquets" alt="Beautiful Bouquets">
            <h2>Find the Perfect Bouquet for Every Occasion</h2>
            <p>Whether it's a wedding, anniversary, or just because, we have a wide range of stunning bouquets waiting for you.</p>
            <a href="#" class="button">Browse Our Collection</a>
        </div>
        <div class="auth-buttons">
            <a href="/login" class="button">Login</a>
            <a href="/register" class="button">Sign Up</a>
        </div>
        <footer>
            <p>&copy; 2025 The Bouquet Shop. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
