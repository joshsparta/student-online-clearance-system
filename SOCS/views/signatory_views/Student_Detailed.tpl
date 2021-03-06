<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Students</h4>

        <!-- Navigations-->
        <div class="row">
            <div class="span3">
                {call name=nav_signatory}
            </div>
        </div>

    </div>
    <div class="span9">

        <div class="row">
            <div class="span8 well">
                {if isset($stud_photo)}
                    <div class="span1">
                        <img src="{$stud_photo}" class="img-polaroid" />
                    </div>
                {else}
                    <div class="span1">
                        <img src="{$host}/photos/default_student.png" class="img-polaroid" />
                    </div>
                {/if}
                <div class="span6">
                    <h4>{$student_name}</h4>
                    <h5>{$course_name}, {$dept_name}</h5>
                </div>
            </div>
        </div>       

        <hr>

        <div class="row">
            <div class="span7 offset1">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Details: </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align: right">Gender: </th>
                            <td>{$stud_gender}</td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Year Level: </th>
                            <td>{$stud_yr_level}</td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Program: </th>
                            <td>{$stud_program}</td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Section: </th>
                            <td>{$stud_section}</td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Status: </th>
                            <td>{$stud_status}</td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Overall Clearance Status: </th>
                            <td>
                                {if $stud_overall_status eq 'Cleared'}
                                    <span class="label label-success"> {$stud_overall_status}</span>  
                                {elseif $stud_overall_status eq 'No Requirements'}
                                    <span class="label">{$stud_overall_status}</span>
                                {else}
                                    <span class="label label-important">{$stud_overall_status}</span>
                                {/if}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-actions">
            <div class="pull-right">
                <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='../signatory/index.php';">
            </div>
        </div>
    </div>
</div>