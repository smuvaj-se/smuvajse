<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>@yield('title')</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/croppie/croppie.css" />

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>

    <!-- Header
    ================================================= -->
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index-register.html"><img src="images/logo.png" alt="logo" /></a>
          </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown"><a href="/home">Početna</a></li>
              <li class="dropdown"><a href="/about">Moj Profil</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-alert red"> </i> Poruke <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                    <li><a href="">Osoba 1</a></li>
                    <li><a href="">Osoba 2</a></li>
                    <li><a href="">Osoba 3</a></li>
                    <li><a href="">Osoba 4</a></li>
                    <li><a href="">Osoba 5</a></li>
                    <li><a href="">Osoba 6</a></li>
                  </ul>
              </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-alert red"> </i> Notifikacije <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                    <li><a href="">Notifikacija 1</a></li>
                    <li><a href="">Notifikacija 2</a></li>
                    <li><a href="">Notifikacija 3</a></li>
                    <li><a href="">Notifikacija 4</a></li>
                    <li><a href="">Notifikacija 5</a></li>
                    <li><a href="">Notifikacija 6</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                  <a href="/logout">Izloguj me</a>
              </li>
              </li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Pronadji osobu...">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                <a href="" data-toggle="modal" data-target="#avatar_modal">
                  <img src="{{ $avatar }}" alt="" class="img-responsive profile-photo" />
                </a>
                  
                  <h3>{{$user->name." ".$user->surname}}</h3>
                  <p class="text-muted">Creative Director</p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="/about" class="active">O Meni</a></li>
                  <li><a href="/album">Album</a></li>
                  <li><a href="/profile-friends">Prijatelji</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li>1,299 prijatelja</li>
                  <li><button class="btn-primary">Pošalji zahtev</button></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="{{ $avatar }}" alt="" class="img-responsive profile-photo" />
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="/about" class="active">O Meni</a></li>
                <li><a href="/album">Album</a></li>
                <li><a href="/profile-friends">Prijatelji</a></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

            @yield('content')
            </div>
            <div class="col-md-2 static">
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="copyright">
        <p>Sasa Dule i Djora © 2016. All rights reserved</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Avatar Modal -->
    <div class="modal fade" id="avatar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Promenite Proflnu sliku</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                <div class="col-md-12 text-center">
                <div id="upload-demo" style="width:350px; margin: 0 auto;"></div>
                </div>
                <div class="col-md-12" style="padding-top:30px;">
                <strong class="pull-left">Izaberi sliku:</strong>
                <br>
                <input type="file" id="upload" class="pull-left">

                <button class="btn btn-primary upload-result pull-right" data-dismiss="modal">Postavi sliku</button>
                </div>
                <div class="col-md-12" style="">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>




    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
    <script src="assets/croppie/croppie.js"></script>
    <script type="text/javascript">
    // AVATAR UPLOAD
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload').on('change', function () { 
      var reader = new FileReader();
        reader.onload = function (e) {
          $uploadCrop.croppie('bind', {
            url: e.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-result').on('click', function (ev) {
      $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (resp) {
        $.ajax({
          url: "/update_avatar",
          type: "POST",
          data: {"_token": "{{ csrf_token() }}", "image":resp},
          success: function (data) {
            console.log(data);
            $(".profile-photo").attr("src", "{{$avatar}}?timestamp=" + new Date().getTime());
          },
          error: function(data) {
            console.log(data.responseText);
            $('#avatars_modal').modal('hide');
          }
        });
      });
    });
    </script>
  </body>
</html>
