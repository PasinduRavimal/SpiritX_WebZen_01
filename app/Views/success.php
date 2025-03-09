
<html>
<head>
<title></title>
<link rel="icon" type="image/x-icon" href="favicon.png">

<link rel="stylesheet" href="css/landing.css">
<script src="https://kit.fontawesome.com/a65b5ae8d1.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="social-outer">
        <div class="social-inner-wrap">
            <div class="social-logo"><i class="fa-brands fa-youtube"></i></div>
            <div class="slide-context">YouTube</div>
        </div>
        <div class="social-inner-wrap">
            <div class="social-logo"><i class="fa-brands fa-facebook"></i></div>
            <div class="slide-context">Facebook</div>
        </div>
        <div class="social-inner-wrap">
            <div class="social-logo"><i class="fa-brands fa-instagram"></i></div>
            <div class="slide-context">Instagram</div>
        </div>
        <div class="social-inner-wrap">
            <div class="social-logo"><i class="fa-brands fa-twitter"></i></div>
            <div class="slide-context">Twitter</div>
        </div>
    </div>
    
    <div class="main-slider-outer" >
        <div class="background-image"></div>
        <div class="nav-outer">
            <div class="logo-outer">
                <a href="home.php"><img class="main-slider-logo" src="images/Logo.webp" alt="logo img"></a>
            </div>
            <div class="nav-bar-context">
                <ul class="nav">
                    <li><span><a href="home">Home</a></span></li>
                    <li><span><a href="ContactUs">Contact Us</a></span></li>
                    <li><span><a href="AboutUs">About Us</a></span></li>
                </ul>
                <div class="user-dropdown">
                    <button class="user-button"><i class="fa-solid fa-user"><p><?php echo $username; ?></p></i></button>
                    <div class="dropdown-content">
                        <a href="logout">Logout</a>
                    </div>
                </div>            
            </div>
            <div class="nav-bar-outer"></div>
        </div>
        
    
        <div class="middle-text-outer">
            <h1 class="text1">Your Security is,</h1>
            <h2 class="text2">Our priority</h2>
        </div>

        <div class="middle-anime">
            <img class="middle-anime" src="images/Logo.webp"/>
        </div>

    </div>

    
        <div class="footer-bottom">
            <p>&copy; 2025 Webzen Solutions</p>
        </div>
    </footer>

</body>
</html>