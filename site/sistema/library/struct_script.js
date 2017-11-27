

// -------------------------------------------------------------------------
//  Name: SelectOptionInList
//  Abstract: Given a select list and an ID search the list for the option with
//                  the matching ID and select it.
// -------------------------------------------------------------------------
function selectOptionInList( lstSelectList, intID ) {
    try
    {
          var intIndex = 0;
          // Loop through all the options
          for( intIndex = 0; intIndex < lstSelectList.options.length; intIndex++ )
          {
                // Is this the ID we are looking for?
                if( lstSelectList.options[intIndex].value == intID )
                {
                      // Select it
                      lstSelectList.selectedIndex = intIndex;
                      // Yes, so stop searching
                      break;
                }
          }
    }
    catch( expError )
    {
          alert( "ClientUtilities1.js::SelectOptionInList( ).\n" +
                      "Error:" + expError.number + ", " + expError.description );
    }
} // SelectOptionInList


function changeTab(index) {
	//alert(index);
    if (index != startIndex) {
        //imgLeft = document.getElementById("leftCorner"+index);
        //imgRight = document.getElementById("rightCorner"+index);
        cell = document.getElementById("tdTab"+index);
        
        if (startIndex != "") {
            //imgLeftOld = document.getElementById("leftCorner"+startIndex);
            //imgRightOld = document.getElementById("rightCorner"+startIndex);
            cellOld = document.getElementById("tdTab"+startIndex);
            
            //imgLeftOld.src = '/crm/images/cantoe.jpg';
            //imgRightOld.src = '/crm/images/cantod.jpg';
            cellOld.className = "tbTab";
            
            showHideLayer('layerTab'+startIndex, '0');
        }
        startIndex = index;
        
        //imgLeft.src = '/crm/images/cantoe_on.jpg';
        //imgRight.src = '/crm/images/cantod_on.jpg';
        cell.className = "tbTab_on";
        
        showHideLayer('layerTab'+index, '1');
    }
}
function showHideLayer(layer, option) {
    styleObj = document.getElementById(layer).style;
    if (option == 1) styleObj.display = 'block';
    else if (option == 0) styleObj.display = 'none'
}


function getFirstName(nomeField) {
	nome = document.getElementById(nomeField).value;
	nomeArray = nome.split(" ");
	return nomeArray[0];
}

function setSelectionRange(element, start, end)
{
  if(end === undefined) end = start;

  // firefox
  if("selectionStart" in element)
  {
    element.setSelectionRange(start, end);
    element.focus(); // to make behaviour consistent with IE
  }
  // ie win
  else if(document.selection)
  {
    var range = element.createTextRange();
    range.collapse(true);
    range.moveStart("character", start);
    range.moveEnd("character", end - start);
    range.select();
  }
}
 
/**
  calculates the index of the cursor inside a text input
  element must be a reference to an INPUT (textarea not yet supported)
  returns a simple object {start:<int>, end:<int>} where <int> is -1 if cursor
  is not in input field or functionality is not supported
*/
function getSelectionRange(element)
{
  var result = {start:-1, end:-1};

  // firefox
  if("selectionStart" in element)
    result = {start: element.selectionStart, end: element.selectionEnd};
  // ie win
  else if(document.selection)
  {
    // inputs only
    var range = document.selection.createRange();
    if(range.parentElement() == element)
    {
      var rangeS = range.duplicate();
      rangeS.moveEnd("textedit", 1);
      var rangeE = range.duplicate();
      rangeE.moveStart("textedit", -1);
      result = {start: element.value.length - rangeS.text.length, end: rangeE.text.length};
    }
  }

  return result;
}

function setUpperCase(element) {
   cursorPosition = getSelectionRange(element);
   //alert("Cursor Position: "+cursorPosition.start);
   element.value = element.value.toUpperCase();
   setSelectionRange(element,cursorPosition.start,cursorPosition.end);
}

function setLowerCase(element) {
   cursorPosition = getSelectionRange(element);
   //alert("Cursor Position: "+cursorPosition.start);
   element.value = element.value.toLowerCase();
   setSelectionRange(element,cursorPosition.start,cursorPosition.end);
}

/* Funçoes para gerar senha aleatória */
function generatePassword(length, field) {
    if (parseInt(navigator.appVersion) <= 3) {
        alert("Sorry this only works in 4.0+ browsers");
        return true;
    }
    var sPassword = "";
    //length = document.aForm.charLen.options[document.aForm.charLen.selectedIndex].value;
    //var noPunction = (document.aForm.punc.checked);
    var noPunction = true;
    for (i=0; i < length; i++) {
        numI = getRandomNum();
        if (noPunction) { while (checkPunc(numI)) { numI = getRandomNum(); } }
        sPassword = sPassword + String.fromCharCode(numI);
    }
    field.value = sPassword
    return true;
}
function getRandomNum() {
    // between 0 - 1
    var rndNum = Math.random()
    // rndNum from 0 - 1000
    rndNum = parseInt(rndNum * 1000);
    // rndNum from 33 - 127
    rndNum = (rndNum % 94) + 33;
    return rndNum;
}
function checkPunc(num) {
    if ((num >=33) && (num <=47)) { return true; }
    if ((num >=58) && (num <=64)) { return true; }
    if ((num >=91) && (num <=96)) { return true; }
    if ((num >=123) && (num <=126)) { return true; }
    return false;
}


function currencyFormat(fld, milSep, decSep, e) {
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? e.which : e.keyCode;
	if (whichCode == 13) return true;  // Enter
	if (whichCode == 8) return true;  // Delete (Bug fixed)
	key = String.fromCharCode(whichCode);  // Get key value from key code

	if (strCheck.indexOf(key) == -1) {
		if(document.all) e.keyCode = null;
		return false;  // Not a valid key
	}
	len = fld.value.length;

	for(i = 0; i < len; i++)
		if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
	aux = '';
	for(; i < len; i++)
		if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);

	aux += key;
	
	if(document.all) e.keyCode = null;

	len = aux.length;
	if (len == 0) {
		fld.value = '';
	}
	if (len == 1) {
		fld.value = '0'+ decSep + '0' + aux;
	}
	if (len == 2) {
		fld.value = '0'+ decSep + aux;
	}
	if (len > 2) {
		aux2 = '';
		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += milSep;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}
		fld.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--)
			fld.value += aux2.charAt(i);
		fld.value += decSep + aux.substr(len - 2, len);
	}
	return false;
}

// Máscara para edit do tipo "alias"
function txtBoxFormatAlias(e) {
  var unicode = e.charCode ? e.charCode : e.keyCode;
  if (unicode == 8) { //if the key isn't the backspace key (which we should allow)
  	return true;
  }
  if (unicode >= 48 && unicode <= 57) //if is a number
    return true;
  if (unicode >= 97 && unicode <= 122) //letras minusculas
    return true;
  if (unicode == 45 || unicode == 46) // - e .
    return true;
  if (unicode == 9) //tab
    return true;
  if (unicode == 95) //_
    return true;
  return false;
}

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
	  var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

	  if(document.all) { // Internet Explorer
		nTecla = evtKeyPress.keyCode; }
	  else if(document.layers) { // Nestcape
		nTecla = evtKeyPress.which;
	  } else {
        nTecla = evtKeyPress.which;
        if (nTecla == 8) {
           return true;
        }
      }

	  sValue = objForm[strField].value;

	  // Limpa todos os caracteres de formatação que
	  // já estiverem no campo.
	  sValue = sValue.toString().replace( "-", "" );
	  sValue = sValue.toString().replace( "-", "" );
	  sValue = sValue.toString().replace( ".", "" );
	  sValue = sValue.toString().replace( ".", "" );
	  sValue = sValue.toString().replace( "/", "" );
	  sValue = sValue.toString().replace( "/", "" );
	  sValue = sValue.toString().replace( "(", "" );
	  sValue = sValue.toString().replace( "(", "" );
	  sValue = sValue.toString().replace( ")", "" );
	  sValue = sValue.toString().replace( ")", "" );
	  sValue = sValue.toString().replace( " ", "" );
	  sValue = sValue.toString().replace( " ", "" );
	  fldLen = sValue.length;
	  mskLen = sMask.length;

	  i = 0;
	  nCount = 0;
	  sCod = "";
	  mskLen = fldLen;

	  while (i <= mskLen) {
		bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
		bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))

		if (bolMask) {
		  sCod += sMask.charAt(i);
		  mskLen++; }
		else {
		  sCod += sValue.charAt(nCount);
		  nCount++;
		}

		i++;
	  }

	  objForm[strField].value = sCod;

	  if (nTecla != 8) { // backspace
		if (sMask.charAt(i-1) == "9") { // apenas números...
		  return ((nTecla > 47) && (nTecla < 58)); } // números de 0 a 9
		else { // qualquer caracter...
		  return true;
		} }
	  else {
		return true;
	  }
}


function validEmpty(formField,fieldLabel,required) {
	if (required) {
		// Se está vazio e é obrigatório, indica erro
		alert('O campo "' + fieldLabel +'" é obrigatório...');
		formField.focus();
		return false;
	} else {
		// Se está vazio e não é obrigatório, libera
		return true;
	}
}

function validRequired(formField,fieldLabel) {
	// Se é obrigatório e está vazio, indica erro
	if (formField.value == "") {
		alert('O campo "' + fieldLabel +'" é obrigatório...');
		formField.focus();
		return false;
	} else {
		return true;
	}
}

function validComboSelected(formField,unselectedValue,fieldLabel) {
	// Se é obrigatório e está vazio, indica erro
	// var s = document.getElementById("citySelector");
	var v = formField.options[formField.selectedIndex].value;
	if (v == unselectedValue) {
		alert('"' + fieldLabel +'" é obrigatório...');
		formField.focus();
		return false;
	} else {
		return true;
	}
}

function isEmailAddr(email)
{
  var result = false;
  var theStr = new String(email);
  var index = theStr.indexOf("@");
  if (index > 0)
  {
    var pindex = theStr.indexOf(".",index);
    if ((pindex > index+1) && (theStr.length > pindex+1))
  result = true;
  }
  return result;
}


/* Valida CNPJ */
function validCNPJ(formField,fieldLabel,required) {
	result = true;
	
	if (formField.value == "") {
		result = validEmpty(formField,fieldLabel,required);
	} else {
		CNPJ = formField.value;
		CNPJ = CNPJ.toString().replace("-","");
		CNPJ = CNPJ.toString().replace(".","");
		CNPJ = CNPJ.toString().replace(".","");
		CNPJ = CNPJ.toString().replace("/","");

		erro = new String;
		if (CNPJ.length < 14){ 
			erro = 'O "' + fieldLabel +'" deve conter 14 dígitos.';
			alert(erro);
			formField.focus();
			return false;
		}		
		var nonNumbers = /\D/;
		if (nonNumbers.test(CNPJ)){ 
			erro = 'O "' + fieldLabel +'" suporta apenas números.';
			alert(erro);
			formField.focus();
			return false;
		}
		var a = [];
		var b = new Number;
		var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
		for (i=0; i<12; i++){
			a[i] = CNPJ.charAt(i);
			b += a[i] * c[i+1];
		}
		if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
		b = 0;
		for (y=0; y<13; y++) {
			b += (a[y] * c[y]); 
		}
		if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
		if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
			erro ='O dígito verificador do "' + fieldLabel +'" não confere. Verifique se você digitou corretamente.';
			alert(erro);
			formField.focus();
			return false;
		}
	}
	return result;
}

function validEmail(formField,fieldLabel,required) {
	var result = true;

	if (formField.value == "") {
		result = validEmpty(formField,fieldLabel,required);
	} else {
		// Se não está vazio
		if (formField.value.length > 3 && isEmailAddr(formField.value)) {
			// Se cumpriu os requisitos, libera
			result = true;
		} else {
			// Se não cumpriu os requisitos, indica erro
			alert("O endereço de e-mail digitado contém um erro. Verifique e tente novamente.");
			formField.focus();
			result = false;
		}
	}
	return result;
}


function validNum(formField,fieldLabel,required) {
    var result = true;
    
	if (formField.value == "") {
		result = validEmpty(formField,fieldLabel,required);
	} else {
		var num = parseInt(formField.value,10);
		if (isNaN(num)) {
			alert('Preencha apenas com dígitos o campo "' + fieldLabel +'".');
			formField.focus();    
			result = false;
		}
	} 
	return result;
}


function validTelPrefix(formField,fieldLabel,required) {
	var result = true;

	if (formField.value == "") {
		result = validEmpty(formField,fieldLabel,required);
	} else {
		if (formField.value.length = 2) {
			result = validNum(formField,fieldLabel,required);
		} else {
			alert('O campo "' + fieldLabel +'" deve conter dois dígitos.');
			result = false;
		}
		formField.focus();
	}
  return result;
}

function validTelNumber(formField,fieldLabel,required) {
	var result = true;
	
	if (formField.value == "") {
		result = validEmpty(formField,fieldLabel,required);
	} else {
		if (formField.value.length >= 8) {
			result = validNum(formField,fieldLabel,required);
		} else {
			alert('O campo "' + fieldLabel +'" deve conter oito dígitos.');
			result = false;
		}
		formField.focus();    
	}
	return result;
}


function validDate(formField,fieldLabel,required) {
	var result = true;

	if (formField.value == "") {
		result = validEmpty(formField,fieldLabel,required);
	} else {
		var elems = formField.value.split("/");
		if (elems.length == 3) {// should be three components
			var day = parseInt(elems[0],10);
			var month = parseInt(elems[1],10);
			var year = parseInt(elems[2],10);
			result = !isNaN(month) && (month > 0) && (month < 13) &&
			         !isNaN(day) && (day > 0) && (day < 32) &&
			         !isNaN(year) && (elems[2].length == 4);
		} else {
			alert('A data no campo "' + fieldLabel +'" deve estar no formato dd/mm/aaaa.');
			formField.focus();    
		}
	} 
	return result;
}


/***********************************************
* Dynamic Ajax Content- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
	var page_request = false
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} catch (e) {
			try {
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			} catch (e){ }
		}
	} else return false
	page_request.onreadystatechange=function(){	loadpage(page_request, containerid) }
	if (bustcachevar) //if bust caching of external page
		bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
	page_request.open('GET', url+bustcacheparameter, true)
	page_request.send(null)
}

function loadpage(page_request, containerid){
	if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
	document.getElementById(containerid).innerHTML=page_request.responseText
}

function ajaxedit(url, inputid){
	var page_request = false
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} catch (e) {
			try {
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			} catch (e){ }
		}
	} else return false
	page_request.onreadystatechange=function(){	loadinput(page_request, inputid) }
	if (bustcachevar) //if bust caching of external page
		bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
	page_request.open('GET', url+bustcacheparameter, true)
	page_request.send(null)
}

function loadinput(page_request, inputid){
	if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
	document.getElementById(inputid).value=page_request.responseText
	//alert(page_request.responseText);
}

function loadobjs(){
	if (!document.getElementById)
	return
	for (i=0; i<arguments.length; i++){
		var file=arguments[i]
		var fileref=""
		if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
			if (file.indexOf(".js")!=-1){ //If object is a js file
				fileref=document.createElement('script')
				fileref.setAttribute("type","text/javascript");
				fileref.setAttribute("src", file);
			} else if (file.indexOf(".css")!=-1) { //If object is a css file
				fileref=document.createElement("link")
				fileref.setAttribute("rel", "stylesheet");
				fileref.setAttribute("type", "text/css");
				fileref.setAttribute("href", file);
			}
		}
		if (fileref!=""){
		document.getElementsByTagName("head").item(0).appendChild(fileref)
		loadedobjects+=file+" " //Remember this object as being already added to page
		}
	}
}


/***Combo Menu Load Ajax snippet**/
function ajaxcombo(selectobjID, loadarea){
	var selectobj=document.getElementById? document.getElementById(selectobjID) : ""
	if (selectobj!="" && selectobj.options[selectobj.selectedIndex].value!="")
		ajaxpage(selectobj.options[selectobj.selectedIndex].value, loadarea)
}


/*** Funções para exibir/esconder layer ***/
function SymError() { return true; }
window.onerror = SymError;
// Script para esconder layers
var browserType;
if (document.layers) {browserType = "nn4"}
if (document.all) {browserType = "ie"}
if (window.navigator.userAgent.toLowerCase().match("gecko")) {browserType= "gecko"}
function hide(i) {
if (browserType == "gecko" )
   document.poppedLayer = eval('document.getElementById(i)');
else if (browserType == "ie")
   document.poppedLayer = eval('document.all[i]');
else
   document.poppedLayer = eval('document.layers[i]');
document.poppedLayer.style.visibility = "hidden";
}
function show(i) {
if (browserType == "gecko" )
   document.poppedLayer = eval('document.getElementById(i)');
else if (browserType == "ie")
   document.poppedLayer = eval('document.all[i]');
else
   document.poppedLayer = eval('document.layers[i]');
document.poppedLayer.style.visibility = "visible";
}
function change(i) {
if (browserType == "gecko" )
   document.poppedLayer = eval('document.getElementById(i)');
else if (browserType == "ie")
   document.poppedLayer = eval('document.all[i]');
else
   document.poppedLayer = eval('document.layers[i]');
if (document.poppedLayer.style.visibility == "hidden") {
    document.poppedLayer.style.visibility = "visible";
} else {
	document.poppedLayer.style.visibility = "hidden";
};
}

/**
 * Rotina : 24-C
 * Esconde / mostra as os elementos de listagem
 *
 * criado em : terça-feira, 5 maio 2009
 */
 function ShowHideElement( id )
 {
 	var element_display = document.getElementById( id ).style.display;
 	if (element_display == 'none')
 	{
 		ShowElement( id );
 	}
 	else
 	{
 		HideElement( id );
 	}
 }
 
 function ShowElement( id )
 {
 	document.getElementById( id ).style.display = '';
 }
 
 function HideElement( id )
 {
 	document.getElementById( id ).style.display = 'none';
 }