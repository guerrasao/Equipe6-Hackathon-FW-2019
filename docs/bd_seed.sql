use bakof;

insert into tipo_usuario(id_tipo_usuario, nome_tipo_usuario) values 
(null,'motorista'),
(null,'cliente'),
(null,'operador'),
(null,'gestor'),
(null,'representante');

insert into endereco(id_endereco, descricao_endereco, logradouro, latitude, longitude, cep, cidade, estado) values 
(null, 'Bakof Matriz Frederico Westphalen - RS', 'Rodovia BR 386 km 35, S/N, Aparecida', '-27.368139', '-53.397159', '98400-000', 'Frederico Westphalen', 'RS'),
(null, 'Bakof Filial Campo Grande - MG', 'Polo empresarial - Av. Jamil Nahas - oeste', '-20.473915', '-54.724626', '79108-680', 'Campo Grande', 'MG'),
(null, 'Bakof Filial Joinville - SC', 'Av. Odilon Aguiar - José Alexandrino Nogueira', '-26.238159', '-48.844815', '89239-250', 'Joinville', 'MG');

insert into usuario (
	id_usuario,
    id_tipo_usuario,
    id_endereco,
    nome,
    email,
    senha,
    cpf,
    cnpj,
    placa_do_veiculo,
    telefone
) values 
(null, 1, 1, 'Dorvalino Bata', 'teste@gmail.com', '123', '704.299.780-81', null, 'JEI-9399', '(55) 12345-6789'),
(null, 2, 1, 'Acqualimp', 'cliente@aqualimp.com.br', '123', null, '60.086.941/0001-11', null, '(55) 12345-6789'),
(null, 3, 1, 'Cora Coralina', 'cora@bakof.com.br', '123', null, null, null, '(55) 12345-6789'),
(null, 4, 1, 'Regerio Maxinio', 'rogerio@bakof.com.br', '123', null, null, null, '(55) 12345-6789'),
(null, 5, 1, 'Mikael Santellano', 'mikael@bakof.com.br', '123', null, '60.086.861/0002-11', null, '(55) 12345-6789');