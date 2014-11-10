
<style>
/*CUSTOM TABLE CELLS*/
.cell_head{
    width:70%;
    margin:0 auto;
    height:30px;
    margin-top:20px;
}
.cell_body{
    height:140px;
    width:80%;
    margin:0 auto;
}    

.course{
    padding:10px;
}

.columns{
    padding:0;
}
</style>

<div class="row">

    <div class="medium-10 columns medium-centered">
        <div class="icon-bar three-up" style="background:transparent;">
            <div class="item success label medium-3 columns">
                <i class="fi-checkbox" ><p>Completed and accepted</p></i>

            </div>
            <div class="item warning label medium-6 columns">
                <i class="fi-clipboard-pencil" ><p>In progress/registered or needs docs</p></i>
            </div>
            <div class="item alert label medium-3 columns">
                <i class="fi-prohibited" ><p>Not Completed/Registered</p></i>

            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="medium-10 columns medium-centered ">
        <div class="row">
            <div class="medium-12 columns text-center" >
                <h3>Total Credits<br /><?php echo $total_credits; ?></h3>
            </div>
        </div>
        <div class="row ">

            <?php for ($semester = Course_model::MIN_SEMESTERS; $semester <= $max_semesters; $semester++): ?>
                <?php
                $this_semester_courses = Course_model::get_courses($semester);
                $semester_credits = 0;
                ?>
                <div class="row">
                    <ul class="ch-grid">
                        <li class="medium-1 columns middle">
                            <h2 align="center"><?php echo $semester; ?></h2>
                        </li>
                        <?php
                        for ($position = Course_model::MIN_POSITION; $position <= $max_courses; $position++):
                            ?>
                            <?php $course = Course_model::get_courses($semester, $position); ?>
                            <?php if ($course !== FALSE): ?>
                                <li class="medium-2 columns course" style="width:<?php echo (floor(80 / $max_courses) - .5); ?>%;">
                                    <div class="ch-item ch-img-<?php echo $semester; ?>"  >				
                                        <div class="ch-info-wrap">
                                            <div class="ch-info">
                                                <div class="ch-info-front ch-img-<?php echo $semester; ?>"  >

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
                                                <div class="ch-info-back">

                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                </li>

                                <?php
                                $semester_credits += $course->credits;
                                ?>
                            <?php else: ?>
                                <li class="medium-2 columns" style="width:<?php echo (floor(80 / $max_courses) - .5); ?>%;">

                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li class="medium-1 columns middle text-center">

                            <h2><?php echo $semester_credits; ?></h2>

                        </li>
                    </ul>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
