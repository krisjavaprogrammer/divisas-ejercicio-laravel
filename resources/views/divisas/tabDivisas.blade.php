<div id="appDivisas">
	<div class="col-md-12">
		<br/>
		<div class="col-md-4">
			<form class="form-horizontal" method="post" v-on:submit.prevent="createDivisa">
				<div>
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
  				</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="fecha">FECHA</label>
				    <div class="col-xs-6">
				    	<input type="date" class="form-control input-sm" v-model="fecha" value="{{ date('Y-m-d') }}"/>	
				    </div>
				</div>					
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="USDMXN">USD/MXN</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="usdmxn" v-model="USDMXN" value="0.00000" :disabled="dateValidate"/>	
				    </div>
				</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="USDEUROS">USD/EUROS</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="usdeuros" v-model="USDEUROS" value="0.00000" :disabled="dateValidate"/>	
				    </div>
				</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="EUROSUSD">EUROS/USD</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="eurosusd" v-model="EUROSUSD" value="0.00000" :disabled="dateValidate"/>	
				    </div>
					</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="YUANUSD">YUAN/USD</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="yuanusd" v-model="YUANUSD" value="0.00000" :disabled="dateValidate"/>	
				    </div>
					</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="AUDUSD">AUD/USD</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="audnusd" v-model="AUDUSD" value="0.00000" :disabled="dateValidate"/>	
				    </div>
					</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="CADUSD">CAD/USD</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="cadusd" v-model="CADUSD" value="0.00000" :disabled="dateValidate"/>	
				    </div>
					</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="GBPUSD">GBP/USD</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="gbpusd" v-model="GBPUSD" value="0.00000" :disabled="dateValidate"/>	
				    </div>
					</div>
				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="USDMXN2">USD/MXN***</label>
				    <div class="col-xs-6">
				    	<input type="text" class="form-control input-sm" id="usdmxn" v-model="USDMXN2" value="0.00000" :disabled="dateValidate"/>	
				    </div>
				</div>
					<div class="col-xs-12">
					<input type="submit" class="btn btn-primary btn-block" value="Guardar" :disabled="dateValidate"/> 
					{{-- <input type="#" class="btn btn-primary btn-block" value="Guardar Reporte (Excel)"> --}}  				
					<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"/>
					  Guardar Reporte (Excel)
					</button>	
					</div>
			</form>
		</div>  					
		<div class="col-md-8">
			<div class="form-group form-group-sm">
				<div class="input-group input-group-sm">
					<span class="input-group-addon" id="sizing-addon3">Buscar</span>
					<input type="date" class="form-control" aria-describedby="sizing-addon3" v-model="buscarDivisa"/>
				</div>  					
			</div>
			{{-- <div class="table-responsive"> --}}
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>USD/MXN</th>
							<th>USD/EUROS</th>
							<th>EUROS/USD</th>
							<th>YUAN/USD</th>
							<th>AUD/USD</th>
							<th>CAD/USD</th>
							<th>GBP/USD</th>
							<th>USD/MXN***</th>
							<th></th>					
						</tr>
					</thead>
					<tbody>
						<tr v-for="divisa in filtroBuscar">
							<td>@{{ divisa.fecha }}</td>
							<td>@{{ divisa.m1 }}</td>
							<td>@{{ divisa.m2 }}</td>
							<td>@{{ divisa.m3 }}</td>
							<td>@{{ divisa.m4 }}</td>
							<td>@{{ divisa.m5 }}</td>
							<td>@{{ divisa.m6 }}</td>
							<td>@{{ divisa.m7 }}</td>
							<td>@{{ divisa.m8 }}</td>
							<td width="10px">
						<a href="#" class="btn btn-warning" v-on:click.prevent="editDivisa(divisa)">Editar</a>
					</td>
						</tr>
					</tbody>
				</table>
			{{-- </div> --}}
			<nav>
				<ul class="pagination">
					<li v-if="paginate.current_page > 1">
						<a href="#" @click.prevent="changePages(paginate.current_page - 1)">
							<span>Atras</span>
						</a>
					</li>
					<li v-for="page in pagesNumber" v-bind:class="[ page == isActive ? 'active' : '']">
						<a href="#" @click.prevent="changePages(page)">
							@{{ page }}
						</a>
					</li>
					<li v-if="paginate.current_page < paginate.last_page">
						<a href="#" @click.prevent="changePages(paginate.current_page + 1)">
							<span>Siguiente</span>
						</a>
					</li>
				</ul>
			</nav>		
		</div>
	</div>
	@include('divisas.exportDivisas')
</div>
