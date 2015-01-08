
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
    @media only screen and (min-width: 64.063em){
        .course{
            padding:10px;
            width:<?php echo (floor(80 / $max_courses) - .5); ?>%;
        }
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


<div class="row" id="courses_row">
    <div class="medium-10 columns medium-centered " id="courses_table">
        <div class="row">
            <div class=" columns text-center" >
                <h3>Total Credits<br /><?php echo $total_credits; ?></h3>
            </div>
        </div>
        <div class="row " >

            <?php for ($semester = CourseModel::MIN_SEMESTERS; $semester <= $max_semesters; $semester++): ?>
                <?php
                $this_semester_courses = $this->CourseModel->get_courses($semester);
                $semester_credits = 0;
                $full_courses = TRUE;
                ?>
                <div class="row">
                    <ul class="ch-grid">
                        <li class="medium-1 columns middle" style="width:5%;">
                            <h2 align="center"><?php echo $semester; ?></h2>
                        </li>
                        <?php
                        for ($position = CourseModel::MIN_POSITION; $position <= $max_courses; $position++):
                            ?>
                            <?php $course = $this->CourseModel->get_courses($semester, $position); ?>
                            <?php if ($course !== FALSE): ?>
                                <li class="columns course" id="<?php echo $semester . $position; ?>" >
                                    <div class="ch-item ch-img-<?php echo $semester; ?>"  >				
                                        <div class="ch-info-wrap">
                                            <div class="ch-info">
                                                <div class="ch-info-front ch-img-<?php echo $semester; ?>"  >
                                                    <i class="fi-widget right settings-icon "  ></i>
                                                    <h5 class="cell_head course_section">
                                                        <a target="blank" href="<?php echo $course->link; ?>">
                                                            <i class="fi-link  " ></i>
                                                        </a>
                                                        <span class="edit-box" data-semester="<?php echo $semester ?>" data-position="<?php echo $position ?>" data-field="title" contenteditable="true">
                                                            <?php echo $course->title; ?>
                                                        </span>
                                                        (<span class="edit-box" data-semester="<?php echo $semester ?>" data-position="<?php echo $position ?>" data-field="credits" contenteditable="true"><?php echo $course->credits; ?></span>)
                                                    </h5>
                                                    <div class="clearfix"></div>
                                                    <h5 class="subheader cell_body course_section">
                                                        <small>
                                                            <span class="edit-box" data-semester="<?php echo $semester ?>" data-position="<?php echo $position ?>" data-field="description" contenteditable="true">
                                                                <?php echo $course->description; ?>
                                                            </span>
                                                        </small>
                                                    </h5>
                                                    <div class="cell_footer course_section " >
                                                        <div class=" <?php echo $course->labelcolor; ?> label ">
                                                            <h4>
                                                                <span class="edit-box" data-semester="<?php echo $semester ?>" data-position="<?php echo $position ?>" data-field="labelmessage" contenteditable="true">
                                                                    <?php echo $course->labelmessage; ?>
                                                                </span>
                                                            </h4>
                                                        </div>
                                                        <i data-semester="<?php echo $semester ?>" data-position="<?php echo $position ?>" data-color="<?php echo $course->labelcolor; ?>" class="fi-paint-bucket  status-nav" title="change status color"></i>
                                                    </div>
                                                </div>
                                                <div class="ch-info-back">
                                                    <i class="fi-x right return-icon" ></i>

                                                    <?php
                                                    $attr = 'id="delete_course_form' . $semester . $position . '" class="delete-form"'; //The form will have the id 'my_form'
                                                    echo form_open('forms/delete', $attr);
                                                    $data = array(
                                                        'name' => 'semester',
                                                        'class' => 'hidden-for-small-up',
                                                        'value' => $semester
                                                    );
                                                    echo form_input($data);
                                                    $data = array(
                                                        'name' => 'position',
                                                        'class' => 'hidden-for-small-up',
                                                        'value' => $position
                                                    );
                                                    echo form_input($data);
                                                    $data = array(
                                                        'type' => 'Submit',
                                                        'id' => 'delete_field',
                                                        'class' => 'button alert',
                                                        'value' => 'Delete'
                                                    );
                                                    echo form_input($data);
                                                    echo form_close();
                                                    ?>

                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                </li>

                                <?php
                                $semester_credits += $course->credits;
                                ?>
                            <?php else: ?>
                                <?php $full_courses = FALSE; ?>
                                <li class="medium-1 columns middle" style="width:<?php echo (floor(80 / $max_courses) - .5); ?>%;">
                                    <i data-semester="<?php echo $semester ?>" data-position="<?php echo $position ?>" class="fi-plus large green add-new"></i>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($full_courses): ?><!--
                    <li class="medium-1 columns middle text-center" id="<?php echo $semester . $position . "smallplus" ?>" style="width:1%;">

                            <?php
                            $gridlocation = $semester . $position;
                            $attr = 'id="add_course_form' . $gridlocation . '" class="add-form"'; //The form will have the id 'my_form'
                            echo form_open('forms/add', $attr);
                            $data = array(
                                'name' => 'semester',
                                'class' => 'hidden-for-small-up',
                                'value' => $semester
                            );
                            echo form_input($data);
                            $data = array(
                                'name' => 'position',
                                'class' => 'hidden-for-small-up',
                                'value' => $position
                            );
                            echo form_input($data);
                            $data = array(
                                'type' => 'Submit',
                                'class' => 'icon-button padding-left15 padding-right15 gray',
                                'title' => 'Add a new course',
                                'content' => '<i class="fi-plus small green"></i>',
                                'value' => 'Delete'
                            );
                            echo form_button($data);
                            echo form_close();
                            ?>

                    </li>-->
                        <?php endif; ?>
                        <li class="medium-1 columns middle text-center">

                            <h2><?php echo $semester_credits; ?></h2>

                        </li>
                    </ul>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
