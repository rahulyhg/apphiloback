<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Enquiry</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editenquirysubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

         <div class="row">
            <div class="input-field col s12 m6">
                <?php echo form_dropdown( 'user',$user,set_value( 'user',$before->user)); ?>
                 <label>User</label>
            </div>
        </div>
            <div class="row">
            <div class="input-field col s12 m6">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6">
                <label for="email">Email</label>
                <input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
            </div>
        </div>
          
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo set_value('title',$before->title);?>">
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s12 m6">
                <label for="timestamp">Timestamp</label>
                <input type="text" readonly="true" id="timestamp" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
           <div class="row">
                 <div class="col s12 m6">
                       <label>Content</label>
                        <textarea id="some-textarea" name="content" placeholder="Enter text ..."><?php echo set_value( 'content',$before->content);?></textarea>
            <script type="text/javascript">
                $('#some-textarea').wysihtml5();
            </script>
                 </div>
               
            </div>
<div class="row">
    <div class="col s12 m6">
        <div class=" form-group">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url("site/viewenquiry"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
            </div>
    </div>
</div>
        
    </form>
</div>
