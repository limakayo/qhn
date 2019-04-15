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
            @include('_partials.menu')
            <div class="col-xs-12">
              <h5 style="margin-top: 1rem">Segmentos</h5>
              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseSegmento" aria-expanded="false" aria-controls="collapseSegmento">
                Selecione
              </button>
              <div class="collapse" id="collapseSegmento">
                <div class="card card-block">
                  <h5 style="margin-top: 1rem">Segmentos</h5>
                  <div class="nav nav-pills nav-stacked" >
                    <label class="nav-item form-check-label menu-link" style="padding-left:0" ng-repeat="segmento in segmentos" ng-init="initSegmento(segmento)">
                      <input class="form-check-input menu-checkbox" type="checkbox" ng-model="segmento.selected" ng-change="filterSegmento(segmento)">
                      <% segmento.nome %>
                    </label>
                  </div>
                </div>
              </div>
            </div>
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
