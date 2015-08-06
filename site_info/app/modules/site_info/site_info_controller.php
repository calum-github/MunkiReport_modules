<?php 

/**
 * Site Info module class
 *
 * @package munkireport
 * @author
 **/
class Site_info_controller extends Module_controller
{
        
        /*** Protect methods with auth! ****/
        function __construct()
        {
                // Store module path
                $this->module_path = dirname(__FILE__);
                $this->view_path = $this->module_path . '/views/';
        }

        /**
         * Default method
         *
         * @author Calum Hunter
         **/
        function index()
        {
                echo "You've loaded the site_info module!";
        }
        
        /**
         * Get data for serial
         *
         * Retrieves data for serial number and returns that as JSON
         *
         * @param string serial_number
         **/
        public function get_data($serial_number="")
        {
            $obj = new View();

            if( ! $this->authorized())
            {
                $obj->view('json', array('msg' => 'Not authorized'));
            }

            $site_info = new Site_info_model($serial_number);
            $obj->view('json', array('msg' => $site_info->rs));
        }
        
        /**
         * Show listing
         *
         **/
        function listing()
        {
            if( ! $this->authorized())
            {
                redirect('auth/login');
            }
            
            $data['page'] = '';
            $data['scripts'] = array("clients/client_list.js");
            $obj = new View();
            $obj->view('site_info_listing', $data, $this->view_path);
        }

        /**
         * Get statistics
         *
         * Get statistics grouped by type
         *
         * @param String type group by region_name or site_name
         **/
        public function get_groups($type='')
        {
            $obj = new View();

            if( ! $this->authorized())
            {
                $obj->view('json', array('msg' => 'Not authorized'));
                return;
            }

            $site_info = new Site_info_model;
            $obj->view('json', array('msg' => $site_info->get_groups($type)));
        }
        
} // END class default_module


