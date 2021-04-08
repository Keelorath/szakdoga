<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
   

</head>

<body>
<div>
    <table>
        <tr>
            <td>
                <h2 align="center">Rechnung</h2>
                <hr>
                <table>
                    <tr>
                        <td>
                            <img src="storage/organizations/March2021/logo.jpg" style="width: 100%; max-width: 100px; max-height: 100px" />
                        </td>
                        <td align="left" width="220">
                            {{$orgName}}<br />
                            {{$address}}<br />
                            {{$orgZip}} {{$orgCity}}<br />
                            Tel: {{$phone}} <br />
                            E-mail: {{$email}} <br />
                        </td>
                        <td rowspan="2" style="text-align: left" width="200">
                            <b> {{$partnerName}} </b> <br />
                            {{$partnerAddress}} <br />
                            {{$partnerZip}} {{$partnerCity}}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            Ust-IdNr: {{$orgAFA}} <br />
                            Bank: {{$orgBankName}}  <br />
                            Bank-Kontonummer: {{$bankNumber}} <br />
                            Bankleitzahl: {{$bankAccount}}<br />
                            IBAN: {{$iban}} <br />
                            SWIFT: {{$shift}} <br />
                        </td>
                        <td></td>
                    </tr>
                </table>

                <table border="1" frame="void" rules="rows">
                    <tr style="text-align: left">
                        <td width="100px">Zahlungsart</td>
                        <td colspan="2" width="185px">Datum</td>
                        <td colspan="2" width="185px">Fälligkeitsdatum</td>
                        <td colspan="2" width="185px">Rechnungsnummer</td>
                    </tr>
                    <tr>
                        <td width="100px"><b>Übertrag</b></td>
                        <td colspan="2" width="90px"><b>{{$date}}</b></td>
                        <td colspan="2" width="90px"><b>{{$futureDate}}</b></td>
                        <td colspan="2" width="90px"><b>{{$partnerBAN}}</b></td>
                    </tr>

                    <tr>
                        <td colspan="2" width="100px"><b>Bezeichnung</b></td>
                        <td width="90px"><b>Einheitspreis</b></td>
                        <td width="90px"><b>Menge</b></td>
                        <td width="90px"><b>Netto</b></td>
                        <td width="90px"><b>MwSt %</b></td>
                        <td width="90px"><b>Brutto</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100px"><b>{{$productFirstName}}</b></td>
                        <td width="90px">{{$productFisrtDifference}}</td>
                        <td width="90px">{{$productFirstQuantity}}</td>
                        <td width="90px">{{$productFirstNetto}}</td>
                        <td width="90px">{{$productFirstTax}}</td>
                        <td width="90px">{{$productFirstBrutto}}</td>
                    </tr>
                </table>


                <p></p>

                <table style="margin-left: 350px">
                    <tr>

                        <td width="65" align="left"><b>MwSt %</b></td>
                        <td width="75" align="left"><b>Nettobetrag</b></td>
                        <td width="80" align="left"><b>MwStbetrag</b></td>
                        <td width="40" align="left"><b>Brutto</b><br/></td>
                    </tr>

                    <tr><td colspan="5" align="left"><hr></td></tr>

                    <tr>

                        <td width="55" align="left">{{$productFirstTax}}</td>
                        <td width="65" align="left">{{$productFirstNetto}}</td>
                        <td width="70" align="left">{{$productFirstValue}}</td>
                        <td width="30" align="left">{{$productFirstBrutto}}<br/></td>
                    </tr>

                    <tr><td colspan="5" align="left"><hr></td></tr>


                    <tr>

                        <td width="65" align="left">Summe:</td>
                        <td width="75" align="left">{{$productFirstNetto}}</td>
                        <td width="80" align="left">{{$productFirstValue}}</td>
                        <td width="40" align="left">{{$productFirstBrutto}}<br/></td>
                    </tr>

                    <tr>

                        <td colspan = "2" align="right"><b>Gesamtbetrag:</b></td>
                        <td colspan = "2" align="right"><b>{{$productFirstBrutto}} EUR</b></td>
                    </tr>
                </table>
                <hr>

                <p align="center">Seite 1/1</p>


                <table  style="margin-top: 50px">
                    <tr>
                        <td style="font-size: 1.2em" width="120" align="left">{{$orgName}}</td>
                        <td style="font-size: 1.2em" width="120" align="left"><b>{{$orgName}}</b></td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.2em" width="65" align="left">{{$iban}}</td>
                        <td style="font-size: 1.2em" width="65" align="left"><b>{{$iban}}</b></td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.2em" width="65" align="left">{{$shift}}</td>
                        <td style="font-size: 1.2em" width="65" align="left"><b>{{$shift}}</b></td>
                        <td style="font-size: 1.2em" width="300" align="right"><b>{{$productFirstBrutto}}</b></td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.2em" width="65" align="right"> {{$productFirstBrutto}}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.2em" width="65" align="left">{{$partnerID}}</td>
                        <td style="font-size: 1.2em" width="65" align="left"><b>{{$partnerID}}</b></td>
                    </tr>
                    <tr>
                        <td width="65" align="left"></td>
                        <td style="font-size: 1.2em" width="65" align="left"><b>{{$partnerName}}</b></td>
                    </tr>
                </table>
                <table style=" margin-top: 100px">
                    <tr>
                        <td rowspan="2" style="text-align: left" width="200">
                            <b> {{$partnerName}} </b> <br />
                            {{$partnerAddress}} <br />
                            {{$partnerZip}} {{$partnerCity}}
                        </td>
                    </tr>
                </table>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
