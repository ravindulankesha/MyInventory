<!-- <!DOCTYPE html>
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
</html> -->

<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Weerathunga Garments</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Supply Inventory to Customers</h2>

        <div class="max-w-lg mx-auto bg-white shadow-lg p-6 rounded-lg">
            <form method="post" action="{{ route('supplyInventory') }}" class="space-y-4">
                @csrf
                <!-- Item Name -->
                <div>
                    <label for="item_id" class="block text-gray-700 font-semibold">Item Name:</label>
                    <select name="item_id" id="inventory_item" class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="">--Please choose an option--</option>
                        @foreach ($inventories as $item)
                            <option value="{{ $item->inventories->id }}">{{ $item->inventories->item_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Customer Name -->
                <div>
                    <label for="customer_name" class="block text-gray-700 font-semibold">Customer Name:</label>
                    <input required type="text" id="customer" name="customer_name" class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Number of Pieces -->
                <div>
                    <label for="quantity" class="block text-gray-700 font-semibold">Number of Pieces:</label>
                    <input required type="number" id="quantity" name="quantity" min="1" max="10" step="1" class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                        Submit
                    </button>

                    <!-- Back Button -->
                    <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none">
                        Back
                    </a>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#inventory_item').on('change', function(e) {
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
                    });
                });
            });
        </script>
    </body> 
</html>
