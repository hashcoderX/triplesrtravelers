<div class="row">
    <div class="col-md-12 grid-margin stretch-card">


        <table class="table table-responcive">
            <tr>
                <th>Estimation Number</th>
                <th>Enquiry No</th>
                <th>Date</th>
                <th>Total Amount:</th>
                <th>Discount:</th>
                <th>Net:</th>
                <th></th>
            </tr>
            @foreach ($estimations as $estimation)
            <tr>
                <td>{{ $estimation->id }}</td>
                <td>{{ $estimation->enquaryid }}</td>
                <td>{{ $estimation->date_time }}</td>
                <td>{{ number_format($estimation->totalamount,2) }}</td>
                <td>{{ number_format($estimation->discount,2) }}</td>
                <td>{{ number_format($estimation->netamount,2) }}</td>
                <td><button id="{{ $estimation->id }}" onclick="printEstimationt(this.id);return false;" class="btn btn-primary">View Estimation</button></td>
            </tr>
            @endforeach
        </table>


    </div>
</div>