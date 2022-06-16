function exportDate(varname, from, dc, d, m, y){
    var varname = varname;
    var from = from;
    var dc = dc;
    var d = d;
    var m = m;
    var y = y;

    $.post(
        '/handlers/exdate.php',

        {
            'from': from,
            'dc': dc,
            'd': d,
            'm': m,
            'y': y
        },

        function(data){
        }
    );
}