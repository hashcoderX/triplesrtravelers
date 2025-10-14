<div class="displaydetails">
    <div class="row">
        <div class="col-12">
            @foreach($completeInvoices as $invoice)
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Invoice No - {{ $invoice->id }}</h6>
                            <h6 class="preview-subject">{{ $invoice->vehicle_no }}</h6>
                            <p class="text-muted mb-0">Invoice Date - {{ $invoice->invoice_date }}</p>
                            <p class="text-muted mb-0">Customer Name - {{ $invoice->customername }}</p>
                        </div>
                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                            <p class="text-muted">Bill Amount - {{ number_format($invoice->total_bill,2) }}</p>
                            <button id="{{ $invoice->id }}" data-bs-toggle="modal" data-bs-target="#viewinvoicemodel" class="add btn btn-primary" onclick="viewInvoice(this.id)">View Invoice</button>
                            <button id="{{ $invoice->id }}" data-bs-toggle="modal" data-bs-target="#cancelinvoiceModal" class="add btn btn-danger" onclick="cancelInvoicesetid(this.id)">Cancel Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="pagination-links">
                {{ $completeInvoices->links() }}
            </div>
        </div>
    </div>
</div>