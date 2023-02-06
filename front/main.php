<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists">
                <?php
                $posters = $Trailer->all(['sh' => 1], " ORDER BY `rank` ");
                foreach ($posters as $poster) {
                ?>
                    <div class="pos" data-ani="<?= $poster['ani']; ?>">
                        <img class="pos-img" src="./upload/<?= $poster['img']; ?>" alt="">
                        <div><?= $poster['name']; ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="controls">
                <div class="left" onclick=""></div>
                <div class="btns">
                    <?php
                    foreach ($posters as $poster) {
                    ?>
                        <!-- <div class="btn">
                        <img class="btn-img" src="" alt="">
                        <div class="btn-name"></div>
                    </div>
                    <div class="btn">
                        <img class="btn-img" src="" alt="">
                        <div class="btn-name"></div>
                    </div>
                    <div class="btn">
                        <img class="btn-img" src="" alt="">
                        <div class="btn-name"></div>
                    </div> -->
                        <div class="btn">
                            <img class="btn-img" src="./upload/<?= $poster['img']; ?>" alt="">
                            <div class="btn-name"><?= $poster['name']; ?></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right" onclick=""></div>
            </div>
            <script>
                // const array = new Array();
                // const name = new Array();
                // <?php
                    // $posters = $Trailer->all(['sh' => 1]);
                    // foreach ($posters as $poster) {
                    //     echo "array.push('./upload/{$poster['img']}');";
                    //     echo "name.push('{$poster['name']}');";
                    // }
                    // 
                    ?>
                // shBtn();
                // shPos(array[0], name[0]);

                // function shPos(arr, naa) {
                //     console.log($(".pos"));
                //     $(".pos").html(`<img class="pos-img" src="${arr}" alt="">
                //     <div>${naa}</div>`)
                //     $(".pos").fadeIn(1000);
                // }

                // function shBtn() {
                //     for (i = 0; i <= 3; i++) {
                //         $(".btn-img").eq(i).attr('src', array[i]);
                //         $(".btn-name").eq(i).text(name[i]);
                //     }
                // }

                // function ed() {
                //     // $(".pos").fadeOut(1000);
                //     disappear();
                //     let last = array.pop();
                //     array.unshift(last);
                //     let lastN = name.pop();
                //     name.unshift(lastN);
                //     shBtn();
                //     shPos(array[0], name[0]);
                // }

                // function next() {
                //     // $(".pos").fadeOut(1000);
                //     disappear();
                //     let one = array.shift();
                //     array.push(one);
                //     let oneN = name.shift();
                //     name.push(oneN);
                //     shBtn();
                //     shPos(array[0], name[0]);
                // }

                // function disappear() {
                //     $(".pos").fadeOut(1000);
                // }

                // $(".btns").on("click", function(e) {
                //     let src = e.target.parentElement.children[0].src;
                //     let na = e.target.parentElement.children[1].textContent;
                //     shPos(src, na)
                // })

                // 老師法 //
                $(".pos").eq(0).show();
                let btns = $(".btn").length;
                let p = 0;
                $(".right,.left").on("click", function() {
                    if ($(this).hasClass('left')) {
                        p = (p - 1 >= 0) ? p - 1 : p;
                    } else {
                        p = (p + 1 <= btns - 4) ? p + 1 : p;
                    }
                    $(".btn").animate({
                        right: 80 * p
                    });
                })

                let now = 0;
                let counter = setInterval(() => {
                    ani();
                }, 3000)

                function ani(next) {
                    now = $(".pos:visible").index();
                    if (typeof(next) == 'undefined') {
                        next = (now + 1 <= $(".pos").length - 1) ? now + 1 : 0;
                    }

                    let AniType = $(".pos").eq(now).data('ani');
                    // console.log(AniType);
                    switch (AniType) {
                        case 1:
                            $(".pos").eq(now).fadeOut(2000);
                            $(".pos").eq(next).fadeIn(2000);

                            break;
                        case 2:
                            $(".pos").eq(next).css({
                                left: 210,
                                top: 0,
                                width: 210,
                                height: 280
                            })
                            $(".pos").eq(next).show();
                            $(".pos").eq(now).animate({
                                left: -210,
                                top: 0,
                                width: 210,
                                height: 280
                            }, 2000, () => {
                                $(".pos").eq(now).hide();
                                $(".pos").eq(now).css({
                                    left: 210,
                                    top: 0,
                                    width: 210,
                                    height: 280
                                });
                            });
                            $(".pos").eq(next).animate({
                                left: 0,
                                top: 0,
                                width: 210,
                                height: 280
                            }, 2000);
                            break;
                        case 3:
                            $(".pos").eq(next).css({
                                left: 105,
                                top: 140,
                                width: 0,
                                height: 0
                            })
                            $(".pos").eq(now).animate({
                                left: 105,
                                top: 140,
                                width: 0,
                                height: 0
                            }, 1000, () => {
                                $(".pos").eq(now).hide();
                                $(".pos").eq(now).css({
                                    left: 0,
                                    top: 0,
                                    width: 210,
                                    height: 280
                                });
                                $(".pos").eq(next).show();
                                $(".pos").eq(next).animate({
                                    left: 0,
                                    top: 0,
                                    width: 210,
                                    height: 280
                                }, 1000);
                            });
                            break;
                    }
                }

                $(".btn").on("click", function() {
                    console.log($(this).index());
                    ani($(this).index());
                })

                $(".btn").hover(
                    function() {
                        clearInterval(counter);
                    },
                    function() {
                        counter = setInterval(() => {
                            ani();
                        }, 3000)
                    }
                )
            </script>
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