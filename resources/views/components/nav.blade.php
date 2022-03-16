<title>Excellent taste</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link href="{{ asset('/css/nav.css') }}" rel="stylesheet">


<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>

    <a href="/" onclick="w3_close()" class="w3-bar-item w3-button mt-5"><h1><strong>Home</strong></h1></a>

    <h1 class="mt-5 ml-3"><strong>Reservations</strong></h1>
    <a href="/reservation/create" onclick="w3_close()" class="w3-bar-item w3-button">New Reservation</a>
    <a href="/reservation" onclick="w3_close()" class="w3-bar-item w3-button">Reservation</a>

    <h1 class="mt-5 ml-3"><strong>Employee dashboard</strong></h1>
    <a href="/chef" onclick="w3_close()" class="w3-bar-item w3-button">Chef incoming orders</a>
    <a href="/bartender" onclick="w3_close()" class="w3-bar-item w3-button">Bartender incoming orders</a>

    <h1 class="mt-5 ml-3"><strong>Employee dashboard</strong></h1>
    <a href="/product" onclick="w3_close()" class="w3-bar-item w3-button">Manage menu items</a>
    <a href="/product/create" onclick="w3_close()" class="w3-bar-item w3-button">Add new menu item</a>
</nav>

<div class="w3-top mb-5">
    <div class="w3-white w3-xlarge" style="max-width:1200px;">
        <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()" id="stripes">☰</div>
    </div>
</div>

<div style="margin-top: 5vh">
    {{ $slot }}
</div>



<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }

    $("#showMe").delay(1500).fadeOut(600);
</script>


