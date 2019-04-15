  <div class="row">

    <div class="col-md-4 col-lg-3 hidden-sm-down">
      <div class="row">
        @include('_partials.menu')
      </div>
    </div>

    <div class="col-md-8 col-lg-9">

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
          <div ng-show="va">
            <strong>Potências: </strong>
            <span style="margin-right:0.5em" class="tag tag-pill tag-default">
              <% potencia_va.min %> à <% potencia_va.max %>VA
            </span>
          </div>
          <div ng-show="kva">
            <strong>Potências: </strong>
            <span style="margin-right:0.5em" class="tag tag-pill tag-default">
              <% potencia_kva.min %> à <% potencia_kva.max %>kVA
            </span>
          </div>        
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
          <div ng-show="va">
            <strong>Potências: </strong>
            <span style="margin-right:0.5em" class="tag tag-pill tag-default">
              <% potencia_va.min %> à <% potencia_va.max %>VA
            </span>
          </div>
          <div ng-show="kva">
            <strong>Potências: </strong>
            <span style="margin-right:0.5em" class="tag tag-pill tag-default">
              <% potencia_kva.min %> à <% potencia_kva.max %>kVA
            </span>
          </div>  
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

      <div class="row" infinite-scroll="nextPage()" infinite-scroll-disabled="paused || !haveRecords || loaded" infinite-scroll-distance="2">
        <div class="col-md-12">
          <p ng-if="query">Encontramos esses produtos em "<% query %>":</p>
        </div>
        <div class="col-xs-12">
          <div ng-show="filteredNobreaks.length === 0 && progressbar.status() == 0">
            <p>Não foram encontrados Nobreaks com essas especificações.</p>
          </div>
        </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 nobreaks-nobreak nobreaks-item" ng-repeat="nobreak in filteredNobreaks = (nobreaks | filter:filterBySegmentos | filter:filterByPotencias | filter:query | filter:filterByLinhas | filter:filterByMarcas | orderBy:orderProp)">
            <a class="nobreak-link" href="nobreaks/<% nobreak.slug %>" title="<% nobreak.nome %>">
              <img class="img-fluid thumb-nobreak" ng-src="{{ asset('fotos') }}/<% nobreak.foto_principal %>" alt="<% nobreak.nome %>">
              <h3 class="nobreaks-nobreak-title"><% nobreak.nome %></h3>
              <p class="nobreak-potencia">Potência:
              <span ng-if="nobreak.potencia_va && nobreak.potencia_va != 0">
                <% nobreak.potencia_va %>VA
              </span>
              <span ng-if="nobreak.potencia_kva && nobreak.potencia_kva != 0">
                <% nobreak.potencia_kva %>kVA
              </span>
              <span ng-if="nobreak.potencia_kva_min && nobreak.potencia_kva_min != 0">
                <% nobreak.potencia_kva_min %>kVA a <% nobreak.potencia_kva_max %>kVA
              </span>
              <span ng-if="nobreak.potencia_va_min && nobreak.potencia_va_min != 0">
                <% nobreak.potencia_va_min %>VA a <% nobreak.potencia_va_max %>VA
              </span>


              </p>
              <p class="nobreak-linha">Linha: <span><% nobreak.linha.nome %></span></p>
            </a>
          </div>
        
        <div class="col-xs-12" ng-show="progressbar.status() == 0">
          <div class="alert alert-info" role="alert" ng-show="va">
            <p>Não encontrou o que procura?</p>
            <p>Experimente alterar a potência para <strong>kVA</strong> no menu ao lado ou</p>
            <a href="{{ url('contato') }}">Entre em contato conosco</a>
          </div> 
          <div class="alert alert-info" role="alert" ng-show="kva">
            <p>Não encontrou o que procura?</p>
            <p>Experimente alterar a potência para <strong>VA</strong> no menu ao lado ou</p>
            <a href="{{ url('contato') }}">Entre em contato conosco</a>
          </div>
        </div>
        
      </div>

    </div>
  </div>
