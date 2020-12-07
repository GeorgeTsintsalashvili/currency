
// navigation control

let switches = document.querySelectorAll(".switch a");
let tabPanes = document.querySelectorAll("#tab-content .tab-pane");

switches.forEach((item, index) => {

    item.addEventListener("click", function(e){

        e.preventDefault();

        let tabPaneId = this.href.split("#")[1];

        switches.forEach((element) => {

            element.parentElement.classList.remove("active");
        });

        this.parentElement.classList.add("active");

        tabPanes.forEach((element) => {

            element.classList.remove("active");
        });

        document.getElementById(tabPaneId).classList.add("active");
    });
});

// call service

let waitingForResponse = false;
let output = document.getElementById("output");

function callService(address, parameters)
{
  if(!waitingForResponse)
  {
    let queryString = Object.keys(parameters).map(key => key + "=" + parameters[key]).join("&");

    address += "?" + queryString;

    address = encodeURI(address);

    waitingForResponse = true;

    let xhttp = new XMLHttpRequest();

    xhttp.addEventListener("readystatechange", function(){

        if(this.readyState == 4 && this.status == 200)
        {
          let data = JSON.parse(this.responseText);

          if(data["rate"])
          {
            output.innerText = Number.parseFloat(data["rate"]).toPrecision(6);

            let date = new Date();
            let year = date.getFullYear();
            let month = date.getMonth() + 1;
            let dayOfMonth = date.getDate();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();

            let dateStr = year + "-" + (month < 10 ? "0" + month : month) + "-" + (dayOfMonth < 10 ? "0" + dayOfMonth : dayOfMonth);
            let timeStr = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);

            let requestDateTime = dateStr + " " + timeStr;
            let requestsHistoryStorage = window.localStorage.getItem("requestsHistory");

            let record = new Object();

            record.from = data["from"];
            record.to = data["to"];
            record.unitRate = data["unitRate"];
            record.dateTime = requestDateTime;

            if(requestsHistoryStorage)
            {
              let history = JSON.parse(requestsHistoryStorage);

              history.rates.unshift(record);

              window.localStorage.setItem("requestsHistory", JSON.stringify(history));
            }

            else
            {
              let storage = new Object();

              storage.rates = [record];

              window.localStorage.setItem("requestsHistory", JSON.stringify(storage));
            }

            displayHistory();

            waitingForResponse = false;
          }
        }
    });

    xhttp.open("GET", address, true);

    xhttp.send();
  }
}

// control invert

function invertHandler()
{
    let amount = Number.parseFloat(document.getElementById("amount").value);
    let fromCurrency = document.getElementById("from");
    let toCurrency = document.getElementById("to");

    let fromValue = fromCurrency.value;
    let toValue = toCurrency.value;

    fromCurrency.value = toValue;
    toCurrency.value = fromValue;

    if(amount)
    {
      let parameters = new Object();

      parameters.from = fromCurrency.value;
      parameters.to = toCurrency.value;
      parameters.amount = amount;

      callService("service.php", parameters);
    }
}

// change handler

function changeHandler()
{
  let amount = Number.parseFloat(document.getElementById("amount").value);
  let fromCurrency = document.getElementById("from");
  let toCurrency = document.getElementById("to");

  if(amount)
  {
    let parameters = new Object();

    parameters.from = fromCurrency.value;
    parameters.to = toCurrency.value;
    parameters.amount = amount;

    callService("service.php", parameters);
  }
}

function displayHistory()
{
  let historyStorage = window.localStorage.getItem("requestsHistory");

  if(historyStorage)
  {
    let ratesHistory = JSON.parse(historyStorage).rates;
    let numOfStoredItems = ratesHistory.length;
    let historyList = document.getElementById("history-list");
    let numOfItemsToView = Number.parseInt(document.getElementById("records-num-to-view").value);

    numOfItemsToView = numOfItemsToView <= numOfStoredItems && numOfItemsToView ? numOfItemsToView : numOfStoredItems;

    historyList.innerHTML = "";

    for(let index = 0; index < numOfItemsToView; index++)
    {
      let listItem = document.createElement("li");
      let historyItem = ratesHistory[index];

      let fromImg = "<img src='images/" + historyItem["from"] + ".PNG" + "'>";
      let toImg = "<img src='images/" + historyItem["to"] + ".PNG" + "'>";
      let fromStr = "<span> 1 </span> " + " <b> " + historyItem["from"] + "</b>";
      let toStr = " <span> = " + historyItem["unitRate"] + "</span> " + " <b>" + historyItem["to"] + "</b>";
      let dateTimeStr = " <span> [" + historyItem["dateTime"] + "]</span> ";

      listItem.innerHTML = fromImg + toImg + fromStr + toStr + dateTimeStr;

      historyList.appendChild(listItem);
    }
  }
}

displayHistory();

// bind handlers

document.getElementById("invert-button").addEventListener("click", invertHandler);
document.getElementById("amount").addEventListener("change", changeHandler);
document.getElementById("records-num-to-view").addEventListener("change", displayHistory);

document.querySelectorAll("#from,#to").forEach((element) => {

    element.addEventListener("change", changeHandler);
});
