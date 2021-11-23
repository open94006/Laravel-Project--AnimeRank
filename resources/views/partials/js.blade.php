<!-- jQuery -->
<script src={{ URL::asset("js/jquery.min.js") }}></script>
<!-- jQuery Easing -->
<script src={{ URL::asset("js/jquery.easing.1.3.js") }}></script>
<!-- Bootstrap -->
<script src={{ URL::asset("js/bootstrap.min.js") }}></script>
<!-- Waypoints -->
<script src={{ URL::asset("js/jquery.waypoints.min.js") }}></script>
<!-- Flexslider -->
<script src={{ URL::asset("js/jquery.flexslider-min.js") }}></script>
<!-- Sticky Kit -->
<script src={{ URL::asset("js/sticky-kit.min.js") }}></script>
<!-- Main -->
<script src={{ URL::asset("js/main.js") }}></script>

<script>
    // 收到select的變化，在tbody顯示該季度的動畫
    function getJidulist()
    {
        if($("#jidu").val() != "===請選擇季度==="){
            $.ajax({
                url: `animeList/jidu/` + $("#jidu").val(),
                method: 'get',
                beforeSend: function () {
                $('#loading').css("display", "");
                },
                success: function(response)
                {
                    $("#animeList").html('');
                    var bodyRows = '';
                    for (var i=0; i < response.length; i++){
                        bodyRows += '<tr>';
                        bodyRows += '<td><a href="animeList/show/' + response[i]["id"] + '" target="_blank">' + response[i]['name'] + '</a></td>';
                        bodyRows += '<td class="rwd">' + response[i]['aired'] + '</td>';
                        bodyRows += '<td class="rwd">' + response[i]['studios'] + '</td>';
                        bodyRows += `<td><a class="btn btn-warning btn-sm" href="`+response[i]['url']+`" target="_blank">線上看</a></td>`;
                        bodyRows += `<td class="rwd"><a class="btn btn-success btn-sm" href="animeList/show/`+response[i]["id"]+`" target="_blank">詳細/修改</a></td>`;
                        bodyRows += `<td class="rwd">
                                        <form method="POST" id="del`+response[i]["id"]+`" action="animeList/delete/`+response[i]["id"]+`" 
                                        onsubmit="return confirm('確認要刪除動畫「` + response[i]["name"] + `」嗎？')">
                                            <input class="btn btn-danger btn-sm" type="submit" value="刪除" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>`;
                        bodyRows += '</tr>';
                        $("#animeList").append(bodyRows);
                        bodyRows = '';
                    }
                },
                complete: function(){
                setTimeout(function () { $('#loading').css("display", "none"); }, 500);
                },
                error: function()
                {
                    alert('系統提示：getJidulist出現錯誤');
                }
            })
        }
    }

    // 修改的改變與input的是否可輸入
    function enable_disable() 
    {
        $("input").prop('disabled', false);
        $("input").prop('readonly', false);
        $("input").prop('hidden', false);
        $("button").prop('hidden', true);
    }

    // 複製通知
    function copyEvent(id)
    {
        $("#url").prop('disabled', false);
        document.getElementById(id).select();
        document.execCommand("Copy");
        $("#url").prop('disabled', true);
        window.getSelection().empty();
        $('.alert').html('複製成功！').addClass('alert-success').show().delay(1500).fadeOut();
    }

    // 收到select的變化，在tbody顯示該年度的排行榜
    function animeYearList()
    {
        if($("#year").val() != "==請選擇年度=="){
            $.ajax({
                url: `rank/` + $("#year").val(),
                method: 'get',
                beforeSend: function () {
                $('#loading').css("display", "");
                },
                success: function(response)
                {
                    $("#body_A").html('');
                    $("#body_B").html('');
                    $("#body_C").html('');
                    $("#body_D").html('');
                    var bodyRows = '';
                    var jsonHead = ['id','name','aired','point'];
                    for (var i=0; i < response.length; i++){
                        var m = response[i][jsonHead[2]];
                        bodyRows += '<tr><td id="rank">';
                        bodyRows += `<a href="animeList/show/` + response[i][jsonHead[0]] + `" target="_blank">`;
                        bodyRows += response[i][jsonHead[1]] + '</a></td>';

                        if(response[i][jsonHead[3]] >= 50){
                            bodyRows += '<td id="point_a">'+ response[i][jsonHead[3]] +'</td></tr>';
                        }else if(response[i][jsonHead[3]] >= 40){
                            bodyRows += '<td id="point_b">'+ response[i][jsonHead[3]] +'</td></tr>';
                        }else if(response[i][jsonHead[3]] >= 30){
                            bodyRows += '<td id="point_c">'+ response[i][jsonHead[3]] +'</td></tr>';
                        }else if(response[i][jsonHead[3]] != 0){
                            bodyRows += '<td id="point_d">'+ response[i][jsonHead[3]] +'</td></tr>';
                        }else {
                            bodyRows += '<td id="point_e">—</td></tr>';
                        }

                        var aired = new Date(m);
                        if(aired.getDate() > 15){
                            aired.setMonth(aired.getMonth()+1);
                        }
                        
                        if(aired.getMonth() < 3){
                            $("#body_A").append(bodyRows);
                        }else if(aired.getMonth() < 6){
                            $("#body_B").append(bodyRows);
                        }else if(aired.getMonth() < 9){
                            $("#body_C").append(bodyRows);
                        }else{
                            $("#body_D").append(bodyRows);
                        }
                        bodyRows = '';
                    }
                },
                complete: function(){
                setTimeout(function () { $('#loading').css("display", "none"); }, 500);
                },
                error: function()
                {
                    alert('系統提示：animeYearList出現錯誤');
                }
            })
        }
    }

    // 搜尋的及時變化(fetch)
    let flag = true;
    $("#search").on('compositionstart',function(){
        flag = false;
    });
    $("#search").on('compositionend',function(){
        flag = true;
    });
    $("#search").on('input',function(){
        setTimeout(function(){
            if(flag){
            	animeSearch();
            }
        },0);
    });

    function animeSearch()
    {
        console.log($("#search").val())
        fetch('./animeList/search/' + $("#search").val(), { method: 'get' })
        .then((response) => {
            return response.json();
        })
        .then((dataList) => {
            data = dataList;
            $("#animeList").html('');
                var bodyRows = '';
                for (var i=0; i < data.length; i++){
                    bodyRows += '<tr>';
                    bodyRows += '<td><a href="animeList/show/' + data[i]["id"] + '" target="_blank">' + data[i]['name'] + '</a></td>';
                    bodyRows += '<td class="rwd">' + data[i]['aired'] + '</td>';
                    bodyRows += '<td class="rwd">' + data[i]['studios'] + '</td>';
                    bodyRows += `<td><a class="btn btn-warning btn-sm" href="`+data[i]['url']+`" target="_blank">線上看</a></td>`;
                    bodyRows += `<td class="rwd"><a class="btn btn-success btn-sm" href="animeList/show/`+data[i]["id"]+`" target="_blank">詳細/修改</a></td>`;
                    bodyRows += `<td class="rwd">
                                    <form method="POST" id="del`+data[i]["id"]+`" action="animeList/delete/`+data[i]["id"]+`" 
                                    onsubmit="return confirm('確認要刪除動畫「` + data[i]["name"] + `」嗎？')">
                                        <input class="btn btn-danger btn-sm" type="submit" value="刪除" />
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>`;
                    bodyRows += '</tr>';
                    $("#animeList").append(bodyRows);
                    bodyRows = '';
                }
        }).catch(function(err) {
            alert('系統提示：animeSearch出現錯誤')
        })
    }
</script>