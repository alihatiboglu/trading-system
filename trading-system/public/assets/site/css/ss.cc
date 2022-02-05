@import url('https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900|Open+Sans:400,600');

html {
  overflow-x: hidden !important;
  width: 100%;
  height: 100%;
  position: relative;
  -webkit-font-smoothing: antialiased;
}

body {
  border: 0;
  margin: 0;
  padding: 0;
  background: #111;
}

.wrapper {
  position: relative;
  overflow: hidden;
}

a:link,
a:hover,
a:visited {
  text-decoration: none;
}

section {
  padding: 60px 0;
  position: relative;
}

.bg-parallax {
  background-size: cover;
  background-attachment: fixed;
}

.overflow-hidden {
	overflow:hidden;
}

.gap-20 {
  clear: both;
  height: 20px;
}

a:focus {
  outline: 0;
}

.unstyled {
  list-style: none;
  margin: 0;
  padding: 0;
}

.ts-padding {
  padding: 50px;
}

.btn-primary {
  border: 0;
  border-radius: 0;
  padding: 12px 30px;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
  transition: .1s;
  outline: 0;
  box-shadow: none;
  font-family: 'Open Sans', sans-serif;
}

.btn-primary:hover {
  color: #fff;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active {
  box-shadow: none;
  outline: 0;
}

.form-control {
  box-shadow: none;
  border: 1px solid #333;
  padding: 0px 0px 4px 20px;
  height: 46px;
  /*color: #fff;*/
  background: #222;
  font-size: 14px;
  border-radius: 0;
  outline: 0;
  transition: .1s;
}

.form-control:focus {
  box-shadow: none;
  outline: none;
  border: 1px solid #555;
}

.form-control::-webkit-input-placeholder {
  font-size: 12px;
  color: #666;
}  /* WebKit, Blink, Edge */
.form-control:-moz-placeholder {
  font-size: 12px;
  color: #666;
}  /* Mozilla Firefox 4 to 18 */
.form-control::-moz-placeholder {
  font-size: 12px;
  color: #666;
}  /* Mozilla Firefox 19+ */
.form-control:-ms-input-placeholder {
  font-size: 12px;
  color: #666;
}  /* Internet Explorer 10-11 */
.form-control::-ms-input-placeholder {
  font-size: 12px;
  color: #666;
}  /* Microsoft Edge */
hr {
  background-color: #e7e7e7;
  border: 0;
  height: 1px;
  margin: 40px 0;
}

.title-head {
  margin: 0;
  font-weight: 800;
  font-size: 45px;
  line-height: 45px;
  margin-top: 0;
  color: #fff;
  padding: 10px 0 20px;
  position: relative;
  text-transform: uppercase;
  margin: 0 15px;
}

.title-head-subtitle p {
  position: relative;
  display: inline-block;
  text-transform: uppercase;
  margin-bottom: 25px;
  font-size: 14px;
}

.title-head-subtitle p:before {
  position: absolute;
  content: "";
  height: 2px;
  right: -50px;
  top: 13px;
  width: 30px;
}

.title-head-subtitle p:after {
  position: absolute;
  content: "";
  height: 2px;
  left: -50px;
  top: 13px;
  width: 30px;
}

.terms-of-services h3 {
  color: #fff;
}

/*** Typography ***/

body, p {
  -webkit-font-smoothing: antialiased !important;
  color: #999;
  line-height: 28px;
  font-weight: 400;
  font-size: 16px;
  font-family: 'Lato', sans-serif;
}

h1, h2, h3, h4 {
  color: #222;
  font-weight: 600;
}

h1 {
  font-size: 36px;
  line-height: 48px;
}

h2 {
  font-size: 28px;
  line-height: 36px;
}

h3 {
  font-size: 24px;
  line-height: 32px;
}

h4 {
  font-size: 18px;
  line-height: 28px;
}

h5 {
  font-size: 14px;
  line-height: 24px;
}

/*** Boxed Body ***/

body.boxed {
  background: url('../images/bg.png');
  background-attachment: fixed;
}

body.boxed .wrapper {
  background: #111;
  margin: 0 auto;
  max-width: 1188px;
  box-shadow: 0 0 27px #999;
}

body.boxed .site-navigation.fixed ul.navbar-nav {
  max-width: 1188px;
  margin: 0 auto;
  right: 0;
}

body.boxed .site-navigation.fixed {
  max-width: 1188px;
}

/*** Light Body ***/

body.light .wrapper,
body.light #preloader,
body.light .header,
body.light .bitcoin-calculator .form-input,
body.light .footer,
body.light.auth-page,
body.light .user-auth > div:nth-child(2) {
  background: #fff;
}


body.light, body.light p,
body.light ul.bitcoin-stats span,
body.light .feature-box .feature-box-content p,
body.light ul.nav.nav-tabs li a {
  color: #777;
}

body.light ul.bitcoin-stats h6,
body.light .pricing-header h2,
body.light  .pricing-header h2 span,
body.light .footer .top-footer .menu ul li a,
body.light .footer .top-footer h4.payment-title,
body.light .footer .bottom-footer p,
body.light .footer .social-footer ul li a,
body.light .top-footer .contacts > div,
body.light .terms-of-services h3 {
  color: #555;
}

body.light ul.user li.sign-in a.btn-primary:hover,
body.light ul.user li.sign-in a.btn-primary:focus,
body.light ul.user li.sign-in a.btn-primary:active,
body.light .pricing-switcher label,
body.light .team-member:hover .team-member-caption h4,
body.light blockquote p{
  color: #fff;
}

body.light .site-nav-inner,
body.light .site-navigation.fixed ul.navbar-nav,
body.light .features-row,
body.light .image-block,
body.light .team-member-caption,
body.light .image-block2,
body.light .pricing-wrapper > li,
body.light .bitcoin-calculator-section .container,
body.light .facts .container,
body.light .shop-cart table.order thead tr,
body.light .shop-cart .qty,
body.light .shop-cart input.qtyplus,
body.light .shop-cart input.qtyminus,
body.light .shop-cart .quantity,
body.light .shop-checkout .checkout table.products thead tr,
body.light .shop-checkout .checkout table.products th.with-bg,
body.light .shop-checkout .checkout .payment .cheque, body.light  .shop-checkout .checkout .payment .paypal {
  background: #e7e7e7;
}

body.light .site-navigation,
body.light .site-navigation.fixed ul.navbar-nav {
  border-bottom: 1px solid #ddd;
}

body.light ul.navbar-nav > li:not(.active) > a,
body.light .navbar-nav .fa-search,
body.light ul.navbar-nav > li a,
body.light .feature-box .feature-box-content h3,
body.light .title-head,
body.light .feature-title,
body.light .price,
body.light .bitcoin-calculator .form-input,
body.light .bitcoin-calculator .form-equal,
body.light .team-member .team-member-caption h4,
body.light .latest-post .post-title a,
body.light .title-about,
body.light .contact-form h3,
body.light .footer .bottom-footer p a,
body.light.error-page .error h3,
body.light.blog article h4 ,
body.light .sidebar .widget-title,
body.light .widget.recent-posts .entry-title a,
body.light.blog .comments-heading,
body.light .service-box h3,
body.light .facts .facts-content .heading-facts h2, body.light .facts h3,
body.light .pricing h3,
body.light .banner-area .breadcrumb>li,
body.light  .banner-area .breadcrumb>li+li:before ,
body.light  .shop-cart .table thead > tr > th,
body.light  .shop-cart .table h6,
body.light  .shop-cart .table .icon-delete-product,
body.light  .shop-checkout h3,
body.light  .shop-checkout .checkout table.products td.text-price,
body.light  .facts .facts-content .heading-facts h2  {
  color: #333;
}

body.light ul.nav.nav-tabs li a, body.light  ul.nav.nav-tabs li.active a {
  border-left: 1px solid #ccc;
}
body.light .widget ul.nav.nav-tabs li a, body.light .widget  ul.nav.nav-tabs li.active a, body.light ul.nav.nav-tabs li:first-child a {
	border-left:0;
}

body.light .bitcoin-calculator .form-input {
  border: 1px solid #ccc;
}

body.light .dropdown-menu {
  background: #fff;
  border: 1px solid rgba(0,0,0,.1);
}

body.light .dropdown-menu li a:hover, body.light .dropdown-menu li.active a:hover, body.light .dropdown-menu li.active a,body.light .widget,
body.light.blog .comments-list .comment,
body.light .service-box > div {
  background: #f2f2f2;
}

body.light .pricing-switcher > p {
  background: #333;
  border: 1px solid #333;
}

body.light .bitcoin-calculator-section p.info {
  color: rgba(0,0,0,.3);
}

body.light .btcwdgt-headlines.btcwdgt-clean {
  border: 1px solid #ddd !important;
}

body.light .footer hr {
  background: #ccc;
}

body.light .footer .bottom-footer p {
  border-top: 1px solid #ddd;
}

body.light .footer .menu ul li a:hover, body.light .footer .social-footer ul li a:hover {
  color: #222;
}

body.light .footer .top-footer .social-footer ul li a {
  background: rgba(0,0,0,.1);
}

body.light .footer .bottom-footer p a:hover {
  color: #111;
}

body.light .facts-footer > div span {
  font-weight: 600;
}

body.light .form-control {
  border: 1px solid #ddd;
  background: #f2f2f2;
  color: #555;
}

body.light .form-control:focus {
  border: 1px solid #aaa;
}

body.light.error-page .error > div {
  background: rgba(255,255,255,.9);
}

body.light.error-page .error p {
  color: #777;
}

body.light .back-to-top {
  background: #ccc;
  color: #777;
}

body.light .back-to-top:hover {
  background: #ccc;
  color: #333;
}

body.light.blog .meta {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}


body.light .sidebar ul.nav-tabs li, body.light .widget.recent-posts ul li {
  border-bottom: 1px solid #ddd;
}

body.light .widget.recent-posts ul li:last-child {
  border: 0;
  padding-bottom: 0;
  margin-bottom: 0;
}

body.light.blog .pagination li a {
  color: #777;
  border: 1px solid #ddd;
}

body.light.blog  .pagination li:not(.active) a:hover {
  background: #ddd;
}

body.light.error-page .error .big-404,
body.light .facts-footer > div span,
body.light.blog .comments-list .comment-author,
body.light h4.panel-title a.collapsed,
body.light .contact-page-info .contact-info-box-content h4 {
  color: #555;
}

body.light .action-text p {
  color: #ddd;
}

body.light .panel.panel-default {
  border-color: #ddd;
}

body.light .panel-default>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #ddd;
}

body.light .banner-area:after, body.light  .banner-area:before,
body.light .call-action-all:after,body.light  .call-action-all:before {
  border-bottom: 30px solid #fff;
}


body.light .facts h4,
body.light .facts span.or {
  color: #777;
}

body.light .facts .facts-content .fact:after {
  background: #aaa;
}

body.light .banner-area .banner-overlay {
  background-color: rgba(255, 255, 255, 0.5);
}

body.light .banner-area hr {
  border-top: 2px solid #333;
}


body.light .shop-cart .table tbody > tr,
body.light .shop-cart .table.cart-total .section-border,
body.light .shop-checkout .table tbody > tr {
  border-bottom: 1px solid #ddd;
}

/*** Preloader ***/

#preloader {
  position: fixed;
  z-index: 1111111111111;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  height: 100%;
  background-color: #111;
}

#preloader-content {
  width: 200px;
  margin: 0 auto;
  display: block;
  text-align: center;
  top: 50%;
  position: absolute;
  left: 50%;
  -webkit-transform: translate(-50%, -50%) rotate(-13deg);
  -ms-transform: translate(-50%, -50%) rotate(-13deg);
  transform: translate(-50%, -50%) rotate(-13deg);
}

.path {
  stroke-dasharray: 2350;
  stroke-dashoffset: 910;
  stroke-width: 4;
  stroke-linecap: round;
  -webkit-animation: dash 3s linear infinite;
  animation: dash 3s linear infinite;
  fill-opacity: 0;
}

/* Back To Top */

.back-to-top {
  position: fixed;
  right: -7.5%;
  bottom: 20px;
  height: 45px;
  width: 45px;
  line-height: 44px;
  font-size: 16px;
  opacity: 1;
  z-index: 1111;
  visibility: hidden;
  text-align: center;
  text-decoration: none;
  -webkit-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
  background: #2d2d2d;
  color: #999;
}

.back-to-top:hover {
  color: #fff;
}

.show-back-to-top {
  display: block;
  right: 20px;
  visibility: visible;
}

/* [ HEADER ] */
/*================================================== */

.header {
  background: #1d1d1d;
}

/*** Logo ***/

.main-logo {
  position: relative;
  padding-top: 25px;
  padding-bottom: 25px;
}

.logo-mobile {
  display: none;
}

/*** Bitcoin Statistics ***/

ul.bitcoin-stats {
  padding-top: 28px;
}

ul.bitcoin-stats li {
  display: inline-block;
  padding-right: 25px;
}

ul.bitcoin-stats li:last-child {
  padding-right: 0;
}

ul.bitcoin-stats h6 {
  font-weight: 800;
  color: #eee;
  margin: 0;
  font-size: 13px;
  text-align: left;
  margin-bottom: -2px;
  line-height: 13px;
}

ul.bitcoin-stats span {
  font-size: 12px;
  text-align: left;
  color: #aaa;
}

.btcwdgt.btcwdgt-text-ticker.btcwdgt-s-price {
  margin-top: -3px !important;
  min-width: initial !important;
  box-shadow: none !important;
  margin: 0 !important;
  background-color: transparent !important;
}

.btcwdgt.btcwdgt-s-price .btcwdgt-body {
  padding: 0!important;
  margin-top: 0 !important;
  height: 14px !important;
  text-align: center !important;
}

@-moz-document url-prefix() {
  .btcwdgt.btcwdgt-s-price .btcwdgt-body {
    height: 15px !important;
  }
}

.btcwdgt.btcwdgt-s-price .btcwdgt-body span,
.btcwdgt.btcwdgt-text-ticker .btcwdgt-footer,
.btcwdgt.btcwdgt-text-ticker .btcwdgt-edge {
  display: none !important;
}

.btcwdgt.btcwdgt-s-price .btcwdgt-body ul {
  float: left !important;
}

.btcwdgt.btcwdgt-s-price .btcwdgt-body ul li {
  line-height: normal !important;
  font-size: 15px !important;
  font-weight: 600 !important;
}

.btcwdgt.btcwdgt-s-price .btcwdgt-body ul li:before {
  content: "$";
  position: relative;
  font-size: 12px;
  top: -1px;
}

ul.bitcoin-stats li .btcwdgt.btcwdgt .arrow,
ul.bitcoin-stats li .btcwdgt.btcwdgt .arrow.up,
ul.bitcoin-stats li .btcwdgt.btcwdgt .arrow.down {
  top: 10px !important;
  position: absolute !important;
  margin: -6px 0 0 -11px !important;
}

/*** User Buttons ***/

ul.user {
  text-align: right;
  padding-top: 26px;
}

ul.user li {
  display: inline-block;
  padding-right: 25px;
}

ul.user li a {
  font-size: 13px;
}

ul.user li.sign-up {
  margin-right: 0;
  border-right: 0;
  padding-right: 0;
}

ul.user li.sign-up, ul.user li.sign-in {
  margin-right: 0;
}

ul.user li.sign-in {
  padding-right: 17px;
}

ul.user li.sign-in a:hover, ul.user li.sign-in a:active, ul.user li.sign-in a:focus {
  color: #fff;
}

ul.user li.sign-in a {
  background: transparent;
  padding: 11px 17px;
  transition: .1s;
}

/*** Main navigation ***/

.site-navigation {
  position: relative;
  padding-bottom: 48px;
}

.site-navigation,
.site-navigation.fixed ul.navbar-nav {
  border-bottom: 1px solid #222;
}

.site-navigation.fixed {
  z-index: 111111;
}

.site-nav-inner {
  position: absolute;
  z-index: 100;
  background: #111;
  text-align: center;
  width: 100%;
  left: 0;
  bottom: 0;
}

.navbar {
  border-radius: 0;
  border: 0;
  margin-bottom: 0;
}

.navbar-toggle {
  float: right;
  border-radius: 0;
  margin-right: 0;
}

.navbar-toggle .icon-bar {
  background: #fff;
}

.nav>li>a:focus,
.nav>li>a:hover {
  background: none;
}

.nav-tabs>li>a {
  border: 0;
}

ul.navbar-nav {
  float: none;
  display: block;
}

.site-navigation.fixed ul.navbar-nav {
  position: fixed;
  top: 0;
  background: #111;
  width: 100%;
  left: 0;
}

ul.navbar-nav > li {
  float: none;
  display: inline-block;
}

ul.navbar-nav > li:not(.search):hover,
ul.navbar-nav > li.active {
  color: #fff;
  position: relative;
}

ul.navbar-nav > li {
  padding: 0;
  position: relative;
}

ul.navbar-nav > li:last-child:after {
  background: none;
}

ul.navbar-nav > li > a {
  color: #fff;
  font-weight: 600;
  font-size: 14px;
  text-transform: uppercase;
  margin: 0;
  padding: 17px 16px;
  line-height: 14px;
  position: relative;
  font-family: 'Open Sans', sans-serif;
  transition: .1s;
}

ul.navbar-nav > li > a i {
  font-weight: 600;
  padding-left: 5px;
}

.nav .open>a, .nav .open>a:hover,
.nav .open>a:focus {
  background: transparent;
  border: 0;
}

ul.navbar-nav > li:hover > a:after,
ul.navbar-nav > li.active > a:after {
  position: absolute;
  content: '';
  left: 0;
  bottom: 0;
  width: 100%;
  height: 3px;
}

ul.nav.nav-tabs {
  border-bottom: 0;
}

ul.nav.nav-tabs li a, ul.nav.nav-tabs li.active a {
  border-top: 0;
  border-bottom: 0;
  border-right: 0;
  border-left: 1px solid #555;
  border-radius: 0;
  font-size: 15px;
  color: #aaa;
  padding: 0 30px;
  margin: 20px 0;
  text-transform: uppercase;
}

ul.nav.nav-tabs li.active a {
  font-weight: 600;
}

ul.nav.nav-tabs li:first-child a {
  border-left: 0;
  padding-left: 0;
}

ul.nav.nav-tabs li a:hover, ul.nav.nav-tabs li.active a:hover {
  border-bottom: 0 !important;
  border-top: 0 !important;
}

/*** Dropdown ***/

.dropdown-menu {
  text-align: left;
  background: #1d1d1d;
  border-right: 1px solid rgba(255,255,255,.09);
  border-bottom: 1px solid rgba(255,255,255,.09);
  border-left: 1px solid rgba(255,255,255,.09);
  box-shadow: none;
  z-index: 100;
  min-width: 200px;
  border-radius: 0;
  padding: 0;
}

.navbar-nav>li .dropdown-menu li:last-child a {
  border-bottom: 0 !important;
}

.navbar-nav>li>.dropdown-menu a {
  background: none;
  text-transform: uppercase;
}

.dropdown-menu li a {
  display: block;
  font-size: 12px;
  font-weight: 600;
  line-height: normal;
  text-decoration: none;
  padding: 15px 20px;
  color: #999;
}

.dropdown-menu li a:hover, .dropdown-menu li.active a:hover, .dropdown-menu li.active a {
  background: #111;
}

.dropdown-menu li:last-child > a {
  border-bottom: 0;
}

/*** Search ***/

.site-search {
  text-align: center;
  background: rgba(0,0,0,.7);
  position: absolute;
  top: 49px;
  z-index: 100;
  width: 100%;
}

.navbar-nav .fa-search {
  background: none;
  border: none;
  color: #fff;
  font-size: 14px;
  outline: none;
  padding: 17px;
}

.navbar-nav .fa-shopping-cart {
  font-weight: 300;
  padding: 0;
}

.site-navigation.fixed .site-search {
  top: 49px;
  position: fixed;
}

.site-search .container {
  height: 0;
  overflow: hidden;
  position: relative;
  -webkit-transition: height 0.3s;
  transition: height 0.3s;
}

.site-search .container.open {
  height: 80px;
}

.site-search input[type="text"] {
  background: none;
  border: none;
  color: #fff;
  font-size: 16px;
  margin: 22px 0 25px;
  padding-right: 20px;
  width: 100%;
  outline: 0;
  text-align: center;
}

.site-search input[type="text"]::-webkit-input-placeholder {
  color: rgba(255, 255, 255, 0.45);
}

.site-search input[type="text"]:-moz-placeholder {
  color: rgba(255, 255, 255, 0.45);
}

.site-search input[type="text"]::-moz-placeholder {
  color: rgba(255, 255, 255, 0.45);
}

.site-search input[type="text"]:-ms-input-placeholder {
  color: rgba(255, 255, 255, 0.45);
}

.site-search .close {
  color: rgba(255, 255, 255, 0.25);
  cursor: pointer;
  font-size: 32px;
  margin-top: -20px;
  position: absolute;
  top: 50%;
  right: 15px;
}

.site-search .close:hover {
  color: #fff;
}

/* [ SECTIONS ] */
/*================================================== */

/*** Main slide ***/

#main-slide .item {
  min-height: 570px;
  color: #fff;
  background-position: 50% 50%;
  -webkit-background-size: cover;
  background-size: cover;
  -webkit-backface-visibility: hidden;
}

#main-slide .item:after {
  content: "";
  background: rgba(0,0,0,.6);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}

#main-slide .item .slider-content {
  z-index: 1;
  opacity: 0;
  -webkit-transition: opacity 500ms;
  -moz-transition: opacity 500ms;
  -o-transition: opacity 500ms;
  transition: opacity 500ms;
}

#main-slide .item.active .slider-content {
  opacity: 1;
  -webkit-transition: opacity 100ms;
  -moz-transition: opacity 100ms;
  -o-transition: opacity 100ms;
  transition: opacity 100ms;
}

#main-slide .slider-content {
  top: 50%;
  margin-top: -150px;
  padding: 0;
  position: absolute;
  width: 100%;
  color: #fff;
}

.slider-content {
  position: relative;
  display: table;
  height: 100%;
  width: 100%;
}

.slider-text {
  display: table;
  vertical-align: bottom;
  color: #fff;
  width: 100%;
  padding-bottom: 0;
  padding-top: 20px;
}

.slider-text .slide-title {
  font-size: 68px;
  line-height: 78px;
  font-weight: 600;
  color: #fff;
  text-transform: uppercase;
}

.slider-text .slide-title span {
  font-weight: 800;
}

.slider.btn-primary {
  margin-top: 10px;
  background: transparent;
  transition: .1s;
  margin:5px;
}

.slider.btn-primary:hover, .slider.btn-primary:active, .slider.btn-primary:focus {
  color: #fff;
}

/* Fix Bootstrap Carousel Bug in Firefox (Replace Slide by Fade) */
@-moz-document url-prefix() {
  .carousel-fade .carousel-inner .item {
    -webkit-transition-property: opacity;
    transition-property: opacity;
  }

  .carousel-fade .carousel-inner .item,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
    opacity: 0;
  }

  .carousel-fade .carousel-inner .active,
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
    opacity: 1;
  }

  .carousel-fade .carousel-inner .next,
.carousel-fade .carousel-inner .prev,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
    left: 0;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  .carousel-fade .carousel-control {
    z-index: 2;
  }

  .carousel,
.carousel-inner,
.carousel-inner .item {
    height: 100%;
  }
}
/* Carousel Indicators */

.carousel-indicators li {
  display: none;
}

#main-slide .carousel-control.left,
#main-slide .carousel-control.right {
  opacity: 0;
  filter: alpha(opacity=0);
  background-image: none;
  background-repeat: no-repeat;
  text-shadow: none;
  -webkit-transition: all .25s ease;
  -moz-transition: all .25s ease;
  -ms-transition: all .25s ease;
  -o-transition: all .25s ease;
  transition: all .25s ease;
}

#main-slide:hover .carousel-control.left,
#main-slide:hover .carousel-control.right {
  opacity: 1;
  filter: alpha(opacity=100);
}

#main-slide:hover .carousel-control.left {
  left: 30px;
}

#main-slide:hover .carousel-control.right {
  right: 30px;
}

#main-slide .carousel-control.left span {
  padding: 15px;
}

#main-slide .carousel-control.right span {
  padding: 15px;
}

#main-slide .carousel-control .fa-angle-left,
#main-slide .carousel-control .fa-angle-right {
  position: absolute;
  top: 50%;
  z-index: 5;
  display: inline-block;
  margin-top: -25px;
}

#main-slide .carousel-control .fa-angle-left {
  left: 0;
}

#main-slide .carousel-control .fa-angle-right {
  right: 0;
}

#main-slide .carousel-control i {
  line-height: 56px;
  border-radius: 4px;
  font-size: 56px;
  -moz-transition: all 500ms ease;
  -webkit-transition: all 500ms ease;
  -ms-transition: all 500ms ease;
  -o-transition: all 500ms ease;
  transition: all 500ms ease;
}


/*** Features box ***/

.features {
  padding-top: 0;
  padding-bottom: 0;
  top: -60px;
  position: relative;
  z-index: 10;
  left: 100px;
}

.features-row {
  background: #1d1d1d;
  padding: 60px 50px 50px 50px;
  margin-left: 0;
  margin-right: 0;
}

.feature-box .feature-icon {
  float: left;
  display: inline-block;
}

.feature-box .feature-icon img {
  width: 50px;
  vertical-align: initial;
}

.feature-box .feature-box-content {
  margin-left: 100px;
}

.feature-box .feature-box-content h3 {
  color: #fff;
  margin: 0 0 10px 0;
  line-height: normal;
  font-size: 18px;
}

.feature-box .feature-box-content p {
  color: #fff;
  font-size: 14px;
  line-height: 23px;
  color: #ddd;
}

/*** Banner Area ***/

.banner-area {
  position: relative;
  padding: 0;
  color: #fff;
  background-image: url('../images/backgrounds/bg-banner.jpg');
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}

.banner-area:after,.banner-area:before {
  content: '';
  position: absolute;
  bottom: 0;
  width: 50%;
  z-index: 1;
  border-bottom: 30px solid #111;
  -moz-transform: rotate(0.000001deg);
  -webkit-transform: rotate(0.000001deg);
  -o-transform: rotate(0.000001deg);
  -ms-transform: rotate(0.000001deg);
  transform: rotate(0.000001deg);
}

.banner-area:before {
  right: 50%;
  border-right: 125px solid transparent;
}

.banner-area:after {
  left: 50%;
  border-left: 125px solid transparent;
}

.banner-area .banner-overlay {
  padding: 70px 0 90px;
  background-color: rgba(0, 0, 0, 0.7);
}

.banner-area .banner-text {
  margin: 0 auto;
  width: 100%;
  z-index: 1;
}

.banner-area .title-head.banner-post-title {
  line-height: 55px;
}

.banner-area hr {
  border-top: 2px solid #fff;
  background: transparent;
  width: 60px;
  margin: 0 auto;
  margin-top: 10px;
}

.banner-area .banner-title {
  display: inline-block;
  color: #fff;
  text-transform: uppercase;
  font-weight: 800;
  font-size: 45px;
  line-height: 45px;
}

.banner-area .banner-title span {
  color: #ffae11;
}

/*** Breadcrumb ***/

.banner-area .breadcrumb {
  font-size: 14px;
  text-transform: uppercase;
  margin: 15px 0 0;
  background: transparent;
}

.banner-area .breadcrumb>li {
  font-weight: 400;
}

.banner-area .breadcrumb>li a {
  font-weight: 600;
}

.banner-area .breadcrumb>li a:hover {
  opacity: .9;
}

.banner-area .breadcrumb>li+li:before {
  color: #fff;
}

/* [ SECTIONS ] */
/*================================================== */

/*** About Us ***/

.about-us {
  padding: 0 0 70px;
}

.title-about {
  text-transform: uppercase;
  color: #fff;
  margin-top: 0;
  margin-bottom: 15px;
}

.title-about.risk-title {
  margin-top: 18px;
  font-size: 18px;
}

.img-about-us {
  margin: 0 auto;
}

.about-content {
  margin-top: 20px;
}

.about-text {
  line-height: 28px;
  margin-bottom: 3px;
}

.nav-tabs>li.active>a,
.nav-tabs>li.active>a:hover,
.nav-tabs>li.active>a:focus {
  background: none;
}

.nav-tabs>li.active>a:focus {
  color: #111;
}

.tab-content p {
  padding: 0 0 30px;
  margin: 0;
}

.feature-about i {
  margin-right: 10px;
}

.btn-services {
  margin-top: 15px;
}

/*** Features and Video ***/

.image-block {
  background: #1d1d1d;
  padding: 0;
}

.bg-image-1 {
  background-image: url(../images/backgrounds/bg-video.jpg);
  background-size: cover;
  background-position: center center;
  height: 420px;
}

.bg-image-1:after {
  content: "";
  background: rgba(0,0,0,.6);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}

.img-block-left {
  padding-left: 140px;
}

/* Features */

.feature .feature-icon {
  font-size: 36px;
}

.image-block .feature .feature-icon img {
  height: 37px;
}

.feature-title {
  font-size: 18px;
  margin-top: 10px;
  text-transform: uppercase;
  font-weight: 600;
  color: #fff;
}

/* Video */

.button-video {
  position: absolute;
  z-index: 2;
  top: 50%;
  left: 50%;
  display: block;
  overflow: hidden;
  border: 4px solid #fff;
  border-radius: 50%;
  transition: .1s;
  width: 86px;
  height: 86px;
  border-color: #fff;
  -webkit-transform: translate3d(-50%, -50%, 0);
  transform: translate3d(-50%, -50%, 0);
}

.button-video:after {
  content: '';
  position: absolute;
  top: 50%;
  left: 53%;
  -webkit-transform: translate3d(-50%, -50%, 0);
  transform: translate3d(-50%, -50%, 0);
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 10px 0 10px 18px;
}

.button-video:hover {
  background: #fff;
}

/*** Pricing Tables ***/

.pricing-tables-content {
  margin-top: 25px;
}

.pricing-tables-content.pricing-page {
  margin-top: 0;
}

.pricing-tables-content .header {
  height: 100px;
  line-height: 170px;
  position: relative;
}

.pricing h3 {
  color: #fff;
  text-transform: uppercase;
}

.pricing h3.sell-title {
  margin-top: 50px;
}

.pricing-switcher {
  text-align: center;
}

.pricing-switcher > p {
  display: inline-block;
  position: relative;
  padding: 0;
  padding-right: 4px;
  border-radius: 0;
  background: #111;
  border: 1px solid #333;
}

.pricing-switcher input[type="radio"] {
  position: absolute;
  opacity: 0;
}

.pricing-switcher label {
  position: relative;
  z-index: 1;
  display: inline-block;
  float: left;
  width: 105px;
  height: 39px;
  line-height: 43px;
  cursor: pointer;
  padding-left: 8px;
  font-size: 16px;
  color: #fff;
}

.pricing-switcher label.switch-1.active, .pricing-switcher label.switch-2.active {
  color: #fff;
}

.pricing-switcher .switch {
  position: absolute;
  top: 2px;
  left: 2px;
  height: 40px;
  width: 105px;
  border-radius: 0;
  -webkit-transition: -webkit-transform 0.5s;
  -moz-transition: -moz-transform 0.5s;
  transition: transform 0.5s;
}

.pricing-switcher input[type="radio"]:checked + label + .switch,
.pricing-switcher input[type="radio"]:checked + label:nth-of-type(n) + .switch {
  -webkit-transform: translateX(105px);
  -moz-transform: translateX(105px);
  -ms-transform: translateX(105px);
  -o-transform: translateX(105px);
  transform: translateX(105px);
}

.no-js .pricing-switcher {
  display: none;
}

.pricing-list {
  margin: 32px 0 0;
  list-style-type: none;
}

.pricing-list > li {
  position: relative;
  margin-bottom: 16px;
}

.pricing-wrapper {
  position: relative;
  list-style-type: none;
  padding: 0;
}

.touch .pricing-wrapper {
  -webkit-perspective: 2000px;
  -moz-perspective: 2000px;
  perspective: 2000px;
}

.pricing-wrapper.is-switched .is-visible {
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
  -webkit-animation: rotate 0.5s;
  -moz-animation: rotate 0.5s;
  animation: rotate 0.5s;
}

.pricing-wrapper.is-switched .is-hidden {
  -webkit-transform: rotateY(0);
  -moz-transform: rotateY(0);
  -ms-transform: rotateY(0);
  -o-transform: rotateY(0);
  transform: rotateY(0);
  -webkit-animation: rotate-inverse 0.5s;
  -moz-animation: rotate-inverse 0.5s;
  animation: rotate-inverse 0.5s;
  opacity: 0;
}

.pricing-wrapper.is-switched .is-selected {
  opacity: 1;
}

.pricing-wrapper.is-switched.reverse-animation .is-visible {
  -webkit-transform: rotateY(-180deg);
  -moz-transform: rotateY(-180deg);
  -ms-transform: rotateY(-180deg);
  -o-transform: rotateY(-180deg);
  transform: rotateY(-180deg);
  -webkit-animation: rotate-back 0.5s;
  -moz-animation: rotate-back 0.5s;
  animation: rotate-back 0.5s;
}

.pricing-wrapper.is-switched.reverse-animation .is-hidden {
  -webkit-transform: rotateY(0);
  -moz-transform: rotateY(0);
  -ms-transform: rotateY(0);
  -o-transform: rotateY(0);
  transform: rotateY(0);
  -webkit-animation: rotate-inverse-back 0.5s;
  -moz-animation: rotate-inverse-back 0.5s;
  animation: rotate-inverse-back 0.5s;
  opacity: 0;
}

.pricing-wrapper.is-switched.reverse-animation .is-selected {
  opacity: 1;
}

.pricing-wrapper > li {
  background-color: #1d1d1d;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  outline: 1px solid transparent;
}

.pricing-wrapper > li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  width: 50px;
  pointer-events: none;
  background: -webkit-linear-gradient( right , #FFFFFF, rgba(255, 255, 255, 0));
  background: linear-gradient(to left, #FFFFFF, rgba(255, 255, 255, 0));
}

.pricing-wrapper > li.is-ended::after {
  display: none;
}

.pricing-wrapper .is-visible {
  position: relative;
  z-index: 5;
}

.pricing-wrapper .is-hidden {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 1;
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
}

.pricing-wrapper .is-selected {
  z-index: 3 !important;
}

.no-js .pricing-wrapper .is-hidden {
  position: relative;
  -webkit-transform: rotateY(0);
  -moz-transform: rotateY(0);
  -ms-transform: rotateY(0);
  -o-transform: rotateY(0);
  transform: rotateY(0);
  margin-top: 16px;
}

.price {
  margin-top: 45px;
  color: #0ba026;
}

.pricing-header {
  position: relative;
  z-index: 1;
  height: 80px;
  padding: 16px;
  pointer-events: none;
  background-color: #3aa0d1;
  color: #FFFFFF;
}

.pricing-header h2 {
  margin-bottom: 3px;
  font-weight: 400;
  text-transform: uppercase;
}

.currency, .value {
  font-size: 120px;
  font-weight: 300;
}

.pricing-body {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.is-switched .pricing-body {
  overflow: hidden;
}

.pricing-features {
  width: 600px;
}

.pricing-features:after {
  content: "";
  display: table;
  clear: both;
}

.pricing-features li {
  width: 100px;
  float: left;
  padding: 25px 16px;
  font-size: 56px;
  text-align: center;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.pricing-features em {
  display: block;
  margin-bottom: 5px;
  font-weight: 600;
}

.pricing-footer {
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  height: 80px;
  width: 100%;
}

.pricing-footer::after {
  content: '';
  position: absolute;
  right: 16px;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 20px;
  width: 20px;
}

.pricing-footer a {
  display: block;
  margin: 0 30px;
}

.select {
  position: relative;
  z-index: 1;
  display: block;
  height: 100%;
  overflow: hidden;
  text-indent: 100%;
  white-space: nowrap;
  color: transparent;
}

.pricing-tables-content .header {
  height: 160px;
  line-height: 280px;
}

.pricing-list {
  margin: 48px 0 0;
  padding: 0;
}

.pricing-list:after {
  content: "";
  display: table;
  clear: both;
}

.pricing-list > li {
  float: left;
  padding: 0 15px;
}

.pricing-wrapper > li::before {
  content: '';
  position: absolute;
  z-index: 6;
  left: -1px;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 50%;
  width: 1px;
}

.pricing-wrapper > li::after {
  display: none;
}

.pricing-header {
  height: auto;
  padding: 30px;
  pointer-events: auto;
  text-align: center;
  color: #173d50;
  background-color: transparent;
  min-height: 210px;
}

.popular .pricing-header {
  color: #e97d68;
  background-color: transparent;
}

.pricing-header h2 {
  font-size: 1.8rem;
  margin-top: 25px;
  line-height: 1.7rem;
  color: #e7e7e7;

}

.pricing-header h2 span {
  color: #e7e7e7;
  display: block;
  padding-top: 17px;
  font-weight: 400;
  font-size: 14px;
}

.value {
  font-size: 4rem;
  font-weight: 800;
}

.currency {
  font-size: 4rem;
  font-weight: 600;
}

.pricing-body {
  overflow-x: visible;
}

.pricing-features {
  width: auto;
}

.pricing-features li {
  float: none;
  width: auto;
  padding: 16px;
}

.pricing-features li:nth-of-type(2n+1) {
  background-color: rgba(23, 61, 80, 0.06);
}

.pricing-features em {
  display: inline-block;
  margin-bottom: 0;
}

.pricing-footer {
  position: relative;
  height: auto;
  padding: 30px 0;
  text-align: center;
}

.pricing-footer::after {
  display: none;
}

.select {
  position: static;
  display: inline-block;
  height: auto;
  padding: 20px 48px;
  color: #FFFFFF;
  border-radius: 2px;
  background-color: #0c1f28;
  font-size: 1.4rem;
  text-indent: 0;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.no-touch .select:hover {
  background-color: #112e3c;
}

/* Keyframes */

@-webkit-keyframes rotate {
  0% {
    -webkit-transform: perspective(2000px) rotateY(0);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(200deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(180deg);
  }
}

@-moz-keyframes rotate {
  0% {
    -moz-transform: perspective(2000px) rotateY(0);
  }

  70% {
    /* this creates the bounce effect */
    -moz-transform: perspective(2000px) rotateY(200deg);
  }

  100% {
    -moz-transform: perspective(2000px) rotateY(180deg);
  }
}

@keyframes rotate {
  0% {
    -webkit-transform: perspective(2000px) rotateY(0);
    -moz-transform: perspective(2000px) rotateY(0);
    -ms-transform: perspective(2000px) rotateY(0);
    -o-transform: perspective(2000px) rotateY(0);
    transform: perspective(2000px) rotateY(0);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(200deg);
    -moz-transform: perspective(2000px) rotateY(200deg);
    -ms-transform: perspective(2000px) rotateY(200deg);
    -o-transform: perspective(2000px) rotateY(200deg);
    transform: perspective(2000px) rotateY(200deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(180deg);
    -moz-transform: perspective(2000px) rotateY(180deg);
    -ms-transform: perspective(2000px) rotateY(180deg);
    -o-transform: perspective(2000px) rotateY(180deg);
    transform: perspective(2000px) rotateY(180deg);
  }
}

@-webkit-keyframes rotate-inverse {
  0% {
    -webkit-transform: perspective(2000px) rotateY(-180deg);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(20deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(0);
  }
}

@-moz-keyframes rotate-inverse {
  0% {
    -moz-transform: perspective(2000px) rotateY(-180deg);
  }

  70% {
    /* this creates the bounce effect */
    -moz-transform: perspective(2000px) rotateY(20deg);
  }

  100% {
    -moz-transform: perspective(2000px) rotateY(0);
  }
}

@keyframes rotate-inverse {
  0% {
    -webkit-transform: perspective(2000px) rotateY(-180deg);
    -moz-transform: perspective(2000px) rotateY(-180deg);
    -ms-transform: perspective(2000px) rotateY(-180deg);
    -o-transform: perspective(2000px) rotateY(-180deg);
    transform: perspective(2000px) rotateY(-180deg);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(20deg);
    -moz-transform: perspective(2000px) rotateY(20deg);
    -ms-transform: perspective(2000px) rotateY(20deg);
    -o-transform: perspective(2000px) rotateY(20deg);
    transform: perspective(2000px) rotateY(20deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(0);
    -moz-transform: perspective(2000px) rotateY(0);
    -ms-transform: perspective(2000px) rotateY(0);
    -o-transform: perspective(2000px) rotateY(0);
    transform: perspective(2000px) rotateY(0);
  }
}

@-webkit-keyframes rotate-back {
  0% {
    -webkit-transform: perspective(2000px) rotateY(0);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(-200deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(-180deg);
  }
}

@-moz-keyframes rotate-back {
  0% {
    -moz-transform: perspective(2000px) rotateY(0);
  }

  70% {
    /* this creates the bounce effect */
    -moz-transform: perspective(2000px) rotateY(-200deg);
  }

  100% {
    -moz-transform: perspective(2000px) rotateY(-180deg);
  }
}

@keyframes rotate-back {
  0% {
    -webkit-transform: perspective(2000px) rotateY(0);
    -moz-transform: perspective(2000px) rotateY(0);
    -ms-transform: perspective(2000px) rotateY(0);
    -o-transform: perspective(2000px) rotateY(0);
    transform: perspective(2000px) rotateY(0);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(-200deg);
    -moz-transform: perspective(2000px) rotateY(-200deg);
    -ms-transform: perspective(2000px) rotateY(-200deg);
    -o-transform: perspective(2000px) rotateY(-200deg);
    transform: perspective(2000px) rotateY(-200deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(-180deg);
    -moz-transform: perspective(2000px) rotateY(-180deg);
    -ms-transform: perspective(2000px) rotateY(-180deg);
    -o-transform: perspective(2000px) rotateY(-180deg);
    transform: perspective(2000px) rotateY(-180deg);
  }
}

@-webkit-keyframes rotate-inverse-back {
  0% {
    -webkit-transform: perspective(2000px) rotateY(180deg);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(-20deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(0);
  }
}

@-moz-keyframes rotate-inverse-back {
  0% {
    -moz-transform: perspective(2000px) rotateY(180deg);
  }

  70% {
    /* this creates the bounce effect */
    -moz-transform: perspective(2000px) rotateY(-20deg);
  }

  100% {
    -moz-transform: perspective(2000px) rotateY(0);
  }
}

@keyframes rotate-inverse-back {
  0% {
    -webkit-transform: perspective(2000px) rotateY(180deg);
    -moz-transform: perspective(2000px) rotateY(180deg);
    -ms-transform: perspective(2000px) rotateY(180deg);
    -o-transform: perspective(2000px) rotateY(180deg);
    transform: perspective(2000px) rotateY(180deg);
  }

  70% {
    /* this creates the bounce effect */
    -webkit-transform: perspective(2000px) rotateY(-20deg);
    -moz-transform: perspective(2000px) rotateY(-20deg);
    -ms-transform: perspective(2000px) rotateY(-20deg);
    -o-transform: perspective(2000px) rotateY(-20deg);
    transform: perspective(2000px) rotateY(-20deg);
  }

  100% {
    -webkit-transform: perspective(2000px) rotateY(0);
    -moz-transform: perspective(2000px) rotateY(0);
    -ms-transform: perspective(2000px) rotateY(0);
    -o-transform: perspective(2000px) rotateY(0);
    transform: perspective(2000px) rotateY(0);
  }
}

/*** Bitcoin Calculator ***/

.bitcoin-calculator-section {

  height: 218px;
  position: relative;
  background-attachment: fixed;
  background-size: cover;
  margin: 70px 0;
}

.bitcoin-calculator-section:before {
  position: absolute;
  content: "";
  background: rgba(0,0,0,.7);
  top: 0;
  width: 100%;
  height: 100%;
  bottom: 0;
}

.bitcoin-calculator-section .container {
  background: #1d1d1d;
  width: 1140px;
  height: 358px;
  margin-top: -130px;
  position: absolute;
  left: 0;
  right: 0;
}

.bitcoin-calculator-section h2 {
  margin-bottom: 33px;
  color: #fff;
  padding-top: 70px;
  margin: 0;
}

.bitcoin-calculator-section h3 span {
  font-weight: 800;
}

.bitcoin-calculator-section p {
  display: block;
}

.bitcoin-calculator-section p.message {
  margin: 10px 0 39px;
  text-transform: uppercase;
  font-size: 14px;
}

.bitcoin-calculator-section p.info {
  font-size: 14px;
  color: rgba(244,255,255,.3);
  margin-top: 5px;
}

.bitcoin-calculator .form-input {
  min-width: 95px;
  border-right: 0;
  height: 45px;
}

.bitcoin-calculator .form-wrap {
  margin-left: 2px;
  vertical-align: top;
  margin-top: 3px;
}

.bitcoin-calculator .form-input,
.bitcoin-calculator .form-info {
  font-size: 19px;
  line-height: 1;
  text-align: center;
  font-weight: 600;
  color: #fff;
  width: 230px;
  outline: none;
  display: inline-block;
  padding: 0;
  margin: 0;
  background: #181818;
}

.bitcoin-calculator .form-input {
  border: 1px solid #2d2d2d;
}

.bitcoin-calculator .select-primary ~ .select2-selection__rendered {
  padding-left: 20px;
  padding-right: 35px;
}

.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option[aria-selected=true] {
  background-color: rgba(0,0,0,.2);
}

.bitcoin-calculator > * {
  margin-bottom: 7px;
  margin-left: 7px;
  margin-top: 0;
  display: inline-block;
}

.bitcoin-calculator .form-input.select-currency {
  border: 0;
  color: #fff;
  width: 105px;
  margin-left: -14px;
}

.bitcoin-calculator .form-info {
  margin-left: -6px;
  width: 62px;
  height: 45px;
  vertical-align: top;
}

.bitcoin-calculator .form-info i {
  color: #fff;
  line-height: 43px;
}

.bitcoin-calculator .form-equal {
  padding: 0 20px;
  color: #fff;
  margin: 0 8px;
  font-size: 26px;
  font-weight: 300;
}

.bitcoin-calculator .select-primary ~ .select2-selection__rendered {
  padding-left: 20px;
  padding-right: 35px;
}

.bitcoin-calculator span.select2 {
  margin-left: -8px;
  width: 95px !important;
  margin-top: -3px;
}

.bitcoin-calculator .select-primary~.select2 .select2-selection__rendered {
  padding: 6px 23px 4px 13px;
}

.bitcoin-calculator .select-primary~.select2 .select2-selection__arrow {
  top: 49%;
}

/*** Team ***/

.team-members {
  margin-top: 30px;
  margin-bottom: 15px;
}

.team-member {
  position: relative;
  display: inline-block;
}

.team-member-caption {
  text-align: center;
  background: #1d1d1d;
  -webkit-transition: .1s all ease;
  transition: .1s all ease;
}

.team-member .team-member-caption h4 {
  line-height: 0;
  text-transform: uppercase;
  margin: 35px 0 16px;
  font-weight: 600;
  font-size: 18px;
  color: #fff;
}

.team-member-caption p {
  padding: 0 0 23px;
  font-style: italic;
  margin: 0;
  font-size: 15px;
}

.team-member-caption .list {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  opacity: 0;
  margin-top: -45px;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: .3s all ease;
  transition: .3s all ease;
  will-change: content;
}

.team-member-caption .list li {
  padding: 0;
}

.team-member-caption .list li a {
  color: #fff;
}

.team-member-caption .list li + li {
  margin-left: 5px;
}

.team-member-img-wrap img {
  max-width: 100%;
  height: auto;
  display: block;
  margin: 0 auto;
}

.team-member-caption a:hover {
  text-decoration: none;
}

.team-member:hover .team-member-img-wrap:before {
  opacity: 1;
}

.team-member:hover .team-member-caption h4,
.team-member:hover .team-member-caption p {
  color: #fff;
}

.team-member:hover .team-member-caption .list {
  opacity: 1;
}

.social-icons a {
  margin: 0 5px;
  font-size: 16px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(0,0,0,.5);
  line-height: 40px;
  display: inline-block;
}

.team ul.social li a:before {
  color: #fff;
  font-size: 16px;
}

.team .social-icons ul.social li a:hover:before {
  font-size: 16px;
}

/*** Services ***/

section.services {
  padding: 90px 0 60px;
}

.service-box  .service-box-content {
  padding-left: 68px;
}

.service-box h3 {
  color: #fff;
  margin: 0 0 20px;
  font-weight: 400;
  font-size: 21px;
}

.service-box img {
  height: 37px;
  float: left;
}

.service-box > div {
  padding: 40px;
  margin-bottom: 30px;
  background: #1d1d1d;
}

/*** Blog ***/

body.blog article {
  margin-bottom: 60px;
}

body.blog figure {
  margin: 0;
}

body.blog figure a img {
  width: 100%;
}

body.blog article h4 {
  color: #fff;
  text-transform: uppercase;
  font-weight: 900;
  font-size: 28px;
  margin: 0 0 20px;
  line-height: 40px;
}
body.blog.grid-no-sidebar article h4 {
	font-size: 23px;
    line-height: 31px;
}

body.blog p.excerpt, body.blog p.content-article {
  margin: 22px 0;
}

body.blog .btn.btn-readmore {
  width: 250px;
}

body.blog .meta {
  clear: both;
  padding: 10px 0;
  width: 100%;
  border-top: 1px solid #222;
  border-bottom: 1px solid #222;
  font-size: 14px;
  margin-top: 30px;
}

body.blog .banner-area .meta {
  border-top: 0;
  border-bottom: 0;
}

body.blog .meta span {
  margin-right: 15px;
  display: inline-block;
}

body.blog .meta span i {
  padding-right: 4px;
}

section.blog-page {
  padding: 85px 15px 60px;
}

/* Pagination */

body.blog .pagination li a:hover {
  background: #333;
}

body.blog .pagination li a {
  color: #999;
  background: transparent;
  border: 1px solid #333;
  border-radius: 0;
  padding: 7px 14px;
}

body.blog .pagination li.active a {
  color: #fff;
}

/* Comments */

.comments-heading {
  margin: 40px 0 25px;
  text-transform: uppercase;
  color: #fff;
}

.comments-list {
  list-style: none;
  margin: 0;
  padding: 20px 0;
}

.comments-list .comment {
  margin-bottom: 30px;
  background: #1d1d1d;
  padding: 25px;
  border-radius: 7px;
}

.comments-list img.comment-avatar {
  width: 82px;
  height: 82px;
  border-radius: 100%;
  margin-right: 25px;
}

.comments-list .comment-body {
  margin-left: 110px;
}

.comments-list .comment-author {
  font-size: 16px;
  color: #eee;
}

.comments-list .comment-content {
  font-size: 14px;
}

.comments-list .comment-date {
  font-size: 12px;
}

.comments-list .comment-content {
  margin: 15px 0;
}

.comments-list .comment-reply {
  text-transform: uppercase;
  font-weight: 600;
}

.comments-reply {
  list-style: none;
  margin: 0 0 0 96px;
}

/* Comments Form */

.comments-heading.add-comment {
  margin: 0 0 50px;
}

.comments-form {
  margin-bottom: 0;
}

.comments-form .title-normal {
  margin-top: 0;
  line-height: normal;
  margin-bottom: 25px;
}

.comments-form .form-group {
  margin-bottom: 30px;
}

.comments-form textarea {
  padding: 15px 20px;
  height: 150px;
}

/*** Sidebar ***/

.sidebar .widget-title {
  font-size: 18px;
  font-weight: 600;
  position: relative;
  margin-bottom: 25px;
  margin-top: 0;
  line-height: normal;
  text-transform: uppercase;
  color: #fff;
}

.widget {
  background: #1d1d1d;
  padding: 30px;
  margin-bottom: 30px;
}

/* Search Widget */

.widget.widget-search {
  padding: 8px 20px;
}

.widget-search input,
.widget-search input:focus {
  border: 0 !important;
  font-style: italic;
}

/* Recent Posts Widget */

.widget.recent-posts ul li {
  border-bottom: 1px solid #333;
  padding: 20px 0;
}

.widget.recent-posts ul li:first-child {
  padding-top: 0;
}

.widget.recent-posts ul li:last-child {
  border: 0;
  padding-bottom: 0;
  margin-bottom: 0;
}

.widget.recent-posts .posts-thumb {
}

.widget.recent-posts .posts-thumb img {
  margin-right: 15px;
  width: 90px;
  height: 70px;
}

.widget.recent-posts .post-info .entry-title {
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  margin: 0;
}

.widget.recent-posts .post-info .post-meta {
  margin-bottom: 0;
}

.widget.recent-posts .entry-title a {
  color: #eee;
  font-weight: 600;
}

.widget.recent-posts .post-date {
  font-weight: 400;
  color: #999;
  text-transform: capitalize;
  font-size: 12px;
}

/* Navigation Widget */

.sidebar ul.nav-tabs {
  border: 0;
}

.sidebar ul.nav-tabs li a {
  color: #999;
  border-radius: 0;
  padding: 0;
  padding-left: 0;
  font-weight: 600;
  display: inline-block;
  border-left: 0;
  margin: 0;
  font-size: 13px;
  font-family: 'Open Sans', sans-serif;
}

.sidebar ul.nav-tabs li {
  line-height: normal;
  font-weight: 600;
  border-bottom: 1px solid #333;
  padding: 15px 0;
  float: none;
  text-align: left;
}

.sidebar ul.nav-tabs li:first-child {
  padding-top: 0;
}

.sidebar ul.nav-tabs li:last-child {
  border-bottom: 0;
}

/* Tags Widget */

.widget-tags ul > li {
  display: inline-block;
  margin: 6px 6px 6px 0;
}

.widget-tags ul > li a {
  color: #999;
  font-family: 'Open Sans', sans-serif;
  border: 1px solid #999;
  display: block;
  font-size: 13px;
  padding: 5px 15px;
  font-weight: 600;
  transition: 0.1s;
}

.widget-tags ul > li a:hover {
  color: #fff;
  border: 1px solid #fff;
}

/*** Quote and Chart ***/

.image-block2 {
  background: #1d1d1d;
  padding: 0;
}

.bg-image-2:after {
  content: "";
  background: rgba(0,0,0,.6);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}

.img-block-quote {
  padding: 100px 50px;
}

/* Quote */

.image-block2 blockquote {
  border-left: 0;
  margin: 30px 0;
  position: relative;
  background: transparent;
  padding: 30px;
  z-index: 1;
}

.image-block2 blockquote p:before, .image-block2 blockquote p:after {
  display: block;
  font-size: 80px;
  position: absolute;
}

.image-block2 blockquote p:before {
  content: "\201C";
  left: 10px;
  top: 5px;
}

.image-block2 blockquote p:after {
  content: "\201D";
  right: 10px;
}

.image-block2 blockquote p {
  color: #fff;
  font-style: italic;
  font-size: 18px;
  line-height: 28px;
  font-weight: 300;
}

.image-block2 blockquote footer {
  color: #fff;
}

.image-block2 blockquote footer img {
  border-radius: 50%;
  width: 50px;
  border: 3px solid #fff;
  margin: 0 10px 0 0;
  background: #fff;
}

.image-block2 blockquote footer span {
  font-weight: 600;
  text-transform: uppercase;
}

.image-block2 blockquote footer:before {
  display: none;
}

/* Chart */

.btcwdgt-headlines.btcwdgt-clean {
  margin: 0 auto !important;
  border: 1px solid #333 !important;
  box-shadow: none !important;
  max-width: 615px !important;
}

.dark-chart .btcwdgt-chart .btcwdgt-body {
  background: #222 !important;
}

.dark-chart .btcwdgt.btcwdgt-chart .btcwdgt-header p {
  background: #1d1d1d !important;
}

.dark-chart .btcwdgt.btcwdgt-chart .btcwdgt-header p.changes {
  background: #1d1d1d !important;
}

.btcwdgt.btcwdgt-chart .btcwdgt-footer {
  display: none !important;
}

.chart-widget {
  display: table;
  position: absolute;
  height: 100%;
  width: 100%;
  left: 0;
}

.chart-widget > div {
  display: table-cell;
  vertical-align: middle;
}

.bg-grey-chart, .bg-image-2 {
  height: 580px;
}

.bg-image-2 {
  background-image: url(../images/backgrounds/bg-quote.jpg);
  background-size: cover;
  background-position: center center;
  height: 580px;
}
/*** Contact Page ***/

/* Contact Form */

section.contact {
  padding: 90px 0 60px;
}

.contact-form {
  padding: 0;
}

.contact-form h3 {
  color: #fff;
  text-transform: uppercase;
  margin-top: 0;
}

.contact-form p, .contact-form .form-group {
  margin-bottom: 30px;
}

.contact-form textarea {
  height: 162px;
  padding: 15px 20px;
}

.contact-form .btn-contact {
  width: 100%;
}

.contact-form .output_message_holder {
  display: none;
}

.contact-form .output_message {
  padding: 8px;
  margin-bottom: 30px;
  border-radius: 2px;
  color: #fff;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 16px;
}

.contact-form .output_message.success {
  background: #28a745;
  padding: 15px;
}

.contact-form .output_message.success:before {
  font-family: FontAwesome;
  content: "\f14a";
  padding-right: 10px;
}

.contact-form .output_message.error {
  background: #dc3545;
  padding: 15px;
}

.contact-form .output_message.error:before {
  font-family: FontAwesome;
  content: "\f071";
  padding-right: 10px;
}

.contact-form .d-block {
  display: block;
}

/* Contact Widget */

.contact-page-info .contact-info-box-content h4 {
  font-size: 17px;
  margin-top: 0;
  line-height: normal;
  color: #fff;
  text-transform: uppercase;
}

.contact-page-info .contact-info-box-content p {
  font-size: 14px;
}

.contact-page-info .contact-info-box i.big-icon {
  text-align: center;
  float: left;
  font-size: 30px;
  border-radius: 50%;
}

.contact-page-info .contact-info-box .contact-info-box-content {
  padding-left: 60px;
  margin-bottom: 25px;
}

.contact-page-info .social-contact ul {
  list-style-type: none;
  margin-top: 28px;
  padding: 0;
}

.contact-page-info .social-contact ul li {
  display: inline-block;
}

.contact-page-info .social-contact ul li a i {
  width: 35px;
  height: 35px;
  line-height: 36px;
  text-align: center;
  color: #fff;
  font-size: 14px;
  border-radius: 50%;
  margin: 0 10px 10px 0;
}

.contact-page-info .social-contact ul li.facebook a i {
  background: #3b5998;
}

.contact-page-info .social-contact ul li.twitter a i {
  background: #1da1f2;
}

.contact-page-info .social-contact ul li.google-plus a i {
  background: #dd4b39;
}

/*** Shopping Cart ***/

section.shop-cart {
  padding: 90px 0 60px;
}

.shop-cart .table-responsive .table.order {
  margin-bottom: 35px;
}

.shop-cart table.order thead tr {
  background: #222;
  color: #fff;
  text-transform: uppercase;
}

.shop-cart .table thead > tr > th {
  padding: 20px 0;
  font-size: 15px;
}

.shop-cart .table-responsive .table.order tr td {
  vertical-align: middle;
  padding-top: 29px;
  padding-bottom: 29px;
  padding-left: 0;
}

.shop-cart .table h6 {
  font-size: 18px;
  color: #fff;
}

.shop-cart .table .icon-delete-product {
  color: #fff;
}

.shop-cart .table td span.price {
  font-weight: 700;
}

.shop-cart .form-control {
  max-width: 168px;
  display: inline-block;
  text-align: center;
}

.shop-cart .btn.btn-coupon, .shop-cart .btn.btn-update-cart {
  background: transparent;
  color: #999;
  border: 1px solid #999;
}

.shop-cart .btn.btn-primary.btn-coupon:hover,
.shop-cart .btn.btn-primary.btn-coupon:focus,
.shop-cart .btn.btn-primary.btn-coupon:active,
.shop-cart .btn.btn-update-cart:hover,
.shop-cart .btn.btn-update-cart:focus,
.shop-cart .btn.btn-update-cart:active {
  background: transparent !important;
}

.shop-cart .form-control, .shop-cart button {
  font-size: 14px;
  float: left;
  margin-right: 15px;
}

.shop-cart .form-control {
  padding: 0px 0px 3px 0;
}

.shop-cart h4.title-totals {
  color: #fff;
  text-transform: uppercase;
  margin: 70px 0 20px;
}

.shop-cart .table.cart-total {
  margin-top: 20px;
}

.shop-cart .table.cart-total .section-border {
  border-bottom: 1px solid #222;
}

.shop-cart .table.cart-total th {
  font-weight: 400;
  text-transform: capitalize;
  border: none;
}

.shop-cart .table.cart-total th.total .price {
  font-weight: 800;
  font-size: 20px;
}

.shop-cart .table, .shop-checkout .table {
  border: 0;
}

.shop-cart .table thead > tr > th,
.shop-checkout .table thead > tr > th {
  border-bottom: none;
}

.shop-cart .table thead > tr > th,
.shop-checkout .table thead > tr > th,
.shop-cart .table tbody > tr > th,
.shop-cart .table tfoot > tr > th,
.shop-cart .table thead > tr > td,
.shop-cart .table tbody > tr > td,
.shop-cart .table tfoot > tr > td,
.shop-checkout .table tbody > tr > th,
.shop-checkout .table tfoot > tr > th,
.shop-checkout .table thead > tr > td,
.shop-checkout .table tbody > tr > td,
.shop-checkout .table tfoot > tr > td {
  border: 0;
}

.shop-cart .table tbody > tr,
.shop-checkout  .table tbody > tr {
  border-bottom: 1px solid #222;
}

.shop-cart .quantity {
  text-align: center;
  font-size: 12px;
  background: #222;
  padding-top: 11px;
  padding-bottom: 11px;
  width: 82px;
  height: auto;
  display: inline-block;
}

.shop-cart .qty {
  text-align: center;
  width: 26px;
}

.shop-cart .qty, .shop-cart input.qtyplus, .shop-cart input.qtyminus {
  background: #222;
  border: 0;
  outline: none;
}

.shop-cart input.qtyplus, .shop-cart input.qtyminus {
  font-size: 15px;
}

/* Checkout Page */
section.shop-checkout {
  padding: 90px 0 60px;
}

.shop-checkout h3 {
  color: #fff;
  text-transform: uppercase;
  margin-bottom: 25px;
}

.shop-checkout .form-group {
  margin-bottom: 30px;
}

.shop-checkout textarea {
  height: 150px;
  padding: 15px 20px;
}

.shop-checkout select {
  color: #666;
  outline: none;
}

.shop-checkout select:focus {
  outline: none;
  box-shadow: none;
  border: 0;
}

.shop-checkout .checkout table.products thead tr {
  background: #222;
}

.shop-checkout .checkout table.products th.with-bg {
  background: #222;
}

.shop-checkout .checkout table.products td.text-price {
  color: #fff;
}

.shop-checkout .checkout table.products td.text-price.big-price {
  font-size: 20px;
  font-weight: 800;
}

.products > thead > tr > th,
.products > thead > tr > td,
.products > tbody > tr > th,
.products > tbody > tr > td,
.products > tfoot > tr > th,
.products > tfoot > tr > td {
  padding-top: 20px;
  padding-bottom: 20px;
  padding-left: 15px;
  padding-right: 15px;
  line-height: 1.66667;
  vertical-align: middle;
  border-top: 1px solid;
}

.shop-checkout .checkout .payment .cheque,
.shop-checkout .checkout .payment .paypal {
  background: #222;
  padding: 30px;
  margin-bottom: 30px;
}

.shop-checkout .checkout .payment .cheque {
  margin-bottom: 1px;
}

.shop-checkout .checkout .payment .radio {
  display: inline-block;
  margin-right: 15px;
}

.shop-checkout .checkout .payment .payment-cards {
  margin-top: 10px;
  padding-bottom: 15px;
}

.shop-checkout .checkout .payment .payment-cards img {
  margin: 0 5px 5px 0;
}

.tooltip.top .tooltip-inner {
  padding: 20px;
  width: 290px;
  min-width: 290px;
  line-height: 19px;
  text-align: left;
}

.checkbox input[type=checkbox], .shop-checkout .checkout .payment input[type=radio] {
  margin-top: 8px;
}

/*** Latest Posts ***/

.latest-posts-content {
  margin-top: 30px;
}

.latest-post .post-title {
  font-size: 18px;
  position: relative;
  margin-top: 20px;
  margin-bottom: 10px;
}

.latest-post .post-title a {
  color: #fff;
  transition: .1s;
}

.latest-post a.btn {
  margin: 15px 0;
}

.latest-post a img {
  opacity: .9;
  transition: .1s;
}

.latest-post a:hover img {
  opacity: 1;
}

.latest-post .post-date {
  width: 50px;
  height: 57px;
  background: #1d1d1d;
  position: absolute;
  top: 0;
  text-align: center;
  padding-top: 1px;
}

.latest-post .post-date span {
  display: block;
  color: #fff;
}

.latest-post .post-date span:first-child {
  font-weight: 600;
  font-size: 16px;
}

.latest-post .post-date span:nth-child(2) {
  font-size: 12px;
}

/*** Call To Action ***/

.call-action-all {
  padding: 0;
  position: relative;
  background: url('../images/backgrounds/call-to-action-bg.jpg');
  background-size: cover;
  background-position: center center;
}

.call-action-all:after,.call-action-all:before {
  content: '';
  position: absolute;
  bottom: 0;
  width: 50%;
  z-index: 100;
  border-bottom: 30px solid #0c0c0c;
  -moz-transform: rotate(0.000001deg);
  -webkit-transform: rotate(0.000001deg);
  -o-transform: rotate(0.000001deg);
  -ms-transform: rotate(0.000001deg);
  transform: rotate(0.000001deg);
}

.call-action-all:before {
  right: 50%;
  border-right: 125px solid transparent;
}

.call-action-all:after {
  left: 50%;
  border-left: 125px solid transparent;
}

.call-action-all .call-action-all-overlay {
  background-color: rgba(0, 0, 0, 0.7);
  padding: 60px 0 95px;
}

.action-text {
  text-align: center;
}

.action-text h2 {
  margin: 15px 0 23px;
  font-size: 30px;
  color: #fff;
  font-weight: 800;
  text-transform: uppercase;
}

.action-text p {
  font-size: 21px;
  color: #ddd;
}

.call-action-all .action-btn .btn-primary {
  font-size: 16px;
  padding: 13px 25px;
  max-width: 240px;
  margin: 0 auto;
  display: block;
  margin-top: 40px;
  background: transparent;
}

.call-action-all .action-btn .btn-primary:hover, .call-action-all .action-btn .btn-primary:active, .call-action-all .action-btn .btn-primary:focus {
  color: #fff;
}

/*** Facts ***/

.facts {
  height: 342px;
  position: relative;
  margin: 75px 0;
}

.facts .container {
  background: #222;
  width: 1140px;
  height: 490px;
  margin-top: -135px;
  position: absolute;
  left: 0;
  right: 0;
}

.facts .facts-content .heading-facts h5 {
  text-transform: uppercase;
  color: #777;
  font-weight: 800;
}

.facts .facts-content .heading-facts h2 {
  text-transform: uppercase;
  color: #fff;
  font-weight: 800;
  font-size: 45px;
  line-height: 45px;
  margin-top: 70px;
}

.facts .facts-content .heading-facts p {
  margin-bottom: 70px;
  font-size: 14px;
  text-transform: uppercase;
}

.facts h3 {
  margin-top: 0;
  font-size: 40px;
  color: #fff;
  font-weight: 700;
  margin-bottom: 5px;
}

.facts h4 {
  margin-bottom: 0;
  font-weight: 700;
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
}

.facts .facts-content .fact:after {
  content: '';
  position: absolute;
  font-weight: 100;
  top: 0;
  right: -6%;
  height: 73px;
  -webkit-transform: translateX(-50%) skew(-21deg);
  transform: translateX(-50%) skew(-21deg);
  width: 1px;
  background: #444;
}

.facts .btn-primary.btn-pricing {
  background: transparent;
  padding: 11px 29px;
}

.facts .btn-primary.btn-pricing:hover,.facts .btn-primary.btn-pricing:active,.facts .btn-primary.btn-pricing:focus {
  color: #fff;
}

.facts span.or {
  font-style: italic;
  padding: 0 18px;
  font-size: 18px;
  color: #999;
}

.facts .buttons {
  margin-top: 80px;
}

/*** Sign in & Sign Up ***/

.auth-page {
	background: #111;
}
.user-auth {
  padding: 0;
}

.user-auth .logo {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1;
  margin-left: 30px;
  margin-top: 30px;
}

.user-auth .logo img {
  width: 110px;
}

.user-auth > div {
  padding: 0;
}

.user-auth > div:nth-child(2) {
  height: 100vh;
  background: #111;
}

.user-auth > div:nth-child(2) .copyright-text {
  font-size: 12px;
  position: absolute;
  bottom: 0;
  width: 100%;
  margin-bottom:3px;
  opacity: .8;
}

.user-auth > div:nth-child(2) .form-container {
  display: table;
  position: absolute;
  height: 100vh;
  width: 100%;
  left: 0;
}

.user-auth > div:nth-child(2) .form-container > div {
  display: table-cell;
  vertical-align: middle;
}

.user-auth > div:nth-child(2) .form-container form {
  max-width: 450px;
  margin: 0 auto;
}

.user-auth > div:nth-child(2) .form-container form .form-group {
  margin: 0 auto;
  margin-bottom: 30px;
}

.user-auth > div:nth-child(2) .form-container button {
  width: 100%;
  margin-bottom: 7px;
}

.user-auth > div:nth-child(2) .form-container p {
  text-transform: uppercase;
}

.user-auth > div:nth-child(2) .form-container p.info-form {
  margin-bottom: 30px;
  font-size: 14px;
}

.user-auth > div:nth-child(2) .form-container .form-group p {
  font-size: 12px;
}

.user-auth > div:nth-child(2) .form-container .form-group a:hover {
  opacity: .9;
}

/*** Warning Carousel ***/

#carousel-testimonials .item {
  height: 100vh;
  color: #fff;
  -webkit-background-size: cover;
  background-position: center center;
  background-size: cover;
  -webkit-backface-visibility: hidden;
  background-attachment: initial;
}

#carousel-testimonials .carousel-control {
  display: none;
}

#carousel-testimonials .item > div {
  position: absolute;
  bottom: 0;
}

#carousel-testimonials .item > div:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: -1;
  height: 480px;
  background-image: -webkit-linear-gradient(91deg,#141516 7%,rgba(43,51,65,0) 100%);
  background-image: linear-gradient(-1deg,#141516 7%,rgba(43,51,65,0) 100%);
}

#carousel-testimonials blockquote {
  border-left: 0;
  padding: 10px 30px;
}

#carousel-testimonials blockquote p {
  position: relative;
  margin-bottom: 40px;
  font-size: 17px;
  font-style: italic;
  color: #FFF;
  line-height: 31px;
  opacity: .8;
}

#carousel-testimonials blockquote footer {
  font-size: 12px;
  text-transform: uppercase;
}

#carousel-testimonials blockquote footer span {
  color: #eee;
}

#carousel-testimonials .carousel-indicators {
  text-align: right;
  width: 100%;
  left: 0;
  margin-left: 0;
  padding-right: 30px;
  margin-bottom: 5px;
}

#carousel-testimonials .carousel-indicators li {
  display: inline-block;
  background-color: rgba(255,255,255,.5);
  border: 0;
  margin-right: 13px;
}

#carousel-testimonials .carousel-indicators li:last-child {
  margin-right: 0;
}

#carousel-testimonials .carousel-indicators li:hover {
  background-color: rgba(255,255,255,.8);
}

/*** Error Page ***/
body.error-page .error {
  height: 100vh;
  background-image: url('../images/backgrounds/404.jpg');
  background-size: cover;
  background-position: center center;
  padding: 0;
}

body.error-page.server-error-page .error {
  background-image: url('../images/backgrounds/503.jpg');
}

body.error-page .error .logo {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}

body.error-page .logo img {
  margin: 0 auto;
  padding-top: 30px;
}

body.error-page .error > div {
  display: table;
  position: absolute;
  height: 100vh;
  width: 100%;
  left: 0;
  background: rgba(17,17,17,.9);
}

body.error-page .error > div > div {
  display: table-cell;
  vertical-align: middle;
}

body.error-page .error h3 {
  font-size: 36px;
  line-height: 36px;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 1px;
}

body.error-page .error .big-404 {
  font-size: 220px;
  line-height: 220px;
  color: #999;
  font-weight: 300;
  margin-top: 70px;
}

body.error-page .error p {
  color: #999;
  font-size: 15px;
  padding: 20px 0;
  text-transform: uppercase;
  margin: 0 auto;
  max-width: 530px;
}

body.error-page .error a.btn {
  margin-bottom: 25px;
}

body.error-page .error a.refresh {
  text-transform: uppercase;
  padding-bottom: 40px;
  font-weight: 600;
}

body.error-page .error a.refresh:hover {
  opacity: .9;
}

/*** Coming Soon Page ***/

body.error-page.coming-soon .error {
  background-image: url('../images/backgrounds/coming-soon.jpg');
}

body.error-page.coming-soon .coming-soon-title {
	margin-top:70px;
}
.countdown {
  margin: 10px 0 40px;
}

.countdown-section {
  display: inline-block;
  font-size: 17px;
  line-height: 1;
  text-align: center;
  color: #888;
  text-transform: capitalize;
  padding: 0 20px;
}

.countdown-amount {
  display: block;
  font-size: 45px;
  margin-bottom: 5px;
}

/*** FAQ Panels ***/
section.faq {
  padding: 90px 0 60px;
}

.panel-group {
  margin-bottom: 80px;
}

.panel-default>.panel-heading {
  background: none;
  border-radius: 0;
  position: relative;
  padding: 15px;
}

.panel-group .panel {
  border-radius: 0;
  margin-bottom: -6px;
}

.panel.panel-default {
  background: transparent;
  border-color: #222;
  box-shadow: none;
}

.panel-default>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #222;
}

h4.panel-title {
  font-size: 17px;
  background: none;
  border: 0;
  padding: 8px 0 8px 30px;
  line-height: normal;
  border-radius: 0;
  text-transform: uppercase;
}

h4.panel-title a.collapsed {
  color: #fff;
}

h4.panel-title span {
  float: right;
}

h4.panel-title a:before,
h4.panel-title a.collapsed:before {
  font-family: "FontAwesome";
  position: absolute;
  z-index: 0;
  font-size: 12px;
  left: 15px;
  padding: 0 5px;
  text-align: center;
  top: 50%;
  margin-top: -7px;
}

h4.panel-title a:before {
  content: "\f106";
}

h4.panel-title a.collapsed:before {
  content: "\f107";
}

.panel-body ul {
  padding-left: 25px;
}

/* [ FOOTER ] */
/*================================================== */

.footer {
  background: #0c0c0c;
}

.footer .top-footer {
  padding: 45px 0 50px;
}

.footer .top-footer h4 {
  text-transform: uppercase;
  margin-top: 0;
  font-size: 16px;
  margin-bottom: 15px;
}

/*** Menu ***/

.footer .top-footer ul {
  padding: 0;
}

.footer .top-footer .menu ul {
  list-style-type: none;
}

.footer .top-footer .menu ul li {
  margin-bottom: 5px;
}

.footer .top-footer .menu ul li a {
  text-transform: uppercase;
  color: #999;
  font-size: 13px;
  font-weight: 600;
  font-family: 'Open Sans', sans-serif;
  transition: .1s;
}

.footer .top-footer .menu ul li a:hover {
  color: #fff;
}

.top-footer .contacts > div {
  padding-bottom: 12px;
  font-size: 13px;
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  text-transform: uppercase;
}

/*** Social Icons ***/

.footer .top-footer .social-footer {
  margin: 0 0 12px;
}

.footer .top-footer .social-footer ul {
  list-style-type: none;
}

.footer .top-footer .social-footer ul li {
  display: inline-block;
  margin: 0 3px;
}

.footer .top-footer .social-footer ul li:first-child {
  margin-left: 0;
}

.footer .top-footer .social-footer ul li a {
  display: block;
  color: #ccc;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  font-size: 13px;
  line-height: 28px;
  text-align: center;
  background: #1d1d1d;
  transition: .1s;
}

.footer .top-footer .social-footer ul li a:hover {
  color: #fff;
}

.footer .social-footer ul li a:hover {
  color: #fff;
}

.social {
  list-style-type: none;
  margin: 0 auto;
  display: table;
  padding: 0;
  margin-top: 8px;
}

.social li a {
  color: #111;
  font-size: 16px;
}

.social li a i {
  padding: 0 2px;
}

.facts-footer > div {
  width: 49%;
  display: inline-block;
}

.facts-footer > div:first-child h5, .facts-footer > div:nth-child(2) h5 {
  margin-top: 0;
}

.facts-footer > div h5 {
  font-size: 23px;
  font-weight: 800;
  margin: 15px 0 0;
}

.facts-footer > div span {
  text-transform: uppercase;
  font-size: 12px;
  color: #999;
}

/*** Copyright Bar ***/

.footer .bottom-footer p {
  margin: 0;
  font-size: 13px;
  border-top: 1px solid #222;
  padding: 13px 0;
}

.footer .bottom-footer p a {
  color: #999;
}

.footer .bottom-footer p a:hover {
  color: #fff;
}

.footer hr {
  background-color: #1d1d1d;
  border: 0;
  height: 1px;
  margin: 25px 0 18px;
}

.footer .top-footer h4.payment-title {
  color: #999;
  font-size: 14px;
  font-family: 'Open Sans', sans-serif;
  margin-bottom: 5px;
}

.payment-logos img {
  width: 30px;
  margin-right: 5px;
}

.payment-logos img.last {
  margin-right: 0;
}

/* [ RESPONSIVE DESIGN STYLES ] */
/*================================================== */

/*** Only Wide Screens ***/

@media(min-width:1600px) {
  .img-block-left {
    padding-left: 285px;
  }
}

/*** Large Devices, Wide Screens ***/

@media (min-width : 1200px) {
  ul.navbar-nav > li.visible-md.visible-lg {
    display: inline-block !important;
  }
}

/*** Devices Width 767px and Up ***/

@media (min-width:767px) {
  ul.nav li.dropdown:hover ul.dropdown-menu {
    display: block;
  }
}

/*** Only Medium Devices, Desktops ***/

@media (max-width:1200px) and (min-width:992px) {
  ul.user li.sign-in {
    padding-right: 15px;
  }

  ul.user li.sign-in a {
    padding: 11px 13px;
  }

  ul.user li a {
    font-size: 12px;
  }

  ul.user li.sign-up a {
    padding: 12px 18px;
  }
}

/* Medium Devices, Desktops */

@media (max-width:1200px) {
  .bitcoin-calculator-section .container, .facts .container {
    width: 940px;
  }

  ul.navbar-nav > li.visible-md.visible-lg {
    display: inline-block !important;
  }

  ul.bitcoin-stats li {
    padding-right: 18px;
  }

  .latest-post .post-title {
    margin-bottom: 5px;
  }

  .site-search {
    top: 49px;
  }

  .slider-text {
    position: relative;
    z-index: 1;
  }

  .slider-img {
    top: -95px;
  }

  .img-block-left.ts-padding {
    padding: 40px;
  }
}

/* Small Devices, Tablets */

@media (max-width: 992px) {

  .bitcoin-calculator-section .container, .facts .container {
    width: 720px;
  }

  .facts {
    height: 445px;
  }

  .facts .container {
    height: 600px;
  }

  .facts .facts-content .fact.fact-clear:after {
    display: none;
  }

  body.blog article {
    padding: 0;
  }

  .facts-footer {
    margin-top: 15px;
  }

  .main-logo a img {
    margin: 0 auto;
  }

  ul.user {
    text-align: center;
    padding: 15px 0 22px;
  }

  .banner-area .banner-overlay {
    padding: 50px 0;
  }

  .features-row {
    padding-bottom: 10px;
  }

  .bg-image-1 {
    height: 225px;
  }

  .dropdown-menu li a {
    font-size: 12px;
  }

  .img-about-us {
    padding-bottom: 60px;
  }

  .pricing-list > li {
    margin-bottom: 30px;
  }

  .bg-image-2 {
    height: inherit;
    padding: 60px;
  }

  .call-action-all .action-btn {
    float: none;
    text-align: center;
  }

  .action-text {
    text-align: center;
    float: none;
  }

  .action-text h2 {
    font-size: 28px;
  }

  .action-text p {
    font-size: 18px;
  }

  .call-action-all .action-btn .btn-primary {
    font-size: 14px;
    padding: 12px 25px;
    min-height: 40px;
    float: none;
  }

  #main-slide .item {
    min-height: 450px;
  }

  #main-slide .slider-content {
    margin-top: -115px;
  }

  #main-slide .slider-content h3 {
    font-size: 40px;
    margin: 10px 0;
    line-height: 50px;
  }

  .slider.btn {
    padding: 10px 26px;
    margin-top: 10px;
  }

  #main-slide .carousel-indicators {
    bottom: 20px;
  }

  footer .about-text {
    margin-bottom: 25px;
  }

  .feature-box {
    clear: both;
    margin-bottom: 40px;
  }

  .call-to-action {
    background-position: 50% 50%;
  }

  .img-block-left {
    padding-left: 100px;
  }

  .img-block-quote {
    padding: 100px;
  }

  .latest-post {
    clear: both;
    margin-bottom: 50px;
  }

  section.blog {
    padding-bottom: 20px;
  }

  ul.pagination {
    margin: 20px 0;
  }

  .footer .top-footer {
    padding: 60px 0 25px;
  }
}

/*** Only Small Devices ***/

@media (max-width: 992px) and (min-width:768px) {

  .main-logo {
    float: none;
    padding-bottom: 0;
  }

  ul.navbar-nav > li > a {
    padding: 16px 14px;
  }

  ul.bitcoin-stats {
    padding-top: 22px;
  }

  .bitcoin-calculator .form-input {
    width: 215px;
  }

  .team-member .team-member-caption h4 {
    font-size: 15px;
    margin: 25px 0 16px;
  }

  .team-member-caption p {
    font-size: 13px;
    padding: 0 0 14px;
  }

  .social-icons a {
    width: 30px;
    height: 30px;
    line-height: 27px;
    margin-left: 5px;
    margin-right: 5px;
  }

  .team ul.social li a:before, .team ul.social li a:hover:before {
    font-size: 12px !important;
  }

  .img-block-quote {
    padding: 40px 100px 10px;
  }

  .facts .facts-content .fact:after {
	right: 1%;
  }

  .shop-checkout .table {
	  margin-bottom:30px;
  }
}

@media (max-width : 992px) and (min-width:570px) {
  .facts .facts-content .fact:first-child, .facts .facts-content .fact.fact-clear {
    margin-bottom: 50px;
  }
}
/* Small Devices Potrait */


@media (max-width : 767px) {

  ul.nav.nav-tabs li a, ul.nav.nav-tabs li.active a {
    padding: 0 20px;
  }

  ul.nav.nav-tabs li:first-child a {
    padding-left: 0;
  }

  .feature-title {
    margin-top: 20px;
  }

  .gap-20-mobile {
    clear: both;
    height: 20px;
  }

  .bitcoin-calculator .form-equal {
    display: block;
    padding: 20px 0;
    margin: 0 auto;
    font-size: 25px;
  }

  .bitcoin-calculator-section {
    height: 340px;
  }

  .facts .container {
    width: 510px;
  }

  .bitcoin-calculator-section .container {
    height: 480px;
    max-width: 510px;
  }

  .bitcoin-calculator .form-info {
    width: 95px;
  }

  .bitcoin-calculator .form-input {
    width: calc(100% - 125px);
  }

  .site-nav-inner {
    position: relative;
  }

  .site-nav-inner:before {
    border: 0;
  }

  .site-nav-inner:after {
    background: none;
  }

  .navbar-collapse ul.navbar-nav > li > a {
    color: #fff;
  }

  .navbar-collapse ul.navbar-nav > li.active > a,
	.navbar-collapse ul.navbar-nav > li:hover > a {
    color: #fff;
  }

  body.light .navbar-collapse ul.navbar-nav > li:hover > a {
    color: #333;
  }

  ul.navbar-nav > li {
    display: block;
  }

  ul.navbar-nav > li.search {
    display: none;
  }

  ul.navbar-nav > li > a {
    padding: 18px 0;
    font-size: 16px;
  }

  ul.navbar-nav > li:after {
    background: none;
  }

  ul.navbar-nav > li:hover > a:after,
	ul.navbar-nav > li.active > a:after {
    background: none;
  }

  .navbar-nav .open .dropdown-menu>li>a, body.light .navbar-nav .open .dropdown-menu>li>a {
    line-height: 30px;
    text-align: center;
    border-bottom: 0;
  }

  .logo-mobile {
    display: inline-block;
    float: left;
  }

  .logo-mobile img {
    height: 34px;
    margin-top: 8px;
  }

  .navbar-collapse {
    width: 100%;
    box-shadow: none;
  }

  ul.navbar-nav > li:not(.search):hover, ul.navbar-nav > li.active, ul.navbar-nav > li.dropdown.open {
    background: transparent;
  }

  #main-slide .item {
    min-height: 400px;
  }

  #main-slide .slider-content {
    margin-top: -165px;
  }

  #main-slide .slider-content h3 {
    font-size: 26px;
    margin: 30px 0;
    line-height: 36px;
  }

  .mobile-logo {
    margin: 0 auto;
    margin-top: 70px;
  }

  .user-auth > div:nth-child(2) {
    height: auto;
  }

  .user-auth > div:nth-child(2) .form-container {
    display: block;
    padding: 15px;
    position: relative;
    height: auto;
  }

  .user-auth > div:nth-child(2) .form-container > div {
    display: block;
  }

  .user-auth > div:nth-child(2) .form-container p.info-form {
    margin: 8px 15px 30px 15px;
  }

  .user-auth > div:nth-child(2) .form-container .form-group {
    margin-bottom: 15px;
  }

  .user-auth > div:nth-child(2) .form-container .form-group p {
    margin-bottom: 40px;
  }

  .slider-text {
    z-index: 1;
    position: relative;
  }

  .slider-text .slide-head:after {
    height: 3px;
    bottom: 0;
  }

  .slider.btn {
    padding: 12px 22px;
    margin-top: 0;
    font-size: 12px;
  }

  #main-slide .carousel-indicators {
    bottom: 20px;
  }

  .feature-box .feature-icon {
    float: none;
    margin-bottom: 30px;
  }

  .feature-box .feature-box-content {
    margin-left: 0;
    margin-bottom: 30px;
  }

  .features.text-center .feature-box {
    margin-bottom: 70px;
  }

  .action-btn .btn-primary {
    font-size: 20px;
    min-height: 54px;
    padding-right: 30px;
  }

  .action-btn .btn-primary i {
    height: 54px;
    line-height: 54px;
  }

  .call-to-action {
    background-position: 50% 50%;
  }

  .img-block-left {
    padding-left: 30px;
  }

  .img-block-quote {
    padding: 100px 30px;
  }

  .latest-post {
    clear: both;
    margin-bottom: 50px;
  }

  .team-member {
    margin-bottom: 30px;
  }

  .bg-image-2 {
    padding: 15px;
  }

  .widget {
		padding: 15px;
		margin-bottom: 15px;
	}

  blockquote {
    padding: 30px 0;
    max-width: 540px;
    margin-top: 70px;
  }

  .container {
    max-width: 540px;
  }

  .title-head-subtitle p {
    margin-left: 15px;
    margin-right: 15px;
  }

  .title-head-subtitle p:before,.title-head-subtitle p:after {
    display: none;
  }

  .site-navigation {
    padding: 6px 0;
    position: fixed;
    top: 0;
    background: #111;
    width: 100%;
    border-bottom: 1px solid #222;
    z-index: 1111;
  }

  ul.navbar-nav {
    padding: 30px 0 50px;
  }

  .site-navigation.fixed ul.navbar-nav {
    position: relative;
    margin-left: 0;
    margin-right: 0;
    border: 0;
  }

  body.light .site-navigation {
    background: #e7e7e7;
    border-bottom: 1px solid #ddd;
  }

  .header {
    margin-top: 63px;
  }

  section.blog {
    padding-bottom: 10px;
  }

  .footer .menu ul li {
    width: 49%;
    display: inline-block;
    position: relative;
  }

  .footer .bottom-footer p {
    text-align: center;
  }

  .footer .payment-logos {
    float: none;
    text-align: center;
  }

  .facts-footer {
    margin-top: 25px;
  }

  .payment-logos img {
    float: none;
  }

  body.error-page .error {
    height: auto;
  }

  body.error-page .error > div {
    display: block;
    position: relative;
    height: auto;
  }

  body.error-page .error > div > div {
    height: 100vh;
    margin: 0 auto;
    display: block;
    overflow-y: auto;
    max-width: 490px;
  }

  body.error-page .error .big-404 {
    font-size: 150px;
    line-height: 150px;
	margin-top: 0;
  }

  body.error-page .error .logo {
    position: relative;
  }

  body.error-page .logo img {
    padding-top: 70px;
    padding-bottom: 35px;
  }

  body.error-page .error p, body.error-page h3 {
    margin-left: 15px;
    margin-right: 15px;
  }

  body.blog article h4 {
    font-size: 20px;
    line-height: 25px;
  }

  .sidebar ul.nav.nav-tabs li a {
    padding-left: 0;
  }

  .banner-area .title-head.banner-post-title {
    font-size: 20px;
    line-height: 25px;
  }

  .comments-list .comment-body {
    margin-left: 0;
  }

  .comments-list .comment-content {
    margin: 70px 0 15px;
  }

  .comments-list .comment-date {
    float: left !important;
  }

  .comments-reply {
    margin: 0;
  }

  .comments-list .comment {
	  margin-bottom: 15px;
    padding: 15px;
  }

  .shop-cart .table-responsive {
    border: 0;
  }

  .shop-cart .table-responsive {
    border: 0;
  }

  .shop-cart .form-control {
    max-width: initial;
    width: 39%;
  }

  .shop-cart button {
    width: calc(61% - 15px);
    margin: 0;
  }

  .shop-cart .btn.btn-update-cart {
    width: 100%;
    margin-top: 15px;
  }

  .shop-cart .btn.btn-proceed {
    width: 100%;
  }

  .shop-cart .table-responsive .table.order colgroup {
    width: auto;
  }

  .shop-cart .table-responsive .table.order colgroup col {
    padding-left: 5px;
    padding-right: 5px;
  }

  .shop-cart .table-responsive .table.order tr td, .shop-cart .table-responsive .table.order tr th {
    padding-left: 5px;
    padding-right: 5px;
    white-space: normal;
  }

  .shop-cart .table-responsive .table.order tr td h6, .shop-cart .table-responsive .table.order tr th h6 {
    font-size: 12px;
  }

  .shop-cart .table-responsive .table.order tr td .price, .shop-cart .table-responsive .table.order tr th .price {
    font-size: 11px;
  }

  .shop-cart .table-responsive .table.order tr td .quantity, .shop-cart .table-responsive .table.order tr th .quantity {
    padding-top: 4px;
    padding-bottom: 4px;
  }

  .shop-cart .table-responsive .table.order tr th {
    font-size: 12px;
  }

  .shop-checkout .form-group ,.shop-checkout .checkout .payment .paypal,  .shop-checkout .table, .contact-form .form-group {
	  margin-bottom:15px;
  }

  body.light .dropdown-menu li.active a {
	  background:none;
  }

  .btn.btn-primary.btn-order {
    width: 100%;
  }

  .features-row {
    padding: 45px 0 0 0;
  }

  .feature-box {
    text-align: center;
  }

  .feature-box .feature-icon {
    margin-bottom: 0;
  }

  .feature-box .feature-box-content h3 {
    margin: 15px 0 10px;
  }

  .facts {
    height: 805px;
  }

  .facts .facts-content .fact:after {
    display: none;
  }

  .facts .container {
    width: 100%;
    height: 965px;
    position: relative;
    padding: 0 15px;
  }

  .facts h3 {
    font-size: 34px;
  }

  .facts .buttons .btn {
    width: 100%;
  }

  .facts .buttons .btn.btn-register {
    margin-top: 18px;
  }

  .facts .btn-primary.btn-pricing {
    margin-bottom: 15px;
  }

  .facts-content .heading-facts p {
    padding: 0 15px;
    margin-bottom: 50px;
  }

  .facts .fact {
    margin-bottom: 35px;
  }
  body.error-page.coming-soon .coming-soon-title {
	  margin-top:30px;
  }
}

@media (max-width : 767px) and (min-width:571px) {
  .btcwdgt-headlines.btcwdgt-clean {
    max-width: 510px !important;
  }

  blockquote {
    max-width: 510px;
    margin: 0 auto;
    margin-top: 80px;
    margin-bottom: 35px;
    right: 0;
    left: initial;
  }

  section.team {
    padding: 60px 0 40px;
  }

  .bitcoin-calculator-section h2 {
    font-size: 40px;
  }

  .bitcoin-calculator-section p.message {
    font-size: 14px;
  }
}

@media (max-width : 570px) {
  .bitcoin-calculator-section {
    height: inherit;
    padding-bottom: 0;
    margin-bottom: 0;
    background: none;
  }

  .bitcoin-calculator-section:before {
    display: none;
  }

  .bitcoin-calculator-section .container {
    width: 100%;
    height: inherit;
    position: relative;
    padding-bottom: 50px;
  }

  .facts {
    height: auto;
    background: #222;
    margin: 75px 0 0;
  }

  .facts .facts-content .fact:after {
    display: none;
  }

  .facts .container {
    width: 100%;
    height: auto;
    position: relative;
    padding: 0 15px;
  }

  .chart-widget {
    display: block;
    margin: 70px 0;
    left: 0 !important;
    position: relative;
  }

  .chart-widget > div {
    display: block;
  }

  .bg-grey-chart {
    height: inherit;
  }

  .pricing-list > li {
    margin-bottom: 15px;
  }

  ul.nav.nav-tabs {
    border: 1px solid #444;
    margin: 20px 0 15px;
  }

  .sidebar ul.nav.nav-tabs {
    border: 0;
  }

  body.light ul.nav.nav-tabs {
    border: 1px solid #ddd;
  }
  body.light .widget ul.nav.nav-tabs {
    border: 0;
  }

  .nav-tabs>li {
    float: none;
    text-align: center;
    border-bottom: 1px solid #444;
  }

  body.light .nav-tabs>li {
    border-bottom: 1px solid #ddd;
  }

  ul.nav.nav-tabs li a, ul.nav.nav-tabs li.active a {
    border-left: 0;
    padding: 12px 0;
    margin: 0;
  }

  .about-content ul.nav.nav-tabs li.active a:hover, .about-content  ul.nav.nav-tabs li.active a {
    color: #fff;
  }

  ul.user {
    padding: 15px 0;
  }

  ul.user li.sign-in, ul.user li.sign-up {
    width: 50%;
  }

  ul.user li.sign-in {
    padding-left: 0;
    padding-right: 7px;
    float: left;
  }

  ul.user li.sign-up {
    padding-right: 0;
    padding-left: 7px;
  }

  ul.user li.sign-in a, ul.user li.sign-up a {
    width: 100%;
  }

  .team-members > div {
    width: 100%;
  }

  .team-member {
    margin-bottom: 15px;
  }

  .pricing-list > li {
    float: none;
    width: 100%;
  }

  .back-to-top {
    bottom: 15px;
  }

  .show-back-to-top {
    right: 15px;
  }

  .bitcoin-calculator .form-input {
    width: calc(100% - 93px);
  }

  .call-action-all .action-btn .btn-primary {
    max-width: initial;
  }

  .service-box > div {
    padding: 40px 15px;
    margin-bottom: 15px;
  }

  .service-box img {
    float: none;
    margin: 0 auto;
    display: block;
  }

  .service-box .service-box-content {
    padding-left: 0;
    text-align: center;
  }

  .service-box h3 {
    margin: 15px 0 10px;
  }

  .pricing-footer {
    padding: 30px 0 15px;
  }

  .pricing-footer a {
    margin: 0 15px;
  }

  .sidebar ul.nav.nav-tabs li a {
    padding: 0;
  }

  .user-auth > div:nth-child(2) .form-container form .form-group {
    margin-bottom: 15px;
  }
}
/* Extra Small Devices, Phones */
@media (max-width : 480px) {

  ul.bitcoin-stats {
    display: none;
  }

  #main-slide .item {
    min-height: 320px;
  }

  .countdown-section {
    font-size: 16px;
    padding: 0 10px;
  }

  .countdown-amount {
    font-size: 28px;
  }
}
.aliicone{
  font-size: 50px;
  text-align: center;
  color: #FF8201;
}
.mt-60{
  margin-top: 60px;
}

.Open-account-btn{
  margin-right: 100px;
  width: 540px;
}
.ml-3{
  margin-left: 3px;
}

.carousel-control {
  font-size: 60px;
  color: #0ba026;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0,0,0,.6);
}
.fontali {
  font-size: 2rem;
  font-weight: 800;
}

.accounttali{
  font-size: 50px;
  text-align: center;
  color:  #0ba026 ;
}

.Silver{

  font-size: 50px;
  text-align: center;
  color:  #92969C
  ;
}

.bundled{
  font-size: 50px;
  text-align: center;
  color:  #FF8201 ;
}

.colorfontali{

  font-size: 2rem;
  font-weight: 800;
  color:#98FB98;
}

.colorfontali2{

  font-size: 2rem;
  font-weight: 800;
  color:#0ba026;

}

.mtop{
 padding:20px;
}

.pnormalali{
  padding: 5px;
}
.sizealiali{
  width:50%;text-align:left;margin-left:0;
}

.standardali{

  font-size: 50px;
  text-align: center;
  color:  #808080 ;
}

.plantinumali{

  font-size: 50px;
  text-align: center;
  color:  #b9f2ff ;
}

.diamond{
  font-size: 50px;
  text-align: center;
  color:  #b9f2ff ;
}

.font-ali3{
  color: white;
}

.img-ali1{

  height: 280px;
  margin-left: 10px;
  width: 290px;
}

.btn-ali-siz{

  width: 350px;
}

.apple-img{

  height: 280px;
  margin-left: 10px;
  padding-bottom: 30px;
  width: 290px;

}

.mar-ali-iphone{

  float: left;

}

.img-about-ali{
  margin-left: 60px;

}

.img-android-ali{

  width: 550px;
  height: 430px;
  margin-left: 60px;

}

.box-ali-sizgin{

  height: px;
}

.img-ali-windows{

  width: 700px;
  height: 430px;
  margin-left: 40px;

}

.color-doenload-ali{

  color: #0ba026;
}

.i-icon{

  color: #0ba026;
  font-size: 25px;
}

.img-higth-ali{
  height: 530px;

}

.img-Indices-ali{
  height: 445px;
}

.width-20{
  width: 30% !important;
}
.display{
  display: block;
}
.display-inline{
    display: inline-block !important;
}
.display-zero{
    display: none !important;
}
.uk-text-15{
    font-size: 15px
}
/*.svg-inline--fa.fa-w-18 {*/
/*    float: left;*/
/*}*/
.contact-page-info .contact-info-box .contact-info-box-content{
    margin-top: -25px;
}
.contact-page-info .social-contact ul li {
    display: inline-block;
    padding-right: 10px;
}
.contact-page-info{
    margin-top: 15px;
}
.text-info {
    color: #0ba026 !important;
}
@media only screen and (max-width: 600px) {
    .btn {
        margin-bottom: 10px;
    }
    .col-md-12,.col-md-6,.footer .top-footer .menu ul li,.Open-account-btn{
        width: 100%;
    }
    select{
        margin-bottom: 15px;
    }
}
