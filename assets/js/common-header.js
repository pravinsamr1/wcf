document.addEventListener("DOMContentLoaded", function () {
  const header = `
  <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button id="menuCloseBtn" class="vs-menu-toggle">
  <i class="fal fa-times"></i>
</button>
                <div class="mobile-logo">
                    <a href="index.html"><img src="assets/my-img/logo/logo.png"
                            alt="Huntar" /></a>
                </div>
                <div class="vs-mobile-menu">
                    <ul>
                        <li class="">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="">
                            <a href="about.html">About Us</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="sub-menu">
                                <li><a href="services-v1.html">Services Style
                                        1</a></li>
                                <li><a href="services-v2.html">Services Style
                                        2</a></li>
                                <li><a href="services-details.html">Services
                                        Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Specialities</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog
                                        Details</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team
                                        Details</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-details.html">Shop
                                        Details</a></li>
                                <li><a href="cart.html">Shopping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="error.html">Error Page</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="video.html">Videos</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>

                        <div class="book-appointt" style="background: #893cb3; margin-top:30px">
                            <a href="academy.html" style="color: #fff" class="text-center">Join Our Academy</a>
                        </div>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--==============================
  Header Area
  ==============================-->
        <div class="sticky-header-wrap sticky-header py-2 py-lg-1">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-5 col-md-3">
                        <div class="logo">
                            <a href="index.html"><img
                                    src="assets/my-img/logo.png"
                                    alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-7 col-md-9 text-end position-static">
                        <nav
                            class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
                            <ul>
                                <li class>
                                    <a href="index.html">Home</a>
                                </li>
                                <li class>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog
                                                Details</a></li>
                                        <li><a href="team.html">Team</a></li>
                                    </ul>
                                </li>
                                <li
                                    class="mega-menu-wrap menu-item-has-children">
                                    <a href="#">Specialities</a>
                                </li>
                                <li class="m">
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li class>
                                    <a href="video.html">Videos</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                        <button id="menuOpenBtn" class="vs-menu-toggle d-inline-block d-lg-none">
  <i class="far fa-bars"></i>
</button>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
  Header Top Area
  ==============================-->
        <div class="header-top-wrapper header_layout5">
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-6 col-sm-auto">
                            <div class="logo">
                                <a href="index.html"><img
                                        src="assets/my-img/logo/logo.png" width="189" height="69"
                                        alt="logo" /></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-auto">
                            <div class="row gx-40 justify-content-end">
                                <div class="col-auto d-none d-lg-block">
                                    <div class="contact-box">
                                        <div class="icon-box">
                                            <i
                                                class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-content">
                                            <p>Office Address</p>
                                            <h6 class="contact-title">T Nagar, Chennai - 600 017</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-md-block">
                                    <div class="contact-box">
                                        <div class="icon-box">
                                            <i
                                                class="fal fa-envelope-open-text"></i>
                                        </div>
                                        <div class="contact-content">
                                            <p>Mail Us For Support</p>
                                            <h6 class="contact-title">
                                                <a
                                                    href="mailto:wcfhospital@gmail.com">wcfhospital@gmail.com</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="contact-box">
                                        <div class="icon-box">
                                            <i class="fal fa-phone-volume"></i>
                                        </div>
                                        <div class="contact-content">
                                            <p>Call Anytime 24/7</p>
                                            <h6 class="contact-title">
                                                <a
                                                    href="tel:+918939397777">+91 89393 97777</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--==============================
  Header Area
  ==============================-->
        <header class="header5-menu z-index-step1">
            <div class="container position-relative mobile-top-headerr">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <nav
                            class="main-menu menu-style1 d-none d-lg-inline-block">
                            <ul>
                                <li class>
                                    <a href="index.html">Home</a>
                                </li>
                                <li class>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Demo Style
                                                1</a></li>
                                        <li><a href="index-2.html">Demo Style
                                                2</a></li>
                                        <li><a href="index-3.html">Demo Style
                                                3</a></li>
                                        <li><a href="index-4.html">Demo Style
                                                4</a></li>
                                        <li><a href="index-5.html">Demo Style
                                                5</a></li>
                                    </ul>
                                </li>
                                <li
                                    class="mega-menu-wrap menu-item-has-children">
                                    <a href="#">Specialities</a>
                                </li>
                                <li class>
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li class>
                                    <a href="video.html">Videos</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                        <button id="menuOpenBtn" class="vs-menu-toggle d-inline-block d-lg-none">
  <i class="far fa-bars"></i>
</button>
                    </div>
                    <div
                        class="col-auto"
                        style="display: flex; align-items: center; gap: 20px">
                        <div class="book-appoint open-appointment">
                            <a href="#" class="open-appointment">Book Appointment</a>
                        </div>

                        <div class="book-appointt btn-display-nonoe" style="background: #893cb3">
                            <a href="academy.html" style="color: #fff">Join Our Academy</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
  `;

  document.getElementById("header").innerHTML = header;

  // 🔥 IMPORTANT: re-run mobile menu plugin
  setTimeout(() => {
    if (typeof jQuery !== "undefined") {
      $(".vs-menu-wrapper").vsmobilemenu();
    }
  }, 200);
});

document.addEventListener("DOMContentLoaded", function () {
  const footer = `
    <footer
    class="footer-wrapper footer-layout1 bg2 space-top space-md-top"
    data-bg-src="/assets/my-img/footer.jpg" 
    style="padding: 10px 0px -40px; padding-top: 70px; background-image: url('assets/my-img/footer.jpg');">
            <div class="container">
                <div
                    class="widget-area space-bottom space-md-bottom"
                    style="padding-bottom: 50px">
                    <div
                        class="row align-items-start justify-content-center justify-content-lg-between">
                        <div
                            class="col-lg-4 col-md-10 text-md-center text-lg-start">
                            <div class="widget footer-widget">
                                <div class="vs-widget-about text-center-md">
                                    <div class="foter-logo">
                                        <a href="index.html">
                                            <img src="assets/my-img/logo.png"
                                                alt="Footer Logo" />
                                        </a>
                                    </div>
                                    <p class="footer-text">
                                        It is a long established fact that a
                                        reader will be
                                        distracted by the readable content Lorem
                                        ipsum placeholder
                                        text commonly used.
                                    </p>
                                    <div class="footer-social">
                                        <a target="_blank" href="https://www.facebook.com/tnagarwcf#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://www.youtube.com/channel/UC6mZ-xksliGog6Scqc4RrlA"><i
                                                class="fab fa-youtube"></i></a>
                                        <a target="_blank" href="https://www.instagram.com/wcftnagar"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widget widget_nav_menu footer-widget">
                                <p class="widget_title">Useful Links</p>
                                <div class="menu-all-pages-container">
                                    <ul>
                                        <li><a href="index.html">Home
                                                Page</a></li>
                                        <li><a href="about.html">About
                                                Us</a></li>
                                        <li><a href="contact.html">Contact
                                                Us</a></li>
                                        <li><a href="blog.html">Hunting
                                                Services</a></li>
                                        <li><a href="blog.html">Our
                                                Blog</a></li>
                                        <li><a href="shop.html">Visit
                                                Shop</a></li>
                                        <li><a href="cart.html">Check
                                                Cart</a></li>
                                        <li><a
                                                href="blog.html">Wishlist</a></li>
                                        <li><a href="blog.html">Hunting
                                                Team</a></li>
                                        <li><a
                                                href="contact.html">Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div
                                class="widget widget_nav_menu footer-widget padding-l">
                                <p class="widget_title">Contact Us</p>
                                <p class="info-footer">
                                    <i class="fas fa-envelope"></i><a
                                        href="mailto:wcfhospital@gmail.com">wcfhospital@gmail.com</a>
                                </p>
                                <p class="info-footer">
                                    <i class="fas fa-phone-alt"></i><a
                                        href="tel:+918939397777">+91 89393 97777</a>
                                </p>

                                <p class="info-footer">
                                    <i class="fas fa-location"></i><a
                                        href="tel:+56923162156">North Usman Road, T Nagar, Chennai - 600 017</a>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright bg-theme">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <p class="mb-0 link-inherit fw-light text-white py-10 footerrr">
                                &copy; 2026 <a href="index.html">WFC Hospital</a>. All
                                Rights Reserved.
                            </p>
                        </div>
                        <div class="col-lg-6 text-start text-md-end">
                            <p class="mb-0 link-inherit fw-light text-white footerrr">
                                Designed By <a href="https://impinfo.in" target="_blank">Imperial Info Systems</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Scroll To Top -->
        <a href="#" class="scrollToTop scroll-btn"><i
                class="far fa-arrow-up"></i></a>

    `;

  document.getElementById("footer").innerHTML = footer;
});

// OPEN POPUP FROM ANY BUTTON
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".open-appointment");

  if (btn) {
    e.preventDefault(); // 🔥 THIS FIXES YOUR ISSUE
    document.getElementById("appointmentPopup").style.display = "flex";
  }
});

// CLOSE POPUP
function closePopup() {
  document.getElementById("appointmentPopup").style.display = "none";
}

// CLOSE WHEN CLICK OUTSIDE
window.addEventListener("click", function (e) {
  const popup = document.getElementById("appointmentPopup");
  if (e.target === popup) {
    popup.style.display = "none";
  }
});