<?php


class Config
{
    /**
     *  Twig template engine instance
     */
    public static $twig;

    /**
     *  Default application folder (in case placing project in subfolder on the shared remote hosting)
     */
    public static $strSubfolderRoute = "";

    /**
     *  Activate LoremFlickr service as default service for generating random images on the page
     */
    public static $useAnotherImageRandomGenerator = true;

    /**
     *  Default quantity of items per page
     */
    public static $intPostsPerPage = 8;

}