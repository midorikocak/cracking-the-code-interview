<?php
/**
 * Created by PhpStorm.
 * User: mtkocak
 * Date: 23/02/16
 * Time: 23:33
 */

namespace MidoriKocak\UpWork;


class Teaser {

    /**
     * makeTeaser returns a cleanly truncated teaser string from the
     * beginning of the article along with a link to
     * the full article. Truncation will follow the following Rules...
     * Truncation preferably happens at the nearest white space character
     * (space, newline, tab) or
     * punctuation character (comma, fullstop, colon, semicolon,
     * exclamation) that is less than maxLength specified.
     *
     * Additional Information:
     * All characters are single byte latin-1 characters.
     * Content is expected to be in plain text, please assume that there
     * are no HTML or SGML tags.
     *
     * Example
     * Content:
     * I quickly learned how fishy this world could be. A client I knew who
     * specialized in auto loans invited me up to his desk to show me how
     * to structure subprime debt. Eager to please, I promised I could
     * enhance my software to model his deals in less than a month. But when
     * I glanced at the takeout in the deal, I couldn't believe my eyes.
     *
     * Teaser:
     * I quickly learned how fishy this world could be. A client I knew who
     * specialized in auto loans invited me up to his desk to show me how
     * to structure subprime debt. Eager to please, I
     *
     * @param $content - String, Full/Partial Content of the article
     * @param $url - String, Absolute URL to the Full article
     * @param $linkText - String, Text to show for the link
     * @param $minLength - Number, Preferred minimum length of the teaser
     * (non binding)
     * @param $maxLength - Number, Maximum length of the teaser, optional. * If not set, maxLength = minLength+50
     * @return String Teaser That will be displayed
     */
    public static function makeTeaser($content, $url, $linkText, $minLength, $maxLength=NULL)
    {
    }
} 