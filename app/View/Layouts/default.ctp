<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo (!empty($meta['title'])) ? $meta['title'] : NULL; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    //meta
    if (!empty($meta)) {
        echo $this->Html->meta('icon');
        echo $this->Html->meta('description', $meta['description']);
        echo $this->Html->meta('keywords', $meta['keywords']);
    }

    //css - bambla hybrid
    if (!empty($is_admin)) echo $this->Html->css(array('Bambla.assets', 'Bambla.fonts/stylesheet'));

    //css for site only
    echo $this->Html->css(array('default','fonts/stylesheet'));

    //js
    echo $this->Html->script(array(
        '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js',
        'default'
    ));

    //page specific
    echo $scripts_for_layout;
    ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<?php if (!empty($is_admin)) echo $this->element('Bambla.admin_toolbar'); ?>
<?php echo $this->Session->flash(); ?>
<div id="wrapper" class="relative">
    <?php echo $this->Html->image('top_whistle.png', array('alt' => 'whistle','class' => 'whistle')); ?>
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar">
                    <div class="col-xs-12 col-sm-6">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed transition" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <?php echo $this->Html->image("john_wooden_logo.png", array("alt" => "John Wooden Logo", "class"=>"img-responsive logo", 'url' => array('controller' => 'Pages', 'action' => '/'))); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="collapse navbar-collapse main_nav" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><p>the</p><?php echo $this->Html->link('Journey', array('controller' => 'Pages', 'action' => 'the_journey')); ?></li>
                                <li><p>memory</p><?php echo $this->Html->link('Wall', array('controller' => 'Pages', 'action' => 'memory_wall')); ?></li>
                                <li><p>bill walton</p><?php echo $this->Html->link('Speaks', array('controller' => 'Pages', 'action' => 'bill_walton_speaks')); ?></li>
                                <li><p>pyramid of</p><?php echo $this->Html->link('Success', array('controller' => 'Pages', 'action' => 'pyramid_of_success')); ?></li>
                                <li><p>coach's</p><?php echo $this->Html->link('bookstore', array('controller' => 'Pages', 'action' => 'bookstore')); ?></li>
                                <li><p>scrap</p><?php echo $this->Html->link('book', array('controller' => 'Pages', 'action' => 'scrapbook')); ?></li>
                                <li><p>favorite</p><?php echo $this->Html->link('maxims', array('controller' => 'Pages', 'action' => 'favorite_maxims')); ?></li>
                                <li><p>john r. wooden</p><?php echo $this->Html->link('award', array('controller' => 'Pages', 'action' => 'wooden_award')); ?></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <?php echo $this->fetch('content'); ?>
    <div class="footer_quote">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text">
                        <p>"Success <br>is peace of <br>mind which is a <br>direct result of <br>self-satisfaction in <br>knowing you made the <br>effort to become the best you <br>are capable of becoming."</p>
                        <span>- John Wooden</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <?php echo $this->Html->image("logo_footer.png", array(
                        "alt" => "John Wooden, Coach &amp; Teacher",
                        "class"=>"footer_logo img-responsive",
                        'url' => array('controller' => 'Pages', 'action' => '/'))); ?>
                    <?php //echo $this->Html->image('footer_wooden.png', array('alt' => 'Joh Wooden Holding basketball')); ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="footer_links">
                        <?php echo $this->Html->link($this->Html->image("logo_uncommon.png", array("alt" => "Uncommon Thinking")),'http://uncommonthinking.com/', array('target' => '_blank','escape' => false)); ?>
                        <ul>
                            <li><?php echo $this->Html->link('Contact Us', array('controller' => 'Pages', 'action' => 'contact')); ?></li>
                            <li><?php echo $this->Html->link('Terms of Use', array('controller' => 'Pages', 'action' => 'terms_of_use')); ?></li>
                            <li><?php echo $this->Html->link('Privacy Policy', array('controller' => 'Pages', 'action' => 'privacy_policy')); ?></li>
                        </ul>
                        <div class="clear"></div>
                        <h6>All Contents @ <?php echo date('Y'); ?> John Wooden</h6>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Bootstrap compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-5936336-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>