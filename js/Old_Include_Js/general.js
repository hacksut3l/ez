function isValidDate(dateStr) {
    var format = 'DMY';

    if (format == null) {
        format = "MDY";
    }
    format = format.toUpperCase();

    if (format.length != 3) {
        format = "MDY";
    }
    if ( (format.indexOf("M") == -1) || (format.indexOf("D") == -1) ||
        (format.indexOf("Y") == -1) ) {
        format = "MDY";
    }
    if (format.substring(0, 1) == "Y") { // If the year is first
        var reg1 = /^\d{2}(\-|\/|\.)\d{1,2}\1\d{1,2}$/
        var reg2 = /^\d{4}(\-|\/|\.)\d{1,2}\1\d{1,2}$/
    } else if (format.substring(1, 2) == "Y") { // If the year is second
        var reg1 = /^\d{1,2}(\-|\/|\.)\d{2}\1\d{1,2}$/
        var reg2 = /^\d{1,2}(\-|\/|\.)\d{4}\1\d{1,2}$/
    } else { // The year must be third
        var reg1 = /^\d{1,2}(\-|\/|\.)\d{1,2}\1\d{2}$/
        var reg2 = /^\d{1,2}(\-|\/|\.)\d{1,2}\1\d{4}$/
    }
    // If it doesn't conform to the right format (with either a 2 digit year or 4 digit year), fail
    if ( (reg1.test(dateStr) == false) && (reg2.test(dateStr) == false) ) {
        return false;
    }
    var parts = dateStr.split(RegExp.$1); // Split into 3 parts based on what the divider was
    // Check to see if the 3 parts end up making a valid date
    if (format.substring(0, 1) == "M") {
        var mm = parts[0];
    } else
    if (format.substring(1, 2) == "M") {
        var mm = parts[1];
    } else {
        var mm = parts[2];
    }
    if (format.substring(0, 1) == "D") {
        var dd = parts[0];
    } else
    if (format.substring(1, 2) == "D") {
        var dd = parts[1];
    } else {
        var dd = parts[2];
    }
    if (format.substring(0, 1) == "Y") {
        var yy = parts[0];
    } else
    if (format.substring(1, 2) == "Y") {
        var yy = parts[1];
    } else {
        var yy = parts[2];
    }
    if (parseFloat(yy) <= 50) {
        yy = (parseFloat(yy) + 2000).toString();
    }
    if (parseFloat(yy) <= 99) {
        yy = (parseFloat(yy) + 1900).toString();
    }
    var dt = new Date(parseFloat(yy), parseFloat(mm)-1, parseFloat(dd), 0, 0, 0, 0);
    if (parseFloat(dd) != dt.getDate()) {
        return false;
    }
    if (parseFloat(mm)-1 != dt.getMonth()) {
        return false;
    }
    return true;
}


function strToDate(str, format) {
    yearVal = '';
    monthVal = '';
    dateVal = '';

    if (str.length != format.length) {
        return false;
    }

    for (i=0; i<format.length; i++) {

        ch = format.charAt(i);
        sCh = str.charAt(i);
        if (ch == 'd') {
            dateVal = dateVal.toString()+sCh;
        } else if (ch == 'M') {
            monthVal = monthVal.toString()+sCh;
        } else if (ch == 'y') {
            yearVal = yearVal.toString()+sCh;
        } else {
            if (ch != sCh) {
                return false;
            }
        }
    }
    if ((monthVal < 1) || (monthVal > 12) || (dateVal < 1) || (dateVal > 31)) {
        return false;
    }
    date = new Date(yearVal, monthVal-1, dateVal);

    return date.getTime();
}

function dateComparision(sDate,eDate){

    date1 = sDate;
    date2 = eDate;
    var err = false;


    var format = 'dd-MM-yyyy';
    if (strToDate(date1, format) > strToDate(date2, format)) {
        err = true;
    }
    return err;

}

function selectallchk(){

                var objform = document.forms[0].elements;
                var selectallcheckbox = document.getElementById('selectall');



                for(var i=0;i<objform.length;i++){
                   //alert(objform[i].type);
                    if(objform[i].type == 'checkbox' && objform[i].name != selectallcheckbox.name ){
                        objform[i].checked = selectallcheckbox.checked;
                    }

                }

}
            
 function isNumberKey(evt)
    {
       
        var charCode = (evt.which) ? evt.which : event.keyCode
         //alert(charCode);
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
            return false;

        return true;
    }
    
    

    
    function getHTTPObject()
{
    var xmlhttp;
    
    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        if (!xmlhttp)
        {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }

    }
    //alert(xmlhttp);
    return xmlhttp;
}
