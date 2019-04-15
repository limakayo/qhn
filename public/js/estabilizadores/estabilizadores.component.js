angular.module('estabilizadores').component('estabilizadores', {
    templateUrl: 'estabilizadores-page',
    controller: ['ngProgressFactory', '$scope', '$rootScope', '$http', 'Estabilizadores',
      function EstabilizadoresController(ngProgressFactory, $scope, $rootScope, $http, Estabilizadores) {

        $http.get('https://www.qhn.com.br/api/marcas')
        .then(function(response) {
          if ($scope.marcas == undefined)
            $scope.marcas = response.data;
        });

        $scope.va = true;
        $scope.kva = false;
        $scope.modal = false;
        $scope.filtro = false;
        $scope.progressbar = ngProgressFactory.createInstance();
        $scope.progressbar.setColor('#053163');
        $scope.progressbar.start();

        $scope.estabilizadores = [];
        $scope.orderProp = 'potencia_va';
        $scope.query = '';

        $scope.potencia_va = {
          min: 300,
          max: 3100,
          options: {
            floor: 300,
            ceil: 3100,
            translate: function(value) {
              return value + 'VA';
            }
          }
        }

        $scope.potencia_kva = {
          min: 10,
          max: 200,
          options: {
            floor: 10,
            ceil: 200,
            translate: function(value) {
              return value + 'kVA';
            }
          }
        }

        $scope.selectedMarcas = [];

        $scope.showKva = function() {
          $scope.va = false;
          $scope.kva = true;
        }

        $scope.showVa = function() {
          $scope.va = true;
          $scope.kva = false;
        }

        $scope.initMarca = function(marca) {
          if (marca.selected) {
              if ($scope.selectedMarcas.indexOf(marca.nome) == -1) {
                $scope.selectedMarcas.push(marca.nome);
              }
          }
        }

        $scope.filterMarca = function(marca) {
          if (marca.selected) {
            $scope.selectedMarcas.push(marca.nome);
          } else {
            $scope.selectedMarcas = $scope.selectedMarcas.filter(function(el) {
              return el !== marca.nome;
            });
          }
          console.log($scope.selectedMarcas);
        }

        $scope.abrirModal = function() {
          $scope.modal = true;
          $scope.filtro = false;
        }

        $scope.limparModal = function() {
          $scope.modal = false;
          $scope.selectedMarcas = [];
          $scope.potencia_va.min = 300;
          $scope.potencia_va.max = 3100;
          $scope.potencia_kva.min = 10;
          $scope.potencia_kva.max = 200;
          $scope.query = '';
          for (var i = 0; i < $scope.marcas.length; i++) {
            $scope.marcas[i].selected = false;
          }
        }

        $scope.filterByMarcas = function(estabilizador) {
          if ($scope.modal) {
            if ($scope.filtro) {
              if ($scope.selectedMarcas.length > 0) {
                return ($scope.selectedMarcas.indexOf(estabilizador.marca.nome) !== -1);
              }
              $scope.filtro = false;
              $scope.modal = false;
            }
          } else {
            if ($scope.selectedMarcas.length > 0) {
              return ($scope.selectedMarcas.indexOf(estabilizador.marca.nome) !== -1);
            }
          }
          return true;
        }

        $scope.filterByPotencias = function(estabilizador) {
          if ($scope.modal)  {
            if ($scope.filtro) {
              $scope.filtro = false;
              $scope.modal = false;
              // VA
              if ($scope.va) {
                if (estabilizador.potencia_va >= $scope.potencia_va.min && estabilizador.potencia_va <= $scope.potencia_va.max) {
                  return true;
                }
              // kVA
              } else {
                if (estabilizador.potencia_kva >= $scope.potencia_kva.min && estabilizador.potencia_kva <= $scope.potencia_kva.max) {
                  return true;
                }
              }
            }
          } else {
            // VA
            if ($scope.va) {
              if (estabilizador.potencia_va >= $scope.potencia_va.min && estabilizador.potencia_va <= $scope.potencia_va.max) {
                return true;
              }
            // kVA
            } else {
              if ($scope.potencia_kva.min <= estabilizador.potencia_kva_max) {
                return true;
              } else if (estabilizador.potencia_kva >= $scope.potencia_kva.min && estabilizador.potencia_kva <= $scope.potencia_kva.max) {
                return true;
              }
            }

          }
          return false;
        }

        function saveState() {
          sessionStorage.orderPropEstab = $scope.orderProp;
          sessionStorage.queryEstab = $scope.query;
          sessionStorage.marcasEstab = angular.toJson($scope.marcas);
          //sessionStorage.estabilizadores = angular.toJson($scope.estabilizadores);
          sessionStorage.potenciaVaMinEstab = angular.toJson($scope.potencia_va.min);
          sessionStorage.potenciaVaMaxEstab = angular.toJson($scope.potencia_va.max);
          sessionStorage.potenciaKvaMinEstab = angular.toJson($scope.potencia_kva.min);
          sessionStorage.potenciaKvaMaxEstab = angular.toJson($scope.potencia_kva.max);
          sessionStorage.vaEstab = angular.toJson($scope.va);
          sessionStorage.kvaEstab = angular.toJson($scope.kva);
        }

        function restoreState() {
          $scope.potencia_va.min = sessionStorage.potenciaVaMinEstab;
          $scope.potencia_va.max = sessionStorage.potenciaVaMaxEstab;
          $scope.potencia_kva.min = sessionStorage.potenciaKvaMinEstab;
          $scope.potencia_kva.max = sessionStorage.potenciaKvaMaxEstab;
          $scope.orderProp = sessionStorage.orderPropEstab;
          $scope.query = sessionStorage.queryEstab;
          $scope.marcas = angular.fromJson(sessionStorage.marcasEstab);
          //$scope.estabilizadores = angular.fromJson(sessionStorage.estabilizadores);
          $scope.va = angular.fromJson(sessionStorage.vaEstab);
          $scope.kva = angular.fromJson(sessionStorage.kvaEstab);
        }

        $rootScope.$on("savestate", saveState);

        if (sessionStorage.marcasEstab) restoreState();

        if ($scope.estabilizadores == undefined || $scope.estabilizadores.length == 0) {
            $scope.estabilizadores = Estabilizadores.query();
            $scope.estabilizadores.$promise.then(function (result) {
              $scope.progressbar.complete();
            });
        } else {
          $scope.progressbar.complete();
        }
      }
    ]
});
