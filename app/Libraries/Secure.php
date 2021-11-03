<?php
    // defined('BASEPATH') or exit('No direct script access allowed');
    
    namespace App\Libraries;

    class Secure {
        
        public function auth($cek='') {
            $result = false;
            $session = \Config\Services::session();
            if ($session->get('logs') != $cek) {
                $session->destroy();
                ?>
                    <script>
                        alert('Silahkan login dahulu!');
                        document.location = '<?=base_url('auth');?>';
                    </script>
                <?php
            } 
        }
    }

?>