<div style="width: 90%; margin:auto">
    <button style="border-radius: 8px;" onclick="location.href='?do=add_movie'">新增電影</button>
    <hr style="background-color:#fff;">
    <div class="movieList" style="height: 400px; overflow:auto;">

    </div>
</div>

<script>
    getAllMovies();

    function getAllMovies() {
        $.get("./api/movie_list.php", (list) => {
            console.log(list);
            $(".movieList").html(list);
        })
    }

    
</script>