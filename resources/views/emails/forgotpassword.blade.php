<!DOCTYPE html>
<html>
<head>
    <title>ISocietyClub</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <style>
        #login{
            color: #fff;
            background-color: #18a689;
            border-color: #18a689;
            border-radius: 3px;
            font-size: inherit;
            text-decoration: none;
            min-width: 120px;display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        #login:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Your password is: <strong> {{ $details['password'] }} </strong></p>
    <p>Now login to ISocietyClub</p>
    <a href="{{ $details['link'] }}" id="login" >Login</a>
</body>
</html>
