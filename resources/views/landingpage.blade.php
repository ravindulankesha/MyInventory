<!-- <!DOCTYPE html>
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
            <a href="{{url('/viewInventories')}}">
            <div>
                Manage Inventories
            </div>
               
        </div>
    </body> 
</html> -->

<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-4 text-gray-800">Inventory Dashboard</h2>
        
        <div class="bg-white shadow p-4 rounded-lg mb-6 text-center">
            <div class="text-lg font-medium text-gray-600">Current Status of Inventory Items (Chart)</div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <a href="{{route('fillStock')}}" class="block bg-blue-500 text-white text-center py-4 px-6 rounded-lg hover:bg-blue-600">
                Fillup Existing Inventories
            </a>
            <a href="{{route('inventoriesForm')}}" class="block bg-green-500 text-white text-center py-4 px-6 rounded-lg hover:bg-green-600">
                Supply Inventories to Customers
            </a>
            <a href="{{url('/addInventory')}}" class="block bg-yellow-500 text-white text-center py-4 px-6 rounded-lg hover:bg-yellow-600">
                Add a new Inventory item
            </a>
            <a href="{{url('/viewInventories')}}" class="block bg-red-500 text-white text-center py-4 px-6 rounded-lg hover:bg-red-600">
                Manage Inventories
            </a>
        </div>
    </body> 
</html> -->
<!DOCTYPE html>
<html>
    <head>
        <title>Weerathunga Garments</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>  
    <body class="bg-gray-100 p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">WEERATHUNGA GARMENTS</h1>
        <h2 class="text-2xl font-semibold text-center mb-4 text-gray-800">Inventory Dashboard</h2>
        
        <div class="bg-white shadow p-4 rounded-lg mb-6 text-center">
            <div class="text-lg font-medium text-gray-600">Current Status of Inventory Items</div>
            <canvas id="inventoryChart" class="mt-6" height="50px !important"></canvas>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <a href="{{route('fillStock')}}" class="block bg-blue-500 text-white text-center py-4 px-6 rounded-lg hover:bg-blue-600">
                Fillup Existing Inventories
            </a>
            <a href="{{route('inventoriesForm')}}" class="block bg-green-500 text-white text-center py-4 px-6 rounded-lg hover:bg-green-600">
                Supply Inventories to Customers
            </a>
            <a href="{{url('/addInventory')}}" class="block bg-yellow-500 text-white text-center py-4 px-6 rounded-lg hover:bg-yellow-600">
                Add a new Inventory item
            </a>
            <a href="{{url('/viewInventories')}}" class="block bg-red-500 text-white text-center py-4 px-6 rounded-lg hover:bg-red-600">
                Manage Inventories
            </a>
        </div>

        <script>
            $(document).ready(function() {
                const ctx = document.getElementById('inventoryChart').getContext('2d');
                const inventoryChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{
                            label: 'Inventory Items',
                            data: [],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        indexAxis: 'y', 
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'QUANTITY LEFT', // X-axis label
                                    color: '#333',
                                    font: {
                                        weight: 'bold',
                                        size: 14
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'INVENTORY ITEMS', // Y-axis label
                                    color: '#333',
                                    font: {
                                        weight: 'bold',
                                        size: 14
                                    }
                                }
                            }
                        }
                    }
                });

                // Fetch data using AJAX
                $.ajax({
                    url: "{{ route('getChartData') }}", 
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        inventoryChart.data.labels = data.labels; 
                        inventoryChart.data.datasets[0].data = data.data; 
                        inventoryChart.update();
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to fetch data:", status, error);
                    }
                });
            });
        </script>
    </body> 
</html>
