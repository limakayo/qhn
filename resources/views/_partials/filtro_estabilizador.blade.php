<div class="modal fade" id="filtro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="limparModal()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Filtro</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            @include('_partials.menu_estabilizador')
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="limparModal()">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="filtro = true">Filtrar</button>
      </div>
    </div>
  </div>
</div>
