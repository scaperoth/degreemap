
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

<?php
echo Fnd_modal::start_modal(array(
    'id' => 'myModal',
        ), array(
    'class' => 'tim',
));
?>

<h2>Update</h2>

<?php
echo Fnd_form::start_form();
?>

<div class="row">
    <div class="small-4 columns padding-0">
        <div class="small-6 columns padding-0">
            <div class="row collapse">

                <div class="small-7 columns">
                    <span class="prefix">Semester</span>
                </div>
                <div class="small-5 columns">
                    <select name="semester">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="small-6 columns ">
            <div class="row collapse">

                <div class="small-7 columns">
                    <span class="prefix">Position</span>
                </div>
                <div class="small-5 columns">
                    <select name="position">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <div class="row collapse prefix-radius">
            <div class="small-3 columns">
                <span class="prefix">Label</span>
            </div>
            <div class="small-9 columns">
                <input type="text" placeholder="Value">
            </div>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="row collapse postfix-radius">
            <div class="small-9 columns">
                <input type="text" placeholder="Value">
            </div>
            <div class="small-3 columns">
                <span class="postfix">Label</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <div class="row collapse prefix-round">
            <div class="small-3 columns">
                <a href="#" class="button prefix">Go</a>
            </div>
            <div class="small-9 columns">
                <input type="text" placeholder="Value">
            </div>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="row collapse postfix-round">
            <div class="small-9 columns">
                <input type="text" placeholder="Value">
            </div>
            <div class="small-3 columns">
                <a href="#" class="button postfix">Go</a>
            </div>
        </div>
    </div>
</div>



<?php
echo Fnd_form::end_form();

echo Fnd_modal::end_modal();
?>

<div class="row">
    <div class="medium-12 columns">

        <table role="grid">
            <thead>
                <tr>
                    <th WIDTH=28>
            <div align="center">SEM</div>
            </th>
            <?php for ($i = 0; $i < $max_courses; $i++): ?>
                <th >Course</th>
            <?php endfor; ?>
            <th>
            <div align="center">
                Total Credit<br /><?php echo $total_credits; ?>
            </div>
            </th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($semesters->result() as $this_semester): ?>
                    <?php
                    $this_semester_courses = $this->course_model->get_courses($this_semester->semester);
                    $semester_credits = 0;
                    $num_cols = 0;
                    ?>
                    <tr>
                        <td >
                            <p align="center"><?php echo $this_semester->semester; ?></p>
                        </td>
                        <?php for ($i = 0; $i < $max_courses; $i++): ?>
                            <?php $row = $this->course_model->get_courses($this_semester->semester, $i); ?>
                            <?php if ($row !== FALSE): ?>
                                <td align="center">
                                    <h5>
                                        <a class="cell_head" target="blank" href="<?php echo $row->link; ?>">
                                            <?php echo $row->title; ?> 
                                        </a> 
                                        (<?php echo $row->credits; ?>)
                                    </h5>
                                    <h5 class="subheader cell_body">
                                        <small>
                                            <?php echo $row->description; ?>
                                        </small>
                                    </h5>
                                    <div class="cell_footer <?php echo $row->{'labelcolor'}; ?> label " >
                                        <h4>
                                            <?php echo $row->{'labelmessage'}; ?>
                                        </h4>
                                    </div>
                                </td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <?php
                            $semester_credits += $row->credits;
                            $num_cols += 1;
                            ?>
                        <?php endfor; ?>
                        <?php
                        while ($num_cols < $max_courses) {
                            echo "<td></td>";
                            $num_cols+=1;
                        }
                        ?>
                        <td>
                            <p align="center"><?php echo $semester_credits; ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
