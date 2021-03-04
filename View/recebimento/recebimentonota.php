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
        $recebimento = $conexao->query("select m.item, m.nomecliente, m.notafiscal, m.pesoliquido, m.pesobruto, m.valortotal, m.volumecaixas, m.lote, m.condicaopagamento,
        t.tipo as tipo, s.status as status 
        from mrecebimentoprodutonota m, tbstatus s, tbTipos t 
        where s.id=m.status and t.id=m.tipo and recebimentoid=".$_GET['id']);
    
    ?>
    <div class="container-fluid mb-12">
        <h3 class="card-title">Recebimento de Mercadoria</h3>
        <div class="table-responsive-xl" id="divConteudo">
            <table id="tabela" class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Nota</th>
                        <th>Cliente</th>
                        <th>Tipo</th>
                        <th>Status</th>    
                        <th>P. Burto</th>
                        <th>P. Liquido</th>
                        <th>Qtd. Caixa(s)</th>
                        <th>Valor Total</th>
                        <th>Lote</th>
                        <th>Forma de Pagamento</th>
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
                        <th></th>

                    </tr>             
                </thead>
                <tbody>
                <?php
                    if(count($recebimento)){
                        foreach ($recebimento as $receb) {
                            ?>                                             
                                <tr>
                                    <td><?php echo $receb['item'] ?></td>
                                    <td><?php echo $receb['notafiscal'] ?></td>
                                    <td><?php echo $receb['nomecliente'] ?></td>
                                    <td><?php echo $receb['tipo'] ?></td>
                                    <td><?php echo $receb['status'] ?></td>
                                    <td><?php echo number_format($receb['pesobruto'],2,',','.')."Kg"?></td>
                                    <td><?php echo number_format($receb['pesoliquido'],2,',','.')."Kg" ?></td>
                                    <td><?php echo $receb['volumecaixas'] ?></td>
                                    <td><?php echo "R$".number_format($receb['valortotal'],2,',','.') ?></td>
                                    <td><?php echo $receb['lote'] ?></td>
                                    <td><?php echo $receb['condicaopagamento'] ?></td>
                                    <td style="text-align:center"><a href="recebimentonotaproduto.php?id=<?php echo $_GET['id']?>&nf=<?php echo $receb['notafiscal']?>&cliente=<?php echo $receb['nomecliente']?>"><img src="../images/olho.png" width="20" height="15"></a>&nbsp;&nbsp;<img src="../images/impressora.png" width="20" height="15">&nbsp;&nbsp;<img src="../images/excluir.png" width="20" height="15"></td>
                                </tr>
                            <?php      
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