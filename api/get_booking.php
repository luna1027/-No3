<?php
include_once "./base.php";

$orders = $Order->all(['movie' => $_GET['movie'], 'date' => $_GET['date'], 'session' => $_GET['session']]);
$booking = [];
foreach ($orders as $order) {
    $seats = unserialize($order['seats']);
    $booking = array_merge($booking, $seats);
}

for ($i = 0; $i < 20; $i++) {
    if ($i < 5) {
        $color = "rgb(255, 200, 50)";
    } elseif ($i < 10) {
        $color = "rgb(150, 200, 50)";
    } elseif ($i < 15) {
        $color = "rgb(150, 200, 255)";
    } else {
        $color = "rgb(150, 100, 200)";
    }
    if (in_array($i, $booking)) {
        $seat = "03D03.png";
        $checkBox = "hidden";
    } else {
        $seat = "03D02.png";
        $checkBox = "checkbox";
    }
?>
    <div class='seat' style='background:<?= $color; ?>'>
        <span style="font-size: 12px;"><?= floor($i / 5) + 1; ?>排<?= $i % 5 + 1; ?>號</span>
        <div style="padding: 4px;">
            <img width="35px" src='./icons/<?= $seat; ?>' alt=''>
            <input class="chk" type="<?= $checkBox; ?>" value="<?= $i; ?>" name="" id="">
        </div>
    </div>
<?php
}
?>

<script>
    let seats = [];
    $(".tickets").text(seats.length);
    $(".chk").on("change", function() {
        console.log($(this).val());
        if ($(this).prop('checked')) {
            if (seats.length >= 4) {
                alert("最多只能購買四張票");
                $(this).prop('checked', false);
                // $(this).
            } else {
                seats.push($(this).val());
                $(".tickets").text(seats.length);
            }
        } else {
            // console.log(seats.indexOf($(this).val()));
            seats.splice(seats.indexOf($(this).val()), 1)
            $(".tickets").text(seats.length);
        }
        console.log(seats);
    })

    function checkout() {
        $.post("./api/order.php", {
            seats,
            // movieId: $(".movie option:selected").val(),
            movie: $(".movie option:selected").text(),
            date: $(".movie-date option:selected").val(),
            session: $(".movie-sessions option:selected").val()
        }, (res) => {
            console.log(res);
            $(".bookingFrom").html(res);
        })
    }
</script>