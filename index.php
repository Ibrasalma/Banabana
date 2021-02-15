<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
    <link rel="stylesheet" href="index.css">
    <title>BanaBana</title>
</head>
<body>

    <header id="home">
        <?php include('header.php') ?>
    </header>
    <main>
        <section class="overview-wrap" id="overview">
            <div class="container">
                <div class="contenedor">
                    <?php include('service.php') ?>
                </div>
            </div>
        </section>
        <section class="cta contact-wrap" id="contact">
            <div class="container">
                <div class="row">
                    <?php include('contact.php') ?>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.html') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
            <script>
              new WOW().init();
              </script>
    <script>
      
        $(window).on("scroll", function() {
            if ($(this).scrollTop() > 10) {
                $("nav.navbar").addClass("mybg-dark");
                $("nav.navbar").addClass("navbar-shrink");

            } else {
                $("nav.navbar").removeClass("mybg-dark");
                $("nav.navbar").removeClass("navbar-shrink");

            }

        });

        
    </script>

</body>
</html>