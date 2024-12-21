<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #333; /* Dark text */
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff; /* Primary color from your palette */
            color: #fff;
            font-size: 1.25rem;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade for hover */
        }
        .alert-success {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body text-center">
                        <p>
                            A verification link has been sent to your email address. Please check your inbox and click the link to verify your account.
                        </p>
                        @if (session('message'))
                            <div class="alert alert-success mt-4" role="alert">
                                Email sent successfully!
                            </div>
                        @else
                            <p>
                                If you did not receive the email, check your spam folder or try again later.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
