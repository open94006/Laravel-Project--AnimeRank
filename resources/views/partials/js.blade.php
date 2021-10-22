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
    // 收到季度select的變化，在tbody顯示該季度的動畫
    function getJidulist()
    {
        $.ajax({
            beforeSend: function () {
             $('#loading').css("display", "");
            },
            url: `animeList/jidu/` + $("#jidu").val(),
            method: 'get',
            success: function(response)
            {
                $("#animeList").html('');
                var bodyRows = '';
                var jsonHead = ['name', 'aired', 'studios'];
                for (var i=0; i < response.length; i++){
                    bodyRows += '<tr>';
                    for (a in jsonHead){
                        if(a == 0){
                            bodyRows += '<td>' + response[i][jsonHead[a]] + '</td>';
                        }else{
                            bodyRows += '<td class="rwd">' + response[i][jsonHead[a]] + '</td>';
                        }
                    }
                    var id = response[i]["id"];
                    bodyRows += `<td><a class="btn btn-success btn-sm" href="animeList/show/`+id+`" target="_blank">詳細/修改</a></td>`;
                    bodyRows += `<td>
                                    <form method="POST" id="del`+id+`" action="animeList/delete/`+id+`" 
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
              // $('#loading').css("display", "none"); 
              setTimeout(function () { $('#loading').css("display", "none"); }, 500);
            },
            error: function()
            {
                alert('《 AJAX出現錯誤 》');
            }
        })
    }

    function enable_disable() 
    {
        $("input").prop('disabled', false);
        $("input").prop('readonly', false);
        $("input").prop('hidden', false);
        $("button").prop('hidden', true);
    }

    function copyEvent(id)
    {
        $("#url").prop('disabled', false);
        document.getElementById(id).select();
        document.execCommand("Copy");
        $("#url").prop('disabled', true);
    }

    function animeYearList()
    {
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
              // $('#loading').css("display", "none"); 
              setTimeout(function () { $('#loading').css("display", "none"); }, 1000);
            },
            error: function()
            {
                alert('《 AJAX出現錯誤 》');
                console.log(response);
            }
        })
    }
</script>