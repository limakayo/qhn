<div class="row">

  <div class="col-md-3 hidden-sm-down">
    <div class="row">
      @include('_partials.menu')
    </div>
  </div>

  <div class="col-md-9">

    <!-- Desktop -->
    <div class="row hidden-sm-down">
      <div class="col-md-8">
        <h2 ng-if="selectedMarcas.length == 0 && selectedLinhas.length == 0 && selectedSegmentos.length == 0">Em destaque</h2>
        <div ng-if="selectedMarcas.length > 0">
          <strong>Marcas: </strong>
          <span style="margin-right:0.5em" class="tag tag-pill tag-default" ng-repeat="marca in selectedMarcas track by $index">
            <% marca %>
          </span>
        </div>        
        <div ng-if="selectedLinhas.length > 0">
          <strong>Linhas: </strong>
          <span style="margin-right:0.5em" class="tag tag-pill tag-default" ng-repeat="linha in selectedLinhas track by $index">
            <% linha %>
          </span>
        </div>
        <strong>Potências: </strong>
        <span style="margin-right:0.5em" class="tag tag-pill tag-default">
          Entre <% potencia.min %> e <% potencia.max %>
        </span>
        <div ng-if="selectedSegmentos.length > 0">
          <strong>Segmentos: </strong>
          <span style="margin-right:0.5em" class="tag tag-pill tag-default" ng-repeat="segmento in selectedSegmentos track by $index">
            <% segmento %>
          </span>
        </div>
      </div>
      <div class="col-md-4" style="text-align:right">
        @include('_partials.orderby')
      </div>
    </div>

    <!-- Mobile -->
    <div class="row hidden-md-up">
      <div class="col-xs-6">
        <button class="btn btn-primary" data-toggle="modal" data-target="#filtro" ng-click="abrirModal()">Filtrar</button>
      </div>
      <div class="col-xs-6" style="text-align:right">
        @include('_partials.orderby')
      </div>
      <div class="col-xs-12" style="margin-top:1em">
        <h2 ng-if="selectedMarcas.length == 0 && selectedLinhas.length == 0 && selectedSegmentos.length == 0">Em destaque</h2>
        <div ng-if="selectedMarcas.length > 0">
          <strong>Marcas: </strong>
          <span style="margin-right:0.5em" class="tag tag-pill tag-default" ng-repeat="marca in selectedMarcas track by $index">
            <% marca %>
          </span>
        </div>
        <div ng-if="selectedLinhas.length > 0">
          <strong>Linhas: </strong>
          <span style="margin-right:0.5em" class="tag tag-pill tag-default" ng-repeat="linha in selectedLinhas track by $index">
            <% linha %>
          </span>
        </div>
        <strong>Potências: </strong>
        <span style="margin-right:0.5em" class="tag tag-pill tag-default">
          Entre <% potencia.min %> e <% potencia.max %>
        </span>
        <div ng-if="selectedSegmentos.length > 0">
          <strong>Segmentos: </strong>
          <span style="margin-right:0.5em" class="tag tag-pill tag-default" ng-repeat="segmento in selectedSegmentos track by $index">
            <% segmento %>
          </span>
        </div>
      </div>
    </div>
    <hr>

    <!-- Filtro Mobile -->
    @include('_partials.filtro')

    <div class="row">
      <div class="col-md-12">
        <p ng-if="query">Encontramos esses produtos em "<% query %>":</p>
      </div>
      <div class="col-xs-12">
        <p ng-show="filteredNobreaks.length === 0">Não foram encontrados nobreaks com essas especificações.</p> 
      </div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 nobreaks-nobreak nobreaks-item" ng-repeat="nobreak in filteredNobreaks = (nobreaks | filter:filterBySegmentos | filter:filterByPotencias | filter:query | filter:filterByLinhas | filter:filterByMarcas | orderBy:orderProp)">
        <a class="nobreak-link" href="nobreaks/<% nobreak.slug %>" title="Nobreak NHS Mini">
          <img class="img-thumbnail thumb-nobreak" ng-src="{{ asset('fotos') }}/<% nobreak.foto_principal %>" alt="<% nobreak.nome %>">
          <h3 class="nobreaks-nobreak-title"><% nobreak.nome %></h3>
          <p class="nobreak-potencia">Potência: <span><% nobreak.potencia_va %>VA</span></p>
          <p class="nobreak-linha">Linha: <span>Online</span></p>
        </a>
      </div>
      
    </div>

  </div>
</div>
