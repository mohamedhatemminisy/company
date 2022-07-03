<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Behance</a></li>
                    <li><a href="#">Linkedin</a></li>
                    <li><a href="#">Dribbble</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright 2020 Stand Blog Co.

                        | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('assets/front/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Additional Scripts -->
<script src="{{asset('assets/front/js/custom.js')}}"></script>
<script src="{{asset('assets/front/js/owl.js')}}"></script>
<script src="{{asset('assets/front/js/slick.js')}}"></script>
<script src="{{asset('assets/front/js/isotope.js')}}"></script>
<script src="{{asset('assets/front/js/accordions.js')}}"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description', {
        extraPlugins: 'colorbutton',
        colorButton_colors: 'CF5D4E,454545,FFF,DDD,CCEAEE,66AB16',
        colorButton_enableAutomatic: false,
        // Setting default language direction to right-to-left.
        contentsLangDirection: 'ltr',
        height: 250,
        scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
        scayt_sLang: 'auto',
        removeButtons: 'PasteFromWord'
    });
</script>

</body>

</html>