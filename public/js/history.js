
var XCharts = [];   //紀錄感測器名稱
var SenID,StartDT,StartD,EndDT,EndD,StartT,EndT,Mod;
var isDone = false;
/*
SenID = "DHT11_THW";
StartT = "2018-08-20T00:00Z";
EndT = "2018-08-20T23:00Z";
Mod = 60;
*/

// google.charts.load('current', {'packages':['corechart','line']});
// google.charts.setOnLoadCallback(drawChart);

function init(){
    var DevID = document.getElementById("DevID").value; //裝置編號
    var Output = document.getElementById("myUrl");
    //抓裝置當中的所有感測器
    
    if(location.search){
        var getVal = location.search;
        SenID = getVal.substr(5,getVal.indexOf("&")-5);
        StartD = getVal.substr(getVal.indexOf("STA_D")+6,10);
        StartT = getVal.substr(getVal.indexOf("STA_T")+6,7);
        EndD = getVal.substr(getVal.indexOf("END_D")+6,10);
        EndT = getVal.substr(getVal.indexOf("END_T")+6,7);
        var getVal1 = getVal.substr(getVal.indexOf("unit")+5);
        var Mod1 = getVal1.split("&");
        Mod = Mod1[0];
        StartDT = UTC_ISO8601(StartD+" "+StartT);
        EndDT = UTC_ISO8601(EndD+" "+EndT);

        
        if(SenID && StartDT && EndDT && Mod) isDone = true;
        else isDone = false;
        //Output.innerHTML = SenID+","+StartDT+","+EndDT+","+Mod[0];
    }
    
    if(isDone){
        var getVal = location.search;
        // SenID = getVal.substr(5,getVal.indexOf("&STA_DT")-5);
        // StartT = UTC_ISO8601(getVal.substr(getVal.indexOf("STA_DT")+7,18));
        // EndT = UTC_ISO8601(getVal.substr(getVal.indexOf("END_DT")+7,18));
        // Mod = getVal.substr(getVal.indexOf("unit")+5,getVal.length);

        var url = "https://iot.cht.com.tw/iot/v1/device/"+DevID+"/sensor/"+SenID+"/rawdata/statistic?start="+StartDT+"&end="+EndDT+"&interval="+Mod+"&raw=false&option=strict";
    
        //抓回來的是Json格式，要去掉"[{"和"}]"
        //Json格式=>[{"id":"A","value":["1"]},{"id":"B","value":["1"]},{"id":"C","value":["0"]}]
        var result = httpGet(url).substring(httpGet(url).indexOf("etl\":")+7,httpGet(url).length-3);
        //再來去除數據中間的"},{"
        var str1 = result.split("},{");

        XCharts.push(['時間','最大值','最小值','平均']);
        for (var i=0;i<str1.length;i++) {
            var sTime = str1[i].substring(9,33);
            var sVal = str1[i].substring(str1[i].indexOf("max")+5);
            var sMax = sVal.substring(0,sVal.indexOf(",")-2);
            var sVal = sVal.substring(sVal.indexOf(",")+7);
            var sMin = sVal.substring(0,sVal.indexOf(",")-2);
            var sVal = sVal.substring(sVal.indexOf(",")+7);
            var sAvg = sVal.substring(0,sVal.indexOf(".")+3);
            var nTime = getLoadTime(sTime);
            var nArr = [nTime,parseInt(sMax),parseInt(sMin),parseInt(sAvg)];
            XCharts.push(nArr); //放置感測器名稱

            //SenVal.push(val);   //放置感測器數值
            //Output.innerHTML += str1[i] + "<br />";
            //Output.innerHTML += nTime + "-" + sMax + "-" + sMin + "-" + sAvg + "<br />";
        }
        //for (var i=0;i<str1.length;i++) Output.innerHTML += XCharts[i]+"<br />";
        //location.search
        //Output.innerHTML = result;

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    }
    
}

function UTC_ISO8601(oDateTime){
    var Output = document.getElementById("myUrl");
    var oDate = oDateTime.substring(0,10);
    var oTime = oDateTime.substring(11,18).split('%3A');
    var otime1 = oTime[0]+":"+oTime[1];
    var nTime = new Date(oDate+" "+otime1);
    var nTime1 = new Date(nTime.setHours(nTime.getHours()));
    var UTC_Time = nTime1.toISOString().substring(0,nTime1.toISOString().length-8)+"Z";

    return UTC_Time;
}

function makeTitle(sID,sSDate,sEDate,sMod){
    var SenName,DT,Unit;

    if(sID == "DHT11_Temp") SenName = "溫度";
    else if(sID == "DHT11_Hum") SenName = "濕度";
    else if(sID == "DHT11_THW") SenName = "體感溫度";
    else if(sID == "MQ9_Gas") SenName = "瓦斯濃度";

    if(sSDate == sEDate) DT = sSDate;
    else if(sSDate < sEDate) DT = sSDate+"-"+sEDate;
    else DT = sEDate;

    if(sMod == "1") Unit = "每分鐘";
    else if(sMod == "60") Unit = "每小時";
    else if(sMod == "1440") Unit = "每天";
    
    return DT+" "+Unit+"的"+SenName+"紀錄圖表";
}

function drawChart() {

    var data = google.visualization.arrayToDataTable(XCharts);
    
    var options = {
        title: makeTitle(SenID,StartD,EndD,Mod),
        fontSize: 16,
        curveType: 'function',
        legend: { position: 'top' },
        backgroundColor: '#dfffdf',
        hAxis:{title:'時間'},
        fontName: '微軟正黑體',
        width:$(window).width(),
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
}


//依感測器ID查詢數值副程式
function IndexOfVal(Vname){
    var Idx = -1;
    
    if(SenName.length == SenVal.length){
        for(var i=0;i<SenName.length;i++){
            if(SenName[i] == Vname){Idx = SenVal[i];}
        }
    }

    return Idx;
}

//轉換時間副程式
//IOT的時間格式為0000-00-00T00:00:00:0000Z(UTC+0)=>轉換成0000/00/00 00:00:00(UTC+8)
function getLoadTime(Str){
    //var labelText = document.getElementById("demo");
    //var oDatetime = Str.substr(Str.indexOf("time\":")+7,24);
    var nDate = Str.substr(0,10);
    var nTime = Str.substr(Str.indexOf("T")+1,8);
    var nDatetime = new Date(nDate+" "+nTime);
    var rDate = new Date(nDatetime.setHours(nDatetime.getHours() + 8));
    var UTC_Time = rDate.toLocaleDateString()+" "+rDate.toLocaleTimeString('it-IT');
    
    if(Mod == 1 ) UTC_Time = UTC_Time.substring(10,UTC_Time.length-3);
    else if(Mod == 60 ) UTC_Time = UTC_Time.substring(10,12);
    else UTC_Time = UTC_Time.substring(0,10);

    return UTC_Time;
    //return nDatetime;
}

//HTTP Request副程式(GET)
function httpGet(theUrl){
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.setRequestHeader("Content-type", "application/json");
    xmlHttp.setRequestHeader("CK", "PKRCG3C9F5PK3U2C22");
    xmlHttp.send( null );
    return xmlHttp.responseText;
}