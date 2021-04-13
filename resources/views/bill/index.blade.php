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
    <!--Bill start-->
    {{-- <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                <div class="row"> --}}
    {{-- <div style="clear: both;"> --}}
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
    {{-- </div> --}}


    {{-- <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Tax</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div><strong>Admin Theme with psd project layouts</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</small>
                                </td>
                                <td>1</td>
                                <td>$26.00</td>
                                <td>$5.98</td>
                                <td>$31,98</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Wodpress Them customization</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                        Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </small>
                                </td>
                                <td>2</td>
                                <td>$80.00</td>
                                <td>$36.80</td>
                                <td>$196.80</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Angular JS & Node JS Application</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</small>
                                </td>
                                <td>3</td>
                                <td>$420.00</td>
                                <td>$193.20</td>
                                <td>$1033.20</td>
                            </tr>

                        </tbody>
                    </table>
                </div><!-- /table-responsive --> --}}

    <div id="total">
        <hr>
      <table  class="table invoice-total">
        <tbody>
            <tr>
                <td><strong>Sub Total :</strong></td>
                <td>${{ $bills[0]->sum }}</td>
            </tr>
            @php
                $tax = $bills[0]->sum * 0.05;
            @endphp
            <tr>
                <td><strong>TAX :</strong></td>
                <td>${{ $tax }}</td>
            </tr>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>${{ $bills[0]->sum + $tax }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    </div>
<hr>
    {{-- <div class="text-right">
                    <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                </div> --}}

    {{-- <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div> --}}
    {{-- </div>
        </div>
    </div>
</div> --}}

    <!--end bill-->
