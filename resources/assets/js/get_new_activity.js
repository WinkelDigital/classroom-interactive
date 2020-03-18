/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require('./bootstrap');
    if($('#classroom').length){
        //pusher only on classroom
        Pusher.logToConsole = true;

        var pusher = new Pusher('5cc3333cf7b2bc512b42', {
          cluster: 'ap1',
          encrypted: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            var activity_id = data.message.id;
            $.ajax({
                url:'/activities/'+activity_id,
                dataType:'json'
            }).done(function(o){
                var title = '';
                var name = o.name;
                var action = ''
                switch(o.type){
                    case 'file':
                       title='<i class="fa fa-file"></i> File' 
                       if(!name){
                           name = o.file.name
                       }
                       action = 'Download'
                       break;
                    case 'topic':
                       title='<i class="fa fa-pencil"></i> Quiz ' 
                       if(!name){
                           name = o.topic.name
                       }                   
                       action = 'Read Topic'
                       break;
                    case 'quiz':
                       if(!name){
                           name = o.quiz.name
                       }                             
                       title='<i class="fa fa-file-text"></i> Topic ' 
                       action = 'Take Quiz'
                       break;
                }
                $('.no-activity').remove()
                var newactivity = '<div class="card activity-list-item activity-list-item-active">'
                newactivity += '<div class="card-header">'+title+'</div>'
                newactivity += '<div class="card-body"><div class="activity-list-item-head"><span class="float-right">A moment ago</span><h4>'+name+'</h4></div></div>'
                newactivity += '<div class="card-footer"><a href="/activities/'+o.id+'" class="btn btn-secondary text-white float-right"><i class="fa fa-file-o"></i> '+ action +'</a></div></div>'       
                $('#list-activity-active-'+window.location.href.split('/')[4]).prepend(newactivity)
            })
        });
    }