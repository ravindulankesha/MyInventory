<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Fill Up Stock</h2>
        <form method="post" action="{{route('addUnits')}}">
            @csrf
            <label for="item">Item Name:</label>
            <select name="item">
                @foreach ($inventories as $item)
                    <option value={{ $item->id}}>{{ $item->item_name}}</option>
                @endforeach
            </select><br>
            <label for="units">number of units to add</label><br>
            <input required type="number" id="units" name="units"  min="1" max="10" step="1">
            <input type="submit">
        </form>
        
    </body> 
</html>