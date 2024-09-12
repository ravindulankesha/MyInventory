<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
    </head>  
    <body>
        <h1>WEERATHUNGA GARMENTS</h1>
        <h2>Inventory Dashboard</h2>
        <div>Number of free units available in Warehouse : 16</div>
        <div>Current Status of Inventory Items (Chart)</div>
        <div>
            <a href="{{route('fillStock')}}">
            <div>
                Fillup Existing Inventories
            </div>
            </a>
            <a href="{{route('inventoriesForm')}}">
            <div>
                Supply Inventories to Customers
            </div>
            </a>
            <a href="{{url('/addInventory')}}">
            <div>
                Add a new Inventory item
            </div>
            </a>
            <a href="{{url('/register')}}">
            <div>
                View or Edit Inventories
            </div>
            <a href="{{url('/register')}}">
            <div>
                Remove Inventory items
            </div> 
            </a>       
        </div>
    </body> 
</html>