<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="font-sans antialiased">
      
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')


            <!-- Page Content -->
           <br><br>
            <h2>ENHORABUENA <span>{{ Auth::user()->name }}</span>, ESTÁS REGITRADO</h2>
            

        </div>
    </body>


</html>