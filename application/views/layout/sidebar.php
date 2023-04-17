  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php $l = base_url().'admin/'; ?>

        <li <?php selMenu($menu, 'dashboard'); ?>>
          <a href="<?php echo $l; ?>dashboard"><i class="fas fa-tachometer-alt"></i> <span><?php echo lang('dashboard'); ?></span></a>
        </li>

      

       

        <?php if (allowedTo(array('view_jobs', 'create_jobs', 'view_companies', 'view_departments'))) { ?>
        <li class="header"><?php echo lang('jobs_management'); ?></li>
        <li class="treeview <?php selMenu($menu, array('job', 'jobs', 'companies', 'departments', 'job_filters')); ?>">
          <a href="#">
            <i class="fa fa-suitcase"></i> <span><?php echo lang('jobs'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (allowedTo('create_jobs')) { ?>
            <li <?php selMenu($menu, 'job'); ?>>
              <a href="<?php echo $l; ?>jobs/create-or-edit"><i class="fas fa-cube"></i> <?php echo lang('create'); ?></a>
            </li>
            <?php } ?>
            <?php if (allowedTo('view_jobs')) { ?>
            <li <?php selMenu($menu, 'jobs'); ?>>
              <a href="<?php echo $l; ?>jobs"><i class="fas fa-cube"></i> <?php echo lang('listing'); ?></a>
            </li>
            <?php } ?>
            <?php if (allowedTo('view_departments')) { ?>
            <li <?php selMenu($menu, 'departments'); ?>>
              <a href="<?php echo $l; ?>departments"><i class="fas fa-cube"></i> <?php echo lang('departments'); ?></a>
            </li>
            <?php } ?>
            <?php if (allowedTo('view_job_filters')) { ?>
            <li <?php selMenu($menu, 'job_filters'); ?>>
              <a href="<?php echo $l; ?>job-filters"><i class="fas fa-cube"></i> <?php echo lang('job_filters'); ?></a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        

        <?php if (allowedTo(array('view_team_listing', 'view_candidate_listing'))) { ?>
        <li class="header"><?php echo lang('users_management'); ?></li>
        <?php } ?>

        <?php if (allowedTo('view_team_listing')) { ?>
        <li <?php selMenu($menu, 'team'); ?>>
          <a href="<?php echo $l; ?>users"><i class="fa fa-users"></i> <span><?php echo lang('team'); ?></span></a>
        </li>
        <?php } ?>

        <?php if (allowedTo('view_candidate_listing')) { ?>
        <li <?php selMenu($menu, 'candidates'); ?>>
          <a href="<?php echo $l; ?>candidates"><i class="fa fa-graduation-cap"></i> <span><?php echo lang('candidates'); ?></span></a>
        </li>
        <?php } ?>

        <li class="header"><?php echo lang('others'); ?></li>

       

        <li class="treeview <?php selMenu($menu, array('general_settings', 'api_settings', 'css_settings', 'profile', 'password', 
        'footer_sections', 'languages', 'home_page_settings', 'update_application')); ?>">
          <a href="#">
            <i class="fa fa-cogs"></i> <span><?php echo lang('settings'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (allowedTo('general_settings')) { ?>
            <li <?php selMenu($menu, 'general_settings'); ?>>
              <a href="<?php echo $l; ?>settings/general"><i class="fas fa-cube"></i> <?php echo lang('general_settings'); ?></a>
            </li>
            <?php } ?>
            
            
            <?php if (allowedTo('apis_settings')) { ?>
            <li <?php selMenu($menu, 'api_settings'); ?>>
              <a href="<?php echo $l; ?>settings/apis"><i class="fas fa-cube"></i> <?php echo lang('apis'); ?></a>
            </li>
            <?php } ?>
            
            <?php if (allowedTo('languages_settings')) { ?>
            <li <?php selMenu($menu, 'languages'); ?>>
              <a href="<?php echo $l; ?>languages"><i class="fas fa-cube"></i> <?php echo lang('languages'); ?></a>
            </li>
            <?php } ?>
            <li <?php selMenu($menu, 'profile'); ?>>
              <a href="<?php echo $l; ?>profile"><i class="fas fa-cube"></i> <?php echo lang('profile'); ?></a>
            </li>
            <li <?php selMenu($menu, 'password'); ?>>
              <a href="<?php echo $l; ?>password"><i class="fas fa-cube"></i> <?php echo lang('password'); ?></a>
            </li>
          
          </ul>
        </li>        
        
        


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>