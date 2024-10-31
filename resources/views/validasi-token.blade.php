<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="text-center mb-4">New Password</h3>

                    <!-- Password Reset Request Form -->
                    <form action="{{ route('validasi-forgot-password-act') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="token" value= "{{ $token }}">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your New Password" required>
                        </div>
                        @error('password')
                        <small>{{$message}}</small>
                        @enderror

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit New Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
