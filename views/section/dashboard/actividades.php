 <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="pull-left form-inline d-sm-inline-block">
            <div class="btn-group">
                <button class="btn btn-primary" data-calendar-nav="prev"><i class="fa fa-arrow-left"></i>  </button>
                <button class="btn" data-calendar-nav="today">Hoy</button>
                <button class="btn btn-primary" data-calendar-nav="next"><i class="fa fa-arrow-right"></i>  </button>
            </div>
            <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="year">Año</button>
                <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
            </div>
        </div>
        <div class="pull-right form-inline"><br>
            <button class="btn btn-primary" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
        </div>
    </div>
    <div class="row m-2 p-2">
        <div id="calendar"></div>
    </div>
    <!--ventana modal para el calendario-->
    <div class="modal fade" id="events-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                    <a href="#" data-dismiss="modal" style="float: right;"> <i class="fa fa-remove "></i> </a>
                    <br>
                </div>
                <div class="modal-body" style="height: 400px">
                    <p>One fine body&hellip;</p>
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <label for="from">Inicio</label>
                        <div class='input-group date' id='from'>
                            <input type='text' id="from" name="from" class="form-control" readonly />
                            <span class="input-group-addon"><span class="fa fa-calendar"></span>
                        </div>
                        <br>
                        <label for="to">Final</label>
                        <div class='input-group date' id='to'>
                            <input type='text' name="to" id="to" class="form-control" readonly />
                            <span class="input-group-addon"><span class="fa fa-calendar"></span>
                        </div>
                        <br>
                        <label for="tipo">Tipo de evento</label>
                        <select class="form-control" name="class" id="tipo">
                            <option value="event-info">Informacion</option>
                            <option value="event-success">Exito</option>
                            <option value="event-important">Importantante</option>
                            <option value="event-warning">Advertencia</option>
                            <option value="event-special">Especial</option>
                        </select>
                        <br>
                        <label for="title">Título</label>
                        <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">
                        <br>
                        <label for="body">Evento</label>
                        <textarea id="body" name="event" required class="form-control" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function(){
    var date = new Date();
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
    var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
    var options = {
        // definimos que los agenda se mostraran en ventana modal
        modal: '#events-modal', 

        // dentro de un iframe
        modal_type:'iframe',    

        //obtenemos los agenda de la base de datos
        events_source: '<?php echo $this->BaseUrl('index.php/dashboard/obtener_eventos');?>', 

        // mostramos el calendario en el mes
        view: 'month',             

        // y dia actual
        day: yyyy+"-"+mm+"-"+dd,   


        // definimos el idioma por defecto
        language: 'es-ES', 

        //Template de nuestro calendario
        tmpl_path: '<?php echo $this->BaseUrl('src/tmpls/');?>', 
        tmpl_cache: false,


        // Hora de inicio
        time_start: '06:00', 

        // y Hora final de cada dia
        time_end: '22:00',   

        // intervalo de tiempo entre las hora, en este caso son 30 minutos
        time_split: '30',    

        // Definimos un ancho del 100% a nuestro calendario
        width: '100%', 

        onAfterEventsLoad: function(events)
        {
            if(!events)
            {
                return;
            }
            var list = $('#eventlist');
            list.html('');

            $.each(events, function(key, val)
            {
                $(document.createElement('li'))
                .html('<a href="' + val.url + '">' + val.title + '</a>')
                .appendTo(list);
            });
        },
        onAfterViewLoad: function(view)
        {
            $('#page-header').text(this.getTitle());
            $('.btn-group button').removeClass('active');
            $('button[data-calendar-view="' + view + '"]').addClass('active');
        },
        classes: {
            months: {
                general: 'label'
            }
        }
    };
    var calendar = $('#calendar').calendar(options);
    $('.btn-group button[data-calendar-nav]').each(function()
    {
        var $this = $(this);
        $this.click(function()
        {
            calendar.navigate($this.data('calendar-nav'));
        });
    });
    $('.btn-group button[data-calendar-view]').each(function()
    {
        var $this = $(this);
        $this.click(function()
        {
            calendar.view($this.data('calendar-view'));
        });
    });
    $('#first_day').change(function()
    {
        var value = $(this).val();
        value = value.length ? parseInt(value) : null;
        calendar.setOptions({first_day: value});
        calendar.view();
    });
    $('#from').datetimepicker({
            language: 'es',
            minDate: new Date()
    });
    $('#to').datetimepicker({
        language: 'es',
        minDate: new Date()
    });
});
</script>
