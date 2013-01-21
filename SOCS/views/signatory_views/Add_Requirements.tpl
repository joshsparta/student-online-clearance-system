<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs">
            <li class="dropdown">
                <a class="dropdown-toggle"
                    data-toggle="dropdown"
                    href="#">
                    Student
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Cleared'  style="color:blue; cursor: pointer;"><i class="icon-check"></i>&nbsp; Cleared</a></li>
                    <li><a href='../signatory/index.php?action=displayTable&filter=&page=1&finder=not&clearanceStatus=Not_Cleared' style="color:red; cursor: pointer;"><i class="icon-remove-circle"></i>&nbsp; Not Cleared</a></li>
                </ul>
            </li>       
            <li><a href='../signatory/bulletin.php'>Bulletin</a></li>
            <li class="active"><a href='../signatory/requirements.php'>Requirements</a></li>         
        </ul>
    </div>    
    <div class="pull-right">
        {include file=$School_year_content}
    </div> 
</div>
        
<button class="pull-right btn" onclick="window.location.href='../signatory/requirements.php'">Back</button> 

<form method='post' class="form-horizontal">
    <legend>Add Requirement:</legend>
    <div class="control-group">
        <label class="control-label">Title: </label>
        <div class="controls">
            <input class="input-xxlarge" type ='text' name='requirement_title'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Description: </label>
        <div class="controls">
            <textarea class="input-xxlarge" name='requirement_description' rows="5" cols="50"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input class="btn btn-primary" type='Submit' value='Next' name="Next">
        </div>
    </div>
</form>       