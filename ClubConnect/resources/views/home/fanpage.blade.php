<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>ClubConnect</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="home/css/bootstrap.min.css" rel="stylesheet">

    <link href="home/css/bootstrap-icons.css" rel="stylesheet">

    <link href="home/css/templatemo-festava-live.css" rel="stylesheet">

    <!-- Header -->
</head>

<body>

    <main>

        <!-- Header -->
        @include('home.header')
        <!-- Header -->

        <!-- NavBar -->
        @include('home.navbar')
        <!-- NavBar -->

        <!-- Video -->
        @include('home.video')
        <!-- Video -->

        <!-- About -->
        @include('home.clubs')
        <!-- About -->

        <!-- Meet -->
        @include('home.players')
        <!-- Meet -->


        <!-- Event -->
        @include('home.event')
        <!-- Event -->
       
    </main>

        <!-- Footer -->
         @include('home.footer')
        <!-- Footer -->




    <!-- JAVASCRIPT FILES -->
    <script src="home/js/jquery.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/jquery.sticky.js"></script>
    <script src="home/js/click-scroll.js"></script>
    <script src="home/js/custom.js"></script>

</body>

</html>