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
";
?>