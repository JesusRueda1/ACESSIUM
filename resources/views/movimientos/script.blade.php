{{-- CAMARA --}}
<script type="text/javascript">
    function setNone() {
        $('[name=h1entrada]').css("display", 'none');
        $('[name=h1salida]').css("display", 'none');
        $('[name=tbl_perfil_tbl_fichas_id]').css("display", "none");
    }


    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    scanner.addListener('scan', function(content) {
        console.log(content);
        document.getElementById('tbl_movimientos_identificacion').value = parseInt(content);
        var id_sede = $("#form_movimiento").find("[name=tbl_movimientos_sede]").val();

        datos = {
            "tbl_movimientos_identificacion": content,
            "tbl_movimientos_sede": id_sede,
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/movimientos',
            data: datos,
            beforeSend: function() {
                console.log('enviada');
                $('[name=Divmovimiento]').css("display", "none");
                $('.loader').css("display", "block");
            },
            complete: function() {
                console.log('completada');
            },
            success: function(response) {
                var perfil = response.perfil;
                $('.loader').css("display", "none");

                if (response.valid == 'ok') {
                    $('[name=Divmovimiento]').css("display", "block");
                    setNone();
                    if (response.pase == 'entrada') {
                        $('[name=h1entrada]').css("display", 'block');
                        $('#Divmovimiento').removeClass('alert-danger');
                        $('#Divmovimiento').addClass('alert-success');
                    } else {
                        $('[name=h1salida]').css("display", 'block');
                        $('#Divmovimiento').removeClass('alert-success');
                        $('#Divmovimiento').addClass('alert-danger');
                    }

                    document.getElementById('tbl_perfil_tbl_tipo_identificacions_id').value = response.tipoi[0];
                    document.getElementById('tbl_perfil_nombres').value = perfil[0].tbl_perfil_nombres;
                    document.getElementById('tbl_perfil_tbl_tipo_personals_id').value = response.tipop[0];
                    ficha = response.fichaCod[0]

                    if (ficha != null) {
                        $('[name=tbl_perfil_tbl_fichas_id]').css("display", "block");
                        document.getElementById('programa').value = response.programa[0];
                        document.getElementById('tbl_perfil_tbl_fichas_id').value = response.fichaCod[0];
                    }

                    document.getElementById('tbl_perfil_idenficacion').value = response.identificacion[0];
                    document.getElementById('tbl_perfil_apellidos').value = response.apellidos[0];
                    document.getElementById('tbl_perfil_tbl_centros_id').value = response.centro[0];
                    document.getElementById('regional').value = response.regional[0];

                    path = response.imagen[0];
                    if (response.imagen[0] != null) {
                        var foto = document.getElementById("avatar");
                        foto.src = "/storage/images/" + response.imagen[0];
                    } else {
                        var foto = document.getElementById("avatar");
                        foto.src = "/img/sin_foto.jpg";
                    }

                    document.getElementById("tbl_movimientos_identificacion").value = " ";
                    $('#tbl_movimientos_identificacion').focus();

                } else {
                    $('[name=Divmovimiento_no]').css("display", "block");
                }

            },
            error: function(jqXHR) {
                console.log('error!');
            }
        });



    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });
</script>


<script>
    function consultar() {
        var doc = $("#form_movimiento").find("[name=tbl_movimientos_identificacion]").val();

        datos = {
            "tbl_movimientos_identificacion": doc,
        };

        if (doc.length > 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/movimientos',
                data: datos,
                beforeSend: function() {
                    console.log('enviada');
                    $('[name=Divmovimiento]').css("display", "none");
                    $('.loader').css("display", "block");
                },
                complete: function() {
                    console.log('completada');
                },
                success: function(response) {
                    var perfil = response.perfil;
                    $('.loader').css("display", "none");

                    if (response.valid == 'ok') {
                        $('[name=Divmovimiento]').css("display", "block");
                        setNone();
                        if (response.pase == 'entrada') {
                            $('[name=h1entrada]').css("display", 'block');
                            $('#Divmovimiento').removeClass('alert-danger');
                            $('#Divmovimiento').addClass('alert-success');
                        } else {
                            $('[name=h1salida]').css("display", 'block');
                            $('#Divmovimiento').removeClass('alert-success');
                            $('#Divmovimiento').addClass('alert-danger');
                        }

                        document.getElementById('tbl_perfil_tbl_tipo_identificacions_id').value =
                            response.tipoi[0];
                        document.getElementById('tbl_perfil_nombres').value = perfil[0]
                            .tbl_perfil_nombres;
                        document.getElementById('tbl_perfil_tbl_tipo_personals_id').value = response
                            .tipop[0];

                        ficha = response.fichaCod[0]

                        if (ficha != null) {
                            $('[name=tbl_perfil_tbl_fichas_id]').css("display", "block");
                            document.getElementById('programa').value = response.programa[0];
                            document.getElementById('tbl_perfil_tbl_fichas_id').value = response
                                .fichaCod[0];
                        }

                        document.getElementById('tbl_perfil_idenficacion').value = perfil[0]
                            .tbl_perfil_idenficacion[0];
                        document.getElementById('tbl_perfil_apellidos').value = perfil[0]
                            .tbl_perfil_apellidos[0];
                        document.getElementById('tbl_perfil_tbl_centros_id').value = response.centro[0];
                        document.getElementById('regional').value = response.regional[0];

                        path = response.imagen[0];
                        if (response.imagen[0] != null) {
                            var foto = document.getElementById("avatar");
                            foto.src = "/storage/images/" + response.imagen[0];
                        } else {
                            var foto = document.getElementById("avatar");
                            foto.src = "/img/sin_foto.jpg";
                        }

                        document.getElementById("tbl_movimientos_identificacion").value = " ";
                        $('#tbl_movimientos_identificacion').focus();

                    } else {
                        $('[name=Divmovimiento_no]').css("display", "block");

                    }

                },
                error: function(jqXHR) {
                    console.log('error!');
                }
            });
        }
        const audio = new Audio();
        audio.src = "../amogus.mp3";
        
    }


    let inputDocument = document.querySelector('#tbl_movimientos_identificacion')

    inputDocument.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            consultar();
        }
    })

    /* function ocultarAlerta() {
        setInterval(() => {
            $('[name=Divmovimiento]').css("display", "none");
            $('[name=Divmovimiento_no]').css("display", "none");
        }, 9000);
    } */
</script>
