<!DOCTYPE html>
<html>

<head>
    <style>
        body
        {
            /* margin:5%; */
        }
        #invoice {
            /* float: right; */
            /* border: 1px solid black; */
            font-size: 20px;
            text-align: right;
        }

        #from {
            float: left;
            /* border: 1px solid black; */
            font-size: 20px;

        }
        #total {

            /* border: 1px solid rgb(224, 8, 8); */
            margin-left: 550px;
            margin-top:300px;

        }
        h1{
            text-align:center;
        }

    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice Print</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
        <h1>Maintenance Bill</h1>
        <hr>
        <div id="from" class="col-sm-6">
            <h5>From:</h5>
            <address>
                <strong> Society:{{ $societies->society_name }}</strong><br>
                Secretary:{{ $societies->secretary_name }}<br>
                <abbr title="Phone">P:</abbr>{{ $societies->phoneno }}
            </address>
        </div>


        <div id="invoice" class="col-sm-6 text-right">
            <h4>Invoice No.</h4>
            <h4 class="text-navy">{{ $societies->id }}</h4>
            <span>To:</span>
            <address>
                <strong>{{ $user->name }}.</strong><br>
                Email:{{ $user->email }}<br>
                <br>
                <abbr title="Phone">Phone <i class="fa fa-phone"></i> : </abbr> {{ $user->phoneno }}
            </address>
            <p>
                <span><strong>Invoice Date:</strong>
                    {{ $bills[0]->day }}/{{ $bills[0]->month }}/{{ $bills[0]->year }}</span><br />
                <span><strong>Due Date:</strong> {{ $bills[0]->due_date }}</span>
            </p>
        </div>

    <div id="total">
        <hr>
      <table  class="table invoice-total">
        <tbody>
            <tr>
                <td><strong>Sub Total :</strong></td>
                <td>Rs{{ $bills[0]->sum }}</td>
            </tr>
            @php
                $tax = $bills[0]->sum * 0.05;
            @endphp
            <tr>
                <td><strong>TAX :</strong></td>
                <td>Rs{{ $tax }}</td>
            </tr>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>Rs{{ $bills[0]->sum + $tax }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    </div>
<hr>
