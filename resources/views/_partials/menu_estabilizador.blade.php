<div class="menu-nobreaks">
  <div class="form-group col-xs-12" style="margin-bottom: 1.5em">
    <h5 style="margin-bottom:1em">Filtrar</h5>
    <input ng-model="query" class="form-control" placeholder="Digite o que você procura">
  </div>
  <div class="col-xs-12">
    <h5>Marcas</h5>
    <div class="nav nav-pills nav-stacked">
      <label class="nav-item form-check-label menu-link" style="padding-left:0" ng-repeat="marca in marcas" ng-init="initMarca(marca)">
        <input class="form-check-input menu-checkbox" type="checkbox" ng-model="marca.selected" ng-change="filterMarca(marca)">
        <% marca.nome %>
      </label>
    </div>
  </div>
  <div class="col-xs-12" id="va" ng-show="va">
    <div class="row">
      <div class="col-xs-9">
        <h5 style="margin-top: 1rem">Potências em VA</h5>
      </div>
      <div class="col-xs-3 change-link" >
        <a ng-click="showKva()">kVA</a>
      </div>
    </div>
    
    <rzslider rz-slider-model="potencia_va.min"
              rz-slider-high="potencia_va.max"
              rz-slider-options="potencia_va.options"></rzslider>
  </div>
  <div class="col-xs-12" id="kva" ng-show="kva">
    <div class="row">
      <div class="col-xs-9">
        <h5 style="margin-top: 1rem">Potências em kVA</h5>
      </div>
      <div class="col-xs-3 change-link" >
        <a ng-click="showVa()">VA</a>
      </div>
    </div>
    
    <rzslider rz-slider-model="potencia_kva.min"
              rz-slider-high="potencia_kva.max"
              rz-slider-options="potencia_kva.options"></rzslider>
  </div>
</div>
