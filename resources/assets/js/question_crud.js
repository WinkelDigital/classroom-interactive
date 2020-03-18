/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    $('.btn-delete-option').click(function(e){
        e.preventDefault()
        $(this).parents('.answer-options')
                .find('.input-answer-option').
                val('')
    })
})