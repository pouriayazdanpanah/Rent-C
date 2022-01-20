$(document).ready(function (){
    $('#reservation').daterangepicker();


    $('.delete-image').on('click' , function (e){
        e.preventDefault();
        var image_id = $(this).attr('data-id');

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json',
            }
        })
        $.ajax({
            type : 'delete',
            url:'delete_image/'+image_id,
            success :  $(this).parent().parent().parent().parent().parent().remove(),

        })
    })

    function extracted(date) {
        var split_item = date.split('-');

        var start = split_item[0];
        // var split_start = split_item[0].split('/');
        // var start = split_start[2].trim() + '-' + split_start[0].trim() + '-' + split_start[1].trim();

        var end = split_item[1];
        // var split_end = split_item[1].split('/');
        // var end = split_end[2].trim() + '-' + split_end[0].trim() + '-' + split_end[1].trim();
        return {start, end};
    }


    $('#update-date').on('click' , function (){

        // $(document).ajaxStart(function ()
        // {
        //     $('#apply').children('txt').hide();
        //     $('#loading').show();
        // }).ajaxSuccess(function ()
        // {
        //     $('#loading').hide();
        //     $('#apply').children('txt').show();
        //     $('#collapsePersonNumber').collapse('hide');
        // })

        var date = $("#reservation").daterangepicker().val()

        var {start, end} = extracted(date);
        var slug = document.head.querySelector('meta[name="slug"]').content;
        let data = {
            date_start: start,
            date_end: end,
        }

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json',
            }
        })
        $.ajax({
            type : 'patch',
            url:slug+'/update_date',
            data:JSON.stringify(data),
            success: function (data){
                $('#start').text(data.start);
                $('#end').text(data.end);
            }
        })
    });
})
