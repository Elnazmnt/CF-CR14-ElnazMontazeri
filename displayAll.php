<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special offer for Black Friday</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body style="background-image: url('pictures/photo.jpg');background-attachment: fixed; background-size: cover; " class="container">

    <!-- start nav -->
    <div class="sticky-top justify-content-center">
        <nav class="  navbar navbar-expand-lg mt-4  rounded " style="background-color: #fab73d;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="logo.png" alt="Girl in a jacket" width="60" height="60"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <h5 style="color: black; font-family:'Acme', sans-serif">Home</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <h5 style="color: black; font-family:'Acme', sans-serif">About Us</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <h5 style="color: black; font-family:'Acme', sans-serif">Contact Us</h5>
                            </a>
                        </li>
                </div>
                <div class="justify-end">
                    <a href="index.php"><button type="button" class="btn btn-outline-dark">Back Hame</button></a>

                </div>
            </div>
    </div>
    </nav>
    <!-- end nav -->
    <button type="submit" id="btnJson" class="btn btn-info mt-2">View all special discounts on travel packages for Black Friday</button>
        <hr>
        <div id="content">
        <div class="row row-cols-1 row-cols-md-3 g-4">
</div>
        
        </div>
    
    <script>
        //AJAX function here
        let btn = document.getElementById('btnJson')
        btn.addEventListener('click', loadJson);

        function loadJson() {
            let ajReq = new XMLHttpRequest();
            ajReq.open("GET", "BFoffer.json");
            ajReq.onload = function() {
                if (ajReq.status == 200) {
                    let jsonDoc = JSON.parse(ajReq.responseText)
                    // console.log(capString(jsonDoc[0].name));
                    for (const x of jsonDoc) {
                        document.getElementById('content').innerHTML += `
                        <div class="col">
                        <div class="card" style="width: 18rem;">
  <img src="pictures/${x.img}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg> ${capString(x.locationName)} </h5>
    <h5 class="card-title"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
</svg> ${x.price} </h5>
    
    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
  <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
</svg> ${capString(x.description)} .</p>
    <a href="#" class="btn btn-info">booking</a> </div> </div>
  </div>`
                    }

                }
            };
            ajReq.send();
        }

        //capitalize function
        function capString(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>




</body>

</html>