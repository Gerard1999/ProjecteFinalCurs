$(document).ready(function() {
    
    let counter = 1;

    function categoriesInputs(counter) {
        var html = "<tr>";
        html += '<td><input type="text" name="name_category[]" /></td>';
        html += '<td><input type="text" name="kms[]" /></td>';
        html += '<td><button type="button" name="remove" id="remove"' +
        'class="btn btn-danger eliminar">Remove</button></td></tr>';
        console.log(counter);
        $('form').append(html);          

    }

    var add = document.querySelector('#add');
    add.addEventListener('click', ()=>{
        counter++;
        categoriesInputs(counter);
    });


    $(document).on('click', '.eliminar', function(){
        $(this).parent().parent().remove();
        counter--;
    });

    $('#formulari').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('organizer.races.store')}}",
            method: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function(){
                $('#save').attr('disabled', 'disabled');
            },
            success: function(){
                if(data.error){
                    var errorhtml = '';       
                    for (let i = 0; i < data.error.length; i++) {
                        errorhtml += '<p>'+ data.error[i] +'</p>';
                        $('#result').html('<div class="alert alert-danger">' + errorhtml + '</div>');
                    }
                } else {
                    categoriesInputs(1);
                    $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
    });

});