<div class="row">
    <div class="col s12">
        <div class="col s12 drawchintantable">
           <?php $this->chintantable->createsearch("Menu List");?>
            <table class="highlight">
                <thead>
                    <tr>
                   <th data-field="id">ID</th>
                   <th data-field="name">Name</th>
<!--                                    <th data-field="order">Order</th>-->
<!--                                    <th data-field="parent">Parent</th>-->
                                    <th data-field="status">Status</th>
                                    
                                    <th data-field="action">Action</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light green accent-4" href="<?php echo site_url("site/createfrontmenu "); ?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
         return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light orange lighten-1' href='<?php echo site_url('site/editfrontmenu?id=');?>" + resultrow.id + "'><i class='fa fa-pencil-square propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletefrontmenu?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>




<!--
<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url(" site/createfrontmenu "); ?>">Create</a>
    <h1 class="page-header text-overflow">Frontmenu Details </h1>
    </div <div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("Frontmenu List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="order">Order</th>
                                    <th data-field="parent">Parent</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="name">Name</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-pagination" style="display: block;">
                        <div class="pull-left pagination-detail">
                            <?php $this->chintantable->createpagination();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function drawtable(resultrow) {
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.order + "</td><td>" + resultrow.parent + "</td><td>" + resultrow.status + "</td><td>" + resultrow.name + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editfrontmenu?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletefrontmenu?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>-->
