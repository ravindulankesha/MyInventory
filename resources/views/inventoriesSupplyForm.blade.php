<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Weerathunga Garments</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Supply Inventory to Customers</h2>
        <form method="post" action="{{route('supplyInventory')}}">
            @csrf
            <label for="item_id">Item Name:</label>
            <select name="item_id" id="inventory_item">
                @foreach ($inventories as $item)
                    <option value={{ $item->inventories->id}}>{{ $item->inventories->item_name}}</option>
                @endforeach
            </select><br>
            <label for="customer_name">Customer Name:</label><br>
            <input required type="text" id="customer" name="customer_name">
            <label for="quantity">Number of Pieces:</label><br>
            <input required type="number" id="quantity" name="quantity"  min="1" max="10" step="1">
            <input type="submit">
        </form>
        <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#inventory_item').on('change',function(e) {

                var item_id = e.target.value;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"{{ route('getStock') }}",
                        type:"POST",
                        
                        data: {
                            item_id: item_id
                        },
                        dataType:'json',
                        success:function (result) {
                            $('#quantity').attr('max', result.stock[0].total_quantity);

                        }
                    })  
                }) 
            });
        </script>
    </body> 
</html>