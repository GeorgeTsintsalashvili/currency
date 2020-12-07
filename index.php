
<!doctype html>

<html>

<head>

 <title> Currency Calculator </title>
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <meta charset="utf-8"/>

</head>

<body>

<section id="header">
 <div class="container">
   <div class="row">
    <h1 class="pb20 pt20">EXCHANGE RATES</h1>
   </div>
  </div>
</section>

<section id="content" class="mt50">

 <div class="container">
   <div class="row">
     <div id="exchange-rates">

         <div id="navigation">

           <div class="row pd0">

             <div class="col-3">
               <span class="switch active">
                 <a href="#calculator">Currency Calculator</a>
               </span>
             </div>

             <div class="col-3">
               <span class="switch">
                 <a href="#history">Rate History</a>
               </span>
             </div>

             <div class="col-3">
               <span class="switch">
                 <a href="#currencies">Available Currencies</a>
               </span>
             </div>

          </div>

        </div>

          <div id="tab-content" class="pt30 pb30">

             <div class="tab-pane active" id="calculator">

              <div class="row">

               <div class="col-4">
                 <div class="input-container">
                   <input type="text" placeholder="Enter Amount" id="amount">
                 </div>
               </div>

               <div class="col-2"> &nbsp; </div>

               <div class="col-4">
                 <div id="output">
                   0.00
                 </div>
               </div>

              </div>

              <div class="row mt30">

               <div class="col-4">
                 <div class="input-container">
                   <select id="from">
                    <option value="GBP">GBP (Pound sterling)</option>
                    <option value="EUR">EUR (European euro)</option>
                    <option value="USD" selected>USD (United States dollar)</option>
                    <option value="RUB">RUB (Russian ruble)</option>
                    <option value="CAD">CAD (Canadian dollar)</option>
                    <option value="HKD">HKD (Hong Kong dollar)</option>
                    <option value="ISK">ISK (Icelandic krona)</option>
                    <option value="PHP">PHP (Philippine peso)</option>
                    <option value="DKK">DKK (Danish krone)</option>
                    <option value="HUF">HUF (Hungarian forint)</option>
                    <option value="CZK">CZK (Czech koruna)</option>
                    <option value="RON">RON (Romanian leu)</option>
                    <option value="SEK">SEK (Swedish krona)</option>
                    <option value="IDR">IDR (Indonesian rupiah)</option>
                    <option value="INR">INR (Indian rupee)</option>
                    <option value="BRL">BRL (Brazilian real)</option>
                    <option value="HRK">HRK (Croatian kuna)</option>
                    <option value="JPY">JPY (Japanese yen)</option>
                    <option value="THB">THB (Thai baht)</option>
                    <option value="CHF">CHF (Swiss franc)</option>
                    <option value="MYR">MYR (Malaysian ringgit)</option>
                    <option value="BGN">BGN (Bulgarian lev)</option>
                    <option value="TRY">TRY (Turkish lira)</option>
                    <option value="CNY">CNY (Chinese Yuan Renminbi)</option>
                    <option value="NOK">NOK (Norwegian krone)</option>
                    <option value="NZD">NZD (New Zealand dollar)</option>
                    <option value="ZAR">ZAR (South African rand)</option>
                    <option value="MXN">MXN (Mexican peso)</option>
                    <option value="SGD">SGD (Singapore dollar)</option>
                    <option value="AUD">AUD (Australian dollar)</option>
                    <option value="ILS">ILS (Israeli new shekel)</option>
                    <option value="KRW">KRW (South Korean won)</option>
                    <option value="PLN">PLN (Polish zloty)</option>
                   </select>
                 </div>
               </div>

               <div class="col-2">
                 <img src="images/invert.png" id="invert-button">
               </div>

               <div class="col-4">

                 <div class="input-container">
                   <select id="to">
                    <option value="GBP" selected>GBP (Pound sterling)</option>
                    <option value="EUR">EUR (European euro)</option>
                    <option value="USD">USD (United States dollar)</option>
                    <option value="RUB">RUB (Russian ruble)</option>
                    <option value="CAD">CAD (Canadian dollar)</option>
                    <option value="HKD">HKD (Hong Kong dollar)</option>
                    <option value="ISK">ISK (Icelandic krona)</option>
                    <option value="PHP">PHP (Philippine peso)</option>
                    <option value="DKK">DKK (Danish krone)</option>
                    <option value="HUF">HUF (Hungarian forint)</option>
                    <option value="CZK">CZK (Czech koruna)</option>
                    <option value="RON">RON (Romanian leu)</option>
                    <option value="SEK">SEK (Swedish krona)</option>
                    <option value="IDR">IDR (Indonesian rupiah)</option>
                    <option value="INR">INR (Indian rupee)</option>
                    <option value="BRL">BRL (Brazilian real)</option>
                    <option value="HRK">HRK (Croatian kuna)</option>
                    <option value="JPY">JPY (Japanese yen)</option>
                    <option value="THB">THB (Thai baht)</option>
                    <option value="CHF">CHF (Swiss franc)</option>
                    <option value="MYR">MYR (Malaysian ringgit)</option>
                    <option value="BGN">BGN (Bulgarian lev)</option>
                    <option value="TRY">TRY (Turkish lira)</option>
                    <option value="CNY">CNY (Chinese Yuan Renminbi)</option>
                    <option value="NOK">NOK (Norwegian krone)</option>
                    <option value="NZD">NZD (New Zealand dollar)</option>
                    <option value="ZAR">ZAR (South African rand)</option>
                    <option value="MXN">MXN (Mexican peso)</option>
                    <option value="SGD">SGD (Singapore dollar)</option>
                    <option value="AUD">AUD (Australian dollar)</option>
                    <option value="ILS">ILS (Israeli new shekel)</option>
                    <option value="KRW">KRW (South Korean won)</option>
                    <option value="PLN">PLN (Polish zloty)</option>
                   </select>
                 </div>

               </div>

              </div>

             </div>

             <div class="tab-pane" id="history">
              <div class="row">
                <div id="history-list-container">
                  <ul id="history-list">
                  </ul>

                  <div class="col-2">
                    <span id="items-label"> Items to view </span>
                  </div>

                  <div class="input-container col-2">
                   <input type="number" value="10" id="records-num-to-view">
                  </div>
                </div>
              </div>
             </div>

          <div class="tab-pane" id="currencies">
            <div class="row">
              <div id="currencies-container">

                <div class="col-3">
                  <div class="image"> <img src="images/GBP.PNG"> <span> GBP (Pound sterling) </span> </div>
                  <div class="image"> <img src="images/EUR.PNG"> <span> EUR (European euro) </span> </div>
                  <div class="image"> <img src="images/USD.PNG"> <span> USD (United States dollar) </span> </div>
                  <div class="image"> <img src="images/RUB.PNG"> <span> RUB (Russian ruble) </span> </div>
                  <div class="image"> <img src="images/CAD.PNG"> <span> CAD (Canadian dollar) </span> </div>
                  <div class="image"> <img src="images/HKD.PNG"> <span> HKD (Hong Kong dollar) </span> </div>
                  <div class="image"> <img src="images/ISK.PNG"> <span> ISK (Icelandic krona) </span> </div>
                  <div class="image"> <img src="images/PHP.PNG"> <span> PHP (Philippine peso) </span> </div>
                  <div class="image"> <img src="images/DKK.PNG"> <span> DKK (Danish krone) </span> </div>
                  <div class="image"> <img src="images/HUF.PNG"> <span> HUF (Hungarian forint) </span> </div>
                  <div class="image"> <img src="images/CZK.PNG"> <span> CZK (Czech koruna) </span> </div>
                </div>

                <div class="col-3">
                  <div class="image"> <img src="images/RON.PNG"> <span> RON (Romanian leu) </span> </div>
                  <div class="image"> <img src="images/SEK.PNG"> <span> SEK (Swedish krona) </span> </div>
                  <div class="image"> <img src="images/IDR.PNG"> <span> IDR (Indonesian rupiah) </span> </div>
                  <div class="image"> <img src="images/INR.PNG"> <span> INR (Indian rupee) </span> </div>
                  <div class="image"> <img src="images/BRL.PNG"> <span> BRL (Brazilian real) </span> </div>
                  <div class="image"> <img src="images/HRK.PNG"> <span> HRK (Croatian kuna) </span> </div>
                  <div class="image"> <img src="images/JPY.PNG"> <span> JPY (Japanese yen) </span> </div>
                  <div class="image"> <img src="images/THB.PNG"> <span> THB (Thai baht) </span> </div>
                  <div class="image"> <img src="images/CHF.PNG"> <span> CHF (Swiss franc) </span> </div>
                  <div class="image"> <img src="images/MYR.PNG"> <span> MYR (Malaysian ringgit) </span> </div>
                  <div class="image"> <img src="images/BGN.PNG"> <span> BGN (Bulgarian lev) </span> </div>
                </div>

                <div class="col-3">
                  <div class="image"> <img src="images/TRY.PNG"> <span> TRY (Turkish lira) </span> </div>
                  <div class="image"> <img src="images/CNY.PNG"> <span> CNY (Chinese Yuan Renminbi) </span> </div>
                  <div class="image"> <img src="images/NOK.PNG"> <span> NOK (Norwegian krone) </span> </div>
                  <div class="image"> <img src="images/NZD.PNG"> <span> NZD (New Zealand dollar) </span> </div>
                  <div class="image"> <img src="images/ZAR.PNG"> <span> ZAR (South African rand) </span> </div>
                  <div class="image"> <img src="images/MXN.PNG"> <span> MXN (Mexican peso) </span> </div>
                  <div class="image"> <img src="images/SGD.PNG"> <span> SGD (Singapore dollar) </span> </div>
                  <div class="image"> <img src="images/AUD.PNG"> <span> AUD (Australian dollar) </span> </div>
                  <div class="image"> <img src="images/ILS.PNG"> <span> ILS (Israeli new shekel) </span> </div>
                  <div class="image"> <img src="images/KRW.PNG"> <span> KRW (South Korean won) </span> </div>
                  <div class="image"> <img src="images/PLN.PNG"> <span> PLN (Polish zloty) </span> </div>
                </div>

                </div>
              </div>
             </div>

          </div>

       </div>

     </div>
   </div>
 </div>

</section>

<script type="text/javascript" src="js/logic.js"></script>

</body>

</html>
