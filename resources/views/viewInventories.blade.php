<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Inventory Management System</h2>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity Per Unit</th>
                <th>Edit Action</th>
                <th>Delete Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->item_description }}</td>
                <td>{{ $item->quantity_per_unit }}</td>
                <td>
                    <a href="{{ route('inventories.edit', $item->id) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('inventories.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('home')}}">
        Back
    </a>
    </body> 
</html> -->

<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <!-- Add Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Inventory Management System</h2>

        <div class="max-w-6xl mx-auto bg-white shadow p-6 rounded-lg">
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Quantity Per Unit</th>
                        <th class="px-4 py-2">Edit Action</th>
                        <th class="px-4 py-2">Delete Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventories as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $item->id }}</td>
                        <td class="px-4 py-2">{{ $item->item_name }}</td>
                        <td class="px-4 py-2">{{ $item->item_description }}</td>
                        <td class="px-4 py-2">{{ $item->quantity_per_unit }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('inventories.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('inventories.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
        </div>
    </body> 
</html>
