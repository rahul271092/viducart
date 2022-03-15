<?php
include_once("header.php");
?>


<div class="container">

    <div class="page-header">
        <h1>Update Video Status</h1>
    </div>

    <form action="update-video-status2.php" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label>Enter Video Id</label>
                </div>
                <div class="col-md-4">
                    <input type="text" name="video_name" class="form-control" required />
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                        <div class="col-md-12">
                             <input type="submit" name="action" value="Submit" />
                        </div>
                </div>
            </div>   
        </form>

</div>
</div>