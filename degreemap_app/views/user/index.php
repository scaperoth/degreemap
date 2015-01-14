<?php
$username = $this->session->userdata('username');
$fname = $this->session->userdata('fname');
$lname = $this->session->userdata('lname');
$full_name = $this->session->userdata('full_name');
?>

<div class="large-3 large-centered medium-6 medium-centered columns">
    <div class="login-box">
        <div class="row">
            <div class="large-12 columns">
                <?php if (is_advisor()): ?>
                    <h3>Advisor Settings</h3>
                    <hr>
                    <?php echo form_open('VerifyStudentView'); ?>


                    <div class="row">
                        <div class="large-12 columns">
                            <label>Select Student's Schedule
                                <select name="student_select">
                                    <option value="none">Me</option>
                                    <?php foreach (json_decode(get_advisor_students()) as $row): ?>
                                        <option <?php echo ($row->username === $this->session->userdata('student_view') ? 'selected' : ''); ?> value="<?php echo $row->username; ?>"><?php echo $row->lname . ', ' . $row->fname; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 large-centered columns">
                            <input type="submit" class="button" value="Submit"/>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                <?php endif; ?>

                <h3>Account Settings and Tools</h3>
                <hr>

                <?php echo form_open('VerifyUserUpdate'); ?>
                <div class="row collapse">

                    <?php if (form_error('username')): ?>

                        <div class="small-4 large-3 columns">
                            <span class="prefix">Username</span>
                        </div>
                        <div class="small-9 large-9 columns">
                            <label class="error">
                                <input class="error" type="text" name="username"  value="<?php echo $username; ?>">
                            </label>
                            <small class="error"><?php echo form_error('username'); ?></small>
                        </div>
                    <?php else: ?>
                        <div class="small-4 large-3 columns">
                            <span class="prefix">Username</span>
                        </div>
                        <div class="small-9 large-9 columns">
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row collapse">
                    <?php if (form_error('fname')): ?>

                        <div class="small-4 large-3 columns">
                            <span class="prefix">First</span>
                        </div>
                        <div class="small-9 large-9 columns">
                            <label class="error">
                                <input class="error" type="text" name="fname" value="<?php echo $fname; ?>">
                            </label>
                            <small class="error"><?php echo form_error('fname'); ?></small>
                        </div>
                    <?php else: ?>
                        <div class="small-4 large-3 columns">
                            <span class="prefix">First</span>
                        </div>
                        <div class="small-9 large-9 columns">
                            <input type="text" name="fname" value="<?php echo $fname; ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row collapse">
                    <?php if (form_error('lname')): ?>

                        <div class="small-4 large-3 columns">
                            <span class="prefix">Last</span>
                        </div>
                        <div class="small-9 large-9 columns">
                            <label class="error">
                                <input class="error" type="text" name="lname" value="<?php echo $lname; ?>">
                            </label>
                            <small class="error"><?php echo form_error('lname'); ?></small>
                        </div>
                    <?php else: ?>
                        <div class="small-4 large-3 columns">
                            <span class="prefix">Last</span>
                        </div>
                        <div class="small-9 large-9 columns">
                            <input type="text" name="lname" value="<?php echo $lname; ?>">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="large-12 large-centered columns">
                        <input type="submit" class="button expand" value="Submit Changes"/>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>