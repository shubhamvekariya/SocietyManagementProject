<!--Bill start-->


<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>From:</h5>
                        <address>
                            <strong>ISociety Club</strong><br>
                            <abbr title="Phone">P:</abbr> (123) 601-4590
                        </address>
                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>Invoice No.</h4>
                        <h4 class="text-navy">{{ $societies->id }}</h4>
                        <span>To:</span>
                        <address>
                            <strong>{{ $societies->secretary_name }}.</strong><br>
                            Society,{{ $societies->society_name }}<br>
                            <br>
                            <abbr title="Phone">Phone <i class="fa fa-phone"></i> : </abbr> {{ $societies->phoneno }}
                        </address>
                        <p>
                            <span><strong>Invoice Date:</strong> {{ $bills[0]->day }}/{{ $bills[0]->month }}/{{ $bills[0]->year }}</span><br />
                            <span><strong>Due Date:</strong> {{$bills[0]->due_date}}</span>
                        </p>
                    </div>
                </div>

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

                <table class="table invoice-total">
                    <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td>${{ $bills[0]->sum }}</td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td>$135.98</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>${{ ($bills[0]->sum)+135.98 }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <hr>
                <div class="text-right">
                    <a href="#" class="btn btn-primary">Send Bill</a>
                </div>

                {{-- <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!--end bill-->
