<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $student_fname . "'s " . $title; ?> | Welcome</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/foundation.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/foundation-icons.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr.js"></script>
    </head>
    <body>

        <div class="row">
            <div class="medium-12 columns">
                <h1>Welcome to <?php echo $student_fname . "'s " . $title; ?></h1>
                <h3 class="subheader">Updated up to SP 2015</h3>
            </div>
        </div>

        <div class="row">
            <div class="medium-12 columns">
                <?php echo $content; ?>
            </div>
        </div>


        <hr/>
        <footer>
            <h3 class="subheader text-center">
                <small>
                    Created By: <span><?php echo $student_fname . " " . $student_lname; ?></span>
                </small>
            </h3>
        </footer>
        <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
