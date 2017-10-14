<html> 
<head>
  <meta name="viewport" content="width=device-width; initial-scale=1.0" />
  <meta name="author" content="Team Bah" />
  <meta name="description" content="The description of website" />
  <link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('bootstrap/css/profile-design-inside.css'); ?>" rel="stylesheet" />
</head>
<div class="container-default" id="box-wrapper">
  <!-- Navigation -->
  <nav class="navbar1 navbar-fixed-top">
    <div class="container-fluid">
      <!-- Nav header -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>   
		    <img class="pull-left" src="<?php echo base_url('assets/images/doctrack_logo.png');?>" id="logo"/>

        <!-- <a class="navbar-brand" href="#">Document Tracking System</a> -->
        <a class="navbar-brand" href="#myPage" style="font-family: Courgette; font-size:22px; color:#015249 !important;">Document Tracking System</a>
        <!-- <a class="navbar-brand" href="javascript:void(0)" data-target="#myNavbar"><img src="<?php echo base_url('assets/images/logoname2.png'); ?>" alt="Document Tracking System"></a> -->
      </div>
      <div class="collapse navbar-collapse" id="mainNavBar">        
        <ul class="nav navbar-nav navbar-right">
          <!--Nav User Profile -->

          <li class="dropdown notif-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span id="bell" class="glyphicon glyphicon-bell"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="notif-header"><p>Notifications</p></li>
              <li class="notif-body">
                <ul class="notifs">
                  <?php
                  if(isset($notifs)){
                    foreach($notifs as $notif){
                      if($notif['seenFlag']==FALSE){
                        echo '
                        <li>     
                          <a href="';
                          if($notif['notifType'] == 'inbox'){
                            echo base_url('/Notificationpath/notifToInbox/'.$notif['trackcode'].'');
                          }

                        echo '">'.$notif['notifDesc'].'</a>
                        </li>  
                        <hr />';
                      }
                    }
                  }
                  ?>                                           
                </ul>  
              </li>
              <li class="notif-footer"><p>View all</p></li>
            </ul>
          </li>
          <li class="dropdown user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/images/pic.png');?>" class="user-image" alt="User Image" />
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php
                foreach($userdata as $us){             
                  echo '<img src="'.$us['path'].'" class="img-circle" alt="User Image" />
                <p>'.$_SESSION['username'].' 
                  <small>'.$us['position'].'</small>
                </p>';  
                } 
                ?>
              </li>
              <li class="user-body">
                <div>
                  <a href="<?php echo base_url('Account/viewAccount'); ?>" class="btn btn-default pull-left">Account Setting</a>
                  <a href="<?php echo base_url('Access/logOut'); ?>" class="btn btn-default pull-right">Sign Out</a>
                </div>    
              </li>
            </ul>
          </li>
        </ul>
      </div>  
    </div>
  </nav>
</div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
  <div class="container-fluid">
    <div class="row profile">
      <div class="profile-sidebar">
        <div class="profile-user-pic">
          <?php
          foreach($userdata as $us){
          echo '
          <img src="'.$us['path'].'" alt="Profile Picture" class="img-responsive image-circle"/>
        </div>
        <div class="profile-user-title">
          <div class="profile-user-name">'.$us['firstname'].' '.$us['lastname'].'</div>
          <div class="profile-user-position">'.$us['position'].' </div>
          <div class="profile-user-position">'.$us['department'].' </div>
          <div class="profile-user-position">'.$us['collegeId'].' </div>';
        }?>
          <div class="profile-user-menu">
            <div class="profile-user-button">
              <a href="<?php echo base_url('FilesManipulation/sendFile'); ?>" class="Sbtn btn-block" role="button"><span class="glyphicon glyphicon-pencil"></span> COMPOSE </a> 
=======
>>>>>>> cabuang
	<div class="container-fluid">
		<div class="row profile">
			<div class="profile-sidebar">
				<div class="profile-user-pic">
					<img src="<?php echo base_url('assets/images/pic.png');?>" alt="Profile Picture" class="img-responsive image-circle"/>
				</div>
				<div class="profile-user-title">
					<?php
					foreach($userdata as $us){
					echo '
					<div class="profile-user-name">'.$us['full_name'].'</div>
					<div class="profile-user-position">'.$us['position'].' </div>
					<div class="profile-user-position">'.$us['department'].' </div>
					<div class="profile-user-position">'.$us['college_acronym'].' </div>';
				}?>
					<div class="profile-user-menu">
						<div class="profile-user-button">
							<a href="<?php echo base_url('FilesManipulation/do_upload'); ?>" class="Sbtn btn-block" role="button"><span class="glyphicon glyphicon-pencil"></span> COMPOSE </a>	

<<<<<<< HEAD
=======
>>>>>>> master
>>>>>>> cabuang
            </div>  
            <div class="profile-user-menu">
              <ul class="nav">
                <li class="active"><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-stats"></span><span>&nbsp; Document Status </span></a></li>
                <li ><a href="<?php echo base_url('DocumentInbox/viewInbox'); ?>"><span class="glyphicon glyphicon-inbox"></span><span>&nbsp; Inbox </span></a></li>
                <li ><a href="<?php echo base_url('DocumentSent/viewSent'); ?>"><span class="glyphicon glyphicon-folder-open"></span><span>&nbsp; Sent </span></a></li>              
                <li ><a href="<?php echo base_url('DocumentDraft/viewDraft'); ?>"><span class="glyphicon glyphicon-file"></span><span>&nbsp; Drafts </span></a></li>                              
                <li><a href="#"><span class="glyphicon glyphicon-book"></span><span>&nbsp; Guide </span></a></li>            
                <li><a href="<?php echo base_url('Office/viewOffice');?>"><span class="glyphicon glyphicon-map-marker"></span><span>&nbsp; Offices </span></a></li>
            </ul>
          </div>  
        </div>  
      </div>        
    </div>
  </div>    
<script>
  $(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script>