<?php

use App\Models\User;

    function getMacAddress() {
        ob_start();  
   
        //Getting configuration details 
        system('ipconfig /all');  
        
        //Storing output in a variable 
        $configdata=ob_get_contents();  
        
        // Clear the buffer  
        ob_clean();  
        
        //Extract only the physical address or Mac address from the output
        $mac = "Physical";  
        $pmac = strpos($configdata, $mac);
        
        // Get Physical Address  
        $macaddr=substr($configdata,($pmac+36),17);  
        
        //Display Mac Address  
        return $macaddr;
    }

    function checkValidReferer( $referelCode ) {
      
        $user = User::whererefrelCode($referelCode)->first();
        if ($user) {
            return true;
        }
        else {
            return false;
        }
    }