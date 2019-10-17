<?php $this->load->view('home/header.php'); ?>
<style>
    img.img-app {
        width:100%;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <?php
                $ci = & get_instance();
                $ci->load->model('administration/p_application');
                $tp_application = $ci->p_application;

                $p_application = $tp_application->getHomep_application($this->session->userdata('p_app_user_id'));
        ?>

        <div class="rows">
        <?php foreach($p_application as $module): ?>
            <div class="col-xs-6 col-md-2">
                <div class="portlet box green-jungle">
                    <div class="portlet-title">
                        <div class="caption">
                            <span style="font-size:13px;"><?php echo ucwords(strtolower($module['code'])); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <a href="<?php echo base_url().'panel?p_application_id='.$module['p_application_id'];?>">
                            <img class="img-app" src="<?php echo $module['module_icon']; ?>">
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>

    </div>
</div>
<?php $this->load->view('home/footer.php'); ?>