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
<style>

.Ticket-Text{
    align-items: center;
    text-align:center;
    
}
.ticket-seat {
    width: 30px;
    height: 30px;
    border: 1px solid #ccc;
    margin: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.selected {
    background-color: #ffcc00;
}

.purchased {
    background-color: #ff0000;
}

.card {
  border: none;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
  max-width: 250px;
  margin: 100px; 
  display: flex;
  
}

  .card:hover {
    transform: translateY(-3px);
  }

  .card-img-top {
    max-height: 150px; /* Adjust the card image height */
    object-fit: cover;
  }

  .card-title {
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
  }

  .card-title i {
    margin-right: 5px; /* Add space between the star and text */
  }

  .rank-text {
    font-weight: bold;
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    display: block;
  }

  .card-text {
    font-size: 0.9rem;
  }

  /* Flex layout for 3 cards in a row */
  .row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding: 0; 
   
}

  .col-lg-4 {
  flex: 0 0 calc(33.33% - 2px); 
  padding: 0; 
  margin-bottom: 0px; 
}

</style>
</head>

<body>

    <main>

        

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

        @include('home.fan_ticket')

        <!-- Event -->
        <!-- Event -->

        <!-- Event -->
        @include('home.comments')
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