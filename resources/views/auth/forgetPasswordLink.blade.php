<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #081b29;
        }

        .wrapper {
            position: relative;
            width: 850px;
            height: 550px;
            background: transparent;
            border: 2px solid #0ef;
            box-shadow: 0 0 25px #0ef;
            overflow: hidden;
        }

        .wrapper .form-box {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .wrapper .form-box.login {
            left: 0;
            padding: 80px 60px 0 40px;
            display: block;
        }

        .form-box h2 {
            font-size: 26px;
            color: #fff;
            text-align: center;
        }

        .form-box .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 25px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid #fff;
            padding-right: 23px;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            transition: 0.5s;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-bottom-color: #0ef;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            transition: 0.5s;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;
            color: #0ef;
        }

        .input-box i {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 18px;
            color: #fff;
            transition: 0.5s;
        }

        .input-box input:focus~i,
        .input-box input:valid~i {
            color: #0ef;
        }

        .btn {
            position: relative;
            width: 100%;
            height: 45px;
            background: transparent;
            border: 2px solid #0ef;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            z-index: 1;
            overflow: hidden;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 300%;
            background: linear-gradient(#081b29, #0ef, #081b29, #0ef);
            z-index: -1;
            transition: 0.5s;
        }

        .btn:hover::before {
            top: 0;
        }

        .form-box .logreg-link {
            font-size: 14.5px;
            color: #fff;
            text-align: center;
            margin: 20px 0 10px;
        }

        .logreg-link p {
            color: #fff;
            text-align: center;
            margin: 20px 0 10px;
        }

        .logreg-link p a {
            color: #0ef;
            text-decoration: none;
            font-weight: 600;
        }

        .logreg-link p a:hover {
            text-decoration: underline;
        }

        .wrapper .info-text {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .wrapper .info-text.login {
            right: 0;
            text-align: right;
            padding: 80px 40px 60px 40px;
            display: block;
        }

        .info-text h2 {
            font-size: 19px;
            color: #fff;
            line-height: 1.3;
            text-transform: uppercase;
        }

        .info-text p {
            font-size: 16px;
            color: #fff;
        }

        .wrapper .bg-animate {
            position: absolute;
            top: -4px;
            right: 0;
            width: 850px;
            height: 600px;
            background: linear-gradient(45deg, #081b29, #0ef);
            border-bottom: 3px solid #0ef;
            transform: rotate(10deg) skewY(41deg);
            transform-origin: bottom right;
        }

        #typing-text {
            color: #d5ad5e;
            box-shadow: 0 0 25px hsl(40, 98%, 55%);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <div class="form-box login">
            <h2>Reset Password</h2>
            @if (Session::has('message'))
                <div style="color: rgba(29, 215, 122, 0.79)" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-box">
                    <input type="text" id="email_address" class="form-control" name="email"
                        value="{{ old('email') }}" required />
                    <label>Email</label>
                    @if ($errors->has('email'))
                        <span style="color: crimson">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="input-box">
                    <input type="password" id="password" class="form-control" name="password" required />
                    <label>Password</label>
                    @if ($errors->has('password'))
                        <span style="color: crimson">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="input-box">
                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation"
                        required />
                    <label>Confirm Password</label>
                    @if ($errors->has('password_confirmation'))
                        <span style="color: crimson">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn">Reset Password</button>
                <div class="logreg-link">
                    <p>
                        Already a User?
                        <a href="{{route('/')}}" class="register-link"> Sign In</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
