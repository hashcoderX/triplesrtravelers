<div class="row">
    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"></h4> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <i class="mdi mdi-flag-variant icon-md text-info d-flex align-self-center mr-3"></i>
                            <div class="media-body">
                                <p class="card-text" id="enquaryid" style="display: none;"> <label id="enquaryids">{{ $enquary->id }}</label> </p>
                                <p class="card-text">Vehicle No : <label id="vehicleno">{{ $enquary->vehicleno }}</label></p>
                                <p class="card-text">Brand : {{ $enquary->vehiclebrand }}</p>
                                <p class="card-text">Model : {{ $enquary->vehiclemodel }}</p>
                                <p class="card-text">Meeter Reading : {{ $enquary->meeter_reading }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media mt-2">
                            <i class="mdi mdi-account-star icon-md text-info d-flex align-self-center mr-3"></i>
                            <div class="media-body">
                                <p class="card-text" id="customername">Customer Name : {{ $enquary->customername }}</p>
                                <p class="card-text" id="customername">NIC : {{ $enquary->nic }}</p>
                                <p class="card-text" id="address"> Address : {{ $enquary->street .",". $enquary->addressline_one .",".$enquary->city}}</p>
                                <p class="card-text" id="contactno"> Contact No : {{ $enquary->contactno }}</p>
                                <hr>
                                <p class="card-text">Estimation No : <label id="estimation_no">{{ $estimation->id }}</label></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<table>
    <thead>
        <tr>
            <th>
                <label for="partno">Part No</label>
                <input type="text" class="form-control" id="partno" name="partno" onkeyup="getitemlist(this.value)" style="color:gray;">
                <div id="partnosuggestview" class="suggestions-popup"></div>
            </th>
            <th>
                <label for="partname">Part Name</label>
                <input type="text" class="form-control" id="partname" name="partname" style="color:gray;" readonly>
            </th>
            <th>
                <label for="partqty">Qty</label>
                <input type="number" class="form-control" id="partqty" name="partqty" style="color:gray;" onkeyup="addrow(event, this.value); return false;">
            </th>
            <th>
                <label for="subamount">Price</label>
                <input type="text" class="form-control" id="subamount" name="subamount" style="color:gray;">
            </th>
            <th>
                <label for="subamount">Service Name</label>
                <input type="text" class="form-control" id="servicename" name="servicename" style="color:gray;">
            </th>
            <th>
                <label for="subamount">Service Cost</label>
                <input type="text" class="form-control" id="servicecost" name="servicecost" style="color:gray;" onkeyup="addservicerow(event, this.value); return false;">
            </th>
        </tr>
    </thead>
</table>


<table class="table table-list" style="padding-top:5px;">
    <thead style="border-bottom:1px solid black;">
        <tr>

            <th scope="col">Description</th>
            <th scope="col">Part No</th>
            <th scope="col">Qty</th>
            <th scope="col">Sub Amount</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="producttbodytc">
        @foreach ($estimationItems as $index => $items)
        <tr>

            <td>{{ $items->description }}</td>
            <td>{{ $items->part_no }}</td>
            <td>{{ $items->qty }}</td>
            <td>{{ number_format($items->subamount, 2) }}</td>
            <td><select name="form-control" id="reccomendation" onchange="changeStatus(this.value,this)">
                    <option value="reccomend">Reccomend</option>
                    <option value="close">Close</option>
                </select></td>
            <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Summary Table -->
<table class="table table-responsive">
    <tr>
        <th>
            Total Amount - <label id="totalamount">{{ number_format($estimation->totalamount, 2) }}</label>
        </th>
    </tr>
    <tr>
        <th>
            Discount value - <input style="width: 200px;color: gray;" type="text" class="form-control mt-2" onkeyup="caluclatewithdiscount(event, this.value)">
            Discount (%) - <input style="width: 200px;color: gray;" type="text" class="form-control mt-2" onkeyup="caluclatewithdiscountpr(event, this.value)">
        </th>
    </tr>
    <tr>
        <th>
            Net Amount - <label id="netamount">{{ number_format($estimation->netamount, 2) }}</label>
        </th>
    </tr>
</table>

<button class="btn btn-primary" onclick="savecustomizeEstimation()">Save & Print</button>