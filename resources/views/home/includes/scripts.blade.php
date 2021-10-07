<script src="{{ asset('themes/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('themes/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('themes/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('themes/js/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('themes/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('themes/js/jquery.countTo.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('themes/js/jquery.stellar.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('themes/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/js/magnific-popup-options.js') }}"></script>

    <!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
    <script src="{{ asset('themes/js/simplyCountdown.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('themes/js/main.js') }}"></script>

    <script>
        //tujuan hari
        var countDate = new Date ("2021-10-23 09:00:00").getTime();

        //update setiap 1 detik
        var x = setInterval(function(){

            //ambil hari dan waktu sekarang
            var now = new Date().getTime();
            //perbedaan antara tujuan hari dan hari sekarang
            var distance = countDate - now;

            var days    = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours   = Math.floor((distance % (1000 * 60 * 60 * 24))/ (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60))/ (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60))/ (1000));

        });
        var d = new Date(new Date().getTime() + 1 * 120 * 120 * 1000);

        // default example
        simplyCountdown('.simply-countdown-one', {
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            // day: days,
            // hours : hours,
            // minutes:minutes,
            // seconds:seconds

        });

        //jQuery example
        $('#simply-countdown-losange').simplyCountdown({
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate(),
            enableUtc: false
        });
    </script>