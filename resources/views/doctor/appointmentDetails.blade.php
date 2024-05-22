@extends('layouts.admin.app')

{{-- @section('link')
    <x-vendor.bootstrap_css />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
@endsection --}}



@section('content')
<div class="container" >
  <div class="row">
    <div class="offset-md-2 col-md-8 col-12">

      <div class="invoice" >
        <div class="invoice-print" id="content_invoice" >
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice-title">
                <h2>Invoice</h2>
                <div class="invoice-number">Appoinment Id-{{$data->id}} </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Appointment Booking id</strong><br>
                    Name:- {{$data->patient->name}}<br>
                    email:- {{$data->patient->email}}<br>
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
                  <address>
                    <strong>Patient details</strong><br>
                Name: {{$data->patient_name}}<br>
                Email: {{$data->email}}<br>
                Phone: {{$data->phone}} <br>
                Age: {{$data->age}} <br>
                 Address: {{$data->address}}<br>
                 Patient Problem: {{$data->patient_problem}}<br>
                 Patient short description: {{$data->description}}<br>
                    <br>
                    
                  </address>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Payment Details</strong><br>
                    Payment Method: {{$data->payment_method}}<br>
                    Fee: &#2547;{{$data->fee}} <br>
                    Payment Status: {{$data->payment_status}}
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
                  <address>
                    <strong>Appointment details:</strong><br>
                    Date: {{$data->appointment_date}}<br>
                    Time:{{$data->time}}<br>
                    Department: {{$data->department}}<br>
                  </address>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="row mt-4">
                <div class="col-lg-8">
                  <div class="section-title">Payment Method</div>
                  <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                    invoices.</p>
                </div>
  
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
          <div class="float-lg-left mb-lg-0 mb-3">
            
          </div>
          <button onclick="printContent()" class="btn btn-warning btn-icon icon-left"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
  

    </div>
  </div>
</div>



@endsection

<script>
  function printContent() {
      // Open a new window with only the content to be printed
      var printWindow = window.open('', '_blank');
      
      // Get the HTML content to be printed
      var contentToPrint = document.getElementById('content_invoice').outerHTML;

      // Write the content to the new window
      printWindow.document.write('<html><head><title>Print Content</title><link rel="stylesheet" type="text/css" href="print.css" media="print"></head><body>' + contentToPrint + '</body></html>');

      // Close the document stream
      printWindow.document.close();

      // Trigger the print dialog
      printWindow.print();
  }
</script>


