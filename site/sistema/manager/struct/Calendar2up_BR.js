YAHOO.widget.Calendar2up_BR_Cal = function(id, containerId, monthyear, selected) {
	if (arguments.length > 0)
	{
		this.init(id, containerId, monthyear, selected);
	}
}

YAHOO.widget.Calendar2up_BR_Cal.prototype = new YAHOO.widget.Calendar2up_Cal();

YAHOO.widget.Calendar2up_BR_Cal.prototype.customConfig = function() {
	this.Config.Locale.MONTHS_SHORT = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
	this.Config.Locale.MONTHS_LONG = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
	this.Config.Locale.WEEKDAYS_1CHAR = ["D", "S", "T", "Q", "Q", "S", "S"];
	this.Config.Locale.WEEKDAYS_SHORT = ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa"];
	this.Config.Locale.WEEKDAYS_MEDIUM = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"];
	this.Config.Locale.WEEKDAYS_LONG = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];

	this.Config.Options.START_WEEKDAY = 1;
}

/*************************************/

YAHOO.widget.Calendar2up_BR = function(id, containerId, monthyear, selected) {
	if (arguments.length > 0)
	{	
		this.buildWrapper(containerId);
		this.init(2, id, containerId, monthyear, selected);
	}
}

YAHOO.widget.Calendar2up_BR.prototype = new YAHOO.widget.Calendar2up();

YAHOO.widget.Calendar2up_BR.prototype.constructChild = function(id,containerId,monthyear,selected) {
	var cal = new YAHOO.widget.Calendar2up_BR_Cal(id,containerId,monthyear,selected);
	return cal;
};
