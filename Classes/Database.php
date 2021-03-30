<?php

class Database
{
    private $host;
    private $database;
    private $user;
    private $pass;
    private $pdo;
    private $opt;

    public function __construct()
    {
        $this->host = "127.0.0.1";
        $this->database = "cloup";
        $this->user = "root";
        $this->pass = "";
    }

    public function connect()
    {
        $this->opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false];
        $conString = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=utf8";
        $this->pdo = new PDO($conString, $this->user, $this->pass, $this->opt);
    }

    public function execute($sql, $array)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($array);
        return $stmt;
    }

    function login(&$U)
    {
        $sql = "SELECT `kwd_ergazomenou`, `Eponymo_ergazom`, `Onoma_Ergazom`, `Patronymo_Ergazom`, "
                . "`Fyllo_Ergaz`, `AFM_Ergaz`, `DOB_Ergazom`, `Tel_Ergaz`, "
                . "`Salary_Ergazom`, `Kod_tm_ergazom`, `user_type_ergazom`, `crypto`, `alias` "
                . "FROM `ergazomenos` WHERE ";
        $sql .= " `alias` = ? and `crypto` = ? ;";
        $this->connect();
        $res = $this->execute($sql, [$U->alias, $U->crypto]);
        if ($res->rowCount() == 1) {
            $row = $res->fetch();
            $U->kwd_ergazomenou = $row['kwd_ergazomenou'];
            $U->user_type_ergazom=$row['user_type_ergazom'];


        }
    } //end of login
    
    
    
     public function setErgazomenos($ergazomenos) {
        $this->connect();
        $sql = "INSERT INTO `ergazomenos`(`Eponymo_ergazom`,"
                . " `Onoma_Ergazom`, `Patronymo_Ergazom`, `Fyllo_Ergaz`, `AFM_Ergaz`,"
                . " `DOB_Ergazom`, `Tel_Ergaz`, `Salary_Ergazom`, `Kod_tm_ergazom`, "
                . "`user_type_ergazom`, `alias`, `crypto`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->execute($sql, [$ergazomenos->Eponymo_ergazom,
            $ergazomenos->Onoma_Ergazom,$ergazomenos->Patronymo_Ergazom,
            $ergazomenos->Fyllo_Ergaz,$ergazomenos->AFM_Ergaz,
            $ergazomenos->DOB_Ergazom,$ergazomenos->Tel_Ergaz,
            $ergazomenos->Salary_Ergazom,$ergazomenos->Kod_tm_ergazom,
            $ergazomenos->user_type_ergazom,$ergazomenos->alias,
            $ergazomenos->crypto]);
    }
    

	
	public function setEkpaideysh($degree) {
        $this->connect();
        $sql = "INSERT INTO `ekpaideysh`(`per_ptyxiou`, `vathmos`," 
                ."`date_apokthshs`) VALUES (?,?,?)";
        $this->execute($sql, [$degree->per_ptyxiou,
            $degree->vathmos,$degree->date_apokthshs]);
    }
 
        public function getEkpaideysh(&$degree) {
        $this->connect();
        $res = $this->execute("SELECT `kwd_ptyxio`, `per_ptyxiou`, `vathmos`, `date_apokthshs` "
                . "FROM `ekpaideysh` WHERE kwd_ptyxio = ?", [$degree->kwd_ptyxio]);
        $row = $res->fetch();
        $degree->kwd_ptyxio = $row['kwd_ptyxio'];
        $degree->per_ptyxiou = $row['per_ptyxiou'];
        $degree->vathmos = $row['vathmos'];
        $degree->date_apokthshs = $row['date_apokthshs'];
          
    }
    	
	 public function setErgο($ergο) {
        $this->connect();
        $sql = "INSERT INTO `ergo`(`perigrafh_ergou`,`start_date`, `finish_date`) VALUES (?,?,?)";
        $this->execute($sql, [$ergο->perigrafh_ergou, $ergο->start_date, $ergο->finish_date]);
    }
	
	public function  setOxima($oxima){
        $this->connect();
        $sql = "INSERT INTO `oxhma`(`ar_kykloforias`, `xroma_oxhm`, `montelo_oxhm`,"
                . " `marka_oxhm`, `odhgos`) VALUES(?,?,?,?,?) ";
        $this->execute($sql, [$oxima->ar_kykloforias,
            $oxima->xroma_oxhm, $oxima->montelo_oxhm,
            $oxima->marka_oxhm,$oxima->odhgos    
            ]);
    }

    public function setEksartomenos($exartomenos){
        $this->connect();
        $sql = "INSERT INTO `eksartomenos`(`AMKA_eksart`, `Onoma_eksart`,"
                . " `Eponymo_eksart`, `DOB_eksart`, `Fylo_eksart`, "
                . "`kod_prostati`) VALUES(?,?,?,?,?,?) ";
        $this->execute($sql, [
            $exartomenos->AMKA_eksart, $exartomenos->Onoma_eksart,
            $exartomenos->Eponymo_eksart , $exartomenos->DOB_eksart,
            $exartomenos->Fylo_eksart,$exartomenos->kod_prostati
        ]);
    }
    
      public function getErgazomenos(&$ergazomenos) {
        $this->connect();
        $res = $this->execute("SELECT `kwd_ergazomenou`, `Eponymo_ergazom`,"
                . " `Onoma_Ergazom`, `Patronymo_Ergazom`, "
                . "`Fyllo_Ergaz`, `AFM_Ergaz`, `DOB_Ergazom`, `Tel_Ergaz`, "
                . "`Salary_Ergazom`, `Kod_tm_ergazom`, `user_type_ergazom`, `alias` "
                . "FROM `ergazomenos` WHERE kwd_ergazomenou = ?", [$ergazomenos->kwd_ergazomenou]);
        $row = $res->fetch();
        $ergazomenos->kwd_ergazomenou = $row['kwd_ergazomenou'];
        $ergazomenos->Eponymo_ergazom = $row['Eponymo_ergazom'];
        $ergazomenos->Onoma_Ergazom = $row['Onoma_Ergazom'];
        $ergazomenos->Patronymo_Ergazom = $row['Patronymo_Ergazom'];
        $ergazomenos->Fyllo_Ergaz = $row['Fyllo_Ergaz'];
        $ergazomenos->AFM_Ergaz = $row['AFM_Ergaz'];
        $ergazomenos->DOB_Ergazom = $row['DOB_Ergazom'];
        $ergazomenos->Tel_Ergaz = $row['Tel_Ergaz'];
        $ergazomenos->Salary_Ergazom = $row['Salary_Ergazom'];
        $ergazomenos->Kod_tm_ergazom = $row['Kod_tm_ergazom'];
        $ergazomenos->user_type_ergazom = $row['user_type_ergazom'];
        $ergazomenos->alias = $row['alias'];
        
        
    }
      
    
    public function getErgο(&$ergo) {
        $this->connect();
        $res = $this->execute("SELECT `kwd_ergou`, `perigrafh_ergou`,"
                . " `finish_date`, `start_date` FROM `ergo` "
                . "WHERE `kwd_ergou`= ?", [$ergo->kwd_ergou]);
        $row = $res->fetch();
        $ergo->kwd_ergou = $row['kwd_ergou'];
        $ergo->perigrafh_ergou = $row['perigrafh_ergou'];
        $ergo->finish_date = $row['finish_date'];
        $ergo->start_date = $row['start_date'];
          
    }
    
    public function getOxima(&$oxima){
        $this->connect();
        $sql = "SELECT `ar_kykloforias`, `xroma_oxhm`, `montelo_oxhm`, `marka_oxhm`, `odhgos` FROM `oxhma` WHERE ar_kykloforias = ?";
        $res = $this->execute($sql, [$oxima->ar_kykloforias]);
        $row= $res->fetch();
        $oxima->ar_kykloforias = $row["ar_kykloforias"];
        $oxima->xroma_oxhm = $row['xroma_oxhm'];
        $oxima->montelo_oxhm = $row['montelo_oxhm'];
        $oxima->marka_oxhm = $row['marka_oxhm'];
        $oxima->odhgos = $row['odhgos'];
    }
    
         public function updateOxima($oxima) {
        $this->connect();
        $sql = "UPDATE `oxima` SET ";
        $sql .= " `ar_kykloforias` = ?, ";
        $sql .= " `xroma_oxhm` = ? ,";
        $sql .= " `montelo_oxhm` = ?, ";
        $sql .= " `marka_oxhm` = ?, ";
        $sql .= " `odhgos` = ? ";
        $sql .= "WHERE `ar_kykloforias` = ?";
        $this->execute($sql, [$oxima->ar_kykloforias, $oxima->xroma_oxhm,
            $oxima->montelo_oxhm,$oxima->marka_oxhm,$oxima->odhgos,$oxima->ar_kykloforias]);
        
    }
     public function updateErgo($ergo) {
        $this->connect();
        $sql = "UPDATE `ergo` SET ";
        $sql .= " `kwd_ergou` = ?, ";
        $sql .= " `perigrafh_ergou` = ? ,";
        $sql .= " `start_date` = ?, ";
        $sql .= " `finish_date` = ? ";
        $sql .= "WHERE `kwd_ergou` = ?";
        $this->execute($sql, [$ergo->kwd_ergou, $ergo->perigrafh_ergou,
            $ergo->start_date,$ergo->finish_date,$ergo->kwd_ergou]);
        
    }
    
     public function updateTmhma($tmhma) {
        $this->connect();
        $sql = "UPDATE `tmhma` SET ";
        $sql .= " `kwd_tmhmatos` = ?, ";
        $sql .= " `onoma_tmhmatos` = ? ,";
        $sql .= " `kwd_proistamenou` = ? ";
        $sql .= "WHERE `kwd_tmhmatos` = ?";
        $this->execute($sql, [$tmhma->kwd_tmhmatos, $tmhma->onoma_tmhmatos,
            $tmhma->kwd_proistamenou,$tmhma->kwd_tmhmatos]);
        
    }
    
     public function updateEkpaideysh($degree) {
        $this->connect();
        $sql = "UPDATE `ekpaideysh` SET ";
        $sql .= " `kwd_ptyxio` = ?, ";
        $sql .= " `per_ptyxiou` = ? ,";
        $sql .= " `vathmos` = ?, ";
        $sql .= " `date_apokthshs` = ? ";
        $sql .= "WHERE `kwd_ptyxio` = ?";
        $this->execute($sql, [$degree->kwd_ptyxio,
            $degree->per_ptyxiou,$degree->vathmos,$degree->date_apokthshs,$degree->kwd_ptyxio]);
        
    }
    
    public function updateErgazomenos($ergazomenos) {
        $this->connect();
        $sql = "UPDATE `ergazomenos` SET ";
        $sql .= " `kwd_ergazomenou` = ?, ";
        $sql .= " `Eponymo_ergazom` = ? ,";
        $sql .= " `Onoma_Ergazom` = ?, ";
        $sql .= " `Patronymo_Ergazom` = ? ,";
        $sql .= " `Fyllo_Ergaz` = ?, ";
        $sql .= " `AFM_Ergaz` = ? ,";
        $sql .= " `DOB_Ergazom` = ?, ";
        $sql .= " `Tel_Ergaz` = ?, ";
        $sql .= " `Salary_Ergazom` = ? ,";
        $sql .= " `Kod_tm_ergazom` = ? ,";
        $sql .= " `user_type_ergazom` = ?, ";
        $sql .= " `alias` = ? ";
        $sql .= "WHERE `kwd_ergazomenou` = ?";
        $this->execute($sql, [$ergazomenos->kwd_ergazomenou, $ergazomenos->Eponymo_ergazom, $ergazomenos->Onoma_Ergazom, $ergazomenos->Patronymo_Ergazom,$ergazomenos->Fyllo_Ergaz, $ergazomenos->AFM_Ergaz, $ergazomenos->DOB_Ergazom, $ergazomenos->Tel_Ergaz, $ergazomenos->Salary_Ergazom, $ergazomenos->Kod_tm_ergazom, $ergazomenos->user_type_ergazom, $ergazomenos->alias]);
        
    }
    
    public function getTmhmaErgaz($kwd_ergaz){
       $this->connect();
       $sql = "SELECT tmhma.onoma_tmhmatos FROM tmhma JOIN ergazomenos ON ergazomenos.Kod_tm_ergazom = tmhma.kwd_tmhmatos WHERE ergazomenos.kwd_ergazomenou = ?";
       $res = $this->execute($sql, [$kwd_ergaz]);
       $row = $res->fetch();
       return $row['onoma_tmhmatos'];
    }
    
    public function getTmhma($tmhma){
        $this->connect();
        $res = $this->execute("SELECT `kwd_tmhmatos`, `onoma_tmhmatos`,"
                . " `kwd_proistamenou` FROM `tmhma` "
                . "WHERE `kwd_tmhmatos`= ?", [$tmhma->kwd_tmhmatos]);
        $row = $res->fetch();
        $tmhma->kwd_tmhmatos = $row['kwd_tmhmatos'];
        $tmhma->onoma_tmhmatos = $row['onoma_tmhmatos'];
        $tmhma->kwd_proistamenou = $row['kwd_proistamenou'];
    }
    
     public function setTmhma($tmhma) {
        $this->connect();
        $sql = "INSERT INTO `tmhma`(`kwd_tmhmatos`,`onoma_tmhmatos`, `kwd_proistamenou`) VALUES (?,?,?)";
        $this->execute($sql, [$tmhma->kwd_tmhmatos, $tmhma->onoma_tmhmatos, $tmhma->kwd_proistamenou]);
    }
    
    function getAllEksart($kwd_ergaz){
        $sql = "SELECT eksartomenos.AMKA_eksart, eksartomenos.Onoma_eksart, "
                . "eksartomenos.Eponymo_eksart"
                . " FROM eksartomenos JOIN ergazomenos ON eksartomenos.kod_prostati = ergazomenos.kwd_ergazomenou "
                . "WHERE eksartomenos.kod_prostati = ? ;";
        $this->connect();
        $res = $this->execute($sql, [$kwd_ergaz]);
        $rows = $res->fetchAll();
        return $rows;
    }
    

    
    
    
}//end of class Database