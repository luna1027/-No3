<?php
$date = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days"));
$rows = $Movie->all(['sh' => 1,], " && `ondate` BETWEEN '$ondate' AND '$date' ORDER BY `rank`");
// prr($rows);
?>
<table class="order" style="border: 0.5px solid #000;background:#ccc;">
    <tr>
        <td style="width:20%;text-align:center;"> 電影 : </td>
        <td><select class="movie" style="width:100%;" name="" id="">
                <?php
                foreach ($rows as $row) {
                    prr($rows);
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
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
        <td class="movie-sessions" style="width:20%;text-align:center;"> 場次 : </td>
        <td><select style="width:100%;" name="" id="">
                <?php

                ?>
            </select>
        </td>
    </tr>
</table>

<script>
    $(".movie").on('change', function() {
        console.log($(".movie").val());
        let date = '';
        $.post('./api/order.php', id = $(".movie").val(), (res) => {
            console.log(res);
        })
    })
</script>