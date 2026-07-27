<div style="max-width: 600px; margin: 0 auto; padding: 20px;">

    <h1 style="color: #3498db;">Forget Password Email</h1>

    <p>Hello,</p>

    <p>We received a request to reset your password. If you did not make this request, you can ignore this email.</p>

    <p>To reset your password, click on the link below:</p>

    <p><a href="{{ route('reset.password.get', $token) }}"
            style="display: inline-block; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;">Reset
            Password</a></p>

    <p>If the button above doesn't work, you can also copy and paste the following link into your web browser:</p>

    <p>{{ route('reset.password.get', $token) }}</p>

    <p>This link will expire in 1 hour for security reasons.</p>

    <p>Thank you!</p>
</div>