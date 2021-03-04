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

        $resultado = $conexao->query("select id, nome from cpessoa");
        $recebimento = $conexao->query("select r.id as id, r.codigo as codigo, p.nome as nome, r.descricao as descricao, r.datasaida as datasaida, r.pesobrutototal as pesobruto,
         r.pesoliquidototal as pesoliquido, r.totalnfs as totalnfs, r.qtdnfs as qtdnfs, r.qtdcaixas as qtdcaixas 
        from tbRecebimentos r, cpessoa p 
        where r.clienteid=p.id and r.status=1")
    
    ?>
    <div class="container-fluid mb-12">
        <h3 class="card-title">Painel de Recebimento</h3>
        <div class="table-responsive-xl" id="divConteudo">
            <button type="button" class="btn btn-outline-info btn-sm" id="botao" data-toggle="modal" data-target="#modalExemplo">Novo Recebimento</button>
           
            <table id="tabela" class="table table-striped">
                <thead>
                    <tr>
                        <th>Recebimento</th>
                        <th>Cliente</th>
                        <th>P. Liquido</th>
                        <th>P. Burto</th>
                        <th>Qtd. Caixa(s)</th>
                        <th>Total de NFs</th>
                        <th>Valor Total</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><input type="text" id="txtColuna1"/></th>
                        <th><input type="text" id="txtColuna2"/></th>
                        <th><input type="text" id="txtColuna3"/></th>
                        <th><input type="text" id="txtColuna4"/></th>
                        <th><input type="text" id="txtColuna5"/></th>
                        <th><input type="text" id="txtColuna6"/></th>
                        <th><input type="text" id="txtColuna7"/></th>
                        <th></th>

                    </tr>             
                </thead>
                <tbody>
                <?php
                    if(count($recebimento)){
                        foreach ($recebimento as $receb) {
                            ?>                                             
                                <tr>
                                    <td><?php echo $receb['codigo'] ?></td>
                                    <td><?php echo $receb['nome'] ?></td>
                                    <td><?php echo number_format($receb['pesobruto'],2,',','.')."Kg"?></td>
                                    <td><?php echo number_format($receb['pesoliquido'],2,',','.')."Kg" ?></td>
                                    <td><?php echo $receb['qtdcaixas'] ?></td>
                                    <td><?php echo $receb['qtdnfs'] ?></td>
                                    <td><?php echo "R$".number_format($receb['totalnfs'],2,',','.') ?></td>
                                    <td style="text-align:center"><a href="recebimentonota.php?id=<?php echo $receb['id']?>"><img src="../images/olho.png" width="20" height="15"></a>&nbsp;&nbsp;<img src="../images/impressora.png" width="20" height="15">&nbsp;&nbsp;<img src="../images/excluir.png" width="20" height="15"></td>
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
    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Recebimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="example-form"  action="importacao.php" method="POST" enctype="multipart/form-data">    
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <select name="cliente" class="form-control" id="cliente" value="">
                                <option selected>Selecione o Cliente</option>
                                    <?php
                                        if(count($resultado)){
                                            foreach ($resultado as $res) {
                                                ?>                                             
                                                <option  value="<?php echo $res['id'];?>" ><?php echo $res['nome'];?></option> 
                                                <?php      
                                            }
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Veículo</label>
                            <input name="veiculo" type="text" id="veiculo" class="form-control"
                                placeholder="Placa do Veículo">
                        </div>
                        <div class="form-group">
                            <label>Data Saída</label>
                            <input name="datarecebimento" type="Date" id="datarecebimento" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <input name="descricao" type="text" id="descricao" class="form-control"
                                placeholder="Descrição">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Observação</label>
                                <div id="the-basics">
                                    <textarea name="observacao" id="observacao" type="text"
                                        class="form-control" rows="5"
                                        placeholder="Observação"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label>Notas Fiscais</label>
                            <input name="file[]" type="file" multiple="multiple" id="nfs" class="form-control"
                                placeholder="XML das notas fiscais">
                        </div>
                        <div class="modal-footer">
                            <button  id="btnEnviar" name="btn-cadastrar" class="btn btn-outline-primary ">Cadastrar</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Fim Modal -->
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