<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>密码找回</title>
</head>
<body>
        尊敬的{{$user['uname']['uname']}}，请 <a href="http://panda.com/reset?userid={{$user['uname']['uid']}}&token={{$user['_token']}}">点击链接</a>   ，找回您的密码

</body>
</html>