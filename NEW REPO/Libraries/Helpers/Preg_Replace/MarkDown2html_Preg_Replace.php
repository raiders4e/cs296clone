<?php
/*  MarkDown-Style Formatting (Yank Ch.8 Multiple Pages (+P.252+)    */

//Convert plain-text formatting to HTML
function markdown2html($text) 
{
    $text = html($text);
    
//STRONG EMPHASIS (1st) YANK PG.248+
    // Converts words surrounded by double underscore '__' into bold words.
    $text = preg_replace('/__(.+?)__/s', '<strong>$1</strong>', $text); 
    // Converts words surrounded by double asterik '**' into bold words.
    $text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
    
    
//EMPHASIS (2nd) YANK PG. 250+
    //Converts words surrounded by single underscore '_' into emphasized words.
    $text = preg_replace('/_([^_]+)_/', '<em>$1</em>', $text);
    //Converts words surrounded by single asterik '*' into emphasized words.
    $text = preg_replace('/\*([^\*]+)\*/', '<em>$1</em>', $text);
    
    //Convert Windows (\r\n) to Unix (\n)
    $text = str_replace("\r\n", "\n", $text);
    //Convert Macintosh (\r) to Unix (\n)
    $text = str_replace("\r", "\n", $text);

//PARAGRAPHS AND LINE BREAKS YANK PG.253+   
    //Paragraphs [Single new line (\n) to indiciate (<br>) and Double new line (\n\n) to indiciate (<p></p>)]
    $text = '<p>' . str_replace("\n\n", '</p><p>', $text) . '</p>';
    // Line breaks
    $text = str_replace("\n", '<br>', $text);
    
    // [linked text] (linked URL) Conversion **************** NOTE #1 **************
    $text = preg_replace(
        '/\[([^\]]+)]\(([-a-z0-9._~:\/?#@!$&\'()*+,;=%]+)\)/i', '<a href="$2">$1</a>', $text);
    return $text;
}

//Yank PG. 259 - For added convenience when using this in a PHP template, this function calls markdown2html and echoes it. 
function markdownout($text) 
{
    echo markdown2html($text);
}
/************ NOTE 1 (PG.257 YANK) 

    The round brackets make the matching text available to us as $2, $1 in the replacement string.
        The square brackets contain a list of characters that may appear in a URL, which is followed by a + to 
        indiciate that one or more of these acceptable chars must be present.
    Within a square-bracketed list of chars,
        many of the chars that normally have a special meaning within a 
        regular expression lose that meaning ., ?, +, *, (, and ) are all listed here without the need to be escaped by
        backslashes. The only char that DOES need to be escaped in this list is the fwd slash (/), which must be written
        as \/ to prevent it from being mistaken for the end-of-regular-expression delimiter.
    Further Note also that to include the hypen (-) in the list of chars, you have to list it first. Otherwise,
        it would have been taken to indiciate a range of characters (as in a-z and 0-9).
********************/