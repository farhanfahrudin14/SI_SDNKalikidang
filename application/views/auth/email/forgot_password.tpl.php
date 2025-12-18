<html>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f7f7f7;">

    <div style="max-width: 500px; margin: auto; background: #fff; padding: 25px; border-radius: 8px; border: 1px solid #ddd;">
        
        <h2 style="margin-bottom: 15px; color: #333;">
            Reset Password Akun Anda
        </h2>

        <p style="font-size: 14px; color: #555;">
            Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda (<?php echo $identity; ?>).
        </p>

        <p style="font-size: 14px; color: #555;">
            Silakan klik tombol di bawah ini untuk membuat kata sandi baru:
        </p>

        <p style="text-align: center; margin: 25px 0;">
            <a href="<?php echo base_url('auth/reset_password/'.$forgotten_password_code); ?>"
               style="background-color: #4CAF50; color: white; padding: 12px 24px; 
                      text-decoration: none; font-size: 16px; border-radius: 6px;">
                Reset Password
            </a>
        </p>

        <p style="font-size: 12px; color: #888; margin-top: 20px;">
            Jika Anda tidak meminta reset password, abaikan email ini.
        </p>

    </div>

</body>
</html>
