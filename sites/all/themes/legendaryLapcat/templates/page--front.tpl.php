    <!--<link href="css/bootstrap-responsive.css" rel="stylesheet">-->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
          });
        </script>
    </head>
    <body>
    <!--******************** NAVBAR ********************-->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand"><a href="#top">La Porte County Public Library</a></h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
                <li><a title="portfolio" href="#articles">Articles</a></li>
                <li><a title="services" href="#newItems">Newest Items</a></li>
                <li><a title="news" href="#news">News</a></li>
                <li><a title="team" href="#team">Team</a></li>
                <li><a title="contact" href="#contact">Contact</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
    <!-- /.navbar-wrapper -->
    <div id="top"></div>
    <!-- ******************** HeaderWrap ********************-->
    <div id="headerwrap">
      <header class="clearfix">
        <h1><span>La Porte County Public Library</span><br><?php if ($site_slogan): ?><?Php print $site_slogan;?><?php endif; ?></h1>
        <div class="container">
          <div class="row">
            <div class="span12">
              <h2>Search The Catalog</h2>
              <form method="get" action="https://catalog.lapcat.org:444/search/X?" class="">
                <input type="hidden" value="X" name="searchtype"/>
                <input type="text" name="searcharg" placeholder="Enter Your Search" class="cform-text" size="40" title="Enter Your Search">
                <input class="insideBoxShadow smoothAnimate" type="submit" value="GO!">
              </form>
            </div>
          </div>
          <div class="row">
            <div class="span12">
              <ul class="icon">
                <li><a href="#" target="_blank"><i class="icon-pinterest-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-facebook-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-twitter-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-gplus-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-skype-circled"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>
    </div>
    <!--******************** Feature ********************-->
    <div class="scrollblock">
      <section id="feature">
        <div class="container">
          <div class="row">
            <div class="span12">
              <article>
                <p>La Porte County Public Library is the center of community life with a focus on reading, lifelong learning and public involvement.</p>
              </article>
            </div>
            <!-- ./span12 -->
          </div>
          <!-- .row -->
        </div>
        <!-- ./container -->
      </section>
    </div>
    <hr>
    <!--******************** Newest Items Section ********************-->
    <section id="newItems" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-desktop-circled"></i></div>
        <h1 id="folio-headline">Newest Items</h1>

        
        <?php if ($messages): ?>
        <div id="console" class="clearfix"><?php print $messages; ?></div>
        <?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>    
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Services Section ********************-->
    <section id="services" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-cog-circled"></i></div>
        <h1>Services</h1>
        <!-- Four columns -->
        <div class="row">
          <div class="span3">
            <div class="align"> <i class="icon-desktop sev_icon"></i> </div>
            <h2>Web design</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
          <!-- /.span3 -->
          <div class="span3">
            <div class="align"> <i class="icon-vector sev_icon"></i> </div>
            <h2>Print Design</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
          <!-- /.span3 -->
          <div class="span3">
            <div class="align"> <i class="icon-basket sev_icon"></i> </div>
            <h2>Ecommerce</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
          <!-- /.span3 -->
          <div class="span3">
            <div class="align"> <i class="icon-mobile-1 sev_icon"></i> </div>
            <h2>Marketing</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
          <!-- /.span3 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Articles Section ********************-->
    <section id="news" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-pencil-circled"></i></div>
        <h1>Articles</h1>
        <!-- Three columns -->
        <div class="row">
          <article class="span4 post"> <img class="img-news" src="img/blog_img-01.jpg" alt="">
            <div class="inside">
              <p class="post-date"><i class="icon-calendar"></i> March 17, 2013</p>
              <h2>A girl running on a road</h2>
              <div class="entry-content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. &hellip;</p>
                <a href="#" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
          <article class="span4 post"> <img class="img-news" src="img/blog_img-02.jpg" alt="">
            <div class="inside">
              <p class="post-date">February 28, 2013</p>
              <h2>A bear sleeping on a tree</h2>
              <div class="entry-content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. &hellip;</p>
                <a href="#" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
          <article class="span4 post"> <img class="img-news" src="img/blog_img-03.jpg" alt="">
            <div class="inside">
              <p class="post-date">February 06, 2013</p>
              <h2>A Panda playing with his baby</h2>
              <div class="entry-content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. &hellip;</p>
                <a href="#" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
        </div>
        <!-- /.row -->
        <a href="#" class="btn btn-large">Go to our blog</a> </div>
      <!-- /.container -->
    </section>
    <hr>
   
    <!--******************** Contact Section ********************-->
    <section id="contact" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-mail-2"></i></div>
        <h1>Contact us now!</h1>
        <div class="row">
          <div class="span12">
            <div class="cform" id="theme-form">
              <form action="#" method="post" class="cform-form">
                <div class="row">
                  <div class="span6"> <span class="your-name">
                    <input type="text" name="your-name" placeholder="Your Name" class="cform-text" size="40" title="your name">
                    </span> </div>
                  <div class="span6"> <span class="your-email">
                    <input type="text" name="your-email" placeholder="Your Email" class="cform-text" size="40" title="your email">
                    </span> </div>
                </div>
                <div class="row">
                  <div class="span6"> <span class="company">
                    <input type="text" name="company" placeholder="Your Company" class="cform-text" size="40" title="company">
                    </span> </div>
                  <div class="span6"> <span class="website">
                    <input type="text" name="website" placeholder="Your Website" class="cform-text" size="40" title="website">
                    </span> </div>
                </div>
                <div class="row">
                  <div class="span12"> <span class="message">
                    <textarea name="message" class="cform-textarea" cols="40" rows="10" title="drop us a line."></textarea>
                    </span> </div>
                </div>
                <div>
                  <input type="submit" value="Send message" class="cform-submit pull-left">
                </div>
                <div class="cform-response-output"></div>
              </form>
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <div class="footer-wrapper">
      <div class="container">
        <footer>
          <small>&copy; 2013 Inbetwin Network. All rights reserved.</small>
        </footer>
      </div>
      <!-- ./container -->
    </div>
    <!-- Loading the javaScript at the end of the page -->
   
  
      <link href="css/fontello.css" type="text/css" rel="stylesheet">
    <!-- Google Web fonts -->
    <!--<link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>-->
    <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
