<?php

    class db {
        
        //host
        private $host = 'localhost:3307';

        //user
        private $usuario = 'root';

        //password
        private $senha = '';

        //banco de dados
        private $database = 'twitter_clone';
        
        public function conecta_mysql(){
    
            //cria a conexao
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

            mysqli_set_charset($con, 'utf8');

            //verfica erros de conexao
            if(mysqli_connect_errno()){
                echo 'Erro ao tentar se conectar com o DB MySQL: '.mysqli_connect_error();
            }

            return $con;
        }
    }

?>