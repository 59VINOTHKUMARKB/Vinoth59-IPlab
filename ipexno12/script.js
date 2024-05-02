$(document).ready(function(){
    $("#btnGetMovie").click(function(){
        var movieID = $("#movieID").val();
        $.ajax({
            type: "GET",
            url: "getMovieDetails.php",
            data: { id: movieID },
            dataType: "xml",
            success: function(xml){
                var title = $(xml).find("movie[id='" + movieID + "']").find("title").text();
                var genre = $(xml).find("movie[id='" + movieID + "']").find("genre").text();
                var year = $(xml).find("movie[id='" + movieID + "']").find("year").text();
                var director = $(xml).find("movie[id='" + movieID + "']").find("director").text();
                $("#movieDetails").html("<p>Title: " + title + "</p><p>Genre: " + genre + "</p><p>Year: " + year + "</p><p>Director: " + director + "</p>");
            },
            error: function(){
                alert("Error retrieving movie details.");
            }
        });
    });
});