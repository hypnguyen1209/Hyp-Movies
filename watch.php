<?php
    $ID = $_GET['id'];
    $URLChecker = 'player.php?id='.$ID;
    $ArrayReponse = json_decode(file_get_contents('http://localhost/player.php?id='.$ID));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $ArrayReponse->title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body onload="get_video()">
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Hyp Movies
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="index.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="">
                            <i class="nc-icon nc-button-play"></i>
                            <p><?php echo $ArrayReponse->nameeng; ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> <?php echo $ArrayReponse->title; ?> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Cùng xem phim nào =))</h4>
                                    <p class="card-category">Let's go!!
                                        <a href="https://www.messenger.com/t/hypnguyen1209">Ahihi</a>
                                    </p>
                                </div>
                                <div class="card-body all-icons">
                                    <div class="row" id="result">
                                            <div style="margin-left: 139px;text-align: center;" class="col-md-9 col-centered">
                                            <div id="video"></div>
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <div class="row" >
                        
                    </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">HypNguyen</a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    <?php echo $ArrayReponse->textsub; ?>
    <script>
        if (document.getElementsByTagName("track")[0]) {
        var eng = document.getElementsByTagName("track")[0].getAttribute("src");
        }
        if (document.getElementsByTagName("track")[1]) {
            var vie =  document.getElementsByTagName("track")[1].getAttribute("src");    
        }
        
   var set = {
    'name': 'Hypnguyen',
    'link': 'https://www.facebook.com/hypnguyen1209'
};
function get_video(){$.get('<?php echo $URLChecker; ?>',function(l){loadVid(l)},"json")}function loadVid(l){var e=jwplayer("video").setup({sources:[{type:"video/mp4",label:"HD",file:l.file}],tracks:[{file:eng,label:"English",kind:"captions",default:!0},{file:vie,label:"Vietnamese",kind:"captions"}],image:l.poster,flashplayer:"https://ssl.p.jwpcdn.com/player/v/8.1.1/jwplayer.flash.swf",logo:{file:l.logo,logoBar:l.logo,link:set.link},title:"Hyp Movies",abouttext:set.name,aboutlink:set.link,controls:!0,autostart:!1,allowfullscreen:!0,fullscreen:!1,preload:!0,primary:"html5",width:"100%",height:"100%",aspectratio:"16:9",displaytitle:!0,playbackRateControls:[.5,.75,1,1.25,1.5,2],sharing:{link:'<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>'}});e.addButton("//icons.jwplayer.com/icons/white/download.svg","Download Video",function(){window.location.href=e.getPlaylistItem().file},"download")}    </script>
</body>
<!--   Core JS Files   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script> 

<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script> -->

<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="https://content.jwplatform.com/libraries/rI5FHjdp.js"></script>


</html>
