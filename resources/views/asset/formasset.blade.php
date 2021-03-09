           <!--form starte-->

                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Name:</label>

                           <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Enter Assets/Event Name" name="name">
                        </div>
                        </div>

                         <div class="form-group row">
                        <label class="font-normal col-sm-2 col-form-label">Date Of Booking:</label>
                        <div class="input-group date col-sm-10 ">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" id="DATE" value="" onClick="current_Date();" placeholder="Booking Date" name="">
                        </div>
                    </div>

                     <div class="ibox-content">
                    <h3>
                        Start & End Time:
                    </h3>



                    <label class="font-normal col-sm-2 col-form-label">Start Time:</label>
                    <div class="input-group clockpicker has-success" data-autoclose="true">
                        <input type="text" class="form-control" value="09:30" >
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                    <br>

                    <label class="font-normal col-sm-2 col-form-label">End Time:</label>
                    <div class="input-group clockpicker has-success" data-autoclose="true">
                        <input type="text" class="form-control" value="09:30" >
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>


                          <div class="form-group row has-success">
                            <label class="col-sm-2 col-form-label">Events/Assets:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Assets/Events">

                            </div>
                        </div>

                         <div class="form-group row has-success"><label class="col-sm-2 col-form-label">Function Details(Optional):</label>

                           <div class="col-sm-10">
                            <textarea cols="50" rows="5" class="form-control" placeholder="Enter Address"></textarea>

                           </div>
                        </div>

                     <div class="form-group row has-success">
                            <label class="col-sm-2 col-form-label">Charges:</label>

                           <div class="col-sm-10"><input type="Number" class="form-control" placeholder="Enter Charge">
                           </div>
                        </div>

                    <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2 ">
                                <button class="btn btn-primary btn-lg" type="submit">ADD</button>
                                <button class="btn btn-white btn-lg" type="submit">Cancel</button>

                            </div>
                        </div>


                <!--End of my form-->
