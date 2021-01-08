<?php

 /**
  * @author StJohn Nelson
  * Random Quote Generator
  */

include 'inc/quotes.php'; // Includes the Quote Arraay file quotes.php in the inc folder

function getRandomQuote($quotes) // Get random quote Item Function
{
global $quotes;       // Initialise the quotes array in function
end($quotes);         // Locates the last Item in the array
$lastKey = key($quotes);  // Fetches the key of the last item 
$randomKey = mt_rand(0, $lastKey); // Random value between min 0 and max of last key of array
return $quotes[$randomKey];        // Returns the random Item of the Quotes array
}

function getColor(){        // Get random color Function

    $color = array("black", "red", "orange", "blue" , "green" , "purple");  // Array for random color classes that have css for background-color assigned to them ic cc/styles.css
    $random = rand(0, 5);                                                   // random number between 0 and 5 
    return $color[$random];                                                 // returns the random class
}
     
function printQuote($quotes)  // Print Quote HTML Function
{
   
    $quoteItem= getRandomQuote($quotes); // Calls the random Quote function
    $randomColor= getColor($color);      // Calls the random Color function
    
    $quoteMain = $quoteItem['quote'];          // The Quote from the random Quote Item
    $quoteSource = $quoteItem['source'];       // The Source from the random Quote Item
    $quoteCitation= $quoteItem['citation'];    // The Citation from the random Quote Item
    $quoteYear = $quoteItem['year'];           // The Year from the random Quote Item
    $quoteTag= $quoteItem['tag'];              // The Tag from the random Quote Item

    //HTML Sections assigned to variables for ease of editing
    $html_citationOpen = '<span class="citation">';
    $html_yearOpen = '<span class="year">';
    $html_tagOpen = '<span class="tag">';
    $html_citationYearClose = '</span>';
    $html_finalClosure = '</p></div><button id="loadQuote" onclick="window.location.reload(true)" >Show another quote</button></div>';
    $html_bodyClose = '</body>';            
    $html_finalQuote = '<body' . " class=" . '"' . $randomColor . '"' . '>';       // Adds the random color value to the body class                                                                          
    $html_finalQuote .= '<div class="container"><div id="quote-box"><p class="quote">' . $quoteMain . '</p>' . '<p class="source">' .$quoteSource; // Add the Quote and Source to  the html and sets this to a variable as these are the only two required values in the quote i.e: They do not change
    

   
   
    if ($quoteCitation  != null AND $quoteYear != null AND $quoteTag != null){                      // Conditionals for displaying various combinatiosns of Citation/year/Tag
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_citationOpen . $quoteCitation . $html_citationYearClose;
        $html_finalQuote .= $html_yearOpen . $quoteYear . $html_citationYearClose;
        $html_finalQuote .= $html_tagOpen . $quoteTag . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;
        } elseif($quoteCitation != null AND $quoteYear == null AND $quoteTag == null){
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_citationOpen . $quoteCitation . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;
        } elseif($quoteCitation == null AND $quoteYear != null AND $quoteTag == null){
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_yearOpen . $quoteYear . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;
        } elseif($quoteCitation == null AND $quoteYear == null AND $quoteTag != null){
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_tagOpen . $quoteTag . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;
        } elseif($quoteCitation != null AND $quoteYear != null AND $quoteTag == null){
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_citationOpen . $quoteCitation . $html_citationYearClose;
        $html_finalQuote .= $html_yearOpen . $quoteYear . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;
        } elseif($quoteCitation == null AND $quoteYear != null AND $quoteTag != null){
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_yearOpen . $quoteYear . $html_citationYearClose;
        $html_finalQuote .= $html_tagOpen . $quoteTag . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;     
        } elseif($quoteCitation != null AND $quoteYear == null AND $quoteTag != null){
        $html_finalQuote = $html_finalQuote;
        $html_finalQuote .= $html_citationOpen . $quoteCitation . $html_citationYearClose;
        $html_finalQuote .= $html_tagOpen . $quoteTag . $html_citationYearClose;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;        
        } else {
        $html_finalQuote = $html_finalQuote . $html_finalClosure. $html_bodyClose ;
        $html_finalQuote .= $html_finalClosure. $html_bodyClose;
        }  

    print $html_finalQuote ; // Prints the final quote in html
}

$finalHtmlQuote = printQuote($quotes); // Initialises the printQoute function and assigns it to a variable

function printRefreshMetatag()  // Print Refres Meta HTML Function
{
$index_url = $_SERVER['PHP_SELF'];  //craetes a path of the file eg:inc/functions.php in this but index.php when used their
$timeInSec= "20";                   //delay between page refresh
$refreshMeta = '<meta http-equiv=';
$refreshMeta .= '"refresh"';
$refreshMeta .= ' content=';
$refreshMeta .= '"' . $timeInSec;
$refreshMeta .=';URL=' . "'$index_url'" . '">';
$html_refresh = print $refreshMeta; // Print html Refresh Meta tag
}
printRefreshMetatag($html_refresh); // Initialises the Print Refresh meta tag function





?>