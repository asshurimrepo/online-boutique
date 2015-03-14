var app = angular.module('ukay', []);


/*------------------------------ Overview ------------------------------*/

app.controller('OverviewCtrl', function ($scope, overview, $interval) {

    var init = $interval(function () {

        console.log('init ov');

        if (overview.data) {
            $scope.data = overview.data;
            $interval.cancel(init);
        }

    }, 400);


})


/*------------------------------ Products ------------------------------*/

.controller('ProductsCtrl', function ($scope, products, $interval) {

    var init = $interval(function () {

        console.log('init pr');

        if (products.data) {
            $scope.data = products.data;
            $interval.cancel(init);
        }

    }, 400);

})


;