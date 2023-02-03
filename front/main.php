<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="now-lists">
            <?php
            $date = date("Y-m-d");
            $ondate = date("Y-m-d", strtotime("-2 days"));
            $all = $Movie->count(" `sh` = 1 && `ondate` BETWEEN '$ondate' AND '$date'");
            $div = 4;
            $pages = ceil($all / $div);
            // echo $pages;
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * 4;
            $rows = $Movie->all(['sh' => 1,], " && `ondate` BETWEEN '$ondate' AND '$date' ORDER BY `rank` LIMIT $start,$div ");
            // prr($rows);
            foreach ($rows as $row) {

            ?>
                <div class="now-movie">
                    <p>片名 : <?= $row['name']; ?></p>
                    <div class="now-movie-right">
                        <div class="each-movie">
                            <img src="./upload/<?= $row['poster']; ?>" alt="">
                        </div>
                        <div>
                            <p class="each">分級 : <img src="./icons/03C0<?= $row['level']; ?>.png" alt=""></p>
                            <p class="each">上映日期 : <?= $row['ondate']; ?></p>
                        </div>
                    </div>
                    <div>
                        <button onclick="location.href='?do=intro&id=<?= $row['id']; ?>'">劇情簡介</button>
                        <button onclick="location.href='?do=order&id=<?= $row['id']; ?>'">線上訂票</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="ct">
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($i == $now) ? 'font-size:16px;' : 'font-size:24px;';
            ?>
                <a href="?p=<?= $i; ?>" style="color: #fff;"><?= $i; ?></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>