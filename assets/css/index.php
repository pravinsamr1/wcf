<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Thermal Receipt</title>

<!-- QZ Tray -->
<script src="https://cdn.jsdelivr.net/npm/qz-tray/qz-tray.js"></script>

<style>
html, body {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    width: 80mm;
    margin: 0 auto;
    padding: 5px;
    font-size: 12px;
    line-height: 1.1;
}
#receipt p {
    word-break: break-word;
    white-space: normal;
}

/* Alignment */
.center { text-align: center; }
.right { text-align: right; }
.bold { font-weight: bold; }

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}
.center {
    text-align: center;
    word-wrap: break-word;
}

th, td {
    padding: 3px 0;
    word-wrap: break-word;
}

.service { width: 40%; }
.amount { width: 20%; text-align: right; }
.qty { width: 15%; text-align: center; }
.total { width: 25%; text-align: right; }

hr {
    border: none;
    border-top: 1px dashed #000;
    margin: 4px 0;
}

.compact-row {
    display: flex;
    justify-content: space-between;
}

@page {
    size: 80mm auto;
    margin: 0;
}

@media print {
    button { display: none; }
}
</style>
</head>

<body>

<!-- PRINT BUTTON -->
<div style="text-align:center; margin:10px;">
    <button onclick="printReceipt()">Print Receipt</button>
</div>

<!-- RECEIPT CONTENT -->
<div id="receipt">

<div class="center">
    <!-- 🔥 IMPORTANT: Use absolute path or base64 -->
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAABkCAYAAAABtjuPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUM2MjQ4M0M4NjA5MTFFRkI4MTdGRkRGMTA0MjI2M0MiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUM2MjQ4M0Q4NjA5MTFFRkI4MTdGRkRGMTA0MjI2M0MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxQzYyNDgzQTg2MDkxMUVGQjgxN0ZGREYxMDQyMjYzQyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxQzYyNDgzQjg2MDkxMUVGQjgxN0ZGREYxMDQyMjYzQyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pmw1jgMAAETxSURBVHja7H0JgFxF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" width="110">
    <p class="bold">Crown Foot Reflexology</p>
</div>

<hr>
    @php  
        $price = json_decode($customer_service->price, true); // Convert JSON string to array
        $qty = json_decode($customer_service->qty, true);
        $service_name = json_decode($customer_service->service_name, true); // Convert JSON string to array
        $employee_name = json_decode($customer_service->emply_names, true); // Convert JSON string to array
        $customer = \App\Models\Customer::where('id',$customer_service->customer_id)->first();
        $service_location = \App\Models\BranchLocation::where('id',$customer_service->branch)->first();
        $city = \App\Models\BranchCity::where('id',$service_location->city)->first();
        $total_service_amount = 0;

    $phone = $customer->phone;
    $maskedPhone = strlen($phone) >= 2
        ? substr($phone, 0, 2) . str_repeat('X', strlen($phone) - 2)
        : $phone;

       $cityName = strtoupper(trim($city->city));

if($cityName == "CHENNAI"){
    $gst = "33AGUPJ4439J2ZY";
    $stateName = "Tamil Nadu";
}elseif($cityName == "BANGALORE"){
    $gst = "29AGUPJ4439J1ZO";
    $stateName = "Karnataka";
}else{
    $gst = "-";
    $stateName = "-";
}
    @endphp

<p><strong>Bill Date:</strong>  {{ \Carbon\Carbon::parse($customer_service->visit_date)->format('d-M-Y h:i A') }}</p>

<div class="compact-row">
    <span><strong>State:</strong> {{$stateName}}</span>
    <span><strong>GST:</strong> {{$gst}}</span>
</div>

<hr>

<p><strong>Bill For:</strong></p>
<p><strong>Name:</strong> {{$customer->name}}</p>
<p><strong>Location:</strong> {{$service_location->branch_location}}, {{$city->city}}</p>
<p><strong>Mobile:</strong>
  @if($guard != "branch")
  +91 {{$customer->phone}}
@else

+91 {{$maskedPhone}}
@endif
 </p>

<hr>

<table>
<thead>
<tr>
<th class="service">Service</th>
<th class="amount">Amt</th>
<th class="qty">Qty</th>
<th class="total">Total</th>
</tr>
</thead>

<tbody>
  @foreach($service_ids as $data)
                            @php  
                          
                               
                                // Get price and quantity from JSON, defaulting to 0 for price and 1 for quantity
                                $service_price = isset($price[$data]) ? $price[$data] : 0;
                                $quantity = isset($qty[$data]) ? $qty[$data] : 1;
                                // Get employee name
                                $service = $service_name[$data] ?? 'Unknown Service';
                                $total_price = $service_price * $quantity; // Calculate total price
                               
                                $total_service_amount += $total_price;
                              
                            @endphp
                            <tr>
                            <td class="service">{{$service}}</td>
                            <td class="amount">{{$service_price}}</td>
                            <td class="qty">{{$quantity}}</td>
                            <td class="total">{{$total_price}}</td>
                            
                            </tr>
                        @endforeach
</tbody>
</table>

<hr>

<p><span class="bold">Service By:</span> @foreach($employee_ids as $value) 
                      @php
                // Get employee name
                $employee = $employee_name[$value] ?? 'Unknown Employee';
            @endphp 
                      {{$employee}},  
                      @endforeach</p>

<hr>

<table>
<tr>
<td>Subtotal</td>
<td class="right">₹{{$total_service_amount}}</td>
</tr>

 @php
                              $discount = $customer_service->discount;
                              $totalAmount = $total_service_amount;

                              if (strpos($discount, '%') !== false) {
                                  // Extract numeric value from percentage discount
                                  $discountValue = (float) str_replace('%', '', $discount);
                                  $discountAmount = ($totalAmount * $discountValue) / 100;
                              } else {
                                  // Fixed amount discount
                                  $discountAmount = (float) $discount;
                              }

                              $finalAmount = $totalAmount - $discountAmount;
                          @endphp
<tr>
    
<td>Discount</td>
<td class="right">₹{{ number_format($discountAmount, 2) }}</td>
</tr>
<tr class="bold">
<td>Total (Include Tax 6% GST)</td>
<td class="right">₹{{ number_format($finalAmount, 2) }}</td>
</tr>
</table>

<hr>

<div class="center">
<p class="bold">Thank you for your Coming!</p>
<!--<p class="bold">Our Branches:</p>-->
<p class="center">
    <b>Our Branches:</b>
</p>

@foreach($cities as $value)
    @php  
        $service_locations = \App\Models\BranchLocation::where('city',$value->id)->pluck('branch_location')->toArray();
    @endphp

    <p class="center">
        {{$value->city}} | {{ implode(', ', $service_locations) }}
    </p>
@endforeach
</div>

</div>

<!-- QZ PRINT SCRIPT -->

<script>
function setupQZ() {
    qz.security.setCertificatePromise(function(resolve, reject) {
        resolve(); // for testing (IMPORTANT)
    });

    qz.security.setSignaturePromise(function(toSign) {
        return function(resolve, reject) {
            resolve(); // for testing
        };
    });
}
</script>

<!--<script>-->
<!--async function connectQZ() {-->
<!--    if (!qz.websocket.isActive()) {-->
<!--        await qz.websocket.connect();-->
<!--    }-->
<!--}-->

<!--async function printReceipt() {-->
<!--    try {-->
<!--        await connectQZ();-->

        const printerName = "POS-58-Series"; // 🔥 CHANGE THIS
<!--        const config = qz.configs.create(printerName);-->

<!--        const data = [-->
<!--            {-->
<!--                type: 'html',-->
<!--                format: 'image',-->
<!--                data: document.getElementById("receipt").outerHTML-->
<!--            },-->
<!--            {-->
<!--        type: 'raw',-->
        data: '\x0A\x0A\x0A\x0A' // feed
<!--    },-->
<!--    {-->
<!--        type: 'raw',-->
        data: '\x1D\x56\x00' // ✂️ cut
<!--    }-->
<!--        ];-->

<!--        await qz.print(config, data);-->

<!--    } catch (e) {-->
<!--        alert("Print Error: " + e);-->
<!--        console.error(e);-->
<!--    }-->
<!--}-->
<!--</script>-->

<script>
function printReceipt() {
    
    
    
    
    
    
    

    setupQZ(); // 🔥 REQUIRED

    qz.websocket.connect()
    .then(() => {
        const config = qz.configs.create("POS-58-Series");

        const data = [{
            type: 'html',
            format: 'plain',
            data: document.getElementById("receipt").outerHTML
        }];

        return qz.print(config, data);
    })
    .catch(err => console.error("QZ Error:", err));
}
</script>

</body>
</html>