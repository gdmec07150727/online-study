$(function () {

    function JsonDo(ulObj, accessUrl) {
        $.ajax({
            url: accessUrl,
            type: 'GET',
            dataType: 'json',
            success: function (mes) {
                var tags = mes.tag;
                JsonIntoTab(tags, $("#" + ulObj));
            }
        });
    }

    function JsonIntoTab(tags, ulObj) {
        $.each(tags, function (i, tag) {
            var $li = '<li data-id="'+ tag.id +'">'+ tag.name + '</li>';
            ulObj.prepend($li);
        });
        var exist_tags = [];

        $('#myTags li').click(function(){
            if($(this).hasClass('active')) return;
            var $t = $(this),
                id = $t.data('id'),
                name = $t.text();

            $t.addClass('active');
            $('#selected_tags span').remove();//移除为空时的提示
            $('#selected_tags').append('<li data-id="'+ id +'">'+ name +'<a href="javascript:void(0)" class="removetag"><i class="icon-remove"></i></a></li>') //插入选中的tag
            exist_tags.push(id);//往数组中插入tag id
            // 改变input的值
            $('input#exist_tags').val(exist_tags.join(','))

        })

        $('#selected_tags').on('click', '.removetag' ,function(e){
            var li = $(e.currentTarget).parents('li').eq(0),
                id = li.attr('data-id'),
                selected_tags= [];
                
            //移除之前的tag
            $('#myTags li').each(function(){
                if($(this).data('id') == id){
                    $(this).removeClass('active')
                }
            })

            //移除新加的tag
            li.eq(0).remove();

            // 从数组中删除tag id
            $.each(exist_tags, function(i, exist_tag_id){
                if(exist_tag_id == id){
                    exist_tags.splice($.inArray(exist_tag_id, exist_tags),1);
                }
            })

            // 重置input的val值
            $('input#exist_tags').val('').val(exist_tags.join(','))

            // 为空时加入提示
            if(exist_tags.length == 0){
                $('#selected_tags').html('<span class="c999 f12">请从“推荐标签”中选择合适的标签</span>')
            }
        })
    }

    JsonDo('myTags', '/api/tags');


    $("#film-upload-form").Validform({
        postonce:true,
        tiptype:function(msg,o,cssctl){
            var objtip=o.obj.siblings(".Validform_checktip");
            cssctl(objtip,o.type);
            objtip.text(msg);

        }
    });
})

