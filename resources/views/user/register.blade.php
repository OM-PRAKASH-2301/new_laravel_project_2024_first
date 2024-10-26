<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Keep this if you want to link the CSS file -->
    <style>
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-group {
            flex: 1; /* Allow items to grow equally */
            margin-right: 10px; /* Space between inputs */
        }
        .form-group:last-child {
            margin-right: 0; /* Remove margin from the last item */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form action="{{ route('user.register') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="ml-4" required>
                    @error('firstname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="ml-4" required>
                    @error('lastname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="ml-4" required>
                    @error('username')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="ml-4">
                    <label><input type="radio" name="gender" value="male" required> Male</label>
                    <label><input type="radio" name="gender" value="female" required> Female</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="contact_no">Contact No (Unique)</label>
                    <input type="text" id="contact_no" name="contact_no" class="ml-4" required>
                    @error('contact_no')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="ml-4" required>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="ml-4" required>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" class="ml-4" required>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" class="ml-4" required>
                </div>

                <div class="form-group">
                    <label for="district">District</label>
                    <input type="text" id="district" name="district" class="ml-4" required>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="ml-4" required></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" id="pincode" name="pincode" class="ml-4" required>
                </div>
            </div>

            <button type="submit" class="btn ml-4">Register</button>
        </form>
    </div>
</body>
</html>
