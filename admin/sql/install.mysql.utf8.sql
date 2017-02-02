DROP TABLE IF EXISTS `#__procSeletivo`;

CREATE TABLE `#__procSeletivo` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200) NOT NULL,
	`status` VARCHAR(11) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

DROP TABLE IF EXISTS `#__curso`;
	
CREATE TABLE `#__curso` (
	`cod_curso`       VARCHAR(20)     NOT NULL,
	`nome_curso` VARCHAR(150) NOT NULL,
	PRIMARY KEY (`cod_curso`)
)
	ENGINE=MyISAM
	DEFAULT CHARSET =utf8;

DROP TABLE IF EXISTS `#__procSeletivoCurso`;

CREATE TABLE `#__procSeletivoCurso` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`processo_seletivo` INT(11)     NOT NULL,
	`cod_curso` VARCHAR(20)     NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`cod_curso`) REFERENCES #__curso(`cod_curso`),
	FOREIGN KEY (`processo_seletivo`) REFERENCES #__procSeletivo(`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
	
DROP TABLE IF EXISTS `#__candidato`;
	
CREATE TABLE `#__candidato` (
	`cpf`       INT(11)     NOT NULL,
	`senha` VARCHAR(10) NOT NULL,
	`nome_completo` VARCHAR(100) NOT NULL,
	`data_nascimento` DATE NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`telefone` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`cpf`)
)
	ENGINE=MyISAM
	DEFAULT CHARSET =utf8;
	
DROP TABLE IF EXISTS `#__inscricao`;

CREATE TABLE `#__inscricao` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`candidato` INT(11)     NOT NULL,
	`processo_seletivo_curso` INT(11)     NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`candidato`) REFERENCES #__candidato(`cpf`),
	FOREIGN KEY (`processo_seletivo_curso`) REFERENCES #__procSeletivoCurso(`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;


INSERT INTO `#__curso` (`cod_curso`, `nome_curso`) VALUES
('GP01', 'ESPECIALIZAÇÃO LATO SENSU EM EaD EM GESTÃO PÚBLICA - Araguaína'),
('GS01', 'ESPECIALIZAÇÃO LATO SENSUEM EaD EM GESTÃO PÚBLICA EM SAÚDE - Araguaína'),
('GPM01', 'ESPECIALIZAÇÃO LATO SENSU EM EaD EM GESTÃO PÚBLICA MUNICIPAL - Cristalândia'),
('GS02', 'ESPECIALIZAÇÃO LATO SENSUEM EaD EM GESTÃO PÚBLICA EM SAÚDE - Gurupi'),
('GP02', 'ESPECIALIZAÇÃO LATO SENSUEM EaD EM GESTÃO PÚBLICA - Palmas'),
('GPM02', 'ESPECIALIZAÇÃO LATO SENSUEM EaD EM GESTÃO PÚBLICA MUNICIPAL - Palmas'),
('GS03', 'ESPECIALIZAÇÃO LATO SENSUEM EaD EM GESTÃO PÚBLICA EM SAÚDE - Palmas')
;

INSERT INTO `#__procSeletivo` (`nome`, `status`) VALUES
('ESPECIALIZAÇÕES EAD 2017/1', 'aberto');
;

;