<!DOCTYPE html>
<html>
<head>


    <title>ISocietyClub</title>
    <style>
         #pay{
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
        #pay:hover {
            text-decoration: none;
        }
        </style>

</head>

<body>
<h1>ISocietyClub</h1>
<p>Above Attachment Contains Bill</p>
<a href="{{ route('stripe.pay') }}" id="pay">Pay Bill</a>
</body>

</html>
