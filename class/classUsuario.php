<?php
class classUsuario{
    public $cd_usuario;
    public $cd_statuss;
    public $nm_usuario;
    public $ds_enderec;
    public $nr_enderec;
    public $ds_bairros;
    public $nr_cepusua;
    public $cd_paisess;
    public $cd_estados;
    public $sg_estados;
    public $cd_cidades;
    public $nm_cidades;
    public $nr_docucpf;
    public $nr_telefon;
    public $ds_complem;
    public $nr_documrg;
    public $dt_nascime;
    public $ds_emailss;
    public $nr_celular;
    public $cd_operado;
    public $cd_acessos;
    public $ds_senhass;
    public $cd_generos;
    public $ds_sobress;
    public $ds_imagens;
    public $ds_imgrota;
    
    public function SelectUsuario($id_usuario){
        $sql = mysql_query("SELECT usuario.*, estado.sg_estado, cidade.nm_cidade FROM usuario
                            INNER JOIN cidade ON (usuario.cd_cidades = cidade.cd_cidade)
                            INNER JOIN estado ON (usuario.cd_estados = estado.cd_estado)
                            WHERE usuario.cd_usuario = '$id_usuario'");
        while($qr = mysql_fetch_array($sql)){
            $this->cd_usuario = $qr['cd_usuario'];
            $this->cd_statuss = $qr['cd_statuss'];
            $this->nm_usuario = $qr['nm_usuario'];
            $this->ds_enderec = $qr['ds_enderec'];
            $this->nr_enderec = $qr['nr_enderec'];
            $this->ds_bairros = $qr['ds_bairros'];
            $this->nr_cepusua = $qr['nr_cepusua'];
            $this->cd_paisess = $qr['cd_paisess'];
            $this->cd_estados = $qr['cd_estados'];
            $this->sg_estados = $qr['sg_estado'];
            $this->cd_cidades = $qr['cd_cidades'];
            $this->nm_cidades = $qr['nm_cidade'];
            $this->nr_docucpf = $qr['nr_docucpf'];
            $this->nr_telefon = $qr['nr_telefon'];
            $this->ds_complem = $qr['ds_complem'];
            $this->nr_documrg = $qr['nr_documrg'];
            $this->dt_nascime = $qr['dt_nascime'];
            $this->ds_emailss = $qr['ds_emailss'];
            $this->nr_celular = $qr['nr_celular'];
            $this->cd_operado = $qr['cd_operado'];
            $this->cd_acessos = $qr['cd_acessos'];
            $this->ds_senhass = $qr['ds_senhass'];
            $this->cd_generos = $qr['cd_generos'];
            $this->ds_sobress = $qr['ds_sobress'];
            $this->ds_imagens = $qr['ds_imagens'];
        }
        
    }
    
}
?>