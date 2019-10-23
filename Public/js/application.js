/* 
* @Author: J.Y Han
* @Date:   2013-11-02 12:44:25
* @Email:  jiyun@han.im
* @Last modified by:   hanjiyun
* @Last Modified time: 2013-11-30 17:21:48
*/

$(function(){

    var $modalSYS = $('#sys-modal');

    // tooltip
    $('.tooltips').tooltip();

    // 导航下拉
    $('#header .navbar-nav-user').hover(function(){
        $(this).addClass('active');
        $(this).find('.dropdown').show();
    },function(){
        $(this).removeClass('active');
        $(this).find('.dropdown').hide();
    })

    // 导航搜索框
    $('#header .navbar-form input').focus(function(){
        $(this).attr('placeholder', '视频、资源、手记、帖子')
        $(this).parents('.navbar-form').eq(0).addClass('search_opend')
    }).blur(function(){
        $(this).attr('placeholder', '搜索')
        $(this).parents('.navbar-form').eq(0).removeClass('search_opend')
    })

    // 回应 删除 举报 显示隐藏
    $('.review_reply li').hover(function(){
        $(this).find('.g_r_ctl').css({
            'visibility':'visible'
        })
    },function(){
        $(this).find('.g_r_ctl').css({
            'visibility':'hidden'
        })
    })

    // 顶
    $('.v_up').click(function(){

        if($(this).hasClass('active')){
            return;
            // alert('已经顶过了')
        }else{
            var t = $(this),
                a = t.find('a'),
                film_id = parseInt(a.data('filmid')),
                action = 'vote';

            var data =  { film_id : film_id, action : action };
            
            t.addClass('active');
            $('.v_down').removeClass('active').find('a').html('<i class="icon-thumbs-down"></i>');

            $.ajax({
                url : '__URL__/videoup',
                type : 'POST',
                contentType : 'application/json;charset=UTF-8',
                data : JSON.stringify(data),
                dataType : "json",
                beforeSend : function(XMLHttpRequest){
                    a.html('<i class="icon-thumbs-up"></i> 稍等...')
                 },
                success:function(mes){
                    if (mes.ok == 'ok'){
                        a.html('<i class="icon-thumbs-up"></i> 已顶');
                    }
                },
                complete:function(XMLHttpRequest,textStatus){
                    //
                },
                error:function(XMLHttpRequest, textStatus, errorThrown){
                    t.removeClass('active').find('a').html('<i class="icon-thumbs-up"></i> 顶');
                    var m = JSON.parse(XMLHttpRequest.responseText)
                    if(m.errnum == 300){
                        var location = window.location;
                        m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                    }
                    $modalSYS.modal().find('.modal-body').html(m.errmsg)
                }
            })
        }
    })

    // 踩
    $('.v_down').click(function(){

        if($(this).hasClass('active')){
            return;
            // alert('已经踩过了')
        }else{
            var t = $(this),
                a = t.find('a'),
                film_id = parseInt(a.data('filmid')),
                action = 'unvote';

            var data =  { film_id : film_id, action : action };
            
            t.addClass('active');
            $('.v_up').removeClass('active').find('a').html('<i class="icon-thumbs-up"></i> 顶');

            $.ajax({
                url : '/api/film/vote',
                type : 'POST',
                contentType : 'application/json;charset=UTF-8',
                data : JSON.stringify(data),
                dataType : "json",
                beforeSend : function(XMLHttpRequest){
                    a.html('<i class="icon-thumbs-down"></i> 稍等...')
                 },
                success:function(mes){
                    if (mes.ok == 'ok'){
                        a.html('<i class="icon-thumbs-down"></i> 已踩');
                    }
                },
                complete:function(XMLHttpRequest,textStatus){
                    //
                },
                error:function(XMLHttpRequest, textStatus, errorThrown){
                    t.removeClass('active').find('a').html('<i class="icon-thumbs-down"></i>');
                    var m = JSON.parse(XMLHttpRequest.responseText)
                    if(m.errnum == 300){
                        var location = window.location;
                        m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                    }
                    $modalSYS.modal().find('.modal-body').html(m.errmsg)
                }
            })
        }
    })


    // 喜欢&取消喜欢 收藏/取消收藏
    
    $('.btn-lik').click(function(){

        var t = $(this),
            content_id = t.data('content_id'),
            content_type = t.data('content_type'),
            count = parseInt(t.find('em').text());

        //error vaild
        if (count < 0) return;
        if (t.hasClass('active') && count == 0) return;

        if(t.hasClass('active')){
            var action = 'unlike';
            count = count - 1;
        } else {
            var action = 'like';
            count = count + 1;
        }

        var data =  { content_id : content_id, content_type : content_type, action : action };

        $.ajax({
            url : '/api/content/like',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(data),
            dataType : "json",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                if (mes.ok == 'ok'){
                    
                    if(t.hasClass('active')){
                        t.removeClass('active');
                    } else {
                        t.addClass('active');
                    }
                    t.find('em').html(count); //rewrite count
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                // $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalSYS.modal().find('.modal-body').html(m.errmsg)
            }
        })
    })

    // 关注
    $('#btn-follow').click(function(){
        var t = $(this);
        var user_id = t.data('userid');
        var data =  { user_id : user_id, action : 'follow' };

        $.ajax({
            url : '/api/user/follow',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(data),
            dataType : "json",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                if (mes.ok == 'ok'){
                    t.addClass('hide');
                    t.next('.btn-group').removeClass('hide');
                    location.reload();

                }
            },
            complete:function(XMLHttpRequest,textStatus){
                // $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalSYS.modal().find('.modal-body').html(m.errmsg)
            }
        })
     })


    // 取消关注
    $('#btn-nofollow').click(function(){

        var t = $(this);
        var user_id = t.data('userid');
        var data =  { user_id : user_id, action : 'unfollow' };

        $.ajax({
            url : '/api/user/follow',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(data),
            dataType : "json",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                if (mes.ok == 'ok'){
                    t.parents('.btn-group').eq(0).addClass('hide');
                    t.parents('.btn-group').eq(0).prev('#btn-follow').removeClass('hide');
                    location.reload();
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                // $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalSYS.modal().find('.modal-body').html(m.errmsg)
            }
        })
     })


    // 鼠标移至剧照评论
    $(document).on('mouseover','.report-comment',function(){
        $(this).find('.group_banned span').css({'visibility':'inherit'});
    }).on('mouseout','.report-comment',function(){
        $(this).find('.group_banned span').css({'visibility':'hidden'});
    })


    // 删除剧照评论
    $(document).on('click','.photo_comm_del_btn',function(){
        var $this = $(this);
        var oParent = $(this).parents('.group_banned');
        var photo_id = oParent.data('photoid');
        var creater_id = oParent.data('createrid');
        var id = oParent.data('id');
        var data = {
            'id' : id,
            'photo_id' : photo_id,
            'creater_id' : creater_id
        }

        $.ajax({
            url : '/api/photo/com_del',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(data),
            dataType : "json",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');

                if(mes.ok == true){
                    del_comm( $this )
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                // $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalSYS.modal().find('.modal-body').html(m.errmsg)
            }
        })

        function del_comm( obj ) {
            obj.parents('.comment-item').fadeOut(200,function(){
                obj.remove();
            });
        }
    })



    // 发表剧照评论
    $('.comm_btn').click(function() {

        var comm = $('#photo_comm').val();
        var data = {'comm':comm, 'photo_id':photo_id} 

        $.ajax({
            url : '/api/photo/com_new',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(data),
            dataType : "json",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');

                if(mes.ok == true){
                    add_comm( mes.data )
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                // $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalSYS.modal().find('.modal-body').html(m.errmsg)
            }
        })

        function add_comm( data ) {
            $('.photo-comment-list').prepend(data);
            $('.form-control').val('');
        }

    })





    $('#daily-from .btn').click(function() {
        rate = $('#n_rating').val()
        if(!rate){
            $('#rateword').html('请打分');
            return false;
        }else {
            return true;
        }

    })

    // 字数检查
    // 每日一评
    $('#daily-from textarea.charsFrom').NobleCount('.charsLeft',{
        on_negative: 'go_red',
        on_positive: 'go_green',
        max_chars: 140,
        on_update: function(t_obj, char_area, c_settings, char_rem){
            var form = t_obj.parents('form').eq(0),
                charsText = form.find('.charsText'),
                btn = form.find('button');
            if (char_rem < 0) {
                charsText.html('已超出');
                btn.addClass('disabled btn-default').removeClass('btn-success').prop('disabled',true)
            } else if(char_rem == 140) {
                charsText.html('还可以输入');
                btn.addClass('disabled btn-default').removeClass('btn-success').prop('disabled',true)
            } else {
                charsText.html('还可以输入');
                btn.removeClass('disabled btn-default').addClass('btn-success').prop('disabled',false)
            }
        }
    });

    // 短评字数检查
    $('#short-review-form textarea.charsFrom').NobleCount('.charsLeft',{
        on_negative: 'go_red',
        on_positive: 'go_green',
        max_chars: 140,
        on_update: function(t_obj, char_area, c_settings, char_rem){
            var dialog = t_obj.parents('.modal-dialog').eq(0),
                charsText = dialog.find('.charsText'),
                btn = dialog.find('button.btn-review-push');
            if (char_rem < 0) {
                charsText.html('已超出');
                btn.addClass('disabled btn-default').removeClass('btn-primary').prop('disabled',true)
            } else if(char_rem == 140) {
                charsText.html('还可以输入');
                btn.addClass('disabled btn-default').removeClass('btn-primary').prop('disabled',true)
            } else {
                charsText.html('还可以输入');
                btn.removeClass('disabled btn-default').addClass('btn-primary').prop('disabled',false)
            }
        }
    });

    // 个人简介
    // $('#profile-form #profile_intro').NobleCount('.charsLeft',{
    //     on_negative: 'go_red',
    //     on_positive: 'go_green',
    //     max_chars: 200,
    //     on_update: function(t_obj, char_area, c_settings, char_rem){
    //         console.log(char_rem)
    //         if (char_rem < 0) {
    //             $('#profile-from .charsText').html('已超出');
    //             $('#profile-from button').addClass('disabled btn-default').removeClass('btn-success').prop('disabled',true)
    //         } else if(char_rem == 140) {
    //             $('#profile-from .charsText').html('还可以输入');
    //             $('#profile-from button').addClass('disabled btn-default').removeClass('btn-success').prop('disabled',true)
    //         } else {
    //             $('#profile-from .charsText').html('还可以输入');
    //             $('#profile-from button').removeClass('disabled btn-default').addClass('btn-success').prop('disabled',false)
    //         }
    //     }
    // });


// ===========
// modal - 购买电影
    var $modalBuy = $('#film-buy-modal'),
        $modalBuy_body = $modalBuy.find('.modal-body');

    // 弹出窗口
    $('a[data-toggle=modal-buy]').on('click', function(){

        var buy_film_id = parseInt($(this).attr('data-film-id')),
            buy_json_data =  { film_id : buy_film_id };

        $.ajax({
            url : '/api/film/balance',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(buy_json_data),
            dataType : "json",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                if (mes.ok == false){
                    $modalBuy.find('.modal-body').html('余额不足，<a href="/account/recharge?film_id=' + buy_film_id + '">去充值</a>');
                    $modalBuy.find('.modal-footer').hide();
                    $modalBuy.modal();
                } else if(mes.ok == true){
                    $modalBuy.find('.modal-body').html('<p>确认要购买《' + mes.film.title + '》吗？</p><p>价格：'+ mes.film.price +'元</p>');
                    $modalBuy.find('.modal-footer').show();
                    $modalBuy.modal();
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                 $('body').modalmanager('removeLoading');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalBuy.find('.modal-body').html('<p class="alert alert-error">' + m.errmsg + '</p>');
                $modalBuy.find('.modal-footer').hide();
                $modalBuy.modal();
            }
        })
    });

    // 确认购买
    $modalBuy.on('click', '.btn-film-buy', function(){
        
        var film_id = parseInt($(this).data('film-id'));

        //ajax
        $.ajax({
            url : '/account/recharge?film_id='+ film_id,
            type : 'POST',
            beforeSend : function(XMLHttpRequest){
                 $modalBuy_body.modalmanager('loading');
             },
            success:function(mes){
                if(mes.ok == true){
                    $modalBuy.find('.modal-footer').hide();
                    $modalBuy.find('.modal-body').html('').prepend('购买成功, 可以观看了');

                    // 1.5秒后自动关闭modal 刷新页面
                    setTimeout(function(){
                        $modalBuy.modal('hide');
                        $modalBuy.on('hidden', function(){
                            $(this).data('modal', null);
                        });
                        // window.location.reload();
                        window.location.href='/film/' + film_id + '#player';
                    }, 1500)
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                 $('body').modalmanager('removeLoading');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalBuy.find('.modal-body').html('<p class="alert alert-error">' + m.errmsg + '</p>');
                $modalBuy.find('.modal-footer').hide();
                $modalBuy.modal();
            }
        })

    });


    // modal - 发表短评
    var $modalReview = $('#short-review-modal'),
        $modalReview_body = $modalReview.find('.modal-body');

    // 弹出窗口
    $('a[data-toggle=modal-review]').on('click', function(){
        $('body').modalmanager('loading');
            $modalReview.modal();
            console.log($modalReview.find('textarea').size())

            setTimeout(function(){
                $modalReview.find('textarea#short_content').focus();
            },500)
    });
    /*
    // 发表短评
    $modalReview.on('click', '.btn-review-push', function(){
        var film_id = parseInt($(this).attr('data-film-id')),
            content = $('textarea#short_content').val(),
            rate = parseInt($("input#n_rating").val());

        if (!rate){ rate = 0 };

        var json_data =  { film_id : film_id, content : content, rate : rate };

        $.ajax({
            url : '__APP__/Comment/video_addcom',
            type : 'POST',
            contentType : 'application/json;charset=UTF-8',
            data : JSON.stringify(json_data),
            dataType : "text",
            beforeSend : function(XMLHttpRequest){
                 $('body').modalmanager('loading');
             },
            success:function(mes){
                if (mes!=="ok"){
                    $modalReview.find('form, .modal-footer').hide();
                    $modalReview.find('.modal-body').append('<p class="alert alert-warning">出现问题</p>');
                } else if(mes === "ok"){
                    $modalReview.find('form, .modal-footer').hide();
                    $modalReview.find('.modal-body').append('<p class="alert alert-success">发布成功</p>');
                    setTimeout(function(){
                        $modalReview.modal('hide'); //发布成功后自动隐藏modal
                        location.reload()// 刷新页面
                    }, 500);
                }
            },
            complete:function(XMLHttpRequest,textStatus){
                 $('body').modalmanager('removeLoading');
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                var m = JSON.parse(XMLHttpRequest.responseText)
                if(m.errnum == 300){
                    var location = window.location;
                    m.errmsg =  '还没有登录，请先 <a class="btn btn-success" href="/login?next='+ location +'">登录</a>';
                }
                $modalReview.find('form').hide();
                $modalReview.find('.modal-body').append('<p class="alert alert-error">' + m.errmsg + '</p>');
                $modalReview.find('.modal-footer').hide();
                $modalReview.modal();
            }
        })
    });
    
    // 关闭时 重置modal
    $modalReview.on('hidden', function(){
        $(this).find('.alert').remove();
        $(this).find('form').show();
        $(this).find('.modal-footer').show();
    });
    */
// =======
// 回复 reply
    $('.g_reply_btn').click(function(){
        var t = $(this),
            reply_id = t.data('reply-id'),
            p_username = t.parents('li').eq(0).find('.m_n_item_info a').eq(1).text(),
            p_user_link = t.parents('li').eq(0).find('.m_n_item_info a').eq(1).attr('href'),
            cont = t.parents('li').eq(0).find('p').text();

        if( cont.length > 35 ){
            cont = cont.substr(0,35) + '...';
        }

        $('#reply_form .is_reply p').html(cont);
        $('#reply_form .is_reply span a').attr('href',p_user_link).html(p_username);
        $('#parent_id').val(reply_id);
        $('#reply_form .is_reply').removeClass('hide');
        $(document).stop().scrollTo('#reply_form', 400);
        $('#reply_form textarea').focus();
    })

    $('.is_reply .close').click(function(){
        $('#parent_id').val('-1');
        $(this).parents('.is_reply').addClass('hide');
    })


// item_cover hover
    $(document).on('mouseover','.item_cover, .pay_f',function(){
        $(this).parents('li').eq(0).find('.item_cover').addClass('active');
    }).on('mouseleave','.item_cover, .pay_f',function(){
        $(this).parents('li').eq(0).find('.item_cover').removeClass('active');
    });

    // $('.item_cover, .pay_f').hover(function(){
    //     $(this).parents('li').eq(0).find('.item_cover').addClass('active');
    // },function(){
    //     $(this).parents('li').eq(0).find('.item_cover').removeClass('active');
    // })

// auto hide alerts
    setTimeout(function(){
        if(typeof(is_auto) == 'undefined') {
            $('#alerts').slideUp();
        }
    },1200)

    // 重新激活按钮
    $('#rea_btn').click(function() {
        email = $('#email').val();
        password = $('#password').val();

        data = {email:email, password:password}

        $.post('/reactivate_email', data, function(res) {
            if(res == 'ok'){
                window.location.href = '/reactivate_email';
            } else {
                alert('邮件发送失败')
            }
        })

    });




//页面滚动
    $(window).scroll(function() {
        //导航和回顶部的显隐
        var t = $(window).scrollTop();
        console.log(t)
        if(t > 1024){
            $('#goTop').fadeIn();
        }
        if (t <= 1024){
            $('#goTop').fadeOut();
        }
    })

// 回顶端 
    $('#goTop').click(function(){
        $(document).stop().scrollTo(0, 400);
    })

// check Browser
    function showBrowserTip(){
        $('#browser').show().html('我们发现您当前使用的浏览器比较旧了，推荐您升级浏览器，或者使用Chrome、火狐等高级浏览器来访问我们的网站');
    }
    function isBrowser(){
        var Sys={};
        var ua=navigator.userAgent.toLowerCase();
        var s;
        (s=ua.match(/msie ([\d.]+)/))?Sys.ie=s[1]:
        (s=ua.match(/firefox\/([\d.]+)/))?Sys.firefox=s[1]:
        (s=ua.match(/chrome\/([\d.]+)/))?Sys.chrome=s[1]:
        (s=ua.match(/opera.([\d.]+)/))?Sys.opera=s[1]:
        (s=ua.match(/version\/([\d.]+).*safari/))?Sys.safari=s[1]:0;
        if(Sys.ie){//Js判断为IE浏览器
            if(Sys.ie=='10.0'){
                // nothing to do
            }else if(Sys.ie=='9.0'){
                //Js判断为IE 9
            }else if(Sys.ie=='8.0' || Sys.ie=='7.0' || Sys.ie=='6.0'){
                //Js判断为IE 8
                showBrowserTip()
            }
        }
        if(Sys.firefox){
            //Js判断为火狐(firefox)浏览器
            // nothing to do
        }
        if(Sys.chrome){
            //Js判断为谷歌chrome浏览器
            // nothing to do
        }
        if(Sys.opera){
            //Js判断为opera浏览器
            // nothing to do
        }
        if(Sys.safari){
            //Js判断为苹果safari浏览器
            // nothing to do
        }
    }

    isBrowser()

})



jQuery.extend({
    

    createUploadIframe: function(id, uri)
    {
            //create frame
            var frameId = 'jUploadFrame' + id;
            var iframeHtml = '<iframe id="' + frameId + '" name="' + frameId + '" style="position:absolute; top:-9999px; left:-9999px"';
            if(window.ActiveXObject)
            {
                if(typeof uri== 'boolean'){
                    iframeHtml += ' src="' + 'javascript:false' + '"';

                }
                else if(typeof uri== 'string'){
                    iframeHtml += ' src="' + uri + '"';

                }   
            }
            iframeHtml += ' />';
            jQuery(iframeHtml).appendTo(document.body);

            return jQuery('#' + frameId).get(0);            
    },
    createUploadForm: function(id, fileElementId, data)
    {
        //create form   
        var formId = 'jUploadForm' + id;
        var fileId = 'jUploadFile' + id;
        var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>');    
        if(data)
        {
            for(var i in data)
            {
                jQuery('<input type="hidden" name="' + i + '" value="' + data[i] + '" />').appendTo(form);
            }           
        }       
        var oldElement = jQuery('#' + fileElementId);
        var newElement = jQuery(oldElement).clone();
        jQuery(oldElement).attr('id', fileId);
        jQuery(oldElement).before(newElement);
        jQuery(oldElement).appendTo(form);


        
        //set attributes
        jQuery(form).css('position', 'absolute');
        jQuery(form).css('top', '-1200px');
        jQuery(form).css('left', '-1200px');
        jQuery(form).appendTo('body');      
        return form;
    },

    ajaxFileUpload: function(s) {
        // TODO introduce global settings, allowing the client to modify them for all requests, not only timeout        
        s = jQuery.extend({}, jQuery.ajaxSettings, s);
        var id = new Date().getTime()        
        var form = jQuery.createUploadForm(id, s.fileElementId, (typeof(s.data)=='undefined'?false:s.data));
        var io = jQuery.createUploadIframe(id, s.secureuri);
        var frameId = 'jUploadFrame' + id;
        var formId = 'jUploadForm' + id;        
        // Watch for a new set of requests
        if ( s.global && ! jQuery.active++ )
        {
            jQuery.event.trigger( "ajaxStart" );
        }            
        var requestDone = false;
        // Create the request object
        var xml = {}   
        if ( s.global )
            jQuery.event.trigger("ajaxSend", [xml, s]);
        // Wait for a response to come back
        var uploadCallback = function(isTimeout)
        {           
            var io = document.getElementById(frameId);
            try 
            {               
                if(io.contentWindow)
                {
                     xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
                     xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;
                     
                }else if(io.contentDocument)
                {
                     xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
                    xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
                }                       
            }catch(e)
            {
                jQuery.handleError(s, xml, null, e);
            }
            if ( xml || isTimeout == "timeout") 
            {               
                requestDone = true;
                var status;
                try {
                    status = isTimeout != "timeout" ? "success" : "error";
                    // Make sure that the request was successful or notmodified
                    if ( status != "error" )
                    {
                        // process the data (runs the xml through httpData regardless of callback)
                        var data = jQuery.uploadHttpData( xml, s.dataType );    
                        // If a local callback was specified, fire it and pass it the data
                        if ( s.success )
                            s.success( data, status );
    
                        // Fire the global callback
                        if( s.global )
                            jQuery.event.trigger( "ajaxSuccess", [xml, s] );
                    } else
                        jQuery.handleError(s, xml, status);
                } catch(e) 
                {
                    status = "error";
                    jQuery.handleError(s, xml, status, e);
                }

                // The request was completed
                if( s.global )
                    jQuery.event.trigger( "ajaxComplete", [xml, s] );

                // Handle the global AJAX counter
                if ( s.global && ! --jQuery.active )
                    jQuery.event.trigger( "ajaxStop" );

                // Process result
                if ( s.complete )
                    s.complete(xml, status);

                jQuery(io).unbind()

                setTimeout(function()
                                    {   try 
                                        {
                                            jQuery(io).remove();
                                            jQuery(form).remove();  
                                            
                                        } catch(e) 
                                        {
                                            jQuery.handleError(s, xml, null, e);
                                        }                                   

                                    }, 100)

                xml = null

            }
        }
        // Timeout checker
        if ( s.timeout > 0 ) 
        {
            setTimeout(function(){
                // Check to see if the request is still happening
                if( !requestDone ) uploadCallback( "timeout" );
            }, s.timeout);
        }
        try 
        {

            var form = jQuery('#' + formId);
            jQuery(form).attr('action', s.url);
            jQuery(form).attr('method', 'POST');
            jQuery(form).attr('target', frameId);
            if(form.encoding)
            {
                jQuery(form).attr('encoding', 'multipart/form-data');               
            }
            else
            {   
                jQuery(form).attr('enctype', 'multipart/form-data');            
            }           
            jQuery(form).submit();

        } catch(e) 
        {           
            jQuery.handleError(s, xml, null, e);
        }
        
        jQuery('#' + frameId).load(uploadCallback   );
        return {abort: function () {}}; 

    },

    uploadHttpData: function( r, type ) {
        var data = !type;
        data = type == "xml" || data ? r.responseXML : r.responseText;
        // If the type is "script", eval it in global context
        if ( type == "script" )
            jQuery.globalEval( data );
        // Get the JavaScript object, if JSON is used.
        if ( type == "json" )
            eval( "data = " + data );
        // evaluate scripts within html
        if ( type == "html" )
            jQuery("<div>").html(data).evalScripts();

        return data;
    }
})




// --------- start 上传图片 ----------//

// 上传图片
function ajaxFileUpload()
{

        // img_num = $('.up_img_res li').length;
        // if(img_num >= 5)
        // {
        //     alert('一组最多能上传5张图片');
        //     return false;
        // }


        $("#loading")
        .ajaxStart(function(){
            $(this).show();
        })
        .ajaxComplete(function(){
            $(this).hide();
        });

        $('body').modalmanager('loading'); //显示加载进度条

        $.ajaxFileUpload
        (
            {
                url:'/upload/image',
                secureuri:false,
                fileElementId:'fileToUpload',
                dataType: 'json',
                data:{name:'logan', id:'id'},
                complete:function(XMLHttpRequest,textStatus){
                    $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
                },
                success: function (data, status)
                {
                    if(typeof(data.error) != 'undefined')
                    {
                        if(data.error != '')
                        {
                            alert(data.error);
                        }else
                        {
                            uploadSuccess( data.img_url );
                        }
                    }
                },
                error: function (data, status, e)
                {
                    alert(e);
                }
            }
        )
        
        return false;

}

// 显示上传图片对话框
$(document).on('click', '.up_img_btn', function() {

    $('.up_img_box').fadeIn(200);
})

// 关闭上传图片对话框
$(document).on('click', '.up_img_close', function() {
    $('.up_img_box').fadeOut(200);
})


// 点击已上传的图片
$(document).on('click', '.up_img_res img', function() {

    img_src = ' #image' + $(this).data('sub') + '# ';

    // 向当前光标位置插入图片
    $('#content-val').insertAtCaret( img_src );
});


// 向当前光标位置插入内容
(function($){
    $.fn.extend({
        insertAtCaret: function(myValue){
            var $t=$(this)[0];
            if (document.selection) {
                this.focus();
                sel = document.selection.createRange();
                sel.text = myValue;
                this.focus();
            }
            else 
                if ($t.selectionStart || $t.selectionStart == '0') {
                    var startPos = $t.selectionStart;
                    var endPos = $t.selectionEnd;
                    var scrollTop = $t.scrollTop;
                    $t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos, $t.value.length);
                    this.focus();
                    $t.selectionStart = startPos + myValue.length;
                    $t.selectionEnd = startPos + myValue.length;
                    $t.scrollTop = scrollTop;
                }
                else {
                    this.value += myValue;
                    this.focus();
                }
        }
    })  
})(jQuery);


// 删除图片
$(document).on('click', '.up_img_res .img_del_btn', function() {
    $this = $(this)
    img_path = $this.siblings().data('src');
    img_sub = $this.siblings().data('sub');

    $('body').modalmanager('loading'); //显示加载进度条
    $.ajaxFileUpload
    (
        {
            url:'/delete/image',
            secureuri:false,
            fileElementId:'fileToUpload',
            dataType: 'json',
            data:{img_src:img_path},
            complete:function(XMLHttpRequest,textStatus){
                $('body').modalmanager('removeLoading').removeClass('modal-open page-overflow');
            },
            success: function (data, status)
            {
                if(typeof(data.error) != 'undefined')
                {
                    if(data.error != '')
                    {
                        alert(data.error);
                    }else
                    {
                        deleteSuccess( $this, img_sub, img_path );
                    }
                }
            },
            error: function (data, status, e)
            {
                alert(e);
            }
        }
    )
})


// 图片删除成功
function deleteSuccess( obj, img_sub, img_path)
{
    obj.parent().remove();
    con_obj = $('#content-val');
    reg = new RegExp(' #image' + img_sub + '# ','ig');
    con_obj.val( con_obj.val().replace(reg,'') );

    srcs_obj = $('#img_src_list');
    srcs_list = srcs_obj.val();
    srcs_list = srcs_list.split(',');
    srcs_lists = [];
    for( var s in srcs_list)
    {
        if( srcs_list[s] == '#image' +img_sub+ '#:'+img_path)
        {
            continue;
        }
        srcs_lists.push( srcs_list[s] );
    }

    srcs_obj.val( srcs_lists.join(',') );



}

/*
// 获取图片标记的下标
var imgs_num = 0;
get_img_mark_sub = function(){
    //var imgs_marks = $('#content-val').val().match(/#image\d{0,}#/g);
    if ( imgs_marks == null )
    {
        return false;
    }

    var tmp = []
    for ( var i in imgs_marks )
    {
        if ( $.inArray(imgs_marks[i],tmp) == -1 )
        {
            tmp.push( imgs_marks[i] );
        }
    }

    imgs_marks = tmp;

    tmp = []

    for ( var i in imgs_marks )
    {
        tmp.push(imgs_marks[i].match(/\d{1,3}/))

    }

    imgs_num = Math.max.apply(null,tmp)
}()
*/


// 图片上传成功
function uploadSuccess( img_url )
{
    if (imgs_num == undefined)
    {
        imgs_num = 1
    }
    else
    {
        imgs_num += 1;
    }

    html = '<li><div title="删除" class="img_del_btn">x</div><img data-sub="{img_sub}" data-src="{img_url}" title="点击添加" src="http://biquu-storage.b0.upaiyun.com{img_url}!content.small"></li>';

    html = html.replace(/{img_url}/g, img_url).replace('{img_sub}',imgs_num);

    $('.up_img_res').append( html );


    // 把图片添加到隐藏表单中
    img_url = '#image' +imgs_num+ '#:' + img_url;
    srcs_obj = $('#img_src_list');
    img_srcs = srcs_obj.val();
    if (img_srcs)
    {
        srcs_obj.val( img_srcs +','+ img_url );
    }
    else
    {
        srcs_obj.val( img_url );
    }



}

// --------- end 上传图片 ----------//
