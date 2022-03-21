<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pedido de venda</title>

    <link rel="stylesheet" href="css/styles/pedidos.css" media="all" />

</head>

<body>

    <header class="clearfix">
        <!-- <div id="logo">
        <img src="img/logo.png">
      </div> -->
        <!--    <div id="company" style="font-size: 10px;">
      <h2 class="name"></h2>
        <div><br></div>
        <div></div>
        <div><a href="mailto:geral@uma.co.ao"></a></div>
        <div></div>
        
      </div> -->

        <h2 style="color: gray;">
            <center> <i> PEDIDO DE VENDA </i></center>
        </h2>

        <ul style="list-style: none;">
            <li style="text-align: center;">Cliente</li>
            <li style="text-align: center;">Endereço</li>
            <li style="text-align: center;">Telefone</li>
        </ul>


    </header>
    <!-- <div style="margin-top:-25px">
    <p>hhdhdhdhdhhdhdhd &nbsp;&nbsp;&nbsp;&nbsp;dddddddddddd    <span style="float:right"> fkffkkfkkffgggggggggggggg</span></p>
    <p style="margin-top:-10px">tttttt &nbsp;&nbsp;&nbsp;&nbsp;jjjjjj</p>
    </div> 
    <div style="margin-top:-20px">
    <p>cvvvvvvvvv &nbsp;&nbsp;&nbsp;&nbsp;vvvvvvv    <span style="float:right; border-bottom: solid 1px; font-weight:bold">Parcela Vencimento Valor </span></p>
    <p  style="margin-top:-10px">nnnnnnnnn &nbsp;&nbsp;&nbsp;&nbsp;llllll <span style="float:right;">01    01/03/22  97.10</span></p>
    </div>  -->

    <div style="margin-top:-15px;">
        <table class="tabela">
            <thead>
                <th class="th"> <b>DATA PEDIDO</b>    </th>

                <th></th>
                <th class="th" style="padding-right: 428px!important;"><b>REPRESENTANTE</b></th> 
                <!-- @for($i=0; $i< 71; $i++) 
                &nbsp;
                @endfor --> <!-- th> <b style="text-align:left!important;">015.55456667777</b> </th> -->
                <!--  @for($i=0; $i< 42; $i++) <th></th>@endfor  -->
               <!--  <th class="th" style="text-align: right!important;">5015.554</th> -->
            </thead>
            <tbody>
                <tr>
                    <td class="td">01/03/2022</td>
                    <td></td>
                    <td class="td" style="padding-right:50px!important; white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;">ADEMIR</td>
                </tr>



            </tbody>
        </table>
        <table class="tabela" style="float:right!important;margin-top:-38px!important">
            <thead>
               
              <th> <b style="text-align:left!important;">015.5545</b> </th>
               
            </thead>
            <tbody>
                <tr>
                
                </tr>



            </tbody>
        </table>

    </div>
    <div style="margin-top:5px;">

        <table class="tabela">
            <thead>
                <th class="th" style="text-align: left;"><b>CNPJ</b></th>

                <th></th>
                <th class="th" style="text-align: left;"><b>RAZAO SOCIAL</b></th>


            </thead>
            <tbody>
                <tr>
                    <td class="td" style="padding-right:50px!important;text-align: left; white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;">5555572348962</td>
                    <td></td>
                    <td class="td" style="padding-right:1em!important;text-align: left; white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;"> 2020 - C. SILVA PAULINO</td>

                </tr>



            </tbody>
        </table>


        <table class="tabela" style="float:right!important;margin-top: -35px!important">
            <thead style="border-bottom: 1px solid;">
                <th class="th"><b>Parcela</b></th>

                <th></th>
                <th class="th"><b>Vencimento</b></th>
                <th></th>
                <th class="th"><b>Valor</b></th>


            </thead>
            <tbody>
                <tr>
                    <td class="td" style="text-align: right!important;">01</td>
                    <td></td>
                    <td class="td">01/03/2022</td>
                    <td></td>
                    <td class="td" style="text-align: right!important;">97.10</td>


                </tr>



            </tbody>
        </table>
        <table class="tabela" style="margin-top: 10px!important">
            <thead>
                <th class="th" style="text-align: left;"><b>CNPJ</b></th>

                <th></th>
                <th class="th" style="text-align: left;"><b>RAZAO SOCIAL</b></th>


            </thead>
            <tbody>
                <tr>
                    <td class="td" style="padding-right:50px!important;text-align: left; white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;">5555572348962</td>
                    <td></td>
                    <td class="td" style="padding-right:1em!important;text-align: left; white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;"> 2020 - C. SILVA PAULINO</td>

                </tr>



            </tbody>
        </table>
        <br><br>
        <table class="tabela">
            <thead>
                <th class="th" style="text-align: left;"><b>CIDADE: Bauru</b></th>

                @for($i=0; $i< 29; $i++) <th>
                    </th>@endfor
                    <th class="th" style="text-align: left;"><b>ESTADO: SP</b></th>


            </thead>

        </table>


    </div>




    <!-- <div style="border-bottom: 0px solid black;">


        <div style="text-align: right;font-size:10px;"><i>Ano Lectivo:</i></div>

        <table style="font-size:10px;">
            <thead>
                <tr>
                    <th style="text-align: left;padding: 1px; background-color: lightgray;"><b>Recibo: </b></th>
                    <th style="text-align: right;padding: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="text-align: left;padding: 1px; border-top: solid 1px lightgray;border-left: solid 1px lightgray; border-right: solid 1px lightgray;">Nº </th>
                </tr>

                <tr>
                    <th style="text-align: left;padding: 1px;background-color: lightgray;">Data de Movimento: </th>
                    <th style="text-align: right;padding: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="text-align: left;padding: 1px; border-left: solid 1px lightgray; border-right: solid 1px lightgray;">Nome: </th>
                </tr>

                <tr>
                    <th style="text-align: left;padding: 1px; background-color: lightgray;">Valor Entregue:</th>
                    <th style="text-align: right;padding: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="text-align: left;padding: 1px; border-left: solid 1px lightgray; border-right: solid 1px lightgray;">Curso: </th>
                </tr>

                <tr>
                    <th style="text-align: left;padding: 1px;background-color: lightgray;"> Moeda: KZ <br> Saldo da Conta: <br>

                    </th>
                    <th style="text-align: right;padding: 1px;">&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="text-align: left;padding: 1px;border-bottom: solid 1px lightgray;border-left: solid 1px lightgray; border-right: solid 1px lightgray;"><b>Turno:</b> | <b>Turma:</b> <br><b>Polo:</b> <b>Polo de pag.:</b><span></span></th>
                </tr>


            </thead>

        </table>

    </div> -->

    <table style="font-size: 10px!important;">
        <thead style="border-bottom:2px solid!important">
            <tr style="">
                <th style="  border:solid 1px white; padding: 0px;text-align: left!important;">Código</th>
                <!--th class="wd-40p">Valor</th-->
                <th style="text-align: left!important;font-size:10px; border:solid 1px white; padding: 0px;">Descrição&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="text-align: left!important; ">NCM</th>
                <th style="text-align: right!important;">Qtde.</th>
                <th style="text-align: center!important; ">Unid.</th>
                <th style=" text-align: right!important;">Valor Unit.</th>
                <th style="  text-align: right!important;">Valor Total</th>

            </tr>
        </thead>
        <tbody style="important;border-bottom:2px solid!important">
            @for($i=0; $i< 3; $i++) <tr>
                <td style="text-align: left!important;"> {{++$i}}</td>
                <td style="text-align: left!important;font-size: 11px!important;padding: 20px;">
                    descricao
                </td>



                <td style="text-align: left!important;">00000s0s0s00s0</td>
                <td style="text-align: right!important;">{{number_format(0,2,",",".")}}</td>
                <td style="text-align: center!important;">PCT</td>
                <td style="text-align: right!important;">{{ number_format(0,2,",",".")}}</td>
                <td style="text-align: right!important;">{{ number_format(0,2,",",".")}}</td>

                </tr>
                @endfor
        </tbody>
    </table>

    <table style="margin-right:0px;margin-top:-15px;">
        <thead>
            <tr>
                @for($i=0; $i< 7; $i++) <th>

                    </th>
                    @endfor


                    <th style="text-align:right;padding: 0px;font-size:9px;">Sub Total<br>

                        Desconto<br>
                        Acresc.<br>
                        Icms ST.<br>

                        Total<br>
                        <span>&nbsp;</span>
                    </th>
                    <th style="text-align:right;padding: 0px;font-size:9px;">

                        {{number_format(0,2,",",".")}}<br>
                        {{number_format(0,2,",",".")}}<br>
                        {{number_format(0,2,",",".")}}<br>
                        {{number_format(0,2,",",".")}}<br>

                        {{number_format(0,2,",",".")}}<br>
                        <span>&nbsp;</span>
                    </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:left;padding: 0px;font-size:9px;"> <!-- São extenso --></td>
            </tr>

        </tbody>
    </table>

    <div style="font-size: 10px;">
        <span style="width: 90%; word-break: break-all; float: left;text-justify: distribute-all-lines;"> <!-- Observação: -->
          
        </span>
    </div>

    <footer style="width: 100%; left: -10px; font-size: 10px!important;">
        <!-- Documento processado por computador --></td>

    </footer>

</body>

</html>