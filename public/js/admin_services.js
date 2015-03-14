app

    .factory('api', function ($http) {
        this.apiProvider = $("meta[name=api_provider]").prop('content');
        this.provider = [];
        var $this = this;

        if(this.provider.length > 0){
            return this;
        }

        $http.get(this.apiProvider).success(function(data){
            $this.provider = data;
        });

        return this;
    })

    /*------------------------------ Overview ------------------------------*/
    .factory('overview', function ($http, api, $interval) {
        var $this = this;

        var stopInit = $interval(function(){

            console.log('init overv');

            if( ! api.provider.overview ){
                return;
            }

            $http.get(api.provider.overview).success(function(data){
                $this.data = data;
            });

            $interval.cancel(stopInit);

        }, 400);

        return this;
    })


/*------------------------------ Products ------------------------------*/
    .factory('products', function($http, api, $interval){
        var $this = this;

        var stopInit = $interval(function(){

            console.log('init pro');

            if( ! api.provider.products ){
                return;
            }

            $http.get(api.provider.products).success(function(data){
                $this.data = data;
            });

            $interval.cancel(stopInit);

        }, 400);


        return this;
    })






    ;