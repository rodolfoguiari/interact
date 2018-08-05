<?php
"
CREATE TABLE IF NOT EXISTS empdetalhe (
    cd_codidet int(11) NOT NULL DEFAULT '0',
    cd_empresa int(11) NOT NULL DEFAULT '0',
    ds_txttopo mediumtext NOT NULL,
    ds_txtfina mediumtext NOT NULL,
    ds_curios1 varchar(300) NOT NULL,
    ds_curios2 varchar(300) NOT NULL,
    ds_curios3 varchar(300) NOT NULL,
    ds_curios4 varchar(300) NOT NULL,
    nr_curios1 int(11) NOT NULL,
    nr_curios2 int(11) NOT NULL,
    nr_curios3 int(11) NOT NULL,
    nr_curios4 int(11) NOT NULL,
    ds_imgtopo varchar(200) NOT NULL,
    ds_imgfina varchar(200) NOT NULL,
    PRIMARY KEY (cd_codidet)
);
ALTER TABLE usuario ADD ds_imagens VARCHAR(20) NULL DEFAULT NULL AFTER ds_senhass;
CREATE TABLE IF NOT EXISTS doacoes (
    id_doacoes int(11) NOT NULL AUTO_INCREMENT,
    cd_empresa int(11) NOT NULL,
    cd_entidad int(11) NOT NULL,
    ds_pedidos varchar(900) NOT NULL,
    qt_quantid float NOT NULL,
    ds_statuss varchar(200) NOT NULL,
    dt_inclusa date NOT NULL,
    hr_inclusa time NOT NULL,
    cd_usuario int(11) NOT NULL,
    dt_alterac date DEFAULT NULL,
    hr_alterac time DEFAULT NULL,
    cd_usualte int(11) DEFAULT NULL,
    PRIMARY KEY (id_doacoes),
    UNIQUE KEY id_doacoes (id_doacoes)
);
";
?>