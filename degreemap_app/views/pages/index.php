
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
                        <?php foreach ($this_semester_courses->result() as $row): ?>
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
                                <div class="cell_footer <?php echo $row->{'label-color'}; ?> label " >
                                    <h4>
                                        <?php echo $row->{'label-message'}; ?>
                                    </h4>
                                </div>
                            </td>

                            <?php
                            $semester_credits += $row->credits;
                            $num_cols += 1;
                            ?>
                        <?php endforeach; ?>
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
