
	$(document).ready(function(){
			$('#my-table').dynatable( {
		features:{
		        perPageSelect:true,
			    search:true

			

      //sort: true,

       //recordCount: true
		    },
		
		inputs:{
			queryEvent:'keyup'
		},
	
		dataset:{
			perPageDefault:10
			//
			//ajax: true,
             //ajaxOnLoad: true,
              //records: []
		}

	} ); 
	});
