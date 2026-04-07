<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style-preset.css') }}">
</head>

<body style="background:#f5f5f5;">

    <div style="width:400px; margin:80px auto; background:#fff; padding:40px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        @if (Session::has('success'))
        <p class="alert alert-success">
            {{ Session::get('success') }}
        </p>
        @endif
           @if (Session::has('error'))
        <p class="alert alert-danger">
            {{ Session::get('error') }}
        </p>
        @endif
        <h2 style="font-weight:600;">Sign In to <span class="text-warning ">MultiShop</span></h2>
        <p style="color:#888;">Please login </p>

        <form method="POST" action="{{ route('admin.loginprocess') }}">
            @csrf

            <!-- Username -->
            <div style="margin-top:20px;">
                <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Username"
                    style="width:100%; border:none; border-bottom:1px solid #ccc; padding:10px;">
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
            </div>

            <!-- Password -->
            <div style="margin-top:20px;">
                <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password"
                    style="width:100%; border:none; border-bottom:1px solid #ccc; padding:10px;">
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
            </div>

            <!-- Remember + Forgot -->
            <div style="display:flex; justify-content:space-between; margin-top:20px;">
                <label>
                    <input type="checkbox"> Remember me
                </label>

                <a href="#" class="text-dark" style="font-size:14px;">Forgot Password</a>
            </div>

            <!-- Button -->
            <button type="submit"
                style="width:100%; margin-top:30px; background:#34c38f; color:#fff; padding:12px; border:none; border-radius:25px;">
                Log In
            </button>

          

        </form>

        <!-- Social -->


    </div>

</body>

</html>