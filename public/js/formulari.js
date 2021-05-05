$(document).ready(function() {

    let counter = 2;

    function categoriesInputs(counter) {

        var html =
            `<div class="modalitat">
                <div class="header-modalitat">
                    <h4>Modalitat ` + counter + `:</h4>
                    <button type="button" class="btn btn-danger eliminar far fa-times-circle"></button>
                </div>
                <div class="row">
                    <div class="col col-md-4 col-12">
                        <label>Nom modalitat *</label>
                        <input type="text" name="name_category" class="form-control" required>
                    </div>
                    <div class="col col-md-4 col-6">
                        <label>Quilòmetres *</label>
                        <input type="number" name="kms" class="form-control" required>
                    </div>
                    <div class="col col-md-4 col-6">  
                        <label>Desnivell Positiu *</label>
                        <input type="number" name="elevation_gain" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-3 col-6">
                        <label>Lloc Inici *</label>
                        <input type="text" name="location_start" class="form-control" required>
                    </div>
                    <div class="col col-md-3 col-6">
                        <label>Lloc Fi *</label>
                        <input type="text" name="location_finish" class="form-control" required>
                    </div>
                    <div class="col col-md-3 col-6">  
                        <label>Hora Inici *</label>
                        <input type="time" name="start_time" class="form-control" required>
                    </div>
                    <div class="col col-md-3 col-6">
                        <label>Preu *</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <label>Num. avituallaments *</label>
                        <input type="number" name="num_aid_station" class="form-control" required>
                    </div>
                    <div class="col col-md-6">  
                        <label>Num. participants *</label>
                        <input type="number" name="num_participants" class="form-control" required>
                    </div>
                </div>
            </div>`;
        $('.modalitats').append(html);

    }

    var add = document.querySelector('#add');
    add.addEventListener('click', () => {
        categoriesInputs(counter);
        counter++;
    });


    $(document).on('click', '.eliminar', function() {
        $(this).parent().parent().remove();
        counter--;
    });

    $('#formulari').on('submit', function(e) {
        console.log("click al submit");
        e.preventDefault();
        $.ajax({
            url: "{{ route('organizer.cursesorganitzador')}}",
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#save').attr('disabled', 'disabled');
            },
            success: function(data) {
                if (data.error) {
                    var errorhtml = '';
                    for (let i = 0; i < data.error.length; i++) {
                        errorhtml += '<p>' + data.error[i] + '</p>';
                        $('#result').html('<div class="alert alert-danger">' + errorhtml + '</div>');
                    }
                } else {
                    $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                }
                $('#save').attr('disabled', false);
            },
            error: function(response) {
                console.log(response);
            },
        })
    });

});