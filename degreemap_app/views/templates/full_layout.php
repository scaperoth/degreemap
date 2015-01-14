<!DOCTYPE html>
<html class="no-js" lang="en">
    <?php
    $title = $this->config->item('site_title');
    ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $title; ?> | Welcome</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/foundation.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/foundation-icons.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/gridster/stylesheets/gridster.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr.js"></script>
    </head>
    <body>
        <div class="page-wrap">
            <div class="sticky ">
                <nav class="top-bar" data-topbar role="navigation" >
                    <ul class="title-area">
                        <li class="name">
                            <h1><a href="<?php echo site_url("../"); ?>"><?php echo $title; ?></a></h1>
                        </li>
                    </ul>

                    <section class="top-bar-section">
                        <?php
                        $page1 = strtolower($this->uri->segment(1));
                        $page2 = strtolower($this->uri->segment(2));
                        ?>
                        <?php if ($this->session->userdata('logged_in')): ?> 

                            <!-- Right Nav Section -->
                            <ul class="left">
                                <li class="<?php echo ($page1 == "home") ? "active" : ""; ?>"><a href="<?php echo site_url("../"); ?>">Home</a></li>

                            </ul>

                            <!-- Right Nav Section -->
                            <ul class="right">
                                <li class="has-dropdown ">
                                    <a href="#"><?php echo $this->session->userdata('username'); ?> <i class="fi-widget"  ></i></a>
                                    <ul class="dropdown">
                                        <li class="<?php echo ($page1 == "user") ? "active" : ""; ?>"><a href="<?php echo site_url("user"); ?>">My Account</a></li>
                                        <li class="<?php echo ($page2 == "logout") ? "active" : ""; ?>"><a href="<?php echo site_url("user/logout"); ?>">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php else: ?>
                            <!-- Right Nav Section -->
                            <ul class="right">
                                <li class="<?php echo ($page2 == "login" || !$page1) ? "active" : ""; ?>"><a href="<?php echo site_url("user/login"); ?>">Log In</a></li>
                                <li class="<?php echo ($page2 == "signup") ? "active" : ""; ?>"><a href="<?php echo site_url("user/signup"); ?>">Sign Up</a></li>

                            </ul>
                        <?php endif; ?> 


                    </section>
                </nav>
            </div><!--end sticky nav-->
            <div id="main">
                <div id="inner">
                    <div class="flash_container sticky">
                        <?php
                        get_flash();
                        ?>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="medium-12 columns">
                            <?php echo (!$page1 || $page2 == "login" || $page2 == "signup" || $page1 == "verifylogin" || $page1 == "verifysignup") ? "<br/><br/>" : ""; ?>
                            <?php if (isset($header)): ?>
                                <h1 class="text-center"><?php echo $header; ?></h1>
                            <?php else: ?>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="row full ">
                        <div class="medium-12 columns medium-centered">

                                    <?php echo $content; ?>
                        </div>
                    </div>
                </div><!--end inner-->
            </div><!--end main-->
        </div><!--end page-wrap-->
        <footer>
            <hr/>
            <h3 class="subheader text-center">
                <small>
                    Created By: <span>Matt Scaperoth</span>
                </small>
            </h3>
        </footer>
        <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/foundation.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/gridster/javascripts/gridster.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script>
            $(function () { //DOM Ready

                $(document).foundation();
                $(".gridster ul").gridster({
                    widget_margins: [10, 10],
                    widget_base_dimensions: [140, 140]
                });

            });

        </script>
    </body>
</html>
