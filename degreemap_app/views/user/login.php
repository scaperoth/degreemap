<h1 class="text-center">Log In</h1>
<div class="large-3 large-centered medium-6 medium-centered columns">
    <div class="login-box">
        <div class="row">
            <div class="large-12 columns">

                <?php echo form_open('VerifyLogin'); ?>
                <div class="row">
                </div>
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
                    <div class="large-12 large-centered columns">
                        <input type="submit" class="button expand" value="Log In"/>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>