<?php
class classPegaId{
    public $ProximoId;
    
    public function PegaUltimoId($campo,$tabela,$empresa = ''){
        
        $query = "SELECT max(".$campo.")+1 AS ProximoId FROM ".$tabela." WHERE 1 = 1";
        
        if(!empty($empresa)){
            $query = $query . " AND cd_empresa = '".$empresa."'";
        }
        
        $sql = mysql_query($query);
        $qr  = mysql_fetch_assoc($sql);
        $this->ProximoId = $qr['ProximoId'];
        
        if($this->ProximoId == null){
            return 1;
        } else {
            return $this->ProximoId;
        }
    }
}
?>
