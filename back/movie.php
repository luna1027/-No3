<div style="width: 90%; margin:auto">
    <button style="border-radius: 8px;" onclick="location.href='?do=add_movie'">新增電影</button>
    <hr style="background-color:#fff;">
    <div style="height: 420px; overflow:auto;">
        <?php
        $rows = $Movie->all(" ORDER BY `rank` ");
        foreach ($rows as $key => $row) {
            $prev = ($key == 0) ? $row['id'] : $rows[$key - 1]['id'];
            $next = ($key == (count($rows) - 1)) ? $row['id'] : $rows[$key + 1]['id'];
        ?>
            <div style="display:flex ;justify-content:space-between; align-items:center ;width: 96%;margin:4px auto;padding: 8px;background:#fff;">
                <div style="display:flex;align-items:center;justify-content:center ;width: 200px;"><img width="130px;" src="./upload/<?= $row['poster']; ?>" alt=""></div>
                <div style="display:flex;align-items:center;justify-content:center ;width: 200px;">分級 :&nbsp;<img src="./icons/03C0<?= $row['level']; ?>.png" alt=""></div>
                <div style="flex-grow: 1;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:16px;width:550px;">
                        <div style="width: ;">片名 : <?= $row['name']; ?></div>
                        <div style="width: ;">片長 : <?= $row['length']; ?>分鐘</div>
                        <div style="width: ;">上映時間 : <?= $row['ondate']; ?></div>
                    </div>
                    <div style="padding-right: auto;">
                        <button onclick="showMovie(<?= $row['id']; ?>)"><?= ($row['sh'] == 0) ? '顯示' : '隱藏'; ?></button>
                        <button onclick="sw('movie',<?= $row['id']; ?>,<?= $prev; ?>)">往上</button>
                        <button onclick="sw('movie',<?= $row['id']; ?>,<?= $next; ?>)">往下</button>
                        <button onclick="location.href='?do=edit_movie&id=<?= $row['id']; ?>'">編輯電影</button>
                        <button onclick="del('movie',<?= $row['id']; ?>)">刪除電影</button>
                    </div>
                    <p>劇情介紹 : <?= $row['intro']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>