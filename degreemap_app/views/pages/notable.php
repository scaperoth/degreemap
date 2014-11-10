
<div class="row">
    <div class="medium-12 columns">
        <div class="icon-bar three-up" style="background:transparent;">
            <div class="item success label">
                <i class="fi-checkbox" ><p>Completed and accepted</p></i>

            </div>
            <div class="item warning label">
                <i class="fi-clipboard-pencil" ><p>In progress/registered or needs docs</p></i>
            </div>
            <div class="item alert label">
                <i class="fi-prohibited" ><p>Not Completed/Registered</p></i>

            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="medium-12 columns">

        <div class="row">
            <div class="medium-1 columns medium-offset-11 text-center">
                Total Credit<br /><?php echo $total_credits; ?>
            </div>
        </div>
        <div class="row">
            <?php for ($semester = Course_model::MIN_SEMESTERS; $semester <= $max_semesters; $semester++): ?>
                <?php
                $this_semester_courses = Course_model::get_courses($semester);
                $semester_credits = 0;
                ?>
                <div class="row">
                    <div class="medium-1 columns middle semester">
                        <p align="center"><?php echo $semester; ?></p>
                    </div>
                    <?php
                    for ($position = Course_model::MIN_POSITION; $position <= $max_courses; $position++):
                        ?>
                        <?php $course = Course_model::get_courses($semester, $position); ?>
                        <?php if ($course !== FALSE): ?>
                            <div class="medium-2 columns course">
                                <h5 class="cell_head">
                                    <a target="blank" href="<?php echo $course->link; ?>">
                                        <?php echo $course->title; ?> 
                                    </a> 
                                    (<?php echo $course->credits; ?>)
                                </h5>
                                <h5 class="subheader cell_body">
                                    <small>
                                        <?php echo $course->description; ?>
                                    </small>
                                </h5>
                                <div class="cell_footer <?php echo $course->labelcolor; ?> label " >
                                    <h4>
                                        <?php echo $course->labelmessage; ?>
                                    </h4>
                                </div>
                            </div>
                            <?php
                            $semester_credits += $course->credits;
                            ?>
                        <?php else: ?>
                            <div class="medium-2 columns"></div>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <div class="medium-1 columns middle text-center">
                        <p align="center"><?php echo $semester_credits; ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
