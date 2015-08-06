<?php
class Site_info_model extends Model {

        function __construct($serial='')
        {
                parent::__construct('id', 'site_info'); //primary key, tablename
                $this->rs['id'] = '';
                $this->rs['serial_number'] = $serial; $this->rt['serial_number'] = 'VARCHAR(255) UNIQUE';
                $this->rs['site_name'] = '';
                $this->rs['region_name'] = '';
                $this->rs['school_type'] = '';
                $this->rs['site_code'] = '';
        // Schema version, increment when creating a db migration
        $this->schema_version = 0;
        
        		// Add indexes
				$this->idx[] = array('site_name');
				$this->idx[] = array('region_name');
				$this->idx[] = array('school_type');
				$this->idx[] = array('site_code');
                
                // Create table if it does not exist
                $this->create_table();
                
                if ($serial)
                {
                    $this->retrieve_record($serial);
                }
                
                $this->serial = $serial;
                  
        }
        
        // ------------------------------------------------------------------------

        /**
         * Process data sent by postflight
         *
         * @param string data
         * 
         **/
        function process($data)
        {               
                // Translate network strings to db fields
        $translate = array(
        		'Site_Name = ' => 'site_name',
        		'Region_Name = ' => 'region_name',
        		'School_Type = ' => 'school_type',
                'Site_Code = ' => 'site_code');

//clear any previous data we had
                foreach($translate as $search => $field) {
                        $this->$field = '';
                }
                // Parse data
                foreach(explode("\n", $data) as $line) {
                    // Translate standard entries
                        foreach($translate as $search => $field) {
                            
                            if(strpos($line, $search) === 0) {
                                    
                                    $value = substr($line, strlen($search));
                                    
                                    $this->$field = $value;
                                    break;
                            }
                        } 
                    
                } //end foreach explode lines
                $this->save();
        }
}
