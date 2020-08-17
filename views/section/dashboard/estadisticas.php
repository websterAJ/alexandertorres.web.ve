<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tablero de estadisticas mundial</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Casos Confirmados</div>
                </div>
                <div class="col-auto">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="CC"></span></div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Casos Recuperados</div>
                </div>
                <div class="col-auto">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="CR"></span></div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fallecidos</div>
                
                </div>
                <div class="col-auto">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="CF"></span></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12" style="height: 500px;" id="container"></div>
    </div>
    <!-- / Page Content -->
</div>
<!-- /.container-fluid -->
<script src="<?php echo $this->BaseUrl('assets/js/anychart/anychart-base.min.js');?>"></script>
<script src="<?php echo $this->BaseUrl('assets/js/anychart/anychart-ui.min.js');?>"></script>
<script src="<?php echo $this->BaseUrl('assets/js/anychart/anychart-data-adapter.min.js');?>"></script>
<script src="<?php echo $this->BaseUrl('assets/js/anychart/anychart-exports.min.js');?>"></script>
<script src="<?php echo $this->BaseUrl('assets/js/anychart/anychart-map.min.js');?>"></script>
<script src="<?php echo $this->BaseUrl('assets/js/anychart/geodata/world/world.js');?>"></script>
<script src="<?php echo $this->BaseUrl('assets/js/anychart/proj4.js');?>"></script>
<script>
anychart.onDocumentReady(function () {
    $.ajax({
        url: "https://corona.lmao.ninja/v2/countries",
        dataType: 'json',
        method: "GET",
        async:false,
        success: function(data) {
            var json_final = [];
            for (var i in data) {
                var array = {};
                array['name']=data[i].country;
                array['id']= data[i].countryInfo.iso2;
                array['cases']= data[i].cases;
                array['todayCases']= data[i].todayCases;
                array['deaths']= data[i].deaths;
                array['todayDeaths']= data[i].todayDeaths;
                array['recovered']= data[i].recovered;
                array['active']= data[i].active;
                array['critical']= data[i].critical;
                array['casesPerOneMillion']= data[i].casesPerOneMillion;
                array['deathsPerOneMillion']= data[i].deathsPerOneMillion;
                array['tests']= data[i].tests;
                array['testsPerOneMillion']= data[i].testsPerOneMillion;
                json_final.push(array);
            }
            console.log(json_final);
            anychart.data.loadJsonFile('https://cdn.anychart.com/samples/maps-general-features/world-choropleth-map/data.json',(data) => {
                console.log(data);
                var json = [];
                for(var i in data){
                    if(data[i].id == json_final[i].id){
                        json.push(data[i]);
                    }
                };
                console.log(json);
               // define the dataSet
                //var dataSet = anychart.data.set(data);

                // create the map
                var map = anychart.map();

                // define the geoData
                map.geoData('anychart.maps.world');

                // set the chart title
                map.title('Countries where Spanish is an Official Language');

                // disable points selection feature
                map.interactivity().selectionMode('none');

                // define the series
                var series = map.choropleth(dataSet);

                // adjust the series
                series.geoIdField('iso_a2');

                // disable the series labels
                series.labels(null);

                map.tooltip()
                        .useHtml(true)
                        .title({fontColor: '#7c868e'})
                        .padding([8, 13, 10, 13])
                        .titleFormat(function () {
                            return this.name
                        })
                        .format(function () {
                            var span_for_value = '<span style="color: #545f69; font-size: 12px; font-weight: bold">';
                            var span_for_description = '<br/><span style="color: #545f69; font-size: 10px">';
                            var result = span_for_value + this.value + '</span></strong>';
                            if (getDescription(this.id) != undefined && getDescription(this.id) != '')
                                return result + span_for_description + getDescription(this.id) + '</span></strong>';
                            return result;
                        });
                map.tooltip().background()
                        .enabled(true)
                        .fill('#fff')
                        .stroke('#c1c1c1')
                        .corners(3)
                        .cornerType('round');

                // create zoom controls
                var zoomController = anychart.ui.zoom();
                zoomController.render(map);

                // set container id for the chart
                map.container('container');
                // initiate chart drawing
                map.draw();

                // create a function for description
                function getDescription(id) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].id == id) return data[i].description
                    }
                }
            });
            
        }
    });

    /**anychart.data.loadJsonFile('https://corona.lmao.ninja/v2/countries', function (data) {


       
        // create zoom controls
        var zoomController = anychart.ui.zoom();
        zoomController.render(map);

        // set container id for the chart
        map.container('container');
        // initiate chart drawing
        map.draw();
    }); */
});
</script>