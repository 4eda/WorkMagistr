$(function(){
    $(".js__text_limit").each(function() {
        let txt = $(this).text();
        console.log('ss => ', txt);
        if (txt.length > 300) {
            $(this).text(txt.substring(0, 300) + '...');
        }
    });
});