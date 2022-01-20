$(document).ready(function ()
{
    $(".favorite").on('click' , function (e){
        e.preventDefault();
        var target = $(e.target);
        var type = target.attr('data-type');
        var slug = target.attr('data-slug');
        let data;

        if (type == 1){

            data = {
                favorite :1
            }
        }else {
            data = {
                favorite :0
            }
        }

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-type':'application/json'
            }
        });

        $.ajax({
            type:'Post',
            url:'/bookmark/'+slug,
            data:JSON.stringify(data),
            success : function (data){
                if (data.status == 'success') {
                    if (data.favorite == 1) {
                        target.removeClass('far');
                        target.addClass('fa');
                        target.attr('data-type', 0);
                        swal({
                            title: "Saved",
                            text: "This Home save as your favorite",
                            icon: "success",
                            button: "Ok",
                        })
                    } else {
                        target.removeClass('fa');
                        target.addClass('far');
                        target.attr('data-type', 1);
                    }
                }
            }

        })
    })
})
