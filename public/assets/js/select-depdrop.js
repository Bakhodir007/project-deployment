$("select[data-is-parent]").on('change',function (){
    let children = $("select[data-parent-id='"+$(this).attr('id')+"']");
    $.ajax({
        method: 'GET',
        url: children.attr('data-url') + '/' + $(this).val(),
        success: function (data){
            children.html(null);
            children.append("<option selected disabled>select data</option>")
            if (data){
                $.each(data, function (id, name){
                    children.append(
                        "<option value='"+id+"'>" + name + "</option>"
                    )
                })
            }
        },
        error: function (data){
            console.log('error');
            console.log(data);
        }
    })
});