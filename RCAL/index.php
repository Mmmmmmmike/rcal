<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styleIndex.css">
        <title>Welcome page</title>
    </head>
    <h1 align="center" style="font-family:Comic Sans MS;font-size:50px; color:green"> Coding in the park </h1>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    <body>
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images -->
            <div class="mySlides fade">
                <img src="pic/pic1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="pic/pic2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="pic/pic3.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        <br>
    <center>
        <button class="button" onclick="location.href = 'login.php'"><span>Welcome </span></button>
    </center>
</body>
<script>
    showSlides(slideIndex);
</script>
</html>
