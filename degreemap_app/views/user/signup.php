<h1 class="text-center">Sign Up</h1>
<div class="large-3 large-centered columns">
    <div class="login-box">
        <div class="row">
            <div class="large-12 columns">

                <?php echo form_open('VerifySignUp'); ?>
                <div class="row">
                    <div class="large-12 columns">
                        <?php if (form_error('username')): ?>
                            <label class="error">
                                <input class="error" type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" />
                            </label>
                            <small class="error"><?php echo form_error('username'); ?></small>
                        <?php else: ?>
                            <input type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <?php if (form_error('password')): ?>
                            <label class="error">
                                <input class="error" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" />
                            </label>
                            <small class="error"><?php echo form_error('password'); ?></small>
                        <?php else: ?>
                            <input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" />
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <?php if (form_error('fname')): ?>
                            <label class="error">
                                <input class="error" type="text" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" />
                            </label>
                            <small class="error"><?php echo form_error('fname'); ?></small>
                        <?php else: ?>
                            <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" />
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <?php if (form_error('lname')): ?>
                            <label class="error">
                                <input class="error" type="text" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name" />
                            </label>
                            <small class="error"><?php echo form_error('lname'); ?></small>
                        <?php else: ?>
                            <input type="text" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name" />
                        <?php endif; ?>
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