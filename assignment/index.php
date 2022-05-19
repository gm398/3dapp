<!doctype html>
<html lang="en">
  <!-- https://users.sussex.ac.uk/~gm398/3dapp/assignment/index.php -->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="application/css/bootstrap-4.4.1.css">

    <!-- X3dom -->
    <link rel='stylesheet' type='text/css' href='application/css/x3dom.css'>

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="application/css/all.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="application/css/custom.css">

      <script src="https://cdn.jsdelivr.net/npm/three@0.140.0/build/three.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/three@0.140.0/examples/js/controls/OrbitControls.min.js"></script>
      <script src="https://cdn.rawgit.com/mrdoob/three.js/master/examples/js/loaders/GLTFLoader.js"></script>

    <!-- Link in some fonts — Not used because we finally installed the fonts
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
    -->

    <!-- Use a light box to view images in the gallery -->
    <link rel="stylesheet" type="text/css" href="application/css/jquery.fancybox.min.css">

    <title>198830 Mobile First Web 3D Applications</title>

  </head>

  <body id="bodyColor">
    
    <!-- Logo and navigation bar -->
    <nav id="headerColor" class="navbar sticky-top navbar-expand-sm navbar_coca_cola">
      <div class="container-fluid">  
        <!-- Brand -->
        <div class="logo">
          <a class="navbar-brand" href="./">
          <h1>1</h1>
          <h1>oca</h1>
          <h2>Cola</h2>
          <h3>Journey</h3>
          <p>Refreshing the world, one story at a time</p>
          </a>
        </div>
                 
        <!-- Collapsible Navbar Menu Icon -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Link Menu item button to the links class navbar-collapse selector -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Links -->
            <ul class="navbar-nav ml-auto"> <!-- Use mx-auto to align centre, default to left or use mr-auto -->
              <!-- nothing changed from Lab 5 -->
              <li class="nav-item">
                <a class="nav-link" href="#" id="navHome" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Home" data-content="Home Page">Home</a>
              </li>
              <!-- Added navAbout ID, do we use this? -->
              <li class="nav-item">
                  <a id="navAbout" class="nav-link" href="#" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Deeper Understanding" data-content="Deeper Understanding">Deeper Understanding</a>
              </li>
          
              <!-- Replace Dropdown from lab 5 with single nav lnk to models -->
              <li class="nav-item">
                <a id="navModels" class="nav-link"  href="#" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Model Viewer" data-content="View the 3D models">Models</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#contactModal" id="navContact">Contact</a>
              </li>
            </ul>
        </div>
      </div>
    </nav>


    <!-- Start 3D App SPA Contents -->
    <div class="container-fluid main_contents"> <!-- Start SPA Contents -->
        <!-- Home page block element -->
        <div id="home">
          
        </div> <!-- End home page -->

        <!-- About page block element -->


        <!-- Start X3D models and 3D Image Gallery -->
        <div id="modelsPg">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" id="cokeModel">Coke Model</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="appletiserModel">Appletiser Model</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="fantaModel">Fanta Model</a>
                </li>

            </ul>

            <div id="models"></div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" id="spinX">Rotate X</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="spinY">Rotate Y</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="spinZ">Rotate Z</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="stopAnimations">Stop Animations</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="camFront">Camera Front</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="camTop">Camera Top</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="camSide">Camera Side</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="wireframe">Toggle Wireframe</a>
                </li>

            </ul>

        </div> <!-- End X3D Models and Gallery -->
    
       



    </div>  <!-- End 3D App SPA Contents --> 

    <!-- Your 3D App footer -->
    <nav id="footerColor" class="navbar navbar-expand-sm footer">
        <div class="container-fluid">   
            <div class="navbar-text float-left copyright">
                <p><span class="align-baseline">198830 Web 3D Applications | <a href="javascript:changeLook()">Restyle</a> | <a href="javascript:changeBack()">Reset</a></span></p>
            </div>
        </div>
    </nav> 

    <!-- My 3D App modals -->
    <!-- Contact modal -->
    <!-- The Modal -->
    <div class="modal fade" id="contactModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">198830 contact details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <p>Github link <a href = "https://github.com/gm398/3dapp">GitHub Link</a></p>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
            
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="application/js/jquery-3.4.1.js"></script>
    <script src="application/js/popper.min.js"></script>
    <!--<script src="js/bootstrap.js"></script>-->
    <script src="application/js/bootstrap-4.4.1.js"></script>

    <!-- Include the x3dom JavaScript -->
    <script src='application/js/x3dom.js'></script>

    <!-- Font Awesome Version 5 -->
    <!-- <script src="https://kit.fontawesome.com/6ac3910c4e.js" crossorigin="anonymous"></script> -->
    <!-- <script src="all.js"></script> -->

    <!-- Custom JavaScript code for your 3d App -->
    <!-- Also, intialises popovers-->
    <script type="module" src="application/js/custom.js" crossorigin="anonymous"></script>

    <!-- JavaScript to swap for SPA and restyle-->
    <script src="application/js/swap_restyle.js"></script>

    <!-- JavaScript and PHP based Gallery generator
    <script src="application/js/gallery_generator.js"></script>
    -->


    <!-- JavaScript model interactions -->
    <script src="application/js/modelInteractions.js"></script>

    <!--fancyBox3 => http://fancyapps.com/fancybox/3/ -->
    <script src="application/js/jquery.fancybox.min.js"></script>



  </body>
</html>

