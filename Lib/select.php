<?php
require_once('..\Dao\conexao_sqlServer.php');
//abrimos um contador while para que enquanto houver registros ele continua no loopin
    $pdo = new Conexao();
    $pdo->conectar(); 
    $resultado = $pdo->select("select id, nome from cpessoa");

                                    
    if(count($resultado)){
    foreach ($resultado as $res) {
    ?>                                             
    <option  value="<?php echo $res['id'];?>" ><?php echo $res['nome'];?></option> 
    <?php      
    }
    }
?>
