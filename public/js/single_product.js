$(document).ready(function()
{
    $('.sendComment').on('click' , function ()
    {
        $('#commentBody').toggleClass('disabled');
    })

    /**owlCarousel tools*/
    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:3,
        nav:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:2,
                margin:100,
                nav:false
            },
            1000:{
                items:3,
                center:true,
                nav:false,
                loop:false
            }
        }
    });

    $('#reservation').daterangepicker();

    $('.textarea').summernote();

    $('#loading-favorite').hide();
    $('#loading').hide();

    var counter_0 = $('.per_counter');
    var btn_inc_0 = $('.per_btn_inc');
    var btn_dec_0 = $('.per_btn_dec');
    var number_0 = 1;
    var counter_1 = $('.gue_counter');
    var btn_inc_1 = $('.gue_btn_inc');
    var btn_dec_1 = $('.gue_btn_dec');
    var number_1 = 0;

    var btn_val = $('.btn-val');
    var apply = $('#apply')
    var slug = document.head.querySelector('meta[name="slug"]').content;

    btn_inc_0.on('click' , function (){
        number_0++;
        counter_0.text(number_0);
    })

    btn_dec_0.on('click' , function (){
        if (number_0 > 1){
            number_0--;
            counter_0.text(number_0);
        }
    })

    btn_inc_1.on('click' , function (){
        number_1++;
        counter_1.text(number_1);
    })
    btn_dec_1.on('click' , function (){
        if (number_1 > 0){
            number_1--;
            counter_1.text(number_1);
        }
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


    apply.on('click' , function (){

        $(document).ajaxStart(function ()
        {
            $('#apply').children('txt').hide();
            $('#loading').show();
        }).ajaxSuccess(function ()
        {
            $('#loading').hide();
            $('#apply').children('txt').show();
            $('#collapsePersonNumber').collapse('hide');
        })

        var value = number_0 + number_1;
        btn_val.text(value + ' Persons');

        var date = $("#reservation").daterangepicker().val()

        var {start, end} = extracted(date);

        let data = {
            date_start: start,
            date_end: end,
            adults : number_0,
            guests : number_1,

        }

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json',
            }
        })
        $.ajax({
            type : 'Post',
            url:'/expense/'+slug,
            data:JSON.stringify(data),
            success : function (data){
                if (data.status == 'success'){
                   $('#refresh').load(" #refresh")
                }

                if (data.status == 'error'){
                   if (data.no_date){
                       swal({
                           title: "Invalid reservation date",
                           text: "Please select correct date",
                           icon: "error",
                           button: "Ok!",
                       });
                   }
                   if (data.inaccessibility){
                       swal({
                           title: "Not available",
                           text: "Room not available on this date",
                           icon: "error",
                           button: "Ok!",
                       });
                   }
                }
            }
        })
    });


    $('#favorite').on('click' , function (){

        // $(document).ajaxStart(function ()
        // {
        //     $('#loading-favorite').show();
        //     $('#favorite').children('.title').text('Loading...');
        //     $('#favorite').children('.fa-heart').hide();
        //
        //     }).ajaxStop(function ()
        // {
        //     $('#loading-favorite').hide();
        //     $('#favorite').children('.fa-heart').show();
        // });

        var data_id = $('#favorite').attr('data-id');

        let data;
        if (data_id == 1){

            data = {
                 favorite :1
             }
        }else {
            data = {
                 favorite :0
             }
        }


        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json',
            }
        })
        $.ajax({
            type : 'Post',
            url:'/bookmark/'+slug,
            data:JSON.stringify(data),
            success : function (data){
                if (data.status == 'success') {
                    if (data.favorite == 1) {
                        $('#favorite').removeClass('btn-outline-secondary');
                        $('#favorite').addClass('btn-red-light');
                        $('#favorite').children('.title').text('Your favorite');
                        $('#favorite').attr('data-id', 0);
                    } else {
                        $('#favorite').removeClass('btn-red-light');
                        $('#favorite').addClass('btn-outline-secondary');
                        $('#favorite').children('.title').text('Add as your favorite');
                        $('#favorite').attr('data-id', 1);
                    }
                }
            }
        })
    });



    $('.sendCommentForm').on('submit' , function (event)
    {
        event.preventDefault();

        let target = event.target;
        var slug = document.head.querySelector('meta[name="slug"]').content;
        let data = {
            comment : target.querySelector('textarea[name = "comment"]').value,
            parent_id : target.querySelector('input[name="parent_id"]').value,
        }

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json',
            }
        })
        $.ajax({
            type:'POST',
            url:'/comment/'+slug,
            data : JSON.stringify(data),
            success : function (data){
                swal({
                    title: "Your comment send",
                    text: "Please wait for approval it",
                    icon: "success",
                    button: "Ok!",
                });
            }
        })
    });

    $('#sendMessage').on('submit' , function (event)
    {
        event.preventDefault();

        let target = event.target;
        var slug = document.head.querySelector('meta[name="slug"]').content;
        var user_id = target.querySelector('input[name="user"]').value;

        let data = {
            phone : target.querySelector('input[name="phone"]').value,
            message : target.querySelector('textarea[name = "message"]').value,

        }

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json',
            }
        })
        $.ajax({
            type:'POST',
            url:'/message/user/'+user_id+'/product/'+slug,
            data : JSON.stringify(data),
            success : function (data){
                swal({
                    title: "Your Message send",
                    text: "Please wait for response it",
                    icon: "success",
                    button: "Ok!",
                });
            }
        })
    });


});
