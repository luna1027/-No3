<?php
$date = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days"));
$rows = $Movie->all(['sh' => 1,], " && `ondate` BETWEEN '$ondate' AND '$date' ORDER BY `rank`");
// prr($rows);
?>
<p class="ct" style="border: 1px solid; margin:4px;background:#ccc; padding:3px;">線上訂票</p>
<div class="orderForm">
    <table class="order" style="border: 0.5px solid #000;background:#ccc;">
        <tr>
            <td style="width:20%;text-align:center;"> 電影 : </td>
            <td><select class="movie" style="width:100%;" name="" id="">
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:20%;text-align:center;"> 日期 : </td>
            <td><select class="movie-date" style="width:100%;" name="" id="">
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:20%;text-align:center;"> 場次 : </td>
            <td><select class="movie-sessions" style="width:100%;" name="" id="">
                </select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="$('.orderForm,.bookingFrom').toggle();getBooking()">確定</button>
        <button>重製</button>
    </div>
</div>
<div class="bookingFrom" style="display:none ;">
    <div class="booking">
        <div class="stage">STAGE</div>
        <div class="seats">
        </div>
        <div class="info">
            <div class="infoo">
                <div>您選擇的電影是 :&nbsp;<span class="selectMovie"></span></div>
                <div>您選擇的時刻是 :&nbsp;<span class="selectDate"></span>&nbsp;<span class="selectSession"></span></div>
                <div>您已經勾選 <span class="tickets"></span>&nbsp;張票，最多可以購買四張票</div>
            </div>
        </div>
    </div>
    <div class="ct">
        <button onclick="$('.orderForm,.bookingFrom').toggle();$('.seats').html('')">上一步</button>
        <button onclick="checkout()">確定</button>
    </div>
</div>

<script>
    getMovies();
    const params = new URLSearchParams(window.location.search);
    const getId = params.get('id');
    console.log(getId);

    $(".movie").on('change', function() {
        console.log($(".movie").val());
        getDays($(".movie").val());
    })


    $(".movie-date").on("change", function() {
        console.log($(".movie-date").val());
        const day = $(".movie-date").val();
        getSessions($(".movie").val(), day);
    })

    function getMovies() {
        $.get('./api/get_movies.php', (res) => {
            console.log(res);
            $(".movie").html(res);
            if (params.get('id')) {
                $(`.movie option[value="${getId}"]`).attr("selected", true);
            }
            getDays($(".movie").val());
        })
    }

    function getDays(id) {
        // 有夠難抓的 data
        // console.log($(this));
        // console.log($(this).prop('selectedIndex'));
        // console.log($(".movie>option").eq($(this).prop('selectedIndex')).data('ondate'));
        // 時薪計費的話就用 $__$
        console.log("data", $(".movie option:selected").data('ondate'));

        let date = '';
        $.post('./api/get_days.php', `id=${id}`, (res) => {
            // let days = JSON.parse(res);
            // console.log(days);
            // let daylist = "";
            // days.forEach(d => {
            //     const year = d.split("-")[0];
            //     const month = d.split("-")[1];
            //     const day = d.split("-")[2];
            //     const week = d.split("-")[3];
            //     daylist += `<option value='${year}-${month}-${day}'>${month + "月" + day + "日 " + week}</option>`;
            // });
            // console.log(daylist);
            // $(".movie-date").html(daylist);
            $(".movie-date").html(res);
            getSessions($(".movie").val(), $(".movie-date").val());
        })
    }

    function getSessions(id, date) {
        $.get("./api/get_sessions.php", {
            id,
            date
        }, (session) => {
            console.log(session);
            $(".movie-sessions").html(session);
        })
    }

    // function getSessions(day) {
    //     let now = `${(new Date()).getMonth()}-${(new Date()).getDate()}`;
    //     console.log(now);
    //     let time = `${(new Date(day)).getMonth()}-${(new Date(day)).getDate()}`;
    //     console.log(time);
    //     let movieSession = '';
    //     for (let i = 0; i < 5; i++) {
    //         let startT = 14 + i * 2;
    //         if (now == time) {
    //             console.log("same");
    //             console.log(new Date().getHours());
    //             if (startT > new Date().getHours()){
    //                 movieSession += `<option value=''>${startT}:00~${16+i*2}:00 剩餘座位</option>`;
    //             }
    //         } else {
    //             movieSession += `<option value=''>${startT}:00~${16+i*2}:00 剩餘座位</option>`;
    //         }
    //     }
    //     console.log(movieSession);
    //     $(".movie-sessions").html(movieSession);
    // }

    function getBooking() {
        let info = {
            movie: $(".movie option:selected").text(),
            date: $(".movie-date option:selected").val(),
            session: $(".movie-sessions option:selected").val(),
        }

        $.get("./api/get_booking.php", info, (booking) => {
            $(".seats").html(booking);
            // $(".selectMovie").text($(".movie option:selected").text())
            // $(".selectDate").text($(".movie-date option:selected").text())
            // $(".selectSession").text($(".movie-sessions option:selected").val())
            $(".selectMovie").text(info.movie)
            $(".selectDate").text(info.date)
            $(".selectSession").text(info.session)
        })
    }
</script>