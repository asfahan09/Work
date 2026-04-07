<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style-preset.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background:#f5f5f5;">

    <div style="width:400px; margin:80px auto; background:#fff; padding:40px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
       
        <h2 style="font-weight:600;">Sign up <span class="text-warning ">MultiShop</span></h2>
        <p style="color:#888;">Please create this account </p>

        <form method="POST" action="{{ route('register.process') }}">
            @csrf
            <!-- Username -->
            <div style="margin-top:20px;">
                <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="Username"
                    style="width:100%; border:none; border-bottom:1px solid #ccc; padding:10px;">
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <!-- email  -->
            <div style="margin-top:20px;">
                <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email"
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
            <!-- Password conform-->
            <div style="margin-top:20px;">
                <input type="password" name="password_confirmation" placeholder="Password confirm"
                    style="width:100%; border:none; border-bottom:1px solid #ccc; padding:10px;">
            </div>

            <!-- Button -->
            <button type="submit"
                style="width:100%; margin-top:30px; background:#34c38f; color:#fff; padding:12px; border:none; border-radius:25px;">
                Sign up
            </button>
            <div class="text-center mt-4">
                <span class="text-secondary">Already Create account</span>
                <a href="{{ route('login') }}">Login</a>
            </div>


        </form>

        <!-- Social -->


    </div>

</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "3000"
    };

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
</html>