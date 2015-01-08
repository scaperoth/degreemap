<div class="large-3 large-centered columns">
    <div class="login-box">
        <div class="row">
            <div class="large-12 columns">
                <?php
                $error = '';
                if (isset($flash))
                {
                    $error = "<small class=\"error\">$flash</small>";
                }
                ?>
                <?php echo form_open('VerifySignUp'); ?>
                <div class="row">
                    <?php echo $error; ?>
                    <div class="large-12 columns">
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                </div>
                
                <div class="row">
                    <div class="large-12 columns">
                        <input type="text" name="fname" placeholder="First Name" />
                    </div>
                </div>
                
                <div class="row">
                    <div class="large-12 columns">
                        <input type="text" name="lname" placeholder="Last Name" />
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 large-centered columns">
                        <input type="submit" class="button expand" value="Submit"/>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>