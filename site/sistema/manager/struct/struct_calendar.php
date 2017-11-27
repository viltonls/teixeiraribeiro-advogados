
<script type="text/javascript" src="../yui/build/yahoo/yahoo.js"></script>
<script type="text/javascript" src="../yui/build/event/event.js" ></script>
<script type="text/javascript" src="../yui/build/dom/dom.js" ></script>
<link rel="stylesheet" type="text/css" href="../yui/docs/assets/dpSyntaxHighlighter.css" />
<script type="text/javascript" src="../yui/build/calendar/calendar.js"></script>
<link type="text/css" rel="stylesheet" href="../yui/build/calendar/assets/calendar.css">	
<link rel="stylesheet" href="struct/Calendar_BR.css" type="text/css">
<script type="text/javascript" src="struct/Calendar2up_BR.js" ></script>

<script language="javascript">
	
	YAHOO.namespace("example.calendar");

	var today,link1,link2,selYear1,selMonth1,selDay1,selYear2,selMonth2,selDay2;

	function initBR() {

		// Inicia as variáveis com a data já definida
		var set1Day = <?=$calendar1Day?>;
		var set1Month = <?=$calendar1Month?>;
		var set1Year = <?=$calendar1Year?>;
		var set2Day = <?=$calendar2Day?>;
		var set2Month = <?=$calendar2Month?>;
		var set2Year = <?=$calendar2Year?>;

		link1 = document.getElementById('dateLink1');
		link2 = document.getElementById('dateLink2');

		// Busca os campos no form
		selDay1 = document.getElementById('selDay1');
		selMonth1 = document.getElementById('selMonth1');
		selYear1 = document.getElementById('selYear1');
		selDay2 = document.getElementById('selDay2');
		selMonth2 = document.getElementById('selMonth2');
		selYear2 = document.getElementById('selYear2');

		// Seta os campos de acordo com as datas já definidas
		selDay1.selectedIndex = set1Day-1;
		selMonth1.selectedIndex = set1Month;
		selYear1.selectedIndex = set1Year - <?=$calendarMinDate ?>;
		selDay2.selectedIndex = set2Day-1;
		selMonth2.selectedIndex = set2Month;
		selYear2.selectedIndex = set2Year - <?=$calendarMinDate ?>;

		// Configura as datas no calendário
		YAHOO.example.calendar.cal1 = new YAHOO.widget.Calendar2up_BR("YAHOO.example.calendar.cal1","container1",(set1Month+1)+"/"+set1Year,(set1Month+1)+"/"+set1Day+"/"+set1Year);
		YAHOO.example.calendar.cal1.setChildFunction("onSelect",setDate1);
		YAHOO.example.calendar.cal1.title = "Escolha a data:";
		YAHOO.example.calendar.cal1.addRenderer("1/1,12/25", YAHOO.example.calendar.cal1.pages[0].renderCellStyleHighlight1);
		YAHOO.example.calendar.cal1.render();

		YAHOO.example.calendar.cal2 = new YAHOO.widget.Calendar2up_BR("YAHOO.example.calendar.cal2","container2",(set2Month+1)+"/"+set2Year,(set2Month+1)+"/"+set2Day+"/"+set2Year);
		YAHOO.example.calendar.cal2.setChildFunction("onSelect",setDate2);
		YAHOO.example.calendar.cal2.title = "Escolha a data:";
		YAHOO.example.calendar.cal2.addRenderer("1/1,12/25", YAHOO.example.calendar.cal2.pages[0].renderCellStyleHighlight1);
		YAHOO.example.calendar.cal2.render();
	}

	function showCalendar1() {
		YAHOO.example.calendar.cal2.hide();
		
		var pos = YAHOO.util.Dom.getXY(link1);
		YAHOO.example.calendar.cal1.outerContainer.style.display='block';
		YAHOO.util.Dom.setXY(YAHOO.example.calendar.cal1.outerContainer, [pos[0],pos[1]+link1.offsetHeight+1]);
	}

	function showCalendar2() {
		YAHOO.example.calendar.cal1.hide();

		var pos = YAHOO.util.Dom.getXY(link2);
		YAHOO.example.calendar.cal2.outerContainer.style.display='block';
		YAHOO.util.Dom.setXY(YAHOO.example.calendar.cal2.outerContainer, [pos[0],pos[1]+link2.offsetHeight+1]);
	}

	function setDate1() {
		var date1 = YAHOO.example.calendar.cal1.getSelectedDates()[0];
		selMonth1.selectedIndex = date1.getMonth();
		selDay1.selectedIndex = date1.getDate()-1;
		selYear1.selectedIndex = date1.getFullYear() - <?=$calendarMinDate ?>;

		YAHOO.example.calendar.cal1.hide();
	}

	function setDate2() {
		var date2 = YAHOO.example.calendar.cal2.getSelectedDates()[0];
		selMonth2.selectedIndex = date2.getMonth();
		selDay2.selectedIndex = date2.getDate()-1;
		selYear2.selectedIndex = date2.getFullYear()- <?=$calendarMinDate ?>;
		YAHOO.example.calendar.cal2.hide();
	}

	function changeDate1() {
		var month = selMonth1.selectedIndex;
		var day = selDay1.selectedIndex + 1;
		var year = selYear1.options[selYear1.selectedIndex].value;
		//var year = selYear1.selectedIndex + <?=$calendarMinDate ?>;
		//var year = today.getFullYear();

		YAHOO.example.calendar.cal1.select((month+1) + "/" + day + "/" + year);
		YAHOO.example.calendar.cal1.setMonth(month);
		YAHOO.example.calendar.cal1.setYear(year);
		YAHOO.example.calendar.cal1.render();
	}

	function changeDate2() {
		var month = selMonth2.selectedIndex;
		var day = selDay2.selectedIndex + 1;
		var year = selYear2.options[selYear2.selectedIndex].value;
		//var year = selYear2.selectedIndex + <?=$calendarMinDate ?>;
		//var year = today.getFullYear();
		
		YAHOO.example.calendar.cal2.select((month+1) + "/" + day + "/" + year);
		YAHOO.example.calendar.cal2.setMonth(month);
		YAHOO.example.calendar.cal2.setYear(year);
		YAHOO.example.calendar.cal2.render();
	}		

	YAHOO.util.Event.addListener(window, "load", initBR);	
</script>

<div id="container1" style="position:absolute;display:none"></div>
<div id="container2" style="position:absolute;display:none"></div>
		
<script src="../yui/docs/assets/dpSyntaxHighlighter.js"></script>
<script language="javascript"> 
dp.SyntaxHighlighter.HighlightAll('code'); 
</script>
