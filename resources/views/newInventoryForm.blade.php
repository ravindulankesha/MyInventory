<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Add a new Inventory</h2>
        <form method="post" action="{{route('addInventory')}}">
            @csrf
            <label for="item_name">Item Name:</label><br>
            <input required type="text" id="item_name" name="item_name"><br>
            <label for="item_description">Item Description:</label><br>
            <input required type="textarea" id="item_info" name="item_description">
            <label for="quantity_per_unit">Pieces per Unit:</label><br>
            <input required type="number" id="unit_quantity" name="quantity_per_unit">
            <input type="submit">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body> 
</html>