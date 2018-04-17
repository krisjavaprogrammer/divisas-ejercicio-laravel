$(document).ready( function () {
} );

// $(function(){
	// $('.main-sidebar').slimScroll({
		// height: '250px',
		// color:'#F44336'
	// });
// });

new Vue({
	el: '#appDivisas',
	created: function(){
		this.getDivisas();
	},
	data: {
		divisas: [],
		paginate: {
				'total': 0,
                'current_page': 0, 
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
			},
		fecha: '',
		USDMXN: '',
		USDEUROS: '',
		EUROSUSD: '',
		YUANUSD: '',
		AUDUSD: '',
		CADUSD: '',
		GBPUSD: '',
		USDMXN2: '',
		buscarDivisa: '',
		delDivisa: '',
		alDivisa: '',
		errors: [],
		offset: 3
	},
	computed: {
			isActive: function(){
				return this.paginate.current_page;
			},
			pagesNumber: function(){
				if(!this.paginate.to){
					return [];
				}

				var from = this.paginate.current_page - this.offset; //TODO offset
				if(from < 1){
					from = 1;
				}

				var to = from + (this.offset * 2); //TODO 
				if(to >= this.paginate.last_page){
					to = this.paginate.last_page;
				}

				var pagesArray = [];
				while(from <= to){
					pagesArray.push(from);
					from ++;
				}
				return pagesArray;
			},
			filtroBuscar: function(){
				return this.divisas.filter((divisa) => divisa.fecha.includes(this.buscarDivisa));
			},
			dateValidate: function(){

				var d = this.fecha.split("-");
		        day = parseInt(d[2]);
		        month = parseInt(d[1]);
		        year = parseInt(d[0]);
		        var fi = new Date(year, month - 1, day);
		        var hoy = new Date();
		        fi.setHours(0, 0, 0, 0);
		        hoy.setHours(0, 0, 0, 0);
		        if (fi.getTime() === hoy.getTime()) {
		            return false;
		        } else {
		            return true;
		            toastr.error('No es posbile modificar divisas de dias anteriores');
		        }
			}
	},
	methods: {
		getDivisas:function(page){
			var urlgetDivisas = 'divisas?page='+page;
			axios.get(urlgetDivisas).then(response => {
				this.divisas = response.data.divisas.data,
				this.paginate = response.data.paginate;
			});

		},
		createDivisa: function(){
			var url = 'divisas';
			axios.post(url,
				{
					fecha: 		this.fecha,
					usdmxn: 	this.USDMXN,
					usdeuros: 	this.USDEUROS,
					eurosusd: 	this.EUROSUSD,
					yuanusd: 	this.YUANUSD,
					audusd: 	this.AUDUSD,
					cadusd: 	this.CADUSD,
					gbpusd: 	this.GBPUSD,
					usdmxn2: 	this.USDMXN2

				}).then(response => {
					console.log(response.data);
					this.getDivisas();
					this.fecha 		= '';
					this.USDMXN 	= '';
					this.USDEUROS 	= '';
					this.EUROSUSD   = '';
					this.YUANUSD 	= '';
					this.AUDUSD 	= '';
					this.CADUSD 	= '';
					this.GBPUSD 	= '';
					this.USDMXN2 	= '';
				toastr.success('Divisas agregadaS correctamente');
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		changePages: function(page){
				this.paginate.current_page = page;
				this.getDivisas(page);
		},
		editDivisa: function(divisa){

			var d = divisa.fecha.split("-");
	        day = parseInt(d[2]);
	        month = parseInt(d[1]);
	        year = parseInt(d[0]);
	        var fi = new Date(year, month - 1, day);
	        var hoy = new Date();
	        fi.setHours(0, 0, 0, 0);
	        hoy.setHours(0, 0, 0, 0);
	        if (fi.getTime() === hoy.getTime()) {

	        	this.fecha 		= divisa.fecha;
				this.USDMXN 	= divisa.m1;
				this.USDEUROS 	= divisa.m2;
				this.EUROSUSD   = divisa.m3;
				this.YUANUSD 	= divisa.m4;
				this.AUDUSD 	= divisa.m5;
				this.CADUSD 	= divisa.m6;
				this.GBPUSD 	= divisa.m7;
				this.USDMXN2 	= divisa.m8;
	            // return true;
	        } else {
	            // return false;
	            toastr.error('No es posbile modificar divisas de dias anteriores');
	            this.fecha 		= '';
				this.USDMXN 	= '';
				this.USDEUROS 	= '';
				this.EUROSUSD   = '';
				this.YUANUSD 	= '';
				this.AUDUSD 	= '';
				this.CADUSD 	= '';
				this.GBPUSD 	= '';
				this.USDMXN2 	= '';
	        }
			
		},
		exportDivisa: function(){

		 	console.log(response);
		 	this.delDivisa = '';
		 	this.alDivisa = '';
		 	$('#myModal').modal('hide');
		}
		// searchDivisa: function (){
		// 	console.log(this.buscarDivisa);
		// }
	}
});	
	// new Vue({
	// 	el: '#crud',
	// 	created: function() {
	// 		this.getKeeps();
	// 	},
	// 	data: {

	// 		keeps: [],
	// 		paginate: {
	// 			'total': 0,
 //                'current_page': 0, 
 //                'per_page': 0,
 //                'last_page': 0,
 //                'from': 0,
 //                'to': 0
	// 		},
	// 		newkeep: '',
	// 		fillKeep: {'id': '', 'keep': ''},
	// 		errors: [],
	// 		offset: 3
	// 	},
	// 	computed: {
	// 		isActive: function(){
	// 			return this.paginate.current_page;
	// 		},
	// 		pagesNumber: function(){
	// 			if(!this.paginate.to){
	// 				return [];
	// 			}

	// 			var from = this.paginate.current_page - this.offset; //TODO offset
	// 			if(from < 1){
	// 				from = 1;
	// 			}

	// 			var to = from + (this.offset * 2); //TODO 
	// 			if(to >= this.paginate.last_page){
	// 				to = this.paginate.last_page;
	// 			}

	// 			var pagesArray = [];
	// 			while(from <= to){
	// 				pagesArray.push(from);
	// 				from ++;
	// 			}
	// 			return pagesArray;
	// 		}
	// 	},
	// 	methods: {
	// 		getKeeps: function(page){
	// 			var urlKeeps = 'tasks?page='+page;
	// 			axios.get(urlKeeps).then(response => {

	// 				this.keeps = response.data.tasks.data,
	// 				this.paginate = response.data.paginate
	// 			});
	// 		},
	// 		editKeep: function(keep){
	// 			this.fillKeep.id = keep.id;
	// 			this.fillKeep.keep = keep.keep;
	// 			$('#edit').modal('show');
	// 		},
	// 		updateKeep: function(id){
	// 			var url = 'tasks/' + id;
	// 			axios.put(url, this.fillKeep).then(response => {
	// 				this.getKeeps();
	// 				this.fillKeep = {'id': '', 'keep': ''};
	// 				this.errors = [];
	// 				$('#edit').modal('hide');
	// 				toastr.success('Tarea actualizada con exito');
	// 			}).catch(error => {
	// 				this.errors = error.response.data;
	// 			});
	// 		},
	// 		deleteKeep: function(keep){
				
	// 			var url = 'tasks/' + keep.id;
	// 			axios.delete(url).then(response => {
	// 				this.getKeeps();
	// 				toastr.success('eliminado con exito');
	// 				// alert('Registro con id ' + keep.id + 'eliminado con exito');
	// 			});
	// 		},
	// 		createKeep: function(){
	// 			var url = 'tasks';
	// 			axios.post(url, {
	// 				keep: this.newkeep
	// 			}).then(response => {
	// 				this.getKeeps();
	// 				this.newkeep = '';
	// 				$('#create').modal('hide');
	// 				toastr.success('Nueva tarea creada con exito');
	// 			}).catch(error => {
	// 				this.errors = error.response.data
	// 			});
	// 		},
	// 		changePages: function(page){
	// 			this.paginate.current_page = page;
	// 			this.getKeeps(page);
	// 		}
	// 	}
	// });