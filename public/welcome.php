<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            background: linear-gradient(135deg, #1a2a6c 0%, #2a4d8f 50%, #1f6feb 100%);
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; 
            margin: 0; 
            color: white; /* Set text color to white */
        }
        h1 {
            font-size: 36px; /* Set the font size for h1 */
        }
        .button {
            display: inline-block;
            padding: 20px;
            font-size: 18px;
            margin: 10px;
            text-decoration: none;
            background-color: #3498db;
            color: #ffffff;
            border: 2px solid #2980b9;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Welcome</h1>
    <p>Choose an option below:</p>

    <a href="index.php" class="button">Student Login</a>
    <a href="teacher_signin.php" class="button">Teacher Login</a>
</body>
</html>
