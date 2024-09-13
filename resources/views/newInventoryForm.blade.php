<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-4 text-gray-800">Add a new Inventory</h2>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            <form method="post" action="{{route('addInventory')}}" class="space-y-4">
                @csrf
                <!-- Item Name -->
                <div>
                    <label for="item_name" class="block text-gray-700 font-semibold">Item Name:</label>
                    <input required type="text" id="item_name" name="item_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Item Description -->
                <div>
                    <label for="item_description" class="block text-gray-700 font-semibold">Item Description:</label>
                    <textarea required id="item_info" name="item_description" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <!-- Pieces per Unit -->
                <div>
                    <label for="quantity_per_unit" class="block text-gray-700 font-semibold">Pieces per Unit:</label>
                    <input required type="number" id="unit_quantity" name="quantity_per_unit" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between">
                    <!-- Back Button -->
                    <a href="{{route('home')}}" class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 focus:outline-none">
                        Back
                    </a>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                        Submit
                    </button>
                </div>
            </form>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </body> 
</html>
