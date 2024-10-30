<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infracom Technology</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #BFBD90;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .logo {
            position: absolute;
            top: 0px;
            left: 10%;
        }

        .logo img {
            width: 35%;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .search-bar input {
            border: none;
            outline: none;
            font-size: 16px;
            flex: 1;
        }

        .search-bar button {
            background-color: #cdc9a1; /* Button color */
            border: none;
            padding: 0;
            cursor: pointer;
            outline: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
        }

        .search-bar button i {
            font-size: 16px; /* Adjust icon size */
            font-weight: 700;
            color: black; /* Icon color */
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="ICT Logo">
    </div>

    <div class="title">Infracom Technology</div>

    <div class="search-bar">
        <input type="text" placeholder="Input a keyword">
        <button>
            <i class="bi bi-search"></i>
        </button>
    </div>
</body>
</html>
