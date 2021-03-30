<?php
class Tmhma {
    var $kwd_tmhmatos   ;
    var $onoma_tmhmatos;
    var $kwd_proistamenou ;
    
    public function __construct(){
        $this->kwd_tmhmatos   = -1;
        $this->onoma_tmhmatos = "";
        $this->kwd_proistamenou  = -1;  
    }
    
        function setDb() {
        $DB = new Database();
        $DB->setTmhma($this);
    }
    
     function getDb() {
        $DB = new Database();
        $DB->getTmhma($this);
    }
    
    function updateDb() {
        $DB = new Database();
        $DB->updateTmhma($this);
    }


}//Class Tmhma ends here