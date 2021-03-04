<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"  type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"  type="text/css" href="../css/tablerecebimento.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <title>Vidaldo&Souza - Login</title>
  </head>
  <body>
     <?php
       require("../estrutura/cabecalho.php");
     ?> 
     <?php
       require("../estrutura/menu.php");
    ?>  
    <?php
        include_once('../../conexao_sqlServer.php');
        $recebimento = $conexao->query("select item, produtoid, produtonome, unidade, quantidade, valorunitario, valortotal, qtdcaixas, lote, destaque  
        from tbrecebimentosnotasprodutos where recebimentoid=".$_GET['id']." and notafiscal='".$_GET['nf']."' order by unidade");
    
    ?>
    <div class="container-fluid mb-12">
        <h4 class="card-title">CLIENTE:<?php echo $_GET['cliente']?> - NOTA:<?php echo $_GET['nf']?> - RECEBIMENTO:<?php echo str_pad($_GET['id'], 6, "0", STR_PAD_LEFT);?>
        P. Bruto:111111 - P. Liquido:0000000 </h4>
        <div class="table-responsive-xl" id="divConteudo">
            <table id="tabela" class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Unidade</th>
                        <th>Quant. Cx NF</th>    
                        <th>Valor Unit.</th>
                        <th>Valor Total</th>
                        <th>Qtd. Caixas</th>
                        <th>Lote</th>
                        <th>Destaque</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th><input type="text" id="txtColuna2"/></th>
                        <th><input type="text" id="txtColuna3"/></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>             
                </thead>
                <tbody>
                <?php
                    if(count($recebimento)){
                        foreach ($recebimento as $receb) {
                            if($receb['destaque']=='    '){
                            ?>                                             
                                <tr>
                                    <td><?php echo $receb['item'] ?></td>
                                    <td><?php echo $receb['produtoid'] ?></td>
                                    <td><?php echo $receb['produtonome'] ?></td>
                                    <td><?php echo $receb['unidade'] ?></td>
                                    <td><?php echo $receb['quantidade'] ?></td>
                                    <td><?php echo "R$".number_format($receb['valorunitario'],2,',','.') ?></td>
                                    <td><?php echo "R$".number_format($receb['valortotal'],2,',','.') ?></td>
                                    <td><?php echo $receb['qtdcaixas'] ?></td>
                                    <td><?php echo $receb['lote'] ?></td>
                                    <td><?php echo $receb['destaque'] ?></td>
                                    <td style="text-align:center"><img src="../images/olho.png" width="20" height="15">&nbsp;&nbsp;<img src="../images/impressora.png" width="20" height="15">&nbsp;&nbsp;<img src="../images/excluir.png" width="20" height="15"></td>
                                </tr>
                            <?php 
                            }else{ ?>
                                 <tr bgcolor="red">
                                    <td><b><?php echo $receb['item'] ?></b></td>
                                    <td><b><?php echo $receb['produtoid'] ?></b></td>
                                    <td><b><?php echo $receb['produtonome'] ?></b></td>
                                    <td><b><?php echo $receb['unidade'] ?></b></td>
                                    <td><b><?php echo $receb['quantidade'] ?></b></td>
                                    <td><b><?php echo "R$".number_format($receb['valorunitario'],2,',','.') ?></b></td>
                                    <td><b><?php echo "R$".number_format($receb['valortotal'],2,',','.') ?></b></td>
                                    <td><b><?php echo $receb['qtdcaixas'] ?></b></td>
                                    <td><b><?php echo $receb['lote'] ?></b></td>
                                    <td><b><?php echo $receb['destaque'] ?></b></td>
                                    <td style="text-align:center"><img src="../images/olho.png" width="20" height="15">&nbsp;&nbsp;<img src="../images/impressora.png" width="20" height="15">&nbsp;&nbsp;<img src="../images/excluir.png" width="20" height="15"></td>
                                </tr>
                            <?php }     
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
     </div>
     
    <?php
         require("../estrutura/radape.php");
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="..\js\filtrotable.js"></script>
    <script src="..\js\jquery.js"></script>
    <script src="..\js\jquery.form.js"></script>
    <script src="..\js\upload.js"></script>
    <script>
       $(document).ready(function(){
            $('#btnEnviar').click(function(){
                window.location.reload();
            });
        });
    </script>
  </body>
</html>