angular.module('core.estabilizador').factory('Estabilizadores', ['$resource',
    function($resource) {
      return $resource('https://www.qhn.com.br/api/estabilizadores', {}, {
        query: {
          method: 'GET',
          isArray: true
        }
      });
      /*return $resource('http://gentle-sea-95936.herokuapp.com/api/estabilizadores', {}, {
        query: {
          method: 'GET',
          isArray: true
        }
      });*/

      /*return $resource('http://localhost:8080/qhn-laravel/public/api/estabilizadores', {}, {
        query: {
          method: 'GET',
          isArray: true
        }
      });*/
    }
]);
