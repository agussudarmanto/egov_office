console.log('jq is run');
var jq = function(code)
{
    if (window.jQuery)
    {
        code(window.jQuery);        
    }
    else
    {
        if (!window.$)
        {
            window.$ = { codes: [] };
            window.watch('$', function(p, defered, jQuery) {
                jQuery.each(defered.codes, function(i, code) {
                    code(jQuery);
                });
                return jQuery;
            });
        }

        window.$.codes.push(code);
    }
}