<!--My Documents --> 
<style>
.breadcrumb{
  margin-top:10px;
}
.myinbox{
	margin-top: 75px;	
	margin-left: 20%;
	width:79%;
	height:100%;
}
#head{
  border-bottom:solid #015249;
}
.panel-heading h3{
  color:#015249;
}
.panel-heading ol li a span{
  color:#015249;
}
.panel-body form input{
	padding:15px 16px;
	border:1px solid #ccc;
	border-radius:4px;
	font-size:15px;
	color:#aaa;
	font-family: 'Lato', sans-serif;
}
.panel-body form button{
	background:#015249;
	color:#fff;
	width:40px;
}
.panel-body form button:hover{
	background:#A5A5AF;
	color:#222;
}
.searchbar{
	display:inline-flex;
	height: 35px;
}
.search{
	width:400px;
	margin-left: 15px;
}
#collapse a{
	text-decoration: none;
}

</style>	
<div class="myinbox col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Inbox</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Inbox</h3>       
		</div>
		<div class="panel-body">
			<form class="pull-left searchbar" method="POST" action="<?php echo base_url('DocumentInbox/myinbox_view')?>">	
				<input type="text" placeholder=" e.g. 592-***-**" name="search" class="search"/>
				<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
			</form>
		</div>
		<div class="panel-body" id="accordion">	
			<div class="col-md-12">
				<div class="panel-group" id="accordion">
					<?php
					foreach ($documents as $d){
						if($d['receiver']==$_SESSION['username']){
							echo '
							<div class="panel panel-default">	
								<div class="panel-heading text-left">
									<input type="checkbox"><a href="#'.$d['trackcode'].'" data-toggle="collapse" data-parent="accordion">&nbsp;'.$d['trackcode'].'</a><button type="button" class="close" data-dismiss="modal" data-toggle="collapse" data-parent="accordion">&times; </button></div>
						    								    		
								</div>
								<div class="panel collapse collapse " id="'.$d['trackcode'].'">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">							
												<h3 class="text-center">Pending</h3>
								 			   	<button type="button" class="dlbtn btn btn-info">
													<span class="glyphicon glyphicon-download-alt"></span>&nbsp; Download
												</button>
								    			<button type="button" class="updbtn btn btn-info pull-right">
													<span class="glyphicon glyphicon-edit"></span>&nbsp; Update
												</button>
											</div>
											<div class="col-md-7">
											  	<form class="form-horizontal" action="/action_page.php">
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="email">Track Number:</label>
											      		<div class="col-sm-9">
											        		<input type="text" class="form-control" value="'.$d['trackcode'].'" readonly>
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Sender</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['author'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Receiver</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['receiver'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">File name</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['filename'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Description</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['file_desc'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Date and Time:</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['datecreated'].'"readonly="">
											      		</div>
											    	</div>
											  	</form>										
											</div>
										</div>	
									</div>
								</div>	
							';
						}
					}
					?>	
				</div>
			</div>		
		</div>
	</div>			
</div>