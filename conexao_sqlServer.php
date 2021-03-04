<?php
        try
        {
            $servidor = "plesksql0034.admincontrolpanel.com";
            $instancia = "sql2016";
            $porta = 1433;
            $database = "vivaldoesouz_br_vsweb";
            $usuario = "vivaldoesouz_br_vsweb";
            $senha = "zRo182@p&ee@";
            global $conexao;
            $conexao= new PDO( "sqlsrv:Server={$servidor};Database={$database}", $usuario, $senha );
        }
        catch ( PDOException $e )
        {
            //echo "Drivers disponiveis: " . implode( ",", PDO::getAvailableDrivers() );
            //echo "\nErro: " . $e->getMessage();
            exit;
        }
?>