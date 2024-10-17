<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog MSIB - Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg-cover {
            background-image: url('https://via.placeholder.com'); 
            background-size: cover;
            background-position: center;
            height: 100%;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content {
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>

    <div class="bg-cover">
        <div class="overlay">
            <div class="content">
                <h1 class="display-4">Welcome to Blog MSIB</h1>
                <p class="lead">A platform to share and explore great content.</p>
                <a href="/registrasi" class="btn btn-primary btn-lg">Register</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
