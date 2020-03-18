
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

var $ = require("jquery");
require('./bootstrap');
import 'summernote';
import 'jquery-countdown';
import 'datatables.net';
import 'datatables.net-dt';
import './get_new_activity';
import './update_presence';
import './question_crud';
import 'select2';

$(document).ready(function() {
    if($('body').height() < $(window).height()){
        $(this).height($(window).height()).css('position','relative')
        $('footer').css('position','absolute')
                .css('bottom',0)
                .css('left',0)
                .css('right',0)
    }
    
    $('select.form-control').select2()

    
    $('.summernote').each(function(e){
        var opt = $(this).data();
        $(this).summernote(opt);
    });
    $('.countdown').each(function(i){
        $(this).countdown($(this).data('finish'), function(event) {
            $(this).html(event.strftime('%H : %M : %S'));
        }).on('finish.countdown', function(){
            $('#formConfirmSubmit').submit()
        });;
    })
    $('.btn-answer-quiz').click(function(e){
        var self = this
        setTimeout(function(){
        console.log($(self).parents('.form-answer').serialize())
        $(self).parents('.form-answer').submit()
        },500)
    })
    $('.datatable').each(function(e){
        $(this).DataTable({
            buttons:['csv']
        });
    })
    $('.form-answer').submit(function(e){
        e.preventDefault()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:$(this).serialize(),
            method:'POST',
            url: $(this).prop('action')
        }).done(function(o){
            console.log(o)
            $('.question-nav-'+o.sequence)
                        .removeClass('btn-outline-primary')
                        .addClass('btn-secondary')
            if(o.type == 'multiple'){
                
//                var u_ans = $('.answer-option-id-'+o.answer)
//                           .removeClass('btn-outline-primary');
//                if(!o.correct){
//                   u_ans.addClass('btn-danger') 
//                }else{
//                    u_ans.addClass('btn-success')
//                }
//                u_ans.attr('disabled','disabled')
//                
//                for(var i in o.answer_key){
//                    console.log(o.answer_key[i])
//                    $('.answer-option-id-'+o.answer_key[i])
//                            .removeClass('btn-outline-primary')
//                            .addClass('btn-outline-success')
//                            .attr('disabled','disabled');
//                }  
//                $('.btn-submit-form-'+o.id).attr('disabled','disabled')
            }

        })
    })
        // Enable pusher logging - don't include this in production

    

});
