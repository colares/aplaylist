/* Brazilian Portuguese translation for the jQuery Timepicker Addon */
/* Written by Diogo Damiani (diogodamiani@gmail.com) */
(function ($) {
	$.timepicker.regional['pt-BR'] = {
		timeOnlyTitle: 'Escolha a hora',
		timeText: 'Hora',
		hourText: 'Horas',
		minuteText: 'Minutos',
		secondText: 'Segundos',
		millisecText: 'Milissegundos',
		timezoneText: 'Fuso hor�rio',
		currentText: 'Agora',
		closeText: 'Fechar',
		timeFormat: 'hh:mm',
		amNames: ['a.m.', 'AM', 'A'],
		pmNames: ['p.m.', 'PM', 'P'],
		ampm: false
	};
	$.timepicker.setDefaults($.timepicker.regional['pt-BR']);
	
    $.datepicker.regional['pt-BR'] = {
            closeText: "Fechar",
            prevText: '<Anterior',
            nextText: 'Avan�ar>',
            currentText: 'Hoje',
            MonthNames: ['Janeiro', 'Fevereiro', 'Mar�o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Janeiro', 'Fevereiro', 'Mar�o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            dayNames: ['Domingo', 'Segunda-feira', 'Ter�a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'S�bado'],
            dayNamesShort: ['Dom', 'Seg', 'ter', 'Qua', 'Qui', 'Sex', 'S�b'],
            dayNamesMin: ['Dom', 'Seg', 'ter', 'Qua', 'Qui', 'Sex', 'S�b'],
            weekHeader: 'N�o',
            dateFormat: 'dd/mm/aa',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix:''
        };
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
	
})(jQuery);
