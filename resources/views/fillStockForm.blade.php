<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Fill Up Stock</h2>

        <div class="max-w-lg mx-auto bg-white shadow-lg p-6 rounded-lg">
            <form method="post" action="{{route('addUnits')}}" class="space-y-4">
                @csrf
                <!-- Item Name -->
                <div>
                    <label for="item" class="block text-gray-700 font-semibold">Item Name:</label>
                    <select name="item" class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        @foreach ($inventories as $item)
                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Number of Units -->
                <div>
                    <label for="units" class="block text-gray-700 font-semibold">Number of units to add:</label>
                    <input required type="number" id="units" name="units" min="1" step="1" class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                        Submit
                    </button>
                </div>
            </form>

            <!-- Back Button -->
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none">
                    Back
                </a>
            </div>
        </div>
    </body> 
</html>
