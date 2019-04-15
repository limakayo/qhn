angular.module('core.nobreak').factory('Nobreaks', ['$resource',
    function($resource) {
      return $resource('https://www.qhn.com.br/api/nobreaks/:skip/:take', {skip:0, take:12}, {
        query: {
          method: 'GET',
          isArray: true
        }
      });
      /*return $resource('http://gentle-sea-95936.herokuapp.com/api/nobreaks', {}, {
        query: {
          method: 'GET',
          isArray: true
        }
      });*/

      /*return $resource('http://localhost:8080/qhn-laravel/public/api/nobreaks', {}, {
        query: {
          method: 'GET',
          isArray: true
        }
      });*/
    }
]);
