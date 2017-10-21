        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-signal"></span> Account Settings</h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('Dashboard/dashboardView');?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                      <li class="active">Account Settings</li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">         
                    <div class="row">
                        <?php foreach($userdata as $us){
                          echo '
                        <div class="col-md-3">
                          <div class="well">
                          <div id="photo_profile">
                          <img src="';if($us['path']!=null){ echo $us['path'];}else{ echo base_url('assets/images/pic.png'); } echo'" alt="Profile Picture" class="img-responsive img-thumbnail" id="profilepic"/>
                          </div>
                          <br />
                          <br />
                          <a href="#" class="form-control text-center edit_link" data-toggle="modal" data-target="#profileEditModal">Edit Picture</a>
                          <a href="#" class="form-control text-center edit_link" data-toggle="modal" data-target="#editInfoProfile" >Edit Information</a>
                          <a href="#" class="form-control text-center edit_link edit_link2" data-toggle="modal" data-target="#changePasswordModal" >Change Password</a>
                          </div>  
                        </div>
                        <div class="col-md-8 col-md-offset-1">
                          <h3 class="text-primary">'.$us['firstname'].' '.$us['lastname'].' </h3>
                          <h5><em>'.$us['email'].'</em></h5>
                          <br />
                          <h5><b class="text-primary">Username: </b>'.$us['username'].'</h5>
                          
                          <h5><b class="text-primary">Position: </b>'.$us['position'].'</h5>
                        
                          <h5><b class="text-primary">College/Office: </b>'.$us['collegeId'].'</h5>
                          <h5><b class="text-primary">Department: </b>'.$us['department'].'</h5>
                          ';}?>
                        <div>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<!--MODAL-->
          <div class="modal fade" id="profileEditModal" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form action="<?php echo base_url('account/updateProfileImage/'); ?>" role="form" method="post" class="modal-content" enctype="multipart/form-data" id="newprofile_form" >
                
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Profile Image</h4>
                  </div>
                  <div class="modal-body">
                    <!--choose banner-->
                    <div class="form-group">
                      <label for="newprofile"> New Profile Image: </label>
                      <input type="file" id="newprofile" name="newprofile" />
                    </div>
                     <div class="text-danger">
                        <?php echo validation_errors(); ?>
                    </div> 
                  
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                  </div>
                 
              </form>
            </div>
          </div>
          <!--MODAL END-->
           <!--MODAL FOR PASSWORD-->
          <div class="modal fade" id="changePasswordModal" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <?php foreach($userdata as $us):?>
              <form role="form" method="post" class="modal-content" id="newpassword_form" data-password="<?php echo $us['password']?>" action="<?php echo base_url('account/changePassword/'); ?>">
              <?php endforeach;?>
              	                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                  </div>
                  <div class="modal-body">
                  	<div class="form-group">
                      <label for="password"> Old Password: </label>
                      <input class="form-control" type="password" id="oldpassword" name="oldpassword" />
                    </div>
                   
                    <div class="form-group">
                      <label for="password"> New Password: </label>
                      <input class="form-control" type="password" id="newpassword" name="newpassword" />
                    </div>
                    <div class="form-group">
                      <label for="confirmpassword"> Confirm Password: </label>
                      <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" />
                    </div>
                     <div class="text-danger">
                        <?php echo validation_errors(); ?>
                    </div> 
                  
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success" >Change Password</button>
                    </div>
                  </div>
                 
              </form>
            </div>
          </div>
          <!--MODAL END-->

          <!--MODAL-->
          <?php foreach($userdata as $us){ ?>
					
          <div class="modal fade" id="editInfoProfile" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form role="form" method="post" class="modal-content" id="save_edit" action="<?php echo base_url('account/updateInformation'); ?>">
                
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Information</h4>
                  </div>
                  <div class="modal-body">
                    <!--choose banner-->
                     <div class="form-group">
                        <label class="control-label">First Name:</label>
                            <input type="text" value="<?php echo $us['firstname'];?>" class="form-control" name="first_name" id=first_name>
                      </div>
                     <div class="form-group">
                        <label class="control-label ">Last Name:</label>
                            <input type="text" value="<?php echo $us['lastname'];?>" class="form-control" name="last_name" id=last_name >   
                      </div>  
                    <div class="form-group">
                      <label class="control-label ">Email Address:</label>
                          <input type="text" value="<?php echo $us['email'];?>" id="email_input"class="form-control" name="email">
                    </div>  
                    <div class="form-group">
                        <label class="control-label">Position:</label>
                        <input type="text" class="form-control" value="<?php echo $us['position'];?>" name="position" id="position">
                    </div>
                    <div class="form-group">
                      <label class="control-label">College/Office:</label>
                      <input class="form-control" name="collegeId"  value="<?php echo $us['collegeId'];?>"readonly>          
                    </div>
                    <div class="form-group">
                      <label class="control-label">Department:</label>
                          <input type="text" value="<?php echo $us['department'];?>" class="form-control" name="department" readonly>
                    </div> 
                  
                  </div>
                  <div class="modal-footer">
                     <div class="form-group">
                        <button type="submit"  class=" addbtn btn btn-primary pull-right">
                            <span class="glyphicon glyphicon-save"></span> Save Changes
                        </button>
                      </div>
                  </div>
                 
              </form>
            </div>
          </div>
        <?php ;}?>
          <!--MODAL END-->