<?php


class RouteController
{

    /**
     *
     */
    public function index()
    {
        $twig = RouteController::getTwigInstance();
        $strSubfolderRoute = RouteController::getProjectSubFolderPath();
        $home = true;
        echo $twig->render('home.php', ['strSubfolderRoute' => $strSubfolderRoute, 'home' => $home]);
    }


    /**
     *
     */
    public function template($currentPage=1)
    {
        session_start();

        //-- Check if session data for authors exists
        if($_SESSION['arrAuthors']==null){
            //-- Get array of authors
            $path = "http://maqe.github.io/json/authors.json";
            $arrAuthors = RouteController::performCURLRequest($path);
            $arrTemp=[];
            if(!empty($arrAuthors)){
                foreach ($arrAuthors as $author){
                    $arrTemp[$author['id']]=$author;
                }
            }
            $arrAuthors=$arrTemp;
            $_SESSION['arrAuthors']=$arrAuthors;
        }else{
            $arrAuthors=$_SESSION['arrAuthors'];
        }

        //-- Check if session data for posts exists
        if($_SESSION['arrPosts']==null) {
            //-- Get array of posts
            $path = "http://maqe.github.io/json/posts.json";
            $arrPosts = RouteController::performCURLRequest($path);
            $arrAllPosts = $arrPosts;
            $_SESSION['arrPosts']=$arrPosts;
        }else{
            $arrPosts=$_SESSION['arrPosts'];
            $arrAllPosts=$_SESSION['arrPosts'];
        }



        //-- START Pagination functionality
        $arrTemp=[];
        if((int)$currentPage['page']>1){
            $count=1;
            foreach ($arrPosts as $post){
                if($count<=Config::$intPostsPerPage && $post['id']>(8*((int)$currentPage['page']-1))){
                    $arrTemp[$post['id']]=$post;
                    $count++;
                }
            }
        }else{
            foreach ($arrPosts as $post){
                if($post['id']<=Config::$intPostsPerPage) {
                    $arrTemp[$post['id']] = $post;
                }
            }
        }
        //-- STOP Pagination functionality
        $arrPosts=$arrTemp;

        //-- Build array of app content results
        $arrData=[
            'arrAuthors'=>$arrAuthors,
            'arrPosts'=>$arrPosts
        ];


        $twig = RouteController::getTwigInstance();
        $strSubfolderRoute = RouteController::getProjectSubFolderPath();

        echo $twig->render('template.php', [
            'strSubfolderRoute' => $strSubfolderRoute,
            'arrData'=>$arrData,
            'currentPage'=>(int)$currentPage['page'],
            'arrAllPosts'=>$arrAllPosts,
            'arrConfig'=>RouteController::getConfig()
        ]);
    }

    public function performCURLRequest($path)
    {
        $arrResult = [];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $path);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = [
            'Accept: application/json'
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }
        }
        return $arrResult;
    }

    public function getTwigInstance()
    {
        return Config::$twig;
    }

    public function getProjectSubFolderPath()
    {
        return Config::$strSubfolderRoute;
    }
    public function getConfig()
    {
        $arrConfig=[
          'useAnotherImageRandomGenerator'=>Config::$useAnotherImageRandomGenerator,
          'intPostsPerPage'=>Config::$intPostsPerPage
        ];

        return $arrConfig;
    }


    /**
     *
     */
    public function about()
    {
        $twig = RouteController::getTwigInstance();
        $strSubfolderRoute = RouteController::getProjectSubFolderPath();
        echo $twig->render('about.php', ['strSubfolderRoute' => $strSubfolderRoute]);
    }
}