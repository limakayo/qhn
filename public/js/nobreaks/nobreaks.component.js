angular.module('nobreaks').component('nobreaks', {
    templateUrl: 'nobreaks-page',
    controller: ['ngProgressFactory', '$scope', '$rootScope', '$http', 'Nobreaks',
      function NobreaksController(ngProgressFactory, $scope, $rootScope, $http, Nobreaks) {

        $http.get('https://www.qhn.com.br/api/marcas')
          .then(function(response) {
            if ($scope.marcas == undefined)
              $scope.marcas = response.data;
        });

        $http.get('https://www.qhn.com.br/api/linhas')
          .then(function(response) {
            if ($scope.linhas == undefined)
              $scope.linhas = response.data;
        });

        $http.get('https://www.qhn.com.br/api/segmentos')
          .then(function(response) {
            if ($scope.segmentos == undefined)
              $scope.segmentos = response.data;
        });

        $scope.va = true;
        $scope.kva = false;
        $scope.modal = false;
        $scope.filtro = false;
        $scope.orderProp = 'default';
        $scope.progressbar = ngProgressFactory.createInstance();
        $scope.progressbar.setColor('#053163');
        $scope.progressbar.start();

        $scope.nobreaks = [];
        $scope.query = '';

        $scope.potencia_va = {
          min: 600,
          max: 8000,
          options: {
            floor: 600,
            ceil: 8000,
            translate: function(value) {
              return value + 'VA';
            }
          }
        }

        $scope.potencia_kva = {
          min: 10,
          max: 300,
          options: {
            floor: 10,
            ceil: 300,
            translate: function(value) {
              return value + 'kVA';
            }
          }
        }

        $scope.selectedMarcas = [];
        $scope.selectedLinhas = [];
        $scope.selectedSegmentos = [];

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

        $scope.initLinha = function(linha) {
          if (linha.selected) {
              if ($scope.selectedLinhas.indexOf(linha.nome) == -1) {
                $scope.selectedLinhas.push(linha.nome);
              }
          }
        }

        $scope.initSegmento = function(segmento) {
          if (segmento.selected) {
            if ($scope.selectedSegmentos.indexOf(segmento.nome) == -1) {
              $scope.selectedSegmentos.push(segmento.nome);
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

        $scope.filterLinha = function(linha) {
          if (linha.selected) {
            $scope.selectedLinhas.push(linha.nome);
          } else {
            $scope.selectedLinhas = $scope.selectedLinhas.filter(function(el) {
              return el !== linha.nome;
            })
          }
        }

        $scope.filterSegmento = function(segmento) {
          if (segmento.selected) {
            $scope.selectedSegmentos.push(segmento.nome);
          } else {
            $scope.selectedSegmentos = $scope.selectedSegmentos.filter(function(el) {
              return el !== segmento.nome;
            })
          }
        }

        $scope.abrirModal = function() {
          $scope.modal = true;
          $scope.filtro = false;
        }

        $scope.limparModal = function() {
          $scope.modal = false;
          $scope.selectedMarcas = [];
          $scope.selectedLinhas = [];
          $scope.selectedSegmentos = [];
          $scope.potencia_va.min = 600;
          $scope.potencia_va.max = 8000;
          $scope.potencia_kva.min = 10;
          $scope.potencia_kva.max = 300;
          $scope.query = '';
          for (var i = 0; i < $scope.linhas.length; i++) {
            $scope.linhas[i].selected = false;
          }
          for (var i = 0; i < $scope.segmentos.length; i++) {
            $scope.segmentos[i].selected = false;
          }
          for (var i = 0; i < $scope.marcas.length; i++) {
            $scope.marcas[i].selected = false;
          }
        }

        $scope.filterByMarcas = function(nobreak) {
          if ($scope.modal) {
            if ($scope.filtro) {
              if ($scope.selectedMarcas.length > 0) {
                return ($scope.selectedMarcas.indexOf(nobreak.marca.nome) !== -1);
              }
              $scope.filtro = false;
              $scope.modal = false;
            }
          } else {
            if ($scope.selectedMarcas.length > 0) {
              return ($scope.selectedMarcas.indexOf(nobreak.marca.nome) !== -1);
            }
          }
          return true;
        }

        $scope.filterByLinhas = function(nobreak) {
          if ($scope.modal) {
            if ($scope.filtro) {
              if ($scope.selectedLinhas.length > 0) {
                return ($scope.selectedLinhas.indexOf(nobreak.linha.nome) !== -1);
              }
              $scope.filtro = false;
              $scope.modal = false;
            }
          } else {
            if ($scope.selectedLinhas.length > 0) {
              return ($scope.selectedLinhas.indexOf(nobreak.linha.nome) !== -1);
            }
          }
          return true;
        }

        $scope.filterByPotencias = function(nobreak) {
          if ($scope.modal)  {
            if ($scope.filtro) {
              $scope.filtro = false;
              $scope.modal = false;
              // VA
              if ($scope.va) {
                if (nobreak.potencia_va >= $scope.potencia_va.min && nobreak.potencia_va <= $scope.potencia_va.max) {
                  return true;
                } else if ($scope.potencia_va.min <= nobreak.potencia_va_max) {
                  return true;
                }
              // kVA
              } else {
                if ($scope.potencia_kva.min <= nobreak.potencia_kva_max) {
                  return true;
                } else if (nobreak.potencia_kva >= $scope.potencia_kva.min && nobreak.potencia_kva <= $scope.potencia_kva.max) {
                  return true;
                }
              }
            }
          } else {
            // VA
            if ($scope.va) {
              if (nobreak.potencia_va >= $scope.potencia_va.min && nobreak.potencia_va <= $scope.potencia_va.max) {
                return true;
              } else if ($scope.potencia_va.min <= nobreak.potencia_va_max) {
                return true;
              }
            // kVA
            } else {
              if ($scope.potencia_kva.min <= nobreak.potencia_kva_max) {
                return true;
              } else if (nobreak.potencia_kva >= $scope.potencia_kva.min && nobreak.potencia_kva <= $scope.potencia_kva.max) {
                return true;
              }
            }

          }
          return false;
        }

        $scope.filterBySegmentos = function(nobreak) {
          if ($scope.modal) {
            if ($scope.filtro) {
              if ($scope.selectedSegmentos.length > 0) {
                for (var i = 0, len = nobreak.segmentos.length; i < len; i++) {
                  if ($scope.selectedSegmentos.indexOf(nobreak.segmentos[i].nome) !== -1) {
                    return true;
                  }
                }
              } else {
                return true;
              }
              $scope.filtro = false;
              $scope.modal = false;
            }
          } else {
            if ($scope.selectedSegmentos.length > 0) {
              for (var i = 0, len = nobreak.segmentos.length; i < len; i++) {
                if ($scope.selectedSegmentos.indexOf(nobreak.segmentos[i].nome) !== -1) {
                  return true;
                }
              }
            } else {
              return true;
            }
          }
          return false;
        }

        function saveState() {
          sessionStorage.orderProp = $scope.orderProp;
          sessionStorage.query = $scope.query;
          sessionStorage.linhas = angular.toJson($scope.linhas);
          sessionStorage.marcas = angular.toJson($scope.marcas);
          sessionStorage.segmentos = angular.toJson($scope.segmentos);
          //sessionStorage.nobreaks = angular.toJson($scope.nobreaks);
          sessionStorage.potenciaVaMin = angular.toJson($scope.potencia_va.min);
          sessionStorage.potenciaVaMax = angular.toJson($scope.potencia_va.max);
          sessionStorage.potenciaKvaMin = angular.toJson($scope.potencia_kva.min);
          sessionStorage.potenciaKvaMax = angular.toJson($scope.potencia_kva.max);
          sessionStorage.va = angular.toJson($scope.va);
          sessionStorage.kva = angular.toJson($scope.kva);
        }

        function restoreState() {
          $scope.potencia_va.min = sessionStorage.potenciaVaMin;
          $scope.potencia_va.max = sessionStorage.potenciaVaMax;
          $scope.potencia_kva.min = sessionStorage.potenciaKvaMin;
          $scope.potencia_kva.max = sessionStorage.potenciaKvaMax;
          $scope.orderProp = sessionStorage.orderProp;
          $scope.query = sessionStorage.query;
          $scope.linhas = angular.fromJson(sessionStorage.linhas);
          $scope.marcas = angular.fromJson(sessionStorage.marcas);
          $scope.segmentos = angular.fromJson(sessionStorage.segmentos);
          //$scope.nobreaks = angular.fromJson(sessionStorage.nobreaks);
          $scope.va = angular.fromJson(sessionStorage.va);
          $scope.kva = angular.fromJson(sessionStorage.kva);
        }

        $rootScope.$on("savestate", saveState);

        if (sessionStorage.marcas) restoreState();

        $scope.paused = false;
        $scope.skip = 0;
        $scope.take = 12;
        $scope.haveRecords = true;
        $scope.loaded = false;

        if ($scope.nobreaks !== undefined && $scope.nobreaks.length > 0) {
          $scope.progressbar.complete();
        }

        $scope.nextPage = function() {
          $scope.paused = true;
          
          $http.get('https://www.qhn.com.br/api/nobreaks', {params: {skip:$scope.skip, take:$scope.take}})
            .then(function(response) {
              if (response.data.length > 0 && !$scope.loaded) {
                for (var i = 0; i < response.data.length; i++) {
                  if ($scope.nobreaks.indexOf(response.data[i]) == -1) {
                    $scope.nobreaks = [...$scope.nobreaks, response.data[i]]
                  }
                }

                $scope.skip += 12;
                $scope.paused = false;
              } else {
                $scope.haveRecords = false;
              }
              
              $scope.progressbar.complete();
            });
          
        }

        $http.get('https://www.qhn.com.br/api/allnobreaks')
          .then(function(response) {
            $scope.loaded = true;
            /*for (var i = 0; i < response.data.length; i++) {
              if ($scope.nobreaks.indexOf(response.data[i]) == 0) {
                console.log(response.data[i].id);
              }
            }*/
            for (var i = 0; i < response.data.length; i++) {
              var pos = $scope.nobreaks.map(function(e) {
                return e.id;
              }).indexOf(response.data[i].id);
              if (pos == -1) {
                $scope.nobreaks = [...$scope.nobreaks, response.data[i]]
              }
            }
          });
        
      }
    ]
});
