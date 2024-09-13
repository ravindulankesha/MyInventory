<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Inventory Management System</h2>

        @php
            $firstItem = $inventories->first(); 
        @endphp

        <div class="max-w-lg mx-auto bg-white shadow-lg p-6 rounded-lg">
            <form action="{{ route('inventories.update', $firstItem->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Inventory Name -->
                <div>
                    <label for="item_name" class="block text-gray-700 font-semibold">Inventory Name</label>
                    <input type="text" name="item_name" id="name" value="{{ old('item_name', $firstItem->item_name) }}" required class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="item_description" class="block text-gray-700 font-semibold">Description</label>
                    <textarea name="item_description" id="content" required class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('item_description', $firstItem->item_description) }}</textarea>
                </div>

                <!-- Quantity per Unit -->
                <div>
                    <label for="quantity_per_unit" class="block text-gray-700 font-semibold">Pieces per Unit:</label>
                    <input required type="number" id="unit_quantity" name="quantity_per_unit" min="1" value="{{ old('quantity_per_unit', $firstItem->quantity_per_unit) }}" class="w-full p-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                        Update Item
                    </button>
                    <a href="{{ route('viewInventories') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none">
                        Cancel
                    </a>
                </div>
            </form>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 p-4 mt-4 rounded-lg text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Back Button -->
            <div class="text-center mt-6">
                <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none">
                    Back
                </a>
            </div>
        </div>
    </body> 
</html>
