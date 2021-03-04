<?php
/**
   * Rotina de Leitura e Importação da Nota Fiscal
   */
  require_once('../../conexao_sqlServer.php');
  function importarFNe($xml){
    try
    {
        global $totalPesoL;
        global $tPesoL;
        global $totalPesoB;
        global  $tPesoB;
        global $valorTotalNF;
        global $vnf;
        global $qtdcaixas;
        global $qtdcx;
        global $infCpl;
        global $lotenfs;
        global $condpagmento;
        global $countnfs;
        global $nomeCliente;
        global $numNF;
        global $bairro;
        global $cidade;
        global $endrecoconsumidor;
        global $nomefantasiaconsumidor;
        global $numeroenderecoconsumidor;
        global $destinatario_uf;
        global $volumecaixas;
        global $conexao;
        global $count;
        global $countproduto;
        global $unidademedidaid;
        global $destaqueprod;
        //echo $xml->NFe->infNfe->versao;
        /*echo '<table border="1">
                <tr valign="middle">
                    <td><strong>UF</strong></td>
                    <td><strong>NF</strong></td>
                    <td><strong>natOp</strong></td>
                    <td><strong>mod</strong></td>
                    <td><strong>serie</strong></td>
                    <td><strong>nNF</strong></td>
                    <td><strong>dhEmi</strong></td>
                    <td><strong>dhSaiEnt</strong></td>
                    <td><strong>tpNF</strong></td>
                    <td><strong>idDest</strong></td>
                    <td><strong>MunFG</strong></td>
                    <td><strong>tpImp</strong></td>
                    <td><strong>tpEmis</strong></td>
                    <td><strong>DV</strong></td>
                    <td><strong>tpAmb</strong></td>
                    <td><strong>finNFE</strong></td>
                    <td><strong>indFinal</strong></td>
                    <td><strong>indPres</strong></td>
                    <td><strong>procEmi</strong></td>
                    <td><strong>verProc</strong></td>
                </tr>';*/
        foreach($xml->NFe as $key => $item)
        {
            if(isset($item->infNFe))
            {
                /*echo '  <tr>
                            <td>'.$item->infNFe->ide->cUF.'</td>
                            <td>'.$item->infNFe->ide->cNF.'</td>
                            <td>'.$item->infNFe->ide->natOp.'</td>
                            <td>'.$item->infNFe->ide->mod.'</td>
                            <td>'.$item->infNFe->ide->serie.'</td>
                            <td>'.$item->infNFe->ide->nNF.'</td>
                            <td>'.$item->infNFe->ide->dhEmi.'</td>
                            <td>'.$item->infNFe->ide->dhSaiEnt.'</td>
                            <td>'.$item->infNFe->ide->tpNF.'</td>
                            <td>'.$item->infNFe->ide->idDest.'</td>
                            <td>'.$item->infNFe->ide->cMunFG.'</td>
                            <td>'.$item->infNFe->ide->tpImp.'</td>
                            <td>'.$item->infNFe->ide->tpEmis.'</td>
                            <td>'.$item->infNFe->ide->cDV.'</td>
                            <td>'.$item->infNFe->ide->tpAmb.'</td>
                            <td>'.$item->infNFe->ide->finNFe.'</td>
                            <td>'.$item->infNFe->ide->indFinal.'</td>
                            <td>'.$item->infNFe->ide->indPres.'</td>
                            <td>'.$item->infNFe->ide->procEmi.'</td>
                            <td>'.$item->infNFe->ide->verProc.'</td>
                        </tr>
                        ';*/
            }
        }
       echo '</table>';
        echo'<br>';
      /*  echo '<table border="1">
        <tr valign="middle">
            <td><strong>CNPJ</strong></td>
            <td><strong>xNome</strong></td>
            <td><strong>xFant</strong></td>
            <td><strong>xLgr</strong></td>
            <td><strong>nro</strong></td>
            <td><strong>xBairro</strong></td>
            <td><strong>cMun</strong></td>
            <td><strong>xMun</strong></td>
            <td><strong>UF</strong></td>
            <td><strong>CEP</strong></td>
            <td><strong>cPais</strong></td>
            <td><strong>xPais</strong></td>
            <td><strong>fone</strong></td>
            <td><strong>IE</strong></td>
            <td><strong>CRT</strong></td>
        </tr>';*/
        //foreach($object->NFe as $key => $item)
        //{
            if(isset($item->infNFe))
            {
                /*echo '  <tr>
                            <td>'.$item->infNFe->emit->CNPJ.'</td>
                            <td>'.$item->infNFe->emit->xNome.'</td>
                            <td>'.$item->infNFe->emit->xFant.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->xLgr.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->nro.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->xBairro.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->cMun.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->xMun.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->UF.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->CEP.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->cPais.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->xPais.'</td>
                            <td>'.$item->infNFe->emit->enderEmit->fone.'</td>
                            <td>'.$item->infNFe->emit->IE.'</td>
                            <td>'.$item->infNFe->emit->CRT.'</td>
                        </tr>
                        ';*/
            }
        //}   
        /*echo '</table>';
        echo'<br>';
        echo '<table border="1">
        <tr valign="middle">
            <td><strong>CNPJ</strong></td>
            <td><strong>xNome</strong></td>
            <td><strong>xLgr</strong></td>
            <td><strong>nro</strong></td>
            <td><strong>xBairro</strong></td>
            <td><strong>cMun</strong></td>
            <td><strong>xMun</strong></td>
            <td><strong>UF</strong></td>
            <td><strong>CEP</strong></td>
            <td><strong>cPais</strong></td>
            <td><strong>xPais</strong></td>
            <td><strong>fone</strong></td>
            <td><strong>indIEDest</strong></td>
            <td><strong>IE</strong></td>
            <td><strong>email</strong></td>
        </tr>';*/
        //foreach($object->NFe as $key => $item)
        //{
            if(isset($item->infNFe))
            {
               /* echo '  <tr>
                            <td>'.$item->infNFe->dest->CNPJ.'</td>
                            <td>'.$item->infNFe->dest->xNome.'</td>';*/
                            $nomeCliente = $item->infNFe->dest->xNome;
              /*  echo '            
                            <td>'.$item->infNFe->dest->enderDest->xLgr.'</td>';*/
                            $endrecoconsumidor = $item->infNFe->dest->enderDest->xLgr;
              /*  echo '            
                            <td>'.$item->infNFe->dest->enderDest->nro.'</td>';*/
                            $numeroenderecoconsumidor = $item->infNFe->dest->enderDest->nro;
               /* echo '
                            <td>'.$item->infNFe->dest->enderDest->xBairro.'</td>';*/
                            $bairro = $item->infNFe->dest->enderDest->xBairro;
               /* echo '        
                            <td>'.$item->infNFe->dest->enderDest->cMun.'</td>
                            <td>'.$item->infNFe->dest->enderDest->xMun.'</td>';*/
                            $cidade = $item->infNFe->dest->enderDest->xMun;
               /* echo '
                            <td>'.$item->infNFe->dest->enderDest->UF.'</td>';*/

                            $destinatario_uf = $item->infNFe->dest->enderDest->UF;
               /* echo '            
                            <td>'.$item->infNFe->dest->enderDest->CEP.'</td>
                            <td>'.$item->infNFe->dest->enderDest->cPais.'</td>
                            <td>'.$item->infNFe->dest->enderDest->xPais.'</td>
                            <td>'.$item->infNFe->dest->enderDest->fone.'</td>
                            <td>'.$item->infNFe->dest->indIEDest.'</td>
                            <td>'.$item->infNFe->dest->IE.'</td>
                            <td>'.$item->infNFe->dest->email.'</td>
                        </tr>
                '; */
            }
        //}   
        //echo '</table>';
        //echo'<br>';
        /*echo '<table border="1">
        <tr valign="middle">
            <td><strong>CPF</strong></td>
        </tr>';*/
        //foreach($object->NFe as $key => $item)
        //{
            if(isset($item->infNFe))
            {
                /*echo '  <tr>
                            <td>'.$item->infNFe->autXML->CPF.'</td>
                        ';*/
            }
        //}   
       // echo '</table>';
       // echo'<br>';
       
        foreach($xml->NFe as $key => $item)
        {
            if(isset($item->infNFe))
            {
               //LENDO AS INFORMAÇÕES DE Transporte NA NF-e (XML)
                    $semResultado = 0;
                    for ($i=0; $i <=1 ; $i++) { 
                        if(!empty($item->infNFe->transp[$i]->transporta->CNPJ)){
                            $semResultado = 0;
                           // echo "<br><br>Info Transporta:".$i;
                           // echo "<br>modFrete: ".$item->infNFe->transp[$i]->modFrete;
                            //echo "<br>CNPJ: ".$item->infNFe->transp[$i]->transporta->CNPJ;
                           // echo "<br>xNome: ".$item->infNFe->transp[$i]->transporta->xNome;
                            //echo "<br>IE: ".$item->infNFe->transp[$i]->transporta->IE;
                            //echo "<br>xEnder: ".$item->infNFe->transp[$i]->transporta->xEnder;
                            //echo "<br>xMun: ".$item->infNFe->transp[$i]->transporta->xMun;
                            //echo "<br>UF: ".$item->infNFe->transp[$i]->transporta->UF;
                            //echo "<br><br>Info Vol:".$i;
                           // echo "<br>qVol: ".$item->infNFe->transp[$i]->vol->qVol;
                            $qtdcx = $item->infNFe->transp[$i]->vol->qVol;
                            //echo "<br>esp: ".$item->infNFe->transp[$i]->vol->esp;
                            //echo "<br>marca: ".$item->infNFe->transp[$i]->vol->marca;
                            //echo "<br>pesoL: ".$item->infNFe->transp[$i]->vol->pesoL;
                            //echo "<br>pesoB: ".$item->infNFe->transp[$i]->vol->pesoB;
                            $totalPesoL = rtrim($item->infNFe->transp[$i]->vol->pesoL);
                            $totalPesoB = rtrim($item->infNFe->transp[$i]->vol->pesoB);
                            //echo "<br><br>Info Cobrança:".$i;
                            //echo "<br>NF: ".$item->infNFe->cobr[$i]->fat->nFat;
                            $numNF = $item->infNFe->cobr[$i]->fat->nFat;
                            //echo "<br>vOrig: ".$item->infNFe->cobr[$i]->fat->vOrig;
                            //echo "<br>vDesc: ".$item->infNFe->cobr[$i]->fat->vDesc;
                            //echo "<br>vLiq: ".$item->infNFe->cobr[$i]->fat->vLiq;
                            //echo "<br>nDup: ".$item->infNFe->cobr[$i]->dup->nDup;
                            //echo "<br>dVenc: ".$item->infNFe->cobr[$i]->dup->dVenc;
                            //echo "<br>vDup: ".$item->infNFe->cobr[$i]->dup->vDup;
                            //echo "<br><br>Info Pagamento:".$i;
                            //echo "<br>vNF: ".$item->infNFe->total[$i]->ICMSTot->vNF;
                            $vnf = rtrim($item->infNFe->total[$i]->ICMSTot->vNF);
                            //echo "<br>";
                            //echo "<br>infAdFisco: ".$item->infNFe->infAdic->infAdFisco;
                            //echo "<br>infCpl: ".$item->infNFe->infAdic->infCpl;
                            $infCpl = $item->infNFe->infAdic->infCpl;
                        } else {
                            //CONTANDO QUANDO NÃO HOUVER RESULTADOS
                            $semResultado ++;
                        }
    
                        //SE N TIVER RESULTADOS EM SEQUENCIA, PARAR O FOR
                        if($semResultado >= 10){
                            break;
                        }
                    } // FIM DO FOR
            }
        }
        //echo"</br>";
        $infCpl = explode("|", $infCpl);
        //echo print_r($infCpl);
        //echo"</br>";
        $lote = explode(" ",$infCpl[0]);
        
        //print_r($lote);
        for($i=0;$i<sizeof($lote);$i++){
           // echo"</br>";
           // echo "P".$i.":".$lote[$i];
            if(($lote[$i]=='CXS')||($lote[$i]=='CX')){
                $lotenfs = $lote[$i+1];
            }
        }
        if($lotenfs){
            $condpag = explode(":",$infCpl[4]);
            $condpagmento = $condpag[1];
            $nfant = explode(":",$infCpl[3]);
            $nomefantasiaconsumidor = $nfant[1];
        }else{
            $condpag = explode(":",$infCpl[3]);
            $condpagmento = $condpag[1];
            $nfant = explode(":",$infCpl[2]);
            $nomefantasiaconsumidor = $nfant[1];
        }
        global $codigo;
        $countnfs++;
        $item = str_pad($countnfs, 6, "0", STR_PAD_LEFT);
        $dataemissao = date('Y/m/d H:i:s');
        $insertrecebimentonota = "INSERT INTO mrecebimentoprodutonota
        (recebimentoid,item,nomecliente,numeropedido,dataemissao,notafiscal,tipo,valortotal,pesobruto,pesoliquido,pendenciaentrega,linknf,
        datahoraultimaalteracao,usuarioultimalateracaoid,status,datahoraliberacao,usuarioliberacaoid,qtdcaixas,lote,bairro,cidade,enderecoconsumidor,
        nomefantasiaconsumidor,numeroenderecoconsumidor,condicaopagamento,destinatario_uf,volumecaixas)
        VALUES(".$codigo.",'".$item."','".$nomeCliente."','0','".$dataemissao."','".$numNF."',1,'".$vnf."','".$totalPesoB."','".$totalPesoL."','','','',0,1,'',0,".$qtdcx."
        ,'".$lotenfs."','".$bairro."','".$cidade."','".$endrecoconsumidor."','".$nomefantasiaconsumidor."','".$numeroenderecoconsumidor."','".$condpagmento."',
        '".$destinatario_uf."', ".$qtdcx.")";
        echo $insertrecebimentonota;
        echo "</br>";
        $result = $conexao->query($insertrecebimentonota);
        if($result){

        }
        //echo "</br>";
        //echo $insertrecebimentonota;
        //echo "</br>";
        //echo "lotenfs:".$lotenfs;
       // echo "</br>";
        //echo "Condição de pagamento:".$condpagmento;
        $tPesoL=$tPesoL+$totalPesoL;
        $tPesoB=$tPesoB+$totalPesoB;
        $valorTotalNF= $valorTotalNF+$vnf;
        $qtdcaixas = $qtdcaixas+$qtdcx;
       // echo "Valor Nota Fiscal: ".$vnf;
        foreach($xml->NFe as $key => $item)
        {
            if(isset($item->infNFe))
            {
               //LENDO AS INFORMAÇÕES DE Transporte NA NF-e (XML)
                    $semResultado = 0;
                    for ($i=0; $i <=1000 ; $i++) { 
                        if(!empty($item->infNFe->total[$i]->ICMSTot->vNF)){
                            $semResultado = 0;
                            //echo "<br><br>Total:".$i;
                            //echo "<br>vBC: ".$item->infNFe->total[$i]->ICMSTot->vBC;
                            
                           
                        } else {
                            //CONTANDO QUANDO NÃO HOUVER RESULTADOS
                            $semResultado ++;
                        }
    
                        //SE N TIVER RESULTADOS EM SEQUENCIA, PARAR O FOR
                        if($semResultado >= 10){
                            break;
                        }
                    } // FIM DO FOR
            }
        }   
       /* echo '<table border="1">
        <tr valign="middle">
            <td><strong>NFE</strong></td>
        </tr>';*/
     
        foreach($xml->protNFe as $key => $info)
        {
        if(isset($info->infProt))
        {
           /* echo '  <tr>
                        <td>'.$info->infProt->chNFe.'</td>
                       
                    </tr>
                    ';*/
        }
        }
       // echo '</table>';
       foreach($xml->NFe as $key => $item)
       {
           if(isset($item->infNFe))
           {
              //LENDO AS INFORMAÇÕES DE PRODUTOS NA NF-e (XML)
                   $semResultado = 0;
                   $countproduto = 0;
                   for ($i=0; $i <=100 ; $i++) { 
                       if(!empty($item->infNFe->det[$i]->prod->cProd)){
                           $semResultado = 0;
                          // echo "<br><br>Info do produto:".$i;
                          // echo "<br>Código: ".$item->infNFe->det[$i]->prod->cProd;
                          // echo "<br>cEAN: ".$item->infNFe->det[$i]->prod->cEAN;
                          // echo "<br>Nome: ".$item->infNFe->det[$i]->prod->xProd;
                          // echo "<br>NCM: ".$item->infNFe->det[$i]->prod->NCM;
                          // echo "<br>CFOP: ".$item->infNFe->det[$i]->prod->CFOP;
                          // echo "<br>uCom: ".$item->infNFe->det[$i]->prod->uCom;
                          // echo "<br>qCom: ".$item->infNFe->det[$i]->prod->qCom;
                          // echo "<br>vUnCom: ".$item->infNFe->det[$i]->prod->vUnCom;
                          // echo "<br>vProd: ".$item->infNFe->det[$i]->prod->vProd;
                          // echo "<br>cEANTrib: ".$item->infNFe->det[$i]->prod->cEANTrib;
                          // echo "<br>uTrib: ".$item->infNFe->det[$i]->prod->uTrib;
                          // echo "<br>qTrib: ".$item->infNFe->det[$i]->prod->vProd;
                          // echo "<br>vUnTrib: ".$item->infNFe->det[$i]->prod->vUnTrib;
                          // echo "<br>indTot: ".$item->infNFe->det[$i]->prod->indTot;
                          // echo "<br>xPed: ".$item->infNFe->det[$i]->prod->xPed;
                          // echo "<br>nItemPed: ".$item->infNFe->det[$i]->prod->nItemPed;
                          // echo "<br><br>Imposto por Produto: ICMS";
                          // echo "<br>orig: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->orig;
                          // echo "<br>CST: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->CST;
                          // echo "<br>modBC: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->modBC;
                          // echo "<br>pRedBC: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->pRedBC;
                          // echo "<br>vBC: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->vBC;
                          // echo "<br>pICMS: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->pICMS;
                          // echo "<br>vICMS: ".$item->infNFe->det[$i]->imposto->ICMS->ICMS20->vICMS;
                          // echo "<br><br>Imposto por Produto: PIS";
                          // echo "<br>CST: ".$item->infNFe->det[$i]->imposto->PIS->PISNT->CST;
                          //echo "<br><br>Imposto por Produto: COFINS";
                          // echo "<br>CST: ".$item->infNFe->det[$i]->imposto->COFINS->COFINSNT->CST;
                           $countproduto++;
                           $unidademedidaid=0;
                           $itemprotudo = str_pad($countproduto, 6, "0", STR_PAD_LEFT);
                           if($item->infNFe->det[$i]->prod->uCom =='CX'){
                                $unidademedidaid = 1;
                           }else{
                                $unidademedidaid = 2;
                           }
                           $fatorconversao = $conexao->query("select fatorconversao from cproduto where unidademedidaid= ".$unidademedidaid." and codigocliente = ".$item->infNFe->det[$i]->prod->cProd);
                           $fator = $fatorconversao->fetchColumn();
                           if($fator==0){
                            $qtdcaixasfator = 0.0;   
                            $qtdcaixasfator = $item->infNFe->det[$i]->prod->qCom;
                           }else{
                            //echo "Fator:" .$fator." Quantidade:". $item->infNFe->det[$i]->prod->qCom; 
                            $qtdcaixasfator=0.0;
                            $a=floatval($item->infNFe->det[$i]->prod->qCom);
                            $b = floatval($fator);   
                            $qtdcaixasfator = $a/$b;
                            //echo "Resultado: ".$qtdcaixasfator;
                            //echo "</br>";
                           
                           }
                           
                           $destaque = $conexao->query("select destaque from cproduto where codigocliente = ".$item->infNFe->det[$i]->prod->cProd);
                           $destaqueproduto = $destaque->fetchColumn();
                           $destaqueprod="NULL";
                           if(empty($destaqueproduto)){
                                $destaqueprod = 'NULL';
                           }else{
                                $destaqueprod = $destaqueproduto;
                           }                           
                           $insertProduto = "INSERT INTO tbrecebimentosnotasprodutos(recebimentoid,notafiscal,item,produtoid,produtonome,unidade,unidademedidaid,quantidade,qtdcaixas,valorunitario,
                           valortotal,lote,destaque,datainsert)VALUES(".$codigo.",'".$numNF."','".$itemprotudo."',".$item->infNFe->det[$i]->prod->cProd.",
                           '".$item->infNFe->det[$i]->prod->xProd."','".$item->infNFe->det[$i]->prod->uCom."',".$unidademedidaid.",".$item->infNFe->det[$i]->prod->qCom.",".round($qtdcaixasfator).",".$item->infNFe->det[$i]->prod->vUnCom.",
                           ".$item->infNFe->det[$i]->prod->vProd.",".$lotenfs.",'".$destaqueprod."','".$dataemissao."')"; 
                           echo "</br>";
                           echo $insertProduto;
                           
                           $resultproduto = $conexao->query($insertProduto);
                           if($resultproduto){
                            //echo $i;
                           }else{

                           }
                       } else {
                           //CONTANDO QUANDO NÃO HOUVER RESULTADOS
                           $semResultado ++;
                       }
   
                       //SE N TIVER RESULTADOS EM SEQUENCIA, PARAR O FOR
                       if($semResultado >= 10){
                           break;
                       }
                   } // FIM DO FOR
           }
       }   
       echo'<br>';
     /* foreach($xml->NFe as $key => $item){
           if(isset($item->infNFe))
           {
              //LENDO AS INFORMAÇÕES DE TOTAL DOS PRODUTOS NA NF-e (XML)
                   $semResultado = 0;
                   for ($i=0; $i <=1000 ; $i++) { 
                       if(!empty($item->infNFe->total[$i]->ICMSTot->vBC)){
                           $semResultado = 0;
                           /*echo "<br><br>Info Total:".$i;
                           echo "<br>vBC: ".$item->infNFe->total[$i]->ICMSTot->vBC;
                           echo "<br>vICMS: ".$item->infNFe->total[$i]->ICMSTot->vICMS;
                           echo "<br>vICMSDeson: ".$item->infNFe->total[$i]->ICMSTot->vICMSDeson;
                           echo "<br>vFCP: ".$item->infNFe->total[$i]->ICMSTot->vFCP;
                           echo "<br>vBCST: ".$item->infNFe->total[$i]->ICMSTot->vBCST;
                           echo "<br>vST: ".$item->infNFe->total[$i]->ICMSTot->vST;
                           echo "<br>vFCPST: ".$item->infNFe->total[$i]->ICMSTot->vFCPST;
                           echo "<br>vFCPSTRet: ".$item->infNFe->total[$i]->ICMSTot->vFCPSTRet;
                           echo "<br>vProd: ".$item->infNFe->total[$i]->ICMSTot->vProd;
                           echo "<br>vFrete: ".$item->infNFe->total[$i]->ICMSTot->vFrete;
                           echo "<br>vSeg: ".$item->infNFe->total[$i]->ICMSTot->vSeg;
                           echo "<br>vDesc: ".$item->infNFe->total[$i]->ICMSTot->vDesc;
                           echo "<br>vII: ".$item->infNFe->total[$i]->ICMSTot->vII;
                           echo "<br>vIPI: ".$item->infNFe->total[$i]->ICMSTot->vIPI;
                           echo "<br>vIPIDevol: ".$item->infNFe->total[$i]->ICMSTot->vIPIDevol;
                           echo "<br>vPIS: ".$item->infNFe->total[$i]->ICMSTot->vPIS;
                           echo "<br>vCOFINS: ".$item->infNFe->total[$i]->ICMSTot->vCOFINS;
                           echo "<br>vOutro: ".$item->infNFe->total[$i]->ICMSTot->vOutro;
                           echo "<br>vNF: ".$item->infNFe->total[$i]->ICMSTot->vNF;*/
                      // } else {
                           //CONTANDO QUANDO NÃO HOUVER RESULTADOS
                           $semResultado ++;
                      // }
   
                       //SE N TIVER RESULTADOS EM SEQUENCIA, PARAR O FOR
                      // if($semResultado >= 10){
                           //break;
                      // }
                  // } // FIM DO FOR
           //}
      //}  */ 
       echo'<br>';
       echo'<br>'; 
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
 /**
  * Fim da Rotina de Importação
  */
?>