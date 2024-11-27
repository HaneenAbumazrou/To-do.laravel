<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ecf0f1;
            display: block;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .header {
            background-color: #34495e;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center" style="color: #ecf0f1;">Admin Panel</h2>
        <a href="{{ route('admin.tasks.index') }}">Manage Tasks</a>
        <!-- You can add more links for other sections of your admin panel -->
    </div>

    <!-- Main Content Area -->
    <div class="content">
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        
        <!-- Page Content -->
        @yield('content')
    </div>

</body>
</html>
