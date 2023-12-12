<footer class="footer-area">
    <!-- Top Footer Area -->
    <div class="top-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="/">
                            <h3 class="text-light">LOCAL NEWS</h3>
                        </a>
                    </div>
                    <!-- Copywrite -->
                    <p><a href="#">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Created by :
                            @if(Auth::check())
                            {{ Auth::user()->name }}
                            @endif
                            &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> Local-News | This Website Reference <i class="fa fa-heart-o"
                                aria-hidden="true"></i> from <a href="https://www.tempo.co/" target="_blank">Tempo</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area d-flex justify-content-between align-items-center">
        <!-- Contact Info -->
        <div class="contact-info">
            <a href="#"><span>Phone:</span>+6287790876534</a>
            <a href="#"><span>Email:</span> lisgiyanto@gmail.com</a>
        </div>
        <!-- Follow Us -->
        <div class="follow-us">
            <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
    </div>
</footer>