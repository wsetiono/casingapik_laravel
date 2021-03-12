<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perbaharui Password Anda</title>
</head>
<body>
    
    <h2>Hai, {{ $customer->name }}</h2>
    <p>
        Anda mendapatkan email ini karena Anda telah melakukan request reset password anda di DW-Ecommerce!
        <br>
        Bila Anda merasa tidak pernah request reset password, silahkan abaikan email ini.
    </p>
    
    <p>
        Silahkan klik link dibawah ini untuk reset password Anda: {{ $link }}
    </p>
    
</body>
</html>