<div class="row">
    <div class="col s12">
        <div class="col s12 drawchintantable">
           <?php $this->chintantable->createsearch("Eventimages List");?>
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                                    <th data-field="event">Event</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="order">Order</th>
                                    <th data-field="image">Image</th>
                                    <th data-field="action">Action</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light light-green accent-4" href="<?php echo site_url("site/createeventimages?id=").$this->input->get('id');?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
 var image = "<a href='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' width='80px' height='80px'></a>";
            if (resultrow.image == "") {
                image = "No Receipt Available";
            }
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.event + "</td><td>" + resultrow.status + "</td><td>" + resultrow.order + "</td><td>" + image + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light orange lighten-1' href='<?php echo site_url('site/editeventimages?id=');?>" + resultrow.id + "&eventid=" + resultrow.eventid + "'><i class='material-icons propericon'>system_update_alt</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteeventimages?id='); ?>" + resultrow.id + "&eventid=" + resultrow.eventid + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>