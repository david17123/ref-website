<?php

namespace App\HelperClasses;

/**
 * Helper class to support setting up the page to be returned back to user.
 */
class SitePageService
{
    private $jsVars;
    private $siteTitle;
    private $metaTags;

    public function __construct()
    {
        $this->jsVars = array();
        $this->siteTitle = 'Reformed Evangelical Fellowship';
        $this->metaTags = array();
    }

    /**
     * Adds an entry to the Javascript variable `PageArgs`. Object or array
     * values will be parsed using json_encode(). Setting value on an already
     * set variable name will override the old value.
     *
     * @param string $name
     * @param string $value
     */
    public function setJavascriptVar($name, $value)
    {
        $this->jsVars[$name] = $value;
    }

    /**
     * Same like addJavascriptVar(), but sets multiple variables at once.
     *
     * @param array $vars
     */
    public function setJavascriptVars($vars)
    {
        foreach ($vars as $name => $value)
        {
            $this->setJavascriptVar($name, $value);
        }
    }

    public function setSiteTitle($title)
    {
        $this->siteTitle = $title;
    }

    /**
     * Sets a meta tag for the page. $metaTag array can have the following
     * keys (in lowercase):
     *   - charset
     *   - http-equiv
     *   - name
     *   - content
     *
     * @param array $metaTag
     */
    public function addMetaTag($metaTag)
    {
        $normalizedMetaTag = array();
        if ( isset($metaTag['charset']) )
        {
            $normalizedMetaTag['charset'] = $metaTag['charset'];
        }
        if ( isset($metaTag['http-equiv']) )
        {
            $normalizedMetaTag['http-equiv'] = $metaTag['http-equiv'];
        }
        if ( isset($metaTag['name']) )
        {
            $normalizedMetaTag['name'] = $metaTag['name'];
        }
        if ( isset($metaTag['content']) )
        {
            $normalizedMetaTag['content'] = $metaTag['content'];
        }

        if ($normalizedMetaTag)
        {
            $this->metaTags[] = $normalizedMetaTag;
        }
    }



    /**
     * Gets the currently (to be) set Javascript page variables.
     *
     * @return array
     */
    public function getJavascriptVars()
    {
        return $this->jsVars;
    }

    public function getSiteTitle()
    {
        return $this->siteTitle;
    }

    /**
     * Gets the meta tags for the page.
     *
     * @param bool $render If True, a rendered HTML meta tags will be returned
     * @return mixed
     */
    public function getMetaTags($render=true)
    {
        if ($render)
        {
            $rendered = [];
            foreach ($this->metaTags as $tag)
            {
                if ( isset($tag['charset']) )
                {
                    $rendered[] = '<meta charset="'.htmlentities($tag['charset']).'">';
                }
                else if ( isset($tag['http-equiv']) && isset($tag['content']) )
                {
                    $rendered[] = '<meta http-equiv="'.htmlentities($tag['http-equiv']).'" content="'.htmlentities($tag['content']).'">';
                }
                else if ( isset($tag['name']) && isset($tag['content']) )
                {
                    $rendered[] = '<meta name="'.htmlentities($tag['name']).'" content="'.htmlentities($tag['content']).'">';
                }
            }

            return implode("\n", $rendered);
        }
        else
        {
            return $this->metaTags;
        }
    }
}
