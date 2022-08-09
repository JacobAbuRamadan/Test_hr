<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div style="width: 85% ; margin: 10px auto;">
        <div style=" text-align: center;  ">
            <h2 style="color: rgb(0 41 255)" > Welcome {{ $name }}</h2>
            <p>This email contane your email and password from yacoub Hr system test good luck..</p>

            <br>
            <h4> Your Email : </h4>
            <p>{{ $email }} </p>
            <h4> Your Password is : </h4>
            <div style="
            margin: 20px auto;
            background-color: rgb(244 247 255 / 80%);
            padding: 20px;
            width: 220px;
            border-radius: 10px;"
            > {{ $password }} </div>

        <br>
            <a style="background-color: rgb(0 41 255);color: white;padding: 20px 90px; text-decoration: none; border-radius: 10px;" href="{{ route('login') }}"> Login Here</a>
        </div>

        <br><br><br>
        <p>Best Regards</p>
        <p>HR Team</p>
    </div>

</body>
</html>
