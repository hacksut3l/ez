// JavaScript Document

		window.addEvent('domready', function() {
			//Example III
			new CalendarEightysix('exampleIII', { 'excludedWeekdays': [0, 6], 'toggler': 'exampleIII-picker', 'offsetY': -4 });
			
			calendarXIII.addEvent('rendermonth', function(e) {
				//The event returns all the date related elements within the calendar which can easily be iterated
				e.elements.each(function(day) {
					day.set('title', day.retrieve('date').format('%A %d %B'));
					if(day.retrieve('date').get('date') == 14) {
						day.setStyles({ 'color': 'firebrick', 'font-weight': 'bold', 'cursor': 'pointer' }).addEvent('click', function() { alert('Fourteen is awesome!'); } );
					}					
				});
			});
			calendarXIII.render(); //Render again because while initializing and doing the first render it did not have the event set yet
		
		});	
