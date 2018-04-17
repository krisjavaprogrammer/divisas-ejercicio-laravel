<!-- Modal -->
  {{-- <form method="get" action="{{ URL::to('downloadExcel') }}"> --}}
  <form method="get" action="{{ URL::to('downloadExcel') }}">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Reporte Excel</h4>
          </div>
          <div class="modal-body">
                  <div class="input-group input-group-sm">
                  <span class="input-group-addon">Del:</span>
                  <input type="date" class="form-control" aria-describedby="sizing-addon2" v-model="delDivisa" id='del' name="del"/>
                  <span class="input-group-addon">Al:</span>
                  <input type="date" class="form-control" aria-describedby="sizing-addon2" v-model="alDivisa" name="al"/>
                </div>    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" v-on:click="exportDivisa">Guardar</button>
          </div>
        </div>
      </div>
    </div>
</form>
