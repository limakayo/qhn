var app = angular.module('app', [
  'core',
  'nobreaks',
  'estabilizadores',
  'ngAnimate',
  'ngProgress',
  'rzModule',
  'infinite-scroll'
], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

app.run(function($rootScope) {
  window.onbeforeunload = function(event) {
    $rootScope.$broadcast('savestate');
  };
});
