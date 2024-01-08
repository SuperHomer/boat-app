<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boats App</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/js/app.js')
    <style>
        html, body {
            font-family: 'Nunito';
            margin: 0;
            padding: 0;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            padding: 3px;
        }
    </style>
</head>
<body>
    <div id="app">
        <boats />
    </div>
    <footer>
        <div>Copyright &copy; 2024 Yoan Marti</div>
    </footer>      
</body>
</html>