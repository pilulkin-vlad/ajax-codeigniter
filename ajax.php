<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public $data = array();
    public $type = '';
    public $dtsn;
    
    // init postdata
    public function __construct() {
        parent::__construct();
        $this->get_ajax_data();   // load ajax data
        $this->prove_ajax_data(); // prove ajax data
    }
    
    public function index() {
        $this->parse_type();
    }
    
    private function parse_type(){
        switch($this->type){
            
            //------------------------------------------
            //------------------------------------------
            //--- processing depending on the type of --
            
            case 'type1': //demo
                
                echo json_encode($this->dtsn); // return data if type1
                
                break;
            case 'type2': //demo
                
                echo json_encode($this->dtsn); // return data if type2
                
                break;
            case 'type3': //demo
                
                echo json_encode($this->dtsn); // return data if type3
                
                break;
            
            //--- processing depending on the type of --
            //------------------------------------------
            //------------------------------------------
            
            default :
                echo json_encode($this->dtsn); // return send data
                break;
        }
        exit();
    }
    
    private function get_ajax_data(){
        $this->data = $this->input->post();
    }
    
    private function prove_ajax_data(){
        if((!empty($this->data))&&(isset($this->data['type']))&&(isset($this->data['data']))){
            if(!is_string($this->data['type'])){
                $this->log_mess('error_type_send');
            } else {
                $this->type = $this->data['type'];
                if(!empty($this->data['data'])){
                    $this->dtsn = $this->data['data'];
                } else {
                    $this->log_mess('error_empty_data');
                }
            }
        } else {
            $this->log_mess('error_isset_send');
        }
    }
    
    private function log_mess($l){
        echo $l;
        exit();
    }
    
}
